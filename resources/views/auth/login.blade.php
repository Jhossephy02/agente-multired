@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 transform transition-all duration-500 hover:scale-[1.02]">
        
        <!-- Título -->
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">
            Iniciar Sesión
        </h2>

        <!-- Mensaje de error -->
        @if(session('error'))
            <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4 text-center font-medium">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulario de login -->
        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    value="{{ old('email') }}"
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    placeholder="ejemplo@correo.com">
            </div>

            <!-- Contraseña -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    required 
                    class="w-full mt-1 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    placeholder="••••••••">
            </div>

            <!-- Botón ingresar -->
            <button 
                type="submit" 
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-black py-3 rounded-lg font-semibold transition duration-300 shadow-md">
                Ingresar
            </button>
        </form>

        <!-- Enlace al registro -->
    </div>
</div>
@endsection
