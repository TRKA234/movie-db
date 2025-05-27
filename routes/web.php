<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('home');

Route::resource('movies', MovieController::class)->parameters(['movies' => 'movie:slug']);
Route::resource('categories', CategoryController::class);
