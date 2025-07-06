<?php

use App\Http\Controllers\OrderController;
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

Route::get('/', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders',[OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}/success', [OrderController::class, 'pending'])->name('orders.success');