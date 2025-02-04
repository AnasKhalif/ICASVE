<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilePayment;
use App\Models\User;
use App\Models\Role;

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
}
