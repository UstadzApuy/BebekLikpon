<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\HomepageController::class,'index']);
Route::get('/services', [\App\Http\Controllers\Frontend\ServiceController::class,'index']);
Route::get('/menu', [\App\Http\Controllers\Frontend\MenuController::class,'index']);
Route::get('/menu/{slug}', [\App\Http\Controllers\Frontend\MenuController::class,'show'])->name('menu.show');
Route::get('/contact', [\App\Http\Controllers\Frontend\ContactController::class,'index']);