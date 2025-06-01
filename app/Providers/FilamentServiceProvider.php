<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Pages\Dashboard;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        FilamentAsset::register([
            Css::make('custom-filament-styles', __DIR__ . '/../../resources/css/filament.css'),
        ]);

        Panel::configureUsing(function (Panel $panel): void {
            $panel
                ->colors([
                    'primary' => Color::hex('#0D2147'),
                    'gray' => Color::hex('#1A325E'),
                    'danger' => Color::Rose,
                    'info' => Color::Blue,
                    'success' => Color::Emerald,
                    'warning' => Color::Orange,
                ])
                ->font('Inter')
                ->brandName('Jewelry Store Admin')
                ->darkMode(false)
                ->sidebarCollapsibleOnDesktop()
                ->navigationGroups([
                    'Shop',
                    'Content',
                    'Settings'
                ])
                ->viteTheme('resources/css/filament.css');
        });
    }
}
