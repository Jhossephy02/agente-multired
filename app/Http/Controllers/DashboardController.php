<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MovimientoController;

class DashboardController extends Controller
{
    public function admin()
    {
        $saldo = MovimientoController::obtenerSaldoActual();
        return view('dashboards.admin', compact('saldo'));
    }

    public function empleado()
    {
        $saldo = MovimientoController::obtenerSaldoActual();
        return view('dashboards.empleado', compact('saldo'));
    }
}
