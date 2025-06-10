<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Middleware\RoleAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'index'])->name('home');

// Route khusus untuk form edit movie: /movies/{movie}/edit
Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])
    ->middleware('auth', RoleAdmin::class)
    ->name('movies.edit');

// Route khusus untuk detail movie: /movies/{id}/{slug}
Route::get('movies/{id}/{slug}', [MovieController::class, 'show'])->name('movies.show');

// Route resource index untuk publik
Route::resource('movies', MovieController::class)->only(['index']);

// Group route yang butuh login
Route::middleware('auth')->group(function () {
    Route::resource('movies', MovieController::class)->except(['index', 'show', 'edit']);
    // Tambahkan juga route lain yang ingin diamankan
});

Route::resource('categories', CategoryController::class);

Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
