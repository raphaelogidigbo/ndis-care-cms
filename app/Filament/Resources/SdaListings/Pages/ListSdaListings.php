<?php

namespace App\Filament\Resources\SdaListings\Pages;

use App\Filament\Resources\SdaListings\SdaListingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSdaListings extends ListRecords
{
    protected static string $resource = SdaListingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
