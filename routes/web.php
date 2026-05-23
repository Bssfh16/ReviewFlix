<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('pages.home');
});

Route::get('/news', [NewsController::class, 'index']);

Route::get('/movies', [MediaController::class, 'movies']);

Route::get('/series', [MediaController::class, 'series']);

Route::get('/faq', [FaqController::class, 'index']);

Route::get('/reviews', [ReviewController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/media/{id}/review', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('review.store');
});

Route::get('/contact', [ContactController::class, 'index']);

Route::post('/contact', [ContactController::class, 'store']);

Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');

Route::post('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
