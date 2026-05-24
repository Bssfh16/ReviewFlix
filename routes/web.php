<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminUserController;

use App\Models\MediaItem;
use App\Models\Review;
use App\Models\NewsItem;



Route::get('/', function () {
    return view('pages.home');
});

Route::get('/', function () {
    $latestMovies = MediaItem::where('type', 'Movie')->latest()->take(5)->get();
    $latestSeries = MediaItem::where('type', 'Serie')->latest()->take(5)->get();
    $latestNews = NewsItem::latest()->take(5)->get();
    $latestReviews = Review::with('user', 'mediaItem')->latest()->take(5)->get();
        return view('pages.home', compact('latestMovies', 'latestSeries', 'latestReviews', 'latestNews'));
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
    Route::get('/admin/media/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('/admin/media', [MediaController::class, 'store'])->name('media.store');
    Route::get('/admin/media/{id}/edit', [MediaController::class, 'edit'])->name('media.edit');
    Route::patch('/admin/media/{id}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/admin/media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

    Route::get('/admin/faq', [FaqController::class, 'adminIndex'])->name('faq.admin-index');
    Route::get('/admin/faq/category/create', [FaqController::class, 'createCategory'])->name('faq.category-create');
    Route::post('/admin/faq/category', [FaqController::class, 'storeCategory'])->name('faq.category-store');
    Route::delete('/admin/faq/category/{id}', [FaqController::class, 'destroyCategory'])->name('faq.category-destroy');
    Route::get('/admin/faq/item/create', [FaqController::class, 'createItem'])->name('faq.item-create');
    Route::post('/admin/faq/item', [FaqController::class, 'storeItem'])->name('faq.item-store');
    Route::get('/admin/faq/item/{id}/edit', [FaqController::class, 'editItem'])->name('faq.item-edit');
    Route::patch('/admin/faq/item/{id}', [FaqController::class, 'updateItem'])->name('faq.item-update');
    Route::delete('/admin/faq/item/{id}', [FaqController::class, 'destroyItem'])->name('faq.item-destroy');
    
    Route::get('/admin/contacts', [ContactController::class, 'adminIndex'])->name('contacts.admin-index');
    Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

});

require __DIR__.'/auth.php';
