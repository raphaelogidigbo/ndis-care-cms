<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\FormSubmissions\FormSubmissionResource;
use App\Models\FormSubmission;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestSubmissions extends TableWidget
{
    protected static ?string $heading = 'Latest form submissions';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => FormSubmission::query()->latest()->limit(8))
            ->columns([
                TextColumn::make('type')->badge(),
                TextColumn::make('status')->badge(),
                TextColumn::make('name'),
                TextColumn::make('email'),
                IconColumn::make('is_spam')->boolean()->label('Spam'),
                TextColumn::make('created_at')->label('Submitted')->since(),
            ])
            ->paginated(false)
            ->recordActions([
                ViewAction::make()->url(fn (FormSubmission $record): string => FormSubmissionResource::getUrl('view', ['record' => $record])),
            ]);
    }
}
