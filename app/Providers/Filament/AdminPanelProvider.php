<?php

namespace App\Providers\Filament;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
use Filament\Facades\Filament;
use Spatie\Permission\Middleware\PermissionMiddleware;
use App\Filament\Pages\Dashboard;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
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
            ->login(Pages\Auth\Login::class)
            ->viteTheme('resources/css/app.css')
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('18rem')
            //->profile(isSimple: false)
            //->homeUrl(fn () => route('filament.admin.pages.custom-dashboard')) // your custom one
            ->colors([
                'primary' => Color::Green,
                 //[
                   // '50'  => '#1A4314',  // Light UI elements
                   // '100' => '#1A4314',   // Hover states
                   // '200' => '#1A4314',
                  //  '300' => '#1A4314',
                  //  '400' => '#1A4314',
                 //  '500' => '#1A4314',   // Base color (buttons, links)
                  //  '600' => '#1A4314',   // Active states
                 //   '700' => '#1A4314',
                //    '800' => '#1A4314',
                //    '900' => '#1A4314',   // Dark elements
                //    '950' => '#1A4314',
                //],
            ])
            ->font('Poppins')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                //Pages\Dashboard::class,
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
                DispatchServingFilamentEvent::class
            ])

            ->resources([
                \App\Filament\Resources\UserResource::class,
                // Only register some pages based on permission

            ])

            /*->pages([
                //Dashboard::class,
                //\App\Filament\Pages\SystemSettings::class => fn () => auth()->user()?->can('manage system settings'),
            ])*/

            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
