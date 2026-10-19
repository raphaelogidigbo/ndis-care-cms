<?php

namespace App\Filament\Resources\JobListings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JobListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required()->maxLength(255),
                TextInput::make('location')->maxLength(255)->placeholder('e.g. Melbourne, WA'),
                Select::make('employment_type')
                    ->options([
                        'casual' => 'Casual',
                        'part_time' => 'Part-time',
                        'full_time' => 'Full-time',
                        'contract' => 'Contract',
                    ])
                    ->nullable(),
                Toggle::make('is_open')->label('Open (advertised on the careers page)')->default(true),
                TextInput::make('sort_order')->numeric()->default(0)->helperText('Lower numbers appear first.'),
                Textarea::make('summary')->rows(4)->columnSpanFull()
                    ->helperText('Short description shown on the careers page.'),
            ]);
    }
}
