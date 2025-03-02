<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\ConferenceSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload;
use App\Models\EmailTemplate;

class AbstractInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $abstract;
    public $conference;
    public $logoPath;
    public $signaturePath;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $abstract)
    {
        $this->user = $user;
        $this->abstract = $abstract;
        $this->conference = ConferenceSetting::first();

        $logo = Upload::where('type', 'logo')->latest()->first();
        $this->logoPath = $logo ? asset('storage/' . $logo->file_path) : asset('img/Logo_ICASVE_rmbg.png');

        $signatureUrl = Upload::getFilePath('signature');
        $this->signaturePath = storage_path('app/public/' . str_replace(asset('storage/'), '', $signatureUrl));
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Invoice for Your Accepted Abstract',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.abstract-invoice',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        $emailTemplate = EmailTemplate::where('type', 'abstract_invoice')->first();
        $customMessage = $emailTemplate ? $emailTemplate->content : 'Default message jika belum diatur admin.';
        $amount = $emailTemplate ? $emailTemplate->amount : 0;

        $pdf = Pdf::loadView('invoice.invoice-pdf', [
            'user' => $this->user,
            'abstract' => $this->abstract,
            'conference' => $this->conference,
            'logoPath' => $this->logoPath,
            'signaturePath' => $this->signaturePath,
            'amount' => $amount
        ]);

        return $this->subject('Payment Invoice for Your Accepted Abstract')
            ->view('emails.abstract-invoice', compact('customMessage', 'amount'))
            ->attachData($pdf->output(), 'Invoice_' . $this->user->id . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
