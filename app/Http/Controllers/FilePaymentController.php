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

    public function store(Request $request) {
      $amount = $request->input('amount');
      $amount = str_replace('.', '', $amount);
      $amount = (int) $amount;

      $request->validate([
        'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048|required',
        'amount' => 'nullable|numeric|min:0|required', 
    ], [
        'file.max' => 'File terlalu besar. Maksimal ukuran file adalah 2MB.',
        'file.mimes' => 'Format file tidak sesuai. Format yang diterima: JPG, JPEG, PNG, PDF',
        'amount.numeric' => 'Jumlah pembayaran harus berupa angka yang valid.',
        'amount.min' => 'Jumlah pembayaran tidak boleh negatif',
    ]);

    if (!$request->hasFile('file') && !$request->filled('amount')) {
        return redirect()->back()
            ->withErrors(['file' => 'Anda harus mengisi file atau jumlah pembayaran.'])
            ->withInput();
    }

    $user = Auth::user();
    $existingPayment = FilePayment::where('user_id', $user->id)->first();

    if ($existingPayment) {
        $updateData = [];

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($existingPayment->file_path);
            $filePath = $request->file('file')->store('payments', 'public');
            $updateData['file_path'] = $filePath;
        }

        if ($request->filled('amount')) {
            $updateData['amount'] = $amount;
        }

        if (!empty($updateData)) {
            $existingPayment->update($updateData);
            $message = 'Data pembayaran berhasil diperbarui.';
        } else {
            $message = 'Tidak ada perubahan yang dilakukan.';
        }
    } else {
        $data = ['user_id' => $user->id];

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('payments', 'public');
        }

        if ($request->filled('amount')) {
            $data['amount'] = $amount; 
        }

        FilePayment::create($data);
        $message = 'Data pembayaran berhasil disimpan.';
    }

    return redirect()->route('filepayments.create')
        ->with('success', $message);
  }
}

