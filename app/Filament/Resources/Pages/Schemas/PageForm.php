<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PageForm
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
                    ->helperText('Flat URL segment, e.g. about-us renders at /about-us'),
                TextInput::make('menu_order')
                    ->numeric()
                    ->minValue(0)
                    ->default(0),
                Toggle::make('is_published')
                    ->default(true),
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
}
