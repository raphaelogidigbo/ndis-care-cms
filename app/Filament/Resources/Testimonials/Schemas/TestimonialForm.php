<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use App\Enums\TestimonialStatus;
use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('author_name')->required()->maxLength(255),
                TextInput::make('author_role')->maxLength(255),
                FileUpload::make('author_photo')
                    ->label('Author photo')
                    ->disk('public_images')
                    ->image()
                    ->avatar()
                    ->maxSize(2048)
                    ->helperText('Optional photo shown as a circular avatar on the homepage. JPG/PNG, max 2MB.'),
                Select::make('rating')
                    ->options([1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'])
                    ->nullable(),
                Select::make('status')
                    ->options(TestimonialStatus::class)
                    ->default(TestimonialStatus::Draft)
                    ->required()
                    ->live()
                    ->disableOptionWhen(
                        fn (string $value, Get $get): bool => $value === TestimonialStatus::Published->value
                            && ! $get('consent_to_publish'),
                    )
                    ->rules([
                        fn (Get $get): Closure => function (string $attribute, mixed $value, Closure $fail) use ($get): void {
                            if ($value === TestimonialStatus::Published->value && ! $get('consent_to_publish')) {
                                $fail('Publishing requires recorded consent.');
                            }
                        },
                    ])
                    ->helperText('Publishing requires recorded consent — the Published option unlocks once consent is ticked.'),
                Toggle::make('consent_to_publish')->default(false)->live(),
                Textarea::make('content')->required()->rows(5)->columnSpanFull(),
            ]);
    }
}
