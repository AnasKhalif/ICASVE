<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilePayment;
use App\Models\User;

class FilePaymentController extends Controller
{
    public function create($userId)
    {
        $users = User::findOrFail($userId);
        return view('filepayments.create', compact('users'));
    }

    public function store(Request $request, $userId) 
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $users = User::findOrFail($userId);
        $filePath = $request->file('file')->store('payments', 'public');

        FilePayment::create([
            'user_id' => $users->id,
            'file_path' => $filePath,
        ]);

        return redirect()->route('filepayments.create', ['userId' => $users->id])
            ->with('success', 'File payment has been uploaded successfully.');
    }
}
