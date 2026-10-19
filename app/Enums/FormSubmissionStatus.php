<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum FormSubmissionStatus: string implements HasColor, HasLabel
{
    case New = 'new';
    case Read = 'read';
    case Archived = 'archived';

    public function getLabel(): string
    {
        return match ($this) {
            self::New => 'New',
            self::Read => 'Read',
            self::Archived => 'Archived',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::New => 'info',
            self::Read => 'gray',
            self::Archived => 'gray',
        };
    }
}
