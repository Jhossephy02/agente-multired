<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        $saldoTotal = (float) DB::table('movimientos')->sum(DB::raw("
            CASE 
                WHEN tipo = 'deposito' THEN monto
                WHEN tipo = 'retiro' THEN -monto
                WHEN tipo = 'pago_servicio' THEN -monto
                WHEN tipo = 'tramite' THEN -monto
            END
        "));

        $depositosHoy = (float) Movimiento::whereDate('created_at', today())
            ->where('tipo','deposito')->sum('monto');

        $retirosHoy = (float) Movimiento::whereDate('created_at', today())
            ->where('tipo','retiro')->sum('monto');

        $totalMovimientos = (int) Movimiento::count();

        $ultimos = Movimiento::with('cliente')->latest()->take(5)->get();

        return view('dashboards.admin', compact('saldoTotal','depositosHoy','retirosHoy','totalMovimientos','ultimos'));
    }

    public function empleado()
    {
        $saldoTotal = (float) DB::table('movimientos')->sum(DB::raw("
            CASE 
                WHEN tipo = 'deposito' THEN monto
                WHEN tipo = 'retiro' THEN -monto
                WHEN tipo = 'pago_servicio' THEN -monto
                WHEN tipo = 'tramite' THEN -monto
            END
        "));

        return view('dashboards.empleado', compact('saldoTotal'));
    }
}
