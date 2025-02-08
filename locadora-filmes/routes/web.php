<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// routes/web.php
Route::redirect('/', '/login');

// Autenticação
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});

// Usuário autenticado
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/home', [RentalController::class, 'index'])->name('home');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
    Route::put('/rentals/{rental}', [RentalController::class, 'update'])->name('rentals.return');
});

// Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // CRUD Filmes
    Route::resource('movies', MovieController::class);
});

require __DIR__.'/auth.php';
