<?php
// routes/_part1_shell_routes.php (copiar dentro de routes/web.php)

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureRole;

// Tema (oscuro/claro)
Route::post('/toggle-theme', function () {
    $current = session('theme', 'dark');
    session(['theme' => $current === 'dark' ? 'light' : 'dark']);
    return back();
})->name('theme.toggle')->middleware('auth');

// Dashboards
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/admin', [\App\Http\Controllers\DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::get('/dashboard/user', [\App\Http\Controllers\DashboardController::class, 'user'])->name('dashboard.user');
});

// Proteger rutas del admin con middleware EnsureRole:admin (agregar al Kernel)
Route::middleware(['auth', EnsureRole::class.':admin'])->group(function () {
    Route::get('/clientes', [\App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/empleados', [\App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleados.index');
});
