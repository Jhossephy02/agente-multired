<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    public function deleteMultiple(Request $request)
{
    $ids = $request->clientes;
    if ($ids && count($ids) > 0) {
        Cliente::whereIn('id', $ids)->delete();
        return redirect()->route('clientes.index')->with('success', 'Clientes eliminados correctamente.');
    }
    return redirect()->route('clientes.index')->with('success', 'No seleccionaste ningún cliente.');
}

}