<?php

namespace App\Http\Controllers\Admin;

use App\Models\FilePayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class ManualReceiptController extends Controller
{
    public function create() {
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

  public function store(Request $request) {
    $validated = $request->validate([
        'attendance' => 'required|exists:users,id', 
        'amount' => 'nullable|numeric',
        'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    if (!$request->hasFile('file') && !$request->filled('amount')) {
        return redirect()->back()
            ->withErrors(['file' => 'Anda harus mengisi file atau jumlah pembayaran.'])
            ->withInput();
    }

    $userId = $validated['attendance'];
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
            $message = 'Data pembayaran berhasil diperbarui dan diverifikasi.';
        } else {
            $message = 'Tidak ada perubahan yang dilakukan.';
        }
    } else {
        $data = [
            'user_id' => $userId,
            'amount' => $request->filled('amount') ? $validated['amount'] : null,
            'status' => 'verified',
        ];

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('payments', 'public');
        }

        FilePayment::create($data);
        $message = 'Data pembayaran berhasil disimpan dan diverifikasi.';
    }

    return redirect()->route('admin.manual-receipt.create')->with('success', $message);
 }


}