<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmiko</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white font-sans min-h-screen flex flex-col">

    <!-- Header amarillo -->
    <header class="bg-yellow-400 text-black p-6 flex justify-between items-center shadow-md">
        <h1 class="text-3xl font-bold">Lunox</h1>
        <nav>
    @guest
@else
    <span class="px-4 py-2 text-lg">Hola, {{ auth()->user()->name }}</span>
  <form id="logoutForm" method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Cerrar sesión</button>
</form>
    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Cerrar sesión</button>
</form>

    <a href="{{ route('dashboard') }}">Dashboard</a>
<a href="{{ route('clientes.index') }}">Clientes</a>
<a href="{{ route('empleados.index') }}">Empleados</a>
<a href="{{ route('tramites.index') }}">Trámites</a>

@endguest
</nav>
    </header>

    {{-- Contenido principal --}}
    <main class="flex-grow bg-white p-6">
        @yield('content')
    </main>

    {{-- Footer negro --}}
    <footer class="w-full text-center py-6 bg-black text-gray-400 text-xl">
        © Lunox - Proyecto Demo Laravel
    </footer>

</body>
</html>
