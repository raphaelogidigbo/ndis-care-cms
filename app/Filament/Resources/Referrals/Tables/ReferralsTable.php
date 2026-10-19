<?php

namespace App\Filament\Resources\Referrals\Tables;

use App\Enums\ReferralStatus;
use App\Models\Referral;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ReferralsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label('Name')
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(['last_name']),
                TextColumn::make('status')->badge()->sortable(),
                TextColumn::make('phone')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('ndis_number')->label('NDIS #')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->label('Submitted')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')->options(ReferralStatus::class),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('markContacted')
                    ->label('Mark Contacted')
                    ->icon('heroicon-o-phone')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->visible(fn (Referral $record): bool => $record->status === ReferralStatus::New)
                    ->action(fn (Referral $record) => $record->update(['status' => ReferralStatus::Contacted])),
                Action::make('markOnboarded')
                    ->label('Mark Onboarded')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Referral $record): bool => $record->status === ReferralStatus::Contacted)
                    ->action(fn (Referral $record) => $record->update(['status' => ReferralStatus::Onboarded])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
