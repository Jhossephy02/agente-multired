@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <!-- Saludo -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800">💼 Panel de Empleado</h1>
        <p class="text-gray-600 mt-2">Bienvenido, {{ $user->name }}</p>
    </div>

    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        
        <!-- Total Clientes -->
        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80">Total Clientes</p>
                    <h3 class="text-3xl font-bold mt-1">{{ $stats['total_clientes'] }}</h3>
                </div>
                <div class="text-5xl opacity-50">👥</div>
            </div>
        </div>

    </div>

    <!-- Accesos rápidos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Ver Clientes -->
        <a href="{{ route('clientes.index') }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold p-8 rounded-xl shadow-lg text-center transition transform hover:scale-105">
           <div class="text-5xl mb-3">👥</div>
           <p class="text-lg">Ver Clientes</p>
        </a>

        <!-- Depósitos -->
        <a href="{{ route('movimientos.deposito') }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold p-8 rounded-xl shadow-lg text-center transition transform hover:scale-105">
           <div class="text-5xl mb-3">💰</div>
           <p class="text-lg">Depósitos</p>
        </a>

        <!-- Retiros -->
        <a href="{{ route('movimientos.retiro') }}" 
           class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold p-8 rounded-xl shadow-lg text-center transition transform hover:scale-105">
           <div class="text-5xl mb-3">💸</div>
           <p class="text-lg">Retiros</p>
        </a>

    </div>

</div>
@endsection