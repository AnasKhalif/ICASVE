<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilePayment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ManualReceiptController extends Controller
{
    public function create()
    {
        $roles = Role::whereIn('name', [
            'indonesia-presenter',
            'foreign-presenter',
            'indonesia-participants',
            'foreign-participants'
        ])->get();
        $users = User::whereHas('roles', function ($query) use ($roles) {
            $query->whereIn('name', $roles->pluck('name')->toArray());
        })->get();
        return view('manual-receipt.create', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'currency' => 'required|string|in:IDR,USD',
        ]);
        if (!$request->hasFile('file') && !$request->filled('amount')) {
            return redirect()->back()
                ->withErrors(['file' => 'You must provide either a file or a payment amount.'])
                ->withInput();
        }
        $userId = $validated['user_id'];
        $existingPayment = FilePayment::where('user_id', $userId)->first();
        if ($existingPayment) {
            $updateData = ['status' => 'verified'];
            if ($request->hasFile('file')) {
                if (!empty($existingPayment->file_path)) {
                    Storage::disk('public')->delete($existingPayment->file_path);
                }
                $filePath = $request->file('file')->store('payments', 'public');
                $updateData['file_path'] = $filePath;
            }
            if ($request->filled('amount')) {
                $updateData['amount'] = $validated['amount'];
            }
            if (!empty($updateData)) {
                $existingPayment->update($updateData);
                $message = 'Payment data has been successfully updated and verified.';
            } else {
                $message = 'No changes were made.';
            }
        } else {
            $data = [
                'user_id' => $userId,
                'amount' => $request->filled('amount') ? $validated['amount'] : null,
                'currency' => $validated['currency'],
                'status' => 'verified',
            ];
            if ($request->hasFile('file')) {
                $data['file_path'] = $request->file('file')->store('payments', 'public');
            }
            FilePayment::create($data);
            $message = 'Payment data has been successfully saved and verified.';
        }
        return redirect()->route('admin.manual-receipt.create')->with('success', $message);
    }
}
