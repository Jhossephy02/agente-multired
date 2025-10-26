@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 relative">

    {{-- Botón para agregar cliente --}}
    <a href="{{ route('cliente.create') }}" 
       class="fixed bottom-6 right-6 bg-blue-600 text-white px-6 py-3 rounded-full shadow-lg 
              hover:bg-blue-700 transform hover:scale-105 transition duration-200">
       ➕ Agregar Cliente
    </a>

    <h1 class="text-2xl font-bold mb-4">Lista de Clientes</h1>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario para eliminación múltiple --}}
    <form action="{{ route('clientes.delete') }}" method="POST" id="multiDeleteForm">
        @csrf
        @method('DELETE')

        <div class="mb-3">
            <button type="submit" 
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transform hover:scale-105 transition duration-200"
                onclick="return confirm('¿Seguro que deseas eliminar los clientes seleccionados?')">
                🗑️ Eliminar seleccionados
            </button>
        </div>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">
                        <input type="checkbox" id="selectAll">
                    </th>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($clientes as $cliente)
                    <tr class="hover:bg-gray-50 transition duration-200 ease-in-out hover:scale-[1.01]">
                        <td class="border px-4 py-2 text-center">
                            <input type="checkbox" name="clientes[]" value="{{ $cliente->id }}">
                        </td>
                        <td class="border px-4 py-2">{{ $cliente->id }}</td>
                        <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                        <td class="border px-4 py-2">{{ $cliente->email }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('clientes.edit', $cliente) }}" 
                               class="text-blue-500 hover:underline">✏️ Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-4">No hay clientes registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </form>
</div>

{{-- Script para seleccionar todos los checkboxes --}}
<script>
    document.getElementById('selectAll').addEventListener('click', function(event) {
        let checkboxes = document.querySelectorAll('input[name="clientes[]"]');
        checkboxes.forEach(cb => cb.checked = event.target.checked);
    });
</script>
@endsection
