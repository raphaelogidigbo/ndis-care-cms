<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum SdaDesignCategory: string implements HasLabel
{
    case ImprovedLiveability = 'improved_liveability';
    case FullyAccessible = 'fully_accessible';
    case Robust = 'robust';
    case HighPhysicalSupport = 'high_physical_support';

    public function getLabel(): string
    {
        return match ($this) {
            self::ImprovedLiveability => 'Improved Liveability',
            self::FullyAccessible => 'Fully Accessible',
            self::Robust => 'Robust',
            self::HighPhysicalSupport => 'High Physical Support',
        };
    }
}
