<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MovimientoController;

/*
|--------------------------------------------------------------------------
| AUTENTICACIÓN
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARDS (AUTOMÁTICO POR ROL)
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->middleware('role:admin')
        ->name('dashboard.admin');

    Route::get('/dashboard/empleado', [DashboardController::class, 'empleado'])
        ->middleware('role:empleado')
        ->name('dashboard.empleado');

    /*
    |--------------------------------------------------------------------------
    | CLIENTES (SOLO ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::prefix('clientes')->middleware('role:admin')->group(function () {
        Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
        Route::get('/crear', [ClienteController::class, 'create'])->name('clientes.create');
        Route::post('/', [ClienteController::class, 'store'])->name('clientes.store');
        Route::get('/editar/{cliente}', [ClienteController::class, 'edit'])->name('clientes.edit');
        Route::put('/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
        Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | EMPLEADOS (SOLO ADMIN)
    |--------------------------------------------------------------------------
    */
    Route::prefix('empleados')->middleware('role:admin')->group(function () {
        Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');
        Route::get('/crear', [EmpleadoController::class, 'create'])->name('empleados.create');
        Route::post('/', [EmpleadoController::class, 'store'])->name('empleados.store');
        Route::get('/editar/{empleado}', [EmpleadoController::class, 'edit'])->name('empleados.edit');
        Route::put('/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
        Route::delete('/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | MOVIMIENTOS (ADMIN + EMPLEADO)
    |--------------------------------------------------------------------------
    */
    Route::prefix('movimientos')->group(function () {

        Route::get('/', [MovimientoController::class, 'index'])->name('movimientos.index');

        // DEPÓSITO
        Route::get('/deposito', [MovimientoController::class, 'createDeposito'])->name('movimientos.deposito');
        Route::post('/deposito', [MovimientoController::class, 'storeDeposito'])->name('movimientos.deposito.store');

        // RETIRO
        Route::get('/retiro', [MovimientoController::class, 'createRetiro'])->name('movimientos.retiro');
        Route::post('/retiro', [MovimientoController::class, 'storeRetiro'])->name('movimientos.retiro.store');

        // PAGO DE SERVICIO
        Route::get('/pago-servicio', [MovimientoController::class, 'pagoServicio'])->name('movimientos.pago_servicio');
        Route::post('/pago-servicio', [MovimientoController::class, 'storePagoServicio'])->name('movimientos.pago_servicio.store');

        // TRÁMITES
        Route::get('/tramites', [MovimientoController::class, 'tramites'])->name('movimientos.tramites');
        Route::post('/tramites', [MovimientoController::class, 'storeTramites'])->name('movimientos.tramites.store');

        // APROBAR / RECHAZAR
        Route::patch('/{movimiento}/estado', [MovimientoController::class, 'updateEstado'])->name('movimientos.estado');
    });
});
