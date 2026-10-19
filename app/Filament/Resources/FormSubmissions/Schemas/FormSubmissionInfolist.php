<?php

namespace App\Filament\Resources\FormSubmissions\Schemas;

use App\Models\FormSubmission;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FormSubmissionInfolist
{
    /**
     * Human-readable labels for keys stored in the submission payload.
     *
     * @var array<string, string>
     */
    private const PAYLOAD_FIELD_LABELS = [
        'message' => 'Message',
        'feedback_type' => 'Feedback type',
        'role' => 'Role of interest',
        'resume_name' => 'Resume filename',
    ];

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Submission')
                    ->schema([
                        TextEntry::make('type')->badge(),
                        TextEntry::make('status')->badge(),
                        TextEntry::make('is_spam')->badge()
                            ->label('Spam')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Yes' : 'No')
                            ->color(fn (bool $state): string => $state ? 'danger' : 'gray'),
                        TextEntry::make('created_at')->label('Submitted')->dateTime(),
                        TextEntry::make('name'),
                        TextEntry::make('email'),
                        TextEntry::make('phone')->placeholder('—'),
                        TextEntry::make('ip')->label('IP')->placeholder('—'),
                        TextEntry::make('resume_path')
                            ->label('Resume')
                            ->formatStateUsing(fn (FormSubmission $record): ?string => $record->resume_path
                                ? ($record->payload['resume_name'] ?? basename($record->resume_path))
                                : null)
                            ->placeholder('—')
                            ->url(fn (FormSubmission $record): ?string => $record->resume_path
                                ? Storage::disk('local')->temporaryUrl($record->resume_path, now()->addMinutes(15))
                                : null)
                            ->openUrlInNewTab()
                            ->icon('heroicon-o-document-arrow-down')
                            ->color('info'),
                    ])
                    ->columns(2),
                Section::make('Details')
                    ->schema([
                        KeyValueEntry::make('payload')
                            ->hiddenLabel()
                            ->keyLabel('Field')
                            ->valueLabel('Answer')
                            ->formatStateUsing(fn (?array $state): array => self::humanisePayload($state ?? [])),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    /**
     * @param  array<string, mixed>  $payload
     * @return array<string, mixed>
     */
    private static function humanisePayload(array $payload): array
    {
        $labelled = [];

        foreach ($payload as $key => $value) {
            $labelled[self::PAYLOAD_FIELD_LABELS[$key] ?? Str::headline((string) $key)] =
                $key === 'feedback_type' && is_string($value) ? Str::headline($value) : $value;
        }

        return $labelled;
    }
}
