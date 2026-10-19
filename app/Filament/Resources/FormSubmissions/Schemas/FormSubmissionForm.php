<?php

namespace App\Filament\Resources\FormSubmissions\Schemas;

use App\Enums\FormSubmissionStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FormSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('status')
                    ->options(FormSubmissionStatus::class)
                    ->required(),
                Toggle::make('is_spam'),
            ]);
    }
}
