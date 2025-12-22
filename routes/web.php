<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::get(
    '/dashboard',
    [ArticleController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');




// Route::get('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])
//     ->name('register');
// Route::post('/register', [App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);

// Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
//     ->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('articles', App\Http\Controllers\ArticleController::class);
});




require __DIR__ . '/auth.php';
