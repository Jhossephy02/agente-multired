<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;

class DashboardController extends Controller
{
    public function admin()
    {
        $saldoTotal       = Movimiento::saldoActual();
        $depositosHoy     = Movimiento::delDia()->depositos()->sum('monto');
        $retirosHoy       = Movimiento::delDia()->retiros()->sum('monto');
        $totalMovimientos = Movimiento::count();
        $ultimos          = Movimiento::with('cliente')->latest()->take(5)->get();

        return view('dashboards.admin', compact(
            'saldoTotal','depositosHoy','retirosHoy','totalMovimientos','ultimos'
        ));
    }

    public function empleado()
    {
        $saldoTotal = Movimiento::saldoActual();
        return view('dashboards.empleado', compact('saldoTotal'));
    }
}
