<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function deposito()
    {
        return view('movimientos.deposito');
    }

    public function storeDeposito(Request $request)
    {
        // Aquí podrías guardar en la base de datos
        // Por ahora simulamos un registro exitoso
        return redirect()->back()->with('success', 'Depósito registrado correctamente.');
    }
    public function pagoServicio()
    {
        return view('movimientos.pago_servicio');
    }

    public function storePagoServicio(Request $request)
    {
        // Lógica para guardar el pago en la base de datos si lo deseas
        return redirect()->back()->with('success', 'Pago registrado correctamente.');
    }
    public function retiro()
    {
        return view('movimientos.retiro');
    }

    public function storeRetiro(Request $request)
    {
        // Aquí podrías guardar el retiro en base de datos
        return redirect()->back()->with('success', 'Retiro registrado correctamente.');
    }

    public function tramites()
    {
        return view('movimientos.tramites');
    }

    public function storeTramites(Request $request)
    {
        // Aquí puedes guardar el trámite en BD si lo deseas
        return redirect()->back()->with('success', 'Trámite registrado correctamente.');
    }

}
