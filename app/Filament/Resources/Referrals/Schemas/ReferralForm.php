<?php

namespace App\Filament\Resources\Referrals\Schemas;

use App\Enums\PlanManagement;
use App\Enums\ReferralSource;
use App\Enums\ReferralStatus;
use App\Enums\ReferrerRole;
use App\Enums\Sex;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReferralForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('status')
                    ->options(ReferralStatus::class)
                    ->default(ReferralStatus::New)
                    ->required(),
                Section::make('Participant')
                    ->schema([
                        TextInput::make('first_name')->required()->maxLength(255),
                        TextInput::make('last_name')->required()->maxLength(255),
                        DatePicker::make('birth_date'),
                        Select::make('sex')->options(Sex::class),
                        TextInput::make('address')->maxLength(255),
                        TextInput::make('phone')->tel()->required()->maxLength(255),
                        TextInput::make('email')->email()->required()->maxLength(255),
                    ])
                    ->columns(2),
                Section::make('NDIS Plan')
                    ->schema([
                        TextInput::make('ndis_number')->label('NDIS number')->maxLength(255),
                        Select::make('plan_management')->options(PlanManagement::class),
                        DatePicker::make('ndis_plan_start'),
                        DatePicker::make('ndis_plan_end'),
                    ])
                    ->columns(2),
                Section::make('Referrer')
                    ->schema([
                        Select::make('referrer_role')->options(ReferrerRole::class),
                        Select::make('source')->options(ReferralSource::class),
                        Textarea::make('referrer_details')->rows(3)->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
