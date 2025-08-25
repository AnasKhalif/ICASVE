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
use App\Mail\PaymentReminderMail;
use App\Traits\FlashAlert;
use App\Jobs\SendPaymentReminderEmail;
use App\Jobs\SendPaymentReminderEmailForeign;
use Illuminate\Support\Facades\Bus;

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
            ->paginate(10);
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

    public function sendReminder()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', [
                'indonesia-participants',
                'foreign-participants',
                'indonesia-presenter',
                'foreign-presenter'
            ]);
        })
            ->whereDoesntHave('filePayments') // Belum ada pembayaran sama sekali
            ->get();

        foreach ($users as $user) {
            SendPaymentReminderEmail::dispatch($user);
        }

        return back()->with('success', "Email reminder berhasil dikirim");
    }

    public function sendReminderForeign()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('name', [
                'foreign-participants',
                'foreign-presenter'
            ]);
        })
            ->whereDoesntHave('filePayments')
            ->get();

        $delay = 0;
        foreach ($users as $user) {
            Bus::dispatch(
                (new SendPaymentReminderEmailForeign($user))
                    ->delay(now()->addMinutes($delay))
            );
            $delay += 2;
        }

        return back()->with('success', "Email reminder untuk foreign berhasil dikirim");
    }
}
