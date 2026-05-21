<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\FaqController;

Route::view('/', 'welcome')->name('home');

Route::get('/news', [NewsController::class, 'index']);

Route::get('/movies', [MediaController::class, 'movies']);

Route::get('/series', [MediaController::class, 'series']);

Route::get('/faq', [FaqController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
