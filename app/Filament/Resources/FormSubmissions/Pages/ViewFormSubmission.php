<?php

namespace App\Filament\Resources\FormSubmissions\Pages;

use App\Filament\Resources\FormSubmissions\FormSubmissionResource;
use App\Models\FormSubmission;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Storage;

class ViewFormSubmission extends ViewRecord
{
    protected static string $resource = FormSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('viewResume')
                ->label('View resume')
                ->icon('heroicon-o-document-arrow-down')
                ->color('info')
                ->visible(fn (FormSubmission $record): bool => filled($record->resume_path))
                ->url(
                    fn (FormSubmission $record): string => Storage::disk('local')
                        ->temporaryUrl($record->resume_path, now()->addMinutes(15)),
                    shouldOpenInNewTab: true,
                ),
            EditAction::make(),
        ];
    }
}
