<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ReferralSource: string implements HasLabel
{
    case Internet = 'internet';
    case SocialMedia = 'social_media';
    case Friends = 'friends';
    case Other = 'other';

    public function getLabel(): string
    {
        return match ($this) {
            self::Internet => 'Internet',
            self::SocialMedia => 'Social Media',
            self::Friends => 'Friends',
            self::Other => 'Other',
        };
    }
}
