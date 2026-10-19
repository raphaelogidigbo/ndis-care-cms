<?php

namespace App\Filament\Resources\SdaListings\Schemas;

use App\Enums\SdaDesignCategory;
use App\Enums\SdaListingStatus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SdaListingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Melbourne Accessible Villa'),
                TextInput::make('suburb')->required()->maxLength(255),
                TextInput::make('address')->maxLength(255)
                    ->helperText('Optional — leave blank if you only want the suburb shown.'),
                Select::make('design_category')
                    ->label('Design category')
                    ->options(SdaDesignCategory::class)
                    ->required(),
                TextInput::make('bedrooms')->numeric()->minValue(0)->maxValue(20),
                TextInput::make('bathrooms')->numeric()->minValue(0)->maxValue(20),
                Select::make('status')
                    ->options(SdaListingStatus::class)
                    ->default(SdaListingStatus::Available)
                    ->required(),
                FileUpload::make('image')
                    ->label('Photo')
                    ->disk('public_images')
                    ->directory('sda-listings')
                    ->image()
                    ->maxSize(2048)
                    ->helperText('Photo shown on the vacancy card. JPG/PNG, max 2MB.'),
                Toggle::make('is_published')->label('Published')->default(true),
                TextInput::make('sort_order')->numeric()->default(0)
                    ->helperText('Lower numbers appear first.'),
                Textarea::make('summary')->rows(4)->columnSpanFull()
                    ->helperText('Short description shown on the vacancy card.'),
            ]);
    }
}
