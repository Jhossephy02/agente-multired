@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Trámites</h1>

    <a href="{{ route('tramites.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg">+ Nuevo Trámite</a>

    <table class="w-full mt-6 border">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">ID</th>
                <th class="p-2">Nombre</th>
                <th class="p-2">Cliente</th>
                <th class="p-2">Empleado</th>
                <th class="p-2">Estado</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tramites as $tramite)
            <tr class="border-t">
                <td class="p-2">{{ $tramite->id }}</td>
                <td class="p-2">{{ $tramite->nombre }}</td>
                <td class="p-2">{{ $tramite->cliente->nombre ?? 'Sin cliente' }}</td>
                <td class="p-2">{{ $tramite->empleado->nombre ?? 'Sin asignar' }}</td>
                <td class="p-2">{{ ucfirst($tramite->estado) }}</td>
                <td class="p-2">
                    <a href="{{ route('tramites.edit', $tramite) }}" class="text-blue-600">Editar</a>
                    <form action="{{ route('tramites.destroy', $tramite) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
