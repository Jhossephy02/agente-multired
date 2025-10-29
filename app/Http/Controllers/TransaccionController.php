<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaccionController extends Controller
{
    public function index(){
        $transacciones = Transaccion::with('cliente','user')->latest()->paginate(10);
        return view('transacciones.index', compact('transacciones'));
    }

    public function create(){
        $clientes = Cliente::all();
        return view('transacciones.create', compact('clientes'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'tipo' => 'required',
            'cliente_id' => 'required',
            'monto' => 'required|numeric',
            'cci' => 'nullable',
            'referencia' => 'nullable'
        ]);

        $data['user_id'] = Auth::id();
        $data['estado'] = 'proceso';

        Transaccion::create($data);
        return redirect()->route('transacciones.index')->with('success','Transacción registrada');
    }

    public function edit(Transaccion $transaccion){
        $clientes = Cliente::all();
        return view('transacciones.edit', compact('transaccion','clientes'));
    }

    public function update(Request $request, Transaccion $transaccion){
        $data = $request->validate([
            'estado' => 'required',
        ]);
        $transaccion->update($data);
        return redirect()->route('transacciones.index')->with('success','Estado actualizado');
    }

    public function destroy(Transaccion $transaccion){
        $transaccion->delete();
        return back()->with('success','Transacción eliminada');
    }
}
