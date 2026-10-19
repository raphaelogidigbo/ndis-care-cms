<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SdaListingStatus: string implements HasLabel
{
    case Available = 'available';
    case ComingSoon = 'coming_soon';
    case Tenanted = 'tenanted';

    public function getLabel(): string
    {
        return match ($this) {
            self::Available => 'Available',
            self::ComingSoon => 'Coming Soon',
            self::Tenanted => 'Tenanted',
        };
    }
}
