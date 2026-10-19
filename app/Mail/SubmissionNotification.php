<?php

namespace App\Mail;

use App\Filament\Resources\FormSubmissions\FormSubmissionResource;
use App\Filament\Resources\Referrals\ReferralResource;
use App\Models\FormSubmission;
use App\Models\Referral;
use App\Support\SubmissionSummary;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Throwable;

class SubmissionNotification extends Mailable
{
    public function __construct(
        public FormSubmission|Referral $submission,
        public ?string $replyToEmail = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: filled($this->replyToEmail)
                ? [new Address($this->replyToEmail, SubmissionSummary::name($this->submission))]
                : [],
            subject: 'New '.SubmissionSummary::typeLabel($this->submission).' — '.SubmissionSummary::name($this->submission),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.notification',
            with: [
                'typeLabel' => SubmissionSummary::typeLabel($this->submission),
                'name' => SubmissionSummary::name($this->submission),
                'rows' => SubmissionSummary::rows($this->submission),
                'adminUrl' => $this->adminUrl(),
            ],
        );
    }

    private function adminUrl(): ?string
    {
        try {
            return $this->submission instanceof Referral
                ? ReferralResource::getUrl('view', ['record' => $this->submission])
                : FormSubmissionResource::getUrl('view', ['record' => $this->submission]);
        } catch (Throwable) {
            return null;
        }
    }
}
