<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum FormSubmissionType: string implements HasColor, HasLabel
{
    case Contact = 'contact';
    case Feedback = 'feedback';
    case Careers = 'careers';

    public function getLabel(): string
    {
        return match ($this) {
            self::Contact => 'Contact',
            self::Feedback => 'Feedback',
            self::Careers => 'Careers',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Contact => 'info',
            self::Feedback => 'warning',
            self::Careers => 'success',
        };
    }
}
