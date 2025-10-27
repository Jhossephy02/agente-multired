<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MovimientoController;

/*
|--------------------------------------------------------------------------
| Rutas Web - Cosmiko
|--------------------------------------------------------------------------
|
| Archivo de rutas web limpio y funcional para Laravel 12.
| Agrupa rutas por módulo: autenticación, dashboard, clientes, empleados y movimientos.
|
*/

// =====================================
// 🔐 AUTENTICACIÓN
// =====================================
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// =====================================
// 🧭 DASHBOARDS
Route::middleware(['auth'])->group(function () {
    // Dashboard de administrador
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->name('dashboard.admin'); // <- El middleware 'admin' fue removido temporalmente

    // Dashboard de usuario/empleado
    Route::get('/dashboard/user', [DashboardController::class, 'user'])
        ->name('dashboard.user');
});

// =====================================
// 👥 CLIENTES (CRUD COMPLETO)
// =====================================
Route::middleware(['auth'])->prefix('clientes')->group(function () {
    Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/crear', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/editar/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/{id}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
});

// =====================================
// 👨‍💼 EMPLEADOS (CRUD COMPLETO)
// =====================================
Route::middleware(['auth'])->prefix('empleados')->group(function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');
    Route::get('/crear', [EmpleadoController::class, 'create'])->name('empleados.create');
    Route::post('/', [EmpleadoController::class, 'store'])->name('empleados.store');
    Route::get('/editar/{id}', [EmpleadoController::class, 'edit'])->name('empleados.edit');
    Route::put('/{id}', [EmpleadoController::class, 'update'])->name('empleados.update');
    Route::delete('/{id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
});

// =====================================
// 💰 MOVIMIENTOS
// =====================================
Route::middleware(['auth'])->prefix('movimientos')->group(function () {

    // 🟢 Depósitos
    Route::get('/deposito', [MovimientoController::class, 'deposito'])->name('movimientos.deposito');
    Route::post('/deposito', [MovimientoController::class, 'storeDeposito'])->name('movimientos.deposito.store');

    // 🔴 Retiros
    Route::get('/retiro', [MovimientoController::class, 'retiro'])->name('movimientos.retiro');
    Route::post('/retiro', [MovimientoController::class, 'storeRetiro'])->name('movimientos.retiro.store');

    // 🟡 Trámites
    Route::get('/tramites', [MovimientoController::class, 'tramites'])->name('movimientos.tramites');
    Route::post('/tramites', [MovimientoController::class, 'storeTramites'])->name('movimientos.tramites.store');

    // 🔵 Pago de Servicios
    Route::get('/pago-servicio', [MovimientoController::class, 'pagoServicio'])->name('movimientos.pago_servicio');
    Route::post('/pago-servicio', [MovimientoController::class, 'storePagoServicio'])->name('movimientos.pago_servicio.store');

    // 🗑️ Borrar todo el historial
    Route::delete('/eliminar-todo', [MovimientoController::class, 'deleteAll'])->name('movimientos.deleteAll');
});
