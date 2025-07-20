<?php

namespace App\Http\Middleware;

use App\Helpers\Setting;
use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;
use function setting;
class CheckStatusToko
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $helper = new Setting();
        // Cek status toko dari database
        /* 1️⃣  skip admin panel so admins can always log in */

        $panelPath = trim(config('filament.path', 'admin'), '/');   // default: 'admin'
        if (
            $request->is($panelPath)            ||   // /admin
            $request->is($panelPath.'/*')       ||   // /admin/*
            $request->routeIs('filament.*')     ||   // route-name bawaan Filament
            $request->is('livewire/*')              // AJAX Livewire panel
        ) {
            return $next($request);
        }

        /* 2️⃣  if flag == 0 show the "closed" page */
        if (setting('store_open', '1') != '1') {
            return response()->view('store.closed', [], 503);
        }

        /* otherwise continue normally */
        return $next($request);
    }
}
