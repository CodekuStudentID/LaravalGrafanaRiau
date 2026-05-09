<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets;
use Filament\Navigation\MenuItem;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Support\Facades\FilamentView;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Blade;
use App\Filament\Widgets\UserWelcome;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
       FilamentView::registerRenderHook(
       'panels::head.end',
        fn (): string => Blade::render(
        '<style></style>'
        ),
);
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->colors([
            'primary' => Color::Emerald,
        ])
        // Ganti Logo
        ->brandLogo(asset('img/logo-v1.png'))
        // Atur lebar logo
        ->brandLogoHeight('3rem')
            ->spa()
            ->login()
            ->passwordReset()
            ->navigationItems([
            NavigationItem::make('Lihat Website')
                ->url(url('/'), shouldOpenInNewTab: false) // nilai True : akan Membuka di tab baru
                ->icon('heroicon-o-globe-alt')
                ->group('Eksternal') // Opsional: mengelompokkan menu
                ->sort(100), // Agar muncul di paling bawah
                    ])
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                     \App\Filament\Widgets\VisitorChart::class,
                     \App\Filament\Widgets\HilltopStats::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
