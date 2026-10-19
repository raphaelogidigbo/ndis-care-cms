<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Sex: string implements HasLabel
{
    case Male = 'male';
    case Female = 'female';
    case Indeterminate = 'indeterminate';

    public function getLabel(): string
    {
        return match ($this) {
            self::Male => 'Male',
            self::Female => 'Female',
            self::Indeterminate => 'Intersex/Indeterminate',
        };
    }
}
