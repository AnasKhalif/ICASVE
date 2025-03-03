<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FilePayment;
use App\Models\User;
use App\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Upload;
use App\Models\Year;
use App\Models\ConferenceSetting;
use App\Mail\PaymentVerified;
use Illuminate\Support\Facades\Mail;
use App\Traits\FlashAlert;

class VerifyPaymentController extends Controller
{
    use FlashAlert;

    public function index()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return back()->with($this->alertDanger());
        }

        $payments = FilePayment::with('user.roles')
            ->whereYear('created_at', $activeYear->year)
            ->get();
        return view('verify-payment.index', compact('payments'));
    }

    public function verify($id)
    {
        $filePayment = FilePayment::findOrFail($id);
        $newStatus = $filePayment->status === 'verified' ? 'pending' : 'verified';
        $filePayment->update(['status' => $newStatus]);

        if ($newStatus === 'verified') {
            $user = $filePayment->user;
            Mail::to($user->email)->send(new PaymentVerified($user, $filePayment));
        }

        return redirect()->route('admin.payment.index')->with($this->alertUpdated());
    }

    public function digitalPdf($id)
    {
        $conferenceSetting = ConferenceSetting::first();
        $conferenceChairPerson = $conferenceSetting->conference_chairperson;
        $filePayment = FilePayment::with('user.abstracts')->findOrFail($id);

        $letterHeaderUrl = Upload::getFilePath('letter_header');
        $signatureUrl = Upload::getFilePath('signature');

        $letterHeader = storage_path('app/public/' . str_replace(asset('storage/'), '', $letterHeaderUrl));
        $signature = storage_path('app/public/' . str_replace(asset('storage/'), '', $signatureUrl));

        $pdf = PDF::loadView('verify-payment.digital-pdf', compact('filePayment', 'letterHeader', 'signature', 'conferenceChairPerson'));
        return $pdf->stream('payment-digital.pdf');
    }
}
