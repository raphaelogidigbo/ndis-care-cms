<?php

namespace App\Filament\Resources\Testimonials\Tables;

use App\Enums\TestimonialStatus;
use App\Models\Testimonial;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('author_photo')
                    ->disk('public_images')
                    ->circular()
                    ->label('Photo'),
                TextColumn::make('author_name')->searchable()->sortable(),
                TextColumn::make('status')->badge()->sortable(),
                TextColumn::make('rating')->sortable(),
                IconColumn::make('consent_to_publish')->boolean()->label('Consent'),
                TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')->options(TestimonialStatus::class),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('approve')
                    ->icon('heroicon-o-check')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->visible(fn (Testimonial $record): bool => $record->status === TestimonialStatus::Draft)
                    ->action(fn (Testimonial $record) => $record->update(['status' => TestimonialStatus::Approved])),
                Action::make('publish')
                    ->icon('heroicon-o-globe-alt')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Testimonial $record): bool => $record->status === TestimonialStatus::Approved)
                    ->action(function (Testimonial $record): void {
                        if (! $record->consent_to_publish) {
                            Notification::make()
                                ->danger()
                                ->title('Cannot publish without recorded consent')
                                ->send();

                            return;
                        }

                        $record->update(['status' => TestimonialStatus::Published]);
                    }),
                Action::make('unpublish')
                    ->icon('heroicon-o-eye-slash')
                    ->color('gray')
                    ->requiresConfirmation()
                    ->visible(fn (Testimonial $record): bool => $record->status === TestimonialStatus::Published)
                    ->action(fn (Testimonial $record) => $record->update(['status' => TestimonialStatus::Approved])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
