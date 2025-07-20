<?php

use App\Http\Controllers\OrderController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
RateLimiter::for('orders', fn ($request) => Limit::perMinute(10));

Route::get('/', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])
    ->name('orders.store')
    ->middleware(['throttle:orders']);
Route::get('/orders/{order}/success', [OrderController::class, 'pending'])->name('orders.success');

// routes/web.php  (di dalam grup 'web')
Route::get('/admin/toggle-store', function () {
    $open = setting('store_open', true);

    \App\Models\Setting::updateOrCreate(
        ['key' => 'store_open'],
        ['value' => ! $open],
    );

    \Illuminate\Support\Facades\Cache::forget('setting.store_open');

    \Filament\Notifications\Notification::make()
        ->title('Status toko: ' . (! $open ? 'BUKA' : 'TUTUP'))
        ->success()
        ->send();

    return redirect()->back();
})->name('/admin/toggle-store')   //  ←   **penting!**
  ->middleware(['auth']);       // pastikan hanya admin yang boleh
