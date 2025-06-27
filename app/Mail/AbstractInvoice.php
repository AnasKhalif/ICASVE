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
    public $logoBase64;
    public $signaturePath;
    public $templateType;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $abstract)
    {
        $this->user = $user;
        $this->abstract = $abstract;
        $this->conference = ConferenceSetting::first();

        $roleNames = $user->roles->pluck('name')->toArray();

        if (in_array('indonesia-presenter', $roleNames)) {
            $this->templateType = 'abstract_invoice_idr';
        } else if (in_array('foreign-presenter', $roleNames)) {
            $this->templateType = 'abstract_invoice_usd';
        } else {
            $this->templateType = 'abstract_invoice_usd';
        }



        $logo = Upload::where('type', 'logo')->latest()->first();
        $this->logoBase64 = null;
        if ($logo && file_exists(storage_path('app/public/' . $logo->file_path))) {
            $logoPath = storage_path('app/public/' . $logo->file_path);
            $this->logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
        }

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
        $emailTemplate = EmailTemplate::where('type', $this->templateType)->first();
        $customMessage = $emailTemplate ? $emailTemplate->content : ' ';
        $amount = $emailTemplate ? $emailTemplate->amount : 0;
        $amountType = strtoupper($emailTemplate?->amount_type ?? 'USD');

        $pdf = Pdf::loadView('invoice.invoice-pdf', [
            'user' => $this->user,
            'abstract' => $this->abstract,
            'conference' => $this->conference,
            'logoBase64' => $this->logoBase64,
            'signaturePath' => $this->signaturePath,
            'amount' => $amount,
            'amountType' => $amountType
        ]);

        return $this->subject('Payment Invoice for Your Accepted Abstract')
            ->view('emails.abstract-invoice', compact('customMessage', 'amount', 'amountType'))
            ->attachData($pdf->output(), 'Invoice_' . $this->user->id . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
