<?php

namespace App\Models;

use App\Enums\PlanManagement;
use App\Enums\ReferralSource;
use App\Enums\ReferralStatus;
use App\Enums\ReferrerRole;
use App\Enums\Sex;
use App\Models\Concerns\LogsActivity;
use Database\Factories\ReferralFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'status',
    'first_name',
    'last_name',
    'birth_date',
    'address',
    'sex',
    'phone',
    'email',
    'ndis_number',
    'ndis_plan_start',
    'ndis_plan_end',
    'plan_management',
    'referrer_role',
    'referrer_details',
    'source',
])]
class Referral extends Model
{
    /** @use HasFactory<ReferralFactory> */
    use HasFactory, LogsActivity;

    /**
     * @return Attribute<string, never>
     */
    protected function fullName(): Attribute
    {
        return Attribute::get(fn (): string => trim($this->first_name.' '.$this->last_name));
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => ReferralStatus::class,
            'birth_date' => 'date',
            'sex' => Sex::class,
            'ndis_plan_start' => 'date',
            'ndis_plan_end' => 'date',
            'plan_management' => PlanManagement::class,
            'referrer_role' => ReferrerRole::class,
            'source' => ReferralSource::class,
        ];
    }
}
