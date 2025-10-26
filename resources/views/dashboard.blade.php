@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Bienvenido, {{ Auth::user()->name }}</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        {{-- Botón Clientes --}}
        <a href="{{ route('clientes.index') }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold p-6 rounded-lg shadow-lg text-center 
                  transition transform hover:scale-105"
           aria-label="Gestionar Clientes">
           <div class="text-3xl mb-2">👥</div>
           Gestionar Clientes
        </a>

        {{-- Botón Empleados --}}
        <a href="{{ route('empleados.index') }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold p-6 rounded-lg shadow-lg text-center 
                  transition transform hover:scale-105"
           aria-label="Gestionar Empleados">
           <div class="text-3xl mb-2">🧑‍💼</div>
           Gestionar Empleados
        </a>

        {{-- Botón Depósitos --}}
        <a href="{{ route('deposito') }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold p-6 rounded-lg shadow-lg text-center 
                  transition transform hover:scale-105"
           aria-label="Realizar Depósito">
           <div class="text-3xl mb-2">💰</div>
           Realizar Depósito
        </a>

        {{-- Botón Retiros --}}
        <a href="{{ route('retiro') }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold p-6 rounded-lg shadow-lg text-center 
                  transition transform hover:scale-105"
           aria-label="Realizar Retiro">
           <div class="text-3xl mb-2">💸</div>
           Realizar Retiro
        </a>

    </div>
</div>
@endsection
