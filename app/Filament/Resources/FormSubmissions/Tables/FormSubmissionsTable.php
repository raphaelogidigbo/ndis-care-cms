<?php

namespace App\Filament\Resources\FormSubmissions\Tables;

use App\Enums\FormSubmissionStatus;
use App\Enums\FormSubmissionType;
use App\Models\FormSubmission;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class FormSubmissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')->badge()->sortable(),
                TextColumn::make('status')->badge()->sortable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                IconColumn::make('is_spam')->boolean()->label('Spam'),
                IconColumn::make('resume_path')
                    ->label('Resume')
                    ->boolean()
                    ->getStateUsing(fn (FormSubmission $record): bool => filled($record->resume_path)),
                TextColumn::make('created_at')->label('Submitted')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('type')->options(FormSubmissionType::class),
                SelectFilter::make('status')->options(FormSubmissionStatus::class),
                TernaryFilter::make('is_spam')->label('Spam'),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('downloadResume')
                    ->label('Resume')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->visible(fn (FormSubmission $record): bool => filled($record->resume_path))
                    ->action(fn (FormSubmission $record) => Storage::disk('local')->download($record->resume_path)),
                Action::make('markRead')
                    ->label('Mark Read')
                    ->icon('heroicon-o-envelope-open')
                    ->visible(fn (FormSubmission $record): bool => $record->status === FormSubmissionStatus::New)
                    ->action(fn (FormSubmission $record) => $record->update(['status' => FormSubmissionStatus::Read])),
                Action::make('markSpam')
                    ->label('Mark Spam')
                    ->icon('heroicon-o-exclamation-triangle')
                    ->color('danger')
                    ->visible(fn (FormSubmission $record): bool => ! $record->is_spam)
                    ->action(fn (FormSubmission $record) => $record->update(['is_spam' => true])),
                Action::make('archive')
                    ->icon(Heroicon::OutlinedArchiveBox)
                    ->color('gray')
                    ->visible(fn (FormSubmission $record): bool => $record->status !== FormSubmissionStatus::Archived)
                    ->action(fn (FormSubmission $record) => $record->update(['status' => FormSubmissionStatus::Archived])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
