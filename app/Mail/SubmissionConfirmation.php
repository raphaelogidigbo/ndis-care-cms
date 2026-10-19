<?php

namespace App\Mail;

use App\Enums\FormSubmissionType;
use App\Models\FormSubmission;
use App\Models\Referral;
use App\Support\SubmissionSummary;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class SubmissionConfirmation extends Mailable
{
    public function __construct(
        public FormSubmission|Referral $submission,
        public ?string $recipientName = null,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "We've received your {$this->typeLabel()} — Harbourview Care Services",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.confirmation',
            with: [
                'name' => $this->recipientName ?: SubmissionSummary::name($this->submission),
                'typeLabel' => $this->typeLabel(),
                'rows' => SubmissionSummary::rows($this->submission),
            ],
        );
    }

    private function typeLabel(): string
    {
        return match (true) {
            $this->submission instanceof Referral => 'referral',
            $this->submission->type === FormSubmissionType::Contact => 'message',
            $this->submission->type === FormSubmissionType::Feedback => 'feedback',
            $this->submission->type === FormSubmissionType::Careers => 'application',
            default => 'submission',
        };
    }
}
