<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TramiteController;

Route::get('/', function () {
    return redirect()->route('login');

    
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('clientes', ClienteController::class);
    Route::resource('empleados', EmpleadoController::class);
    Route::resource('tramites', TramiteController::class);
});
/*
|--------------------------------------------------------------------------
| Rutas Web
|--------------------------------------------------------------------------
| Aquí se registran las rutas web de tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider.
*/

// 🟣 Página inicial (Login)
Route::get('/', [AuthController::class, 'showLogin'])->name('login');

// 🟢 Procesar inicio de sesión
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// 🔒 Rutas protegidas (solo usuarios autenticados)
Route::middleware('auth')->group(function () {

    // 📊 Dashboard principal
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 👥 CRUD de clientes
    Route::resource('clientes', ClienteController::class);

    // 👷‍♂️ CRUD de empleados
    Route::resource('empleados', EmpleadoController::class);

    // 📁 CRUD de trámites
    Route::resource('tramites', TramiteController::class);

    // 🗑️ Eliminación múltiple de clientes
    Route::delete('/clientes/delete-multiple', [ClienteController::class, 'deleteMultiple'])
        ->name('clientes.deleteMultiple');

    // 🚪 Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

}); 
