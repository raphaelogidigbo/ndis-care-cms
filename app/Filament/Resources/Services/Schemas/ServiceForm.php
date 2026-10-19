<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, ?string $state, string $operation): void {
                        if ($operation === 'create') {
                            $set('slug', Str::slug($state ?? ''));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->rule('regex:/^[a-z0-9\-]+$/')
                    ->helperText('Flat URL segment, e.g. household-tasks-support renders at /household-tasks-support'),
                TextInput::make('sort_order')
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
                Toggle::make('is_published')
                    ->default(true),
                Select::make('card_image')
                    ->label('Card image')
                    ->options(self::imageOptions())
                    ->searchable()
                    ->helperText('Image shown on the homepage and /services grid.'),
                TextInput::make('icon')->maxLength(255),
                Textarea::make('excerpt')->rows(3)->columnSpanFull(),
                Textarea::make('content_html')
                    ->required()
                    ->rows(20)
                    ->columnSpanFull()
                    ->extraInputAttributes(['class' => 'font-mono text-xs']),
                Section::make('SEO')
                    ->collapsed()
                    ->schema([
                        TextInput::make('meta_title')->maxLength(255),
                        Textarea::make('meta_description')->rows(3)->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }

    /**
     * @return array<string, string>
     */
    private static function imageOptions(): array
    {
        return collect(File::files(public_path('images')))
            ->mapWithKeys(fn ($file) => [$file->getFilename() => $file->getFilename()])
            ->sort()
            ->all();
    }
}
