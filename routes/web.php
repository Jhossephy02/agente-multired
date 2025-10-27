<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;

// Rutas públicas
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Clientes
    Route::resource('clientes', ClienteController::class);
    Route::delete('/clientes-delete-multiple', [ClienteController::class, 'deleteMultiple'])
        ->name('clientes.deleteMultiple');

    // Transacciones
    Route::resource('transacciones', TransaccionController::class);
});