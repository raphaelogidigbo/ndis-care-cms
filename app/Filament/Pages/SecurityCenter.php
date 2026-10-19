<?php

namespace App\Filament\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Users\UserResource;
use App\Models\ActivityLog;
use App\Models\FormSubmission;
use App\Models\User;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Auth\Pages\EditProfile;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use UnitEnum;

class SecurityCenter extends Page
{
    protected string $view = 'filament.pages.security-center';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldCheck;

    protected static string|UnitEnum|null $navigationGroup = 'Administration';

    protected static ?string $title = 'Security Center';

    protected static ?string $navigationLabel = 'Security';

    public static function canAccess(): bool
    {
        return auth()->user()?->role === UserRole::Admin;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('mfaSetup')
                ->label('Set up MFA')
                ->icon('heroicon-o-shield-check')
                ->color('primary')
                ->url(fn (): string => EditProfile::getUrl()),
            Action::make('manageUsers')
                ->label('Manage users')
                ->icon('heroicon-o-user-group')
                ->color('gray')
                ->url(fn (): string => UserResource::getUrl('index')),
        ];
    }

    /**
     * @return array<string, bool>
     */
    #[Computed]
    public function protectionStatus(): array
    {
        return [
            'turnstile' => filled(config('services.turnstile.secret_key')),
            'honeypot' => (bool) config('honeypot.enabled', true),
            'debug_off' => ! config('app.debug'),
            'https' => str_starts_with(config('app.url'), 'https'),
        ];
    }

    /**
     * @return Collection<int, User>
     */
    #[Computed]
    public function users(): Collection
    {
        return User::query()->orderBy('name')->get();
    }

    /**
     * @return array{spam: int, total: int, today: int}
     */
    #[Computed]
    public function submissionStats(): array
    {
        return [
            'total' => FormSubmission::count(),
            'spam' => FormSubmission::where('is_spam', true)->count(),
            'today' => FormSubmission::whereDate('created_at', today())->count(),
        ];
    }

    /**
     * @return Collection<int, FormSubmission>
     */
    #[Computed]
    public function recentSubmissions(): Collection
    {
        return FormSubmission::query()->latest()->limit(10)->get();
    }

    /**
     * @return Collection<int, ActivityLog>
     */
    #[Computed]
    public function recentActivity(): Collection
    {
        return ActivityLog::query()->with('user')->latest()->limit(15)->get();
    }
}
