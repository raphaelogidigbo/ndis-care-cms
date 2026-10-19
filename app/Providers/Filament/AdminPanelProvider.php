<?php

namespace App\Providers\Filament;

use App\Http\Middleware\NoIndexAdmin;
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Auth\MultiFactor\Email\EmailAuthentication;
use Filament\Auth\Pages\EditProfile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Harbourview Care Services')
            ->brandLogo(asset('images/logo.png'))
            ->brandLogoHeight('2.25rem')
            ->favicon(asset('images/favicon.png'))
            ->font('Inter')
            ->serifFont('Fraunces')
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->darkMode(false)
            ->colors([
                'primary' => Color::hex('#E2725B'),
                'gray' => [
                    50 => '#FAF6F0',
                    100 => '#F0E9DF',
                    200 => '#E5DBCB',
                    300 => '#D4C6AE',
                    400 => '#AB9F85',
                    500 => '#847B64',
                    600 => '#615A49',
                    700 => '#45443A',
                    800 => '#2E3733',
                    900 => '#222D29',
                    950 => '#172420',
                ],
                'info' => Color::hex('#2A5148'),
                'success' => Color::Green,
                'warning' => Color::Amber,
                'danger' => Color::Red,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->multiFactorAuthentication([
                AppAuthentication::make(),
                EmailAuthentication::make(),
            ])
            ->profile(isSimple: false)
            ->passwordReset()
            ->navigationItems([
                NavigationItem::make('My Profile')
                    ->url(fn (): string => EditProfile::getUrl())
                    ->icon(Heroicon::OutlinedUserCircle)
                    ->group('Administration')
                    ->sort(99),
            ])
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                NoIndexAdmin::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
