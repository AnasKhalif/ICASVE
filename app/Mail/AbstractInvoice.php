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

class AbstractInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $abstract;
    public $conference;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $abstract)
    {
        $this->user = $user;
        $this->abstract = $abstract;
        $this->conference = ConferenceSetting::first();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Abstract Invoice',
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
        $pdf = Pdf::loadView('invoice.invoice-pdf', [
            'user' => $this->user,
            'abstract' => $this->abstract,
            'conference' => $this->conference,
        ]);

        return $this->subject('Payment Invoice for Your Accepted Abstract')
            ->view('emails.abstract-invoice')
            ->attachData($pdf->output(), 'Invoice_' . $this->user->id . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
