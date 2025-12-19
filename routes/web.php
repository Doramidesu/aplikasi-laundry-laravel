<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KasirController;

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [KasirController::class, 'dashboard']);

    // Kasir - Transaksi Baru
    Route::get('/kasir', [KasirController::class, 'index']);
    Route::post('/kasir', [KasirController::class, 'store']);

    Route::get('/kasir/transaksi', [KasirController::class, 'list']);
    Route::post('/kasir/transaksi/{id}/status', [KasirController::class, 'updateStatus']);
    Route::get('/kasir/transaksi/{id}/struk', [KasirController::class, 'struk']);
});


Route::get('/', fn () => redirect('/login'));
