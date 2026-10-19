<?php

namespace App\Models;

use App\Enums\FormSubmissionStatus;
use App\Enums\FormSubmissionType;
use App\Models\Concerns\LogsActivity;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'type',
    'name',
    'email',
    'phone',
    'payload',
    'resume_path',
    'ip',
    'user_agent',
    'status',
    'is_spam',
])]
class FormSubmission extends Model
{
    use LogsActivity;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => FormSubmissionType::class,
            'payload' => 'array',
            'status' => FormSubmissionStatus::class,
            'is_spam' => 'boolean',
        ];
    }
}
