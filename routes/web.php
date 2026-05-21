<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::view('/', 'welcome')->name('home');

Route::get('/news', [NewsController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
