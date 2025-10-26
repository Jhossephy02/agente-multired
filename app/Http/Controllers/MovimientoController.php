<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function retiro() {
        return view('movimientos.retiro');
    }

    public function deposito() {
        return view('movimientos.deposito');
    }

    public function pagoServicio() {
        return view('movimientos.pago-servicio');
    }
}
