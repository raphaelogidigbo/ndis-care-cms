<?php

namespace App\Filament\Resources\SdaListings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SdaListingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public_images')
                    ->label('Photo'),
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('suburb')->searchable()->sortable(),
                TextColumn::make('design_category')->badge()->label('Category'),
                TextColumn::make('bedrooms')->label('Beds'),
                TextColumn::make('bathrooms')->label('Baths'),
                TextColumn::make('status')->badge()->sortable(),
                IconColumn::make('is_published')->boolean()->label('Published'),
                TextColumn::make('sort_order')->sortable(),
                TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
