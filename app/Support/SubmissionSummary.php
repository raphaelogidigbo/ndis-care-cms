<?php

namespace App\Support;

use App\Enums\FormSubmissionType;
use App\Models\FormSubmission;
use App\Models\Referral;
use Illuminate\Support\Str;

class SubmissionSummary
{
    /**
     * Human-readable label → value rows describing a stored submission,
     * shared by the submitter confirmation and internal notification emails.
     *
     * @return array<string, string>
     */
    public static function rows(FormSubmission|Referral $submission): array
    {
        if ($submission instanceof Referral) {
            return array_filter([
                'Name' => $submission->full_name,
                'Phone' => $submission->phone,
                'Email' => $submission->email,
                'Date of birth' => $submission->birth_date?->format('j M Y'),
                'Sex' => $submission->sex?->getLabel(),
                'Address' => $submission->address,
                'NDIS number' => $submission->ndis_number,
                'Plan management' => $submission->plan_management?->getLabel(),
                'Plan dates' => $submission->ndis_plan_start || $submission->ndis_plan_end
                    ? ($submission->ndis_plan_start?->format('j M Y') ?? '?').' – '.($submission->ndis_plan_end?->format('j M Y') ?? '?')
                    : null,
                'Referrer role' => $submission->referrer_role?->getLabel(),
                'Referrer details' => $submission->referrer_details,
                'Heard about us via' => $submission->source?->getLabel(),
            ], filled(...));
        }

        $rows = array_filter([
            'Name' => $submission->name,
            'Email' => $submission->email,
            'Phone' => $submission->phone,
        ], filled(...));

        foreach ($submission->payload ?? [] as $key => $value) {
            $rows[Str::headline((string) $key)] = is_scalar($value) ? (string) $value : json_encode($value);
        }

        if ($submission->resume_path) {
            $rows['Resume'] = ($submission->payload['resume_name'] ?? 'resume').' — attached';
        }

        return $rows;
    }

    public static function typeLabel(FormSubmission|Referral $submission): string
    {
        return match (true) {
            $submission instanceof Referral => 'referral',
            $submission->type === FormSubmissionType::Contact => 'contact enquiry',
            $submission->type === FormSubmissionType::Feedback => 'feedback submission',
            $submission->type === FormSubmissionType::Careers => 'careers application',
            default => 'form submission',
        };
    }

    public static function name(FormSubmission|Referral $submission): string
    {
        return $submission instanceof Referral
            ? $submission->full_name
            : $submission->name;
    }
}
