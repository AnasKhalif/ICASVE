<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilePayment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FilePaymentController extends Controller
{
    public function create()
    {
        $users = Auth::user();
        return view('filepayments.create', compact('users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ], [
            'file.max' => 'File terlalu besar. Maksimal ukuran file adalah 2MB.',
            'file.mimes' => 'Format file tidak sesuai. Format yang diterima: JPG, JPEG, PNG, PDF',
            'file.required' => 'File pembayaran harus diupload',
        ]);
        $user = Auth::user();
        $filePath = $request->file('file')->store('payments', 'public');
        FilePayment::create([
            'user_id' => $user->id,
            'file_path' => $filePath,
        ]);
        return redirect()->route('filepayments.create')
            ->with('success', 'File payment has been uploaded successfully.');
    }
}
