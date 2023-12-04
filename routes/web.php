<?php

use App\Http\Controllers\InstaBookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [InstaBookController::class, 'index']);

Route::get('/search', [InstaBookController::class, 'search'])->name('rechercher');

Route::resource('instabook', InstaBookController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/instabooks/{instabook}', [InstaBookController::class, 'show'])->name('instabook.show');

Route::middleware('auth')->group(function () {
    Route::post('/instabook/{instabook}/storeRate', [InstaBookController::class, 'storeRate'])->name('instabook.storeRate');
    Route::resource('instabook', InstaBookController::class)->except('show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
