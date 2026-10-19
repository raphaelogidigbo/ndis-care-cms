<?php

namespace App\Support;

use App\Enums\FormSubmissionType;
use App\Mail\SubmissionConfirmation;
use App\Mail\SubmissionNotification;
use App\Models\FormSubmission;
use App\Models\Referral;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SubmissionNotifier
{
    /**
     * Send the submitter confirmation and internal notification for a
     * stored submission. Mail failures are reported but never block the
     * user — the record is already persisted and visible in the admin.
     * Sent synchronously so no queue worker is required.
     */
    public static function send(
        FormSubmission|Referral $submission,
        ?string $submitterEmail = null,
        ?string $submitterName = null,
    ): void {
        $submitterEmail ??= $submission->email;

        try {
            Mail::to($submitterEmail)->send(new SubmissionConfirmation($submission, $submitterName));
        } catch (Throwable $e) {
            report($e);
        }

        try {
            Mail::to(self::inboxFor($submission))
                ->send(new SubmissionNotification($submission, $submitterEmail));
        } catch (Throwable $e) {
            report($e);
        }
    }

    private static function inboxFor(FormSubmission|Referral $submission): string
    {
        if ($submission instanceof FormSubmission && $submission->type === FormSubmissionType::Careers) {
            return config('mail.to.careers');
        }

        return config('mail.to.info');
    }
}
