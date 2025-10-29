<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MovimientoController;

/*
|--------------------------------------------------------------------------
| RUTAS DE AUTENTICACIÓN
|--------------------------------------------------------------------------
*/

// Login (GET) - Mostrar formulario
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Login (POST) - Validar usuario
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (SOLO SI ESTÁ LOGEADO)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /*
    |----------------------------------------------------------------------
    | DASHBOARDS
    |----------------------------------------------------------------------
    */
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])
        ->name('dashboard.admin')
        ->middleware('role:admin'); // solo admin

    Route::get('/dashboard/user', [DashboardController::class, 'user'])
        ->name('dashboard.user')
        ->middleware('role:user'); // solo empleados


    /*
    |----------------------------------------------------------------------
    | CLIENTES (CRUD)
    |----------------------------------------------------------------------
    */
    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClienteController::class, 'index'])->name('clientes.index');
        Route::get('/crear', [ClienteController::class, 'create'])->name('clientes.create');
        Route::post('/', [ClienteController::class, 'store'])->name('clientes.store');
        Route::get('/editar/{cliente}', [ClienteController::class, 'edit'])->name('clientes.edit');
        Route::put('/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
        Route::delete('/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    });


    /*
    |----------------------------------------------------------------------
    | EMPLEADOS (CRUD) — SOLO ADMIN
    |----------------------------------------------------------------------
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
    |----------------------------------------------------------------------
    | MOVIMIENTOS (Depósitos, Retiros, Trámites, Pagos)
    |----------------------------------------------------------------------
    */
    Route::prefix('movimientos')->group(function () {

        // Depósitos
        Route::get('/deposito', [MovimientoController::class, 'deposito'])->name('movimientos.deposito');
        Route::post('/deposito', [MovimientoController::class, 'storeDeposito'])->name('movimientos.deposito.store');

        // Retiros
        Route::get('/retiro', [MovimientoController::class, 'retiro'])->name('movimientos.retiro');
        Route::post('/retiro', [MovimientoController::class, 'storeRetiro'])->name('movimientos.retiro.store');

        // Pago servicios
        Route::get('/pago-servicio', [MovimientoController::class, 'pagoServicio'])->name('movimientos.pago_servicio');
        Route::post('/pago-servicio', [MovimientoController::class, 'storePagoServicio'])->name('movimientos.pago_servicio.store');

        // Trámites
        Route::get('/tramites', [MovimientoController::class, 'tramites'])->name('movimientos.tramites');
        Route::post('/tramites', [MovimientoController::class, 'storeTramites'])->name('movimientos.tramites.store');

        // Historial / Estados
        Route::get('/historial', [MovimientoController::class, 'historial'])->name('movimientos.historial');
        Route::put('/estado/{id}', [MovimientoController::class, 'cambiarEstado'])->name('movimientos.estado');

    });
});
