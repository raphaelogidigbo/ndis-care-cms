<?php

namespace App\Filament\Resources\Referrals;

use App\Enums\UserRole;
use App\Filament\Resources\Referrals\Pages\CreateReferral;
use App\Filament\Resources\Referrals\Pages\EditReferral;
use App\Filament\Resources\Referrals\Pages\ListReferrals;
use App\Filament\Resources\Referrals\Pages\ViewReferral;
use App\Filament\Resources\Referrals\Schemas\ReferralForm;
use App\Filament\Resources\Referrals\Schemas\ReferralInfolist;
use App\Filament\Resources\Referrals\Tables\ReferralsTable;
use App\Models\Referral;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class ReferralResource extends Resource
{
    protected static ?string $model = Referral::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserPlus;

    protected static string|UnitEnum|null $navigationGroup = 'Intake';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ReferralForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ReferralInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReferralsTable::configure($table);
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->role === UserRole::Admin;
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()?->role === UserRole::Admin;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReferrals::route('/'),
            'create' => CreateReferral::route('/create'),
            'view' => ViewReferral::route('/{record}'),
            'edit' => EditReferral::route('/{record}/edit'),
        ];
    }
}
