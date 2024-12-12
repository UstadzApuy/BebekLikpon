<?php

use App\Filament\Resources\PemesananResource;
use App\Filament\Widgets\bahanperlustok;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\MenuController;
use App\Livewire\Pages\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\HomepageController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index'); // Menu list
Route::get('/menu/{menu:slug}', [MenuController::class, 'show'])->name('menu.show'); // Menu details
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
});


Route::get('/login', Login::class)->name('login');
