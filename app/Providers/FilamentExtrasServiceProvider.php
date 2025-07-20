<?php

namespace App\Providers;

use App\Models\Setting;
use App\Helpers\Setting as Help;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Infolists\Components\ActionsDropdown;
use Filament\Navigation\MenuItem;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Cache;
use function setting;

class FilamentExtrasServiceProvider extends ServiceProvider
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
        Filament::serving(function () {
            $open = setting('store_open', true);

            Filament::registerUserMenuItems([
                MenuItem::make()
                    ->label($open ? 'Tutup Toko' : 'Buka Toko')
                    ->icon($open ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color($open ? 'danger' : 'success')
                    ->url('/admin/toggle-store'),   // sekarang aman
            ]);
        });
    }
}
