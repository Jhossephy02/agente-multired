<?php

namespace App\Http\Controllers;

use App\Models\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    /**
     * Muestra la lista de trámites.
     */
    public function index()
    {
        $tramites = Tramite::all();
        return view('tramites.index', compact('tramites'));
    }

    /**
     * Muestra el formulario para crear un nuevo trámite.
     */
    public function create()
    {
        return view('tramites.create');
    }

    /**
     * Guarda un nuevo trámite en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string|max:50',
        ]);

        Tramite::create($request->all());

        return redirect()->route('tramites.index')->with('success', 'Trámite registrado correctamente.');
    }

    /**
     * Muestra un trámite específico.
     */
    public function show(Tramite $tramite)
    {
        return view('tramites.show', compact('tramite'));
    }

    /**
     * Muestra el formulario para editar un trámite.
     */
    public function edit(Tramite $tramite)
    {
        return view('tramites.edit', compact('tramite'));
    }

    /**
     * Actualiza un trámite en la base de datos.
     */
    public function update(Request $request, Tramite $tramite)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string|max:50',
        ]);

        $tramite->update($request->all());

        return redirect()->route('tramites.index')->with('success', 'Trámite actualizado correctamente.');
    }

    /**
     * Elimina un trámite.
     */
    public function destroy(Tramite $tramite)
    {
        $tramite->delete();
        return redirect()->route('tramites.index')->with('success', 'Trámite eliminado correctamente.');
    }
}
