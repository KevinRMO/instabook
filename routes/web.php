<?php

use App\Http\Controllers\InstaBookController;
use App\Http\Controllers\ProfileController;
use App\Models\InstaBook;
use Illuminate\Support\Facades\Route;

Route::get('/', [InstaBookController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::resource('instabook', InstaBookController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
