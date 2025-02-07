<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilePayment;
use App\Models\Role;
use App\Models\User;

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
        ]);
        $receipt = new FilePayment();
        $receipt->user_id = $validated['user_id'];
        $receipt->amount = $validated['amount'];
        $receipt->save();
        return redirect()->route('admin.manual-receipt.create')->with('success', 'Receipt created successfully!');
    }
}
