<?php

namespace App\Filament\Resources\SdaListings\Pages;

use App\Filament\Resources\SdaListings\SdaListingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSdaListing extends EditRecord
{
    protected static string $resource = SdaListingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
