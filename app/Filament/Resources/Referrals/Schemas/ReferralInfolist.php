<?php

namespace App\Filament\Resources\Referrals\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReferralInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Participant')
                    ->schema([
                        TextEntry::make('full_name')->label('Name'),
                        TextEntry::make('status')->badge(),
                        TextEntry::make('birth_date')->date(),
                        TextEntry::make('sex'),
                        TextEntry::make('address')->placeholder('—'),
                        TextEntry::make('phone'),
                        TextEntry::make('email'),
                        TextEntry::make('created_at')->label('Submitted')->dateTime(),
                    ])
                    ->columns(2),
                Section::make('NDIS Plan')
                    ->schema([
                        TextEntry::make('ndis_number')->label('NDIS number')->placeholder('—'),
                        TextEntry::make('plan_management')->placeholder('—'),
                        TextEntry::make('ndis_plan_start')->date()->placeholder('—'),
                        TextEntry::make('ndis_plan_end')->date()->placeholder('—'),
                    ])
                    ->columns(2),
                Section::make('Referrer')
                    ->schema([
                        TextEntry::make('referrer_role')->placeholder('—'),
                        TextEntry::make('source')->placeholder('—'),
                        TextEntry::make('referrer_details')->placeholder('—')->columnSpanFull()
                            ->formatStateUsing(fn (?string $state): ?string => $state === null ? null : nl2br(e($state)))
                            ->html(),
                    ])
                    ->columns(2),
            ]);
    }
}
