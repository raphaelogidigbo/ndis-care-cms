<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PlanManagement: string implements HasLabel
{
    case PlanManaged = 'plan_managed';
    case NdisManaged = 'ndis_managed';
    case SelfManaged = 'self_managed';

    public function getLabel(): string
    {
        return match ($this) {
            self::PlanManaged => 'Plan Managed',
            self::NdisManaged => 'NDIA Managed',
            self::SelfManaged => 'Self Managed',
        };
    }
}
