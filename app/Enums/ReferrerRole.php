<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ReferrerRole: string implements HasLabel
{
    case Participant = 'participant';
    case SupportCoordinator = 'support_coordinator';
    case PlanManager = 'plan_manager';
    case Therapist = 'therapist';
    case Other = 'other';

    public function getLabel(): string
    {
        return match ($this) {
            self::Participant => 'Participant',
            self::SupportCoordinator => 'Support Coordinator',
            self::PlanManager => 'Plan Manager',
            self::Therapist => 'Therapist',
            self::Other => 'Other',
        };
    }
}
