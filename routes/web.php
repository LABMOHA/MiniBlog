<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [])->name('show.login');
Route::get('/register', [])->name('show.register');

Route::get('/', [ArticleController::class, 'index']);
Route::resource('articles', App\Http\Controllers\ArticleController::class);
