<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilePayment;
use App\Models\User;
use App\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;

class VerifyPaymentController extends Controller
{
    public function index()
    {
        $payments = FilePayment::with('user.roles')->get();
        return view('verify-payment.index', compact('payments'));
    }

    public function verify($id)
    {
        $filePayment = FilePayment::findOrFail($id);
        $newStatus = $filePayment->status === 'verified' ? 'pending' : 'verified';
        $filePayment->update(['status' => $newStatus]);

        return redirect()->route('admin.payment.index')->with('success', 'Payment status has been updated.');
    }

    public function digitalPdf($id)
    {
        $filePayment = FilePayment::with('user.abstracts')->findOrFail($id);
        $pdf = PDF::loadView('verify-payment.digital-pdf', compact('filePayment'));
        return $pdf->stream('payment-digital.pdf');
    }
}
