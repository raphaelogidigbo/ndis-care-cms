<?php

namespace App\Filament\Resources\SdaListings;

use App\Filament\Resources\SdaListings\Pages\CreateSdaListing;
use App\Filament\Resources\SdaListings\Pages\EditSdaListing;
use App\Filament\Resources\SdaListings\Pages\ListSdaListings;
use App\Filament\Resources\SdaListings\Schemas\SdaListingForm;
use App\Filament\Resources\SdaListings\Tables\SdaListingsTable;
use App\Models\SdaListing;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SdaListingResource extends Resource
{
    protected static ?string $model = SdaListing::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'SDA Housing';

    public static function form(Schema $schema): Schema
    {
        return SdaListingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SdaListingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSdaListings::route('/'),
            'create' => CreateSdaListing::route('/create'),
            'edit' => EditSdaListing::route('/{record}/edit'),
        ];
    }
}
