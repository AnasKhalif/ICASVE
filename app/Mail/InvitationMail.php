<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ConferenceSetting;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use App\Models\Upload;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $abstract;
    public $conference;
    public $signaturePath;
    public $zoomLink;
    public $letterHeader;
    public $rundownHtml;
    public $roleNames;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $abstract = null)
    {
        $this->user = $user;
        $this->abstract = $abstract;
        $this->conference = ConferenceSetting::first();
        $this->zoomLink = [
            'url' => 'https://univ-brawijaya.zoom.us/j/91906144067?pwd=9P6mENqBAKABq495fsw5LRaOCv3RgV.1',
            'id' => '919 0614 4067',
            'pass' => '834404',
        ];

        $this->roleNames = $user->roles->pluck('name')->toArray();

        $letterHeaderUrl = Upload::getFilePath('letter_header');
        $this->letterHeader = $letterHeaderUrl
            ? storage_path('app/public/' . str_replace(asset('storage/'), '', $letterHeaderUrl))
            : null;

        $signatureUrl = Upload::getFilePath('signature');
        $this->signaturePath = storage_path('app/public/' . str_replace(asset('storage/'), '', $signatureUrl));

        $invitation = Upload::where('type', 'invitation_template')->latest()->first();
        $this->rundownHtml = null;
        if ($invitation && file_exists(storage_path('app/public/' . $invitation->file_path))) {
            $this->rundownHtml = file_get_contents(storage_path('app/public/' . $invitation->file_path));
        }
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Acceptance of Abstract and Invitation as an Academic Session Speaker at The 4th International Conference On Applied Science For Vocational Education (ICAVSE 2025)',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.invitation',
        );
    }

    public function attachments(): array
    {
        return [];
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $pdf = Pdf::loadView('emails.invitation-pdf', [
            'user' => $this->user,
            'abstract' => $this->abstract,
            'conference' => $this->conference,
            'zoomLink' => $this->zoomLink,
            'signaturePath' => $this->signaturePath,
            'letterHeader' => $this->letterHeader,
            'rundownHtml' => $this->rundownHtml,
            'roleNames' => $this->roleNames,
        ]);

        return $this->subject('Invitation as Academic Session Speaker at ICASVE 2025')
            ->view('emails.invitation', [
                'user' => $this->user,
                'abstract' => $this->abstract,
                'conference' => $this->conference,
                'zoomLink' => $this->zoomLink,
                'signaturePath' => $this->signaturePath,
                'letterHeader' => $this->letterHeader,
                'rundownHtml' => $this->rundownHtml,
                'roleNames' => $this->roleNames,
            ])
            ->attachData($pdf->output(), 'Invitation_' . $this->user->id . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
