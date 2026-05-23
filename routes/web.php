<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminUserController;



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





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return;
    })->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminUserController::class, 'index'])->name('dashboard');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}/toggle-admin', [AdminUserController::class, 'toggleAdmin'])->name('users.toggle-admin');

    Route::get('/admin/news', [NewsController::class, 'adminIndex'])->name('news.admin-index');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::patch('/admin/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/admin/media', [MediaController::class, 'adminIndex'])->name('media.admin-index');
    
    Route::get('/admin/faq', [FaqController::class, 'adminIndex'])->name('faq.admin-index');
    
    Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('contacts.admin-index');


});

require __DIR__.'/auth.php';
