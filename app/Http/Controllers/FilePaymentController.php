<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilePayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Upload;
use App\Models\ConferenceSetting;

class FilePaymentController extends Controller
{
    public function create()
    {
        $users = Auth::user();
        $existingPayment = FilePayment::where('user_id', $users->id)->first();
        $conferenceSetting = ConferenceSetting::first();
        return view('filepayments.create', compact('users', 'existingPayment', 'conferenceSetting'));
    }
    public function store(Request $request)
    {
        $amount = $request->input('amount');
        $amount = str_replace('.', '', $amount);
        $amount = (int) $amount;
        
        $currency = $request->input('currency', 'IDR'); 
    
        $isFirstUpload = FilePayment::where('user_id', Auth::user()->id)->doesntExist();
    
        $request->validate([
            'file' => $isFirstUpload ? 'required|file|mimes:jpg,png,jpeg|max:2048' : 'file|mimes: jpg,png,jpeg|max:2048',
            'amount' => $isFirstUpload ? 'required|numeric|min:0' : 'nullable|numeric|min:0',
            'currency' => 'required|in:IDR,USD'
        ], [
            'file.max' => 'File size is too large. Maximum file size is 2MB.',
            'file.mimes' => 'Invalid file format. Allowed formats: JPG, JPEG, PNG',
            'file.required' => 'Payment file must be uploaded',
            'amount.numeric' => 'Payment amount must be a valid number.',
            'amount.min' => 'Payment amount cannot be negative',
            'currency.required' => 'Currency selection is required',
            'currency.in' => 'Invalid currency selected'
        ]);
    
        if (!$request->hasFile('file') && !$request->filled('amount')) {
            return redirect()->back()
                ->withErrors(['file' => 'You must upload a file or enter a payment amount.'])
                ->withInput();
        }
    
        $user = Auth::user();
        $existingPayment = FilePayment::where('user_id', $user->id)->first();
    
        if ($existingPayment) {
            $updateData = [];
            if ($request->hasFile('file')) {
                if (!empty($existingPayment->file_path)) {
                    Storage::disk('public')->delete($existingPayment->file_path);
                }
                $filePath = $request->file('file')->store('payments', 'public');
                $updateData['file_path'] = $filePath;
            }
    
            if ($request->filled('amount')) {
                $updateData['amount'] = $amount;
            }
    
            $updateData['currency'] = $currency; 
    
            if (!empty($updateData)) {
                $existingPayment->update($updateData);
                $message = 'Payment data successfully updated.';
            } else {
                $message = 'No changes were made.';
            }
        } else {
            $data = [
                'user_id' => $user->id,
                'currency' => $currency
            ];
            if ($request->hasFile('file')) {
                $data['file_path'] = $request->file('file')->store('payments', 'public');
            }
            if ($request->filled('amount')) {
                $data['amount'] = $amount;
            }
            FilePayment::create($data);
            $message = 'Payment data successfully saved.';
        }
    
        return redirect()->route('filepayments.create')
            ->with('success', $message);
    }


    public function receipt($id)
    {
        $conferenceSetting = ConferenceSetting::first();
        $conferenceChairPerson = $conferenceSetting->conference_chairperson;
        $filePayment = FilePayment::with('user.abstracts')->findOrFail($id);
    
        $letterHeaderUrl = Upload::getFilePath('letter_header');
        $signatureUrl = Upload::getFilePath('signature');
    
        $letterHeader = public_path(str_replace(asset(''), '', $letterHeaderUrl));
        $signature = public_path(str_replace(asset(''), '', $signatureUrl));
    
        $pdf = PDF::loadView('verify-payment.digital-pdf', compact('filePayment', 'letterHeader', 'signature', 'conferenceChairPerson'));
        return $pdf->stream('payment-receipt.pdf');
    }

}
