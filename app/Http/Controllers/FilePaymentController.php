<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilePayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilePaymentController extends Controller
{
    public function create()
    {
        $users = Auth::user();
        $existingPayment = FilePayment::where('user_id', $users->id)->first();
        return view('filepayments.create', compact('users', 'existingPayment'));
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
        $file = $request->file('file');

        // Cek apakah user sudah punya file payment
        $existingPayment = FilePayment::where('user_id', $user->id)->first();

        if ($existingPayment) {
            // Hapus file lama
            Storage::disk('public')->delete($existingPayment->file_path);
            
            // Simpan file baru
            $filePath = $file->store('payments', 'public');
            
            // Update record yang ada
            $existingPayment->update([
                'file_path' => $filePath
            ]);

            $message = 'File pembayaran berhasil diperbarui.';
        } else {
            // Simpan file baru
            $filePath = $file->store('payments', 'public');
            
            // Buat record baru
            FilePayment::create([
                'user_id' => $user->id,
                'file_path' => $filePath
            ]);

            $message = 'File pembayaran berhasil diunggah.';
        }

        return redirect()->route('filepayments.create')
            ->with('success', $message);
    }
}
