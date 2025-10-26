@extends('layouts.app')

@section('content')
<div class="bg-yellow-400 text-white text-center py-10">
    <h1 class="text-3xl font-bold">¡Aceptamos diferentes medios de pago!</h1>
    <input type="text" placeholder="Buscar trámite o entidad" class="mt-4 p-2 rounded text-black">
</div>

<div class="container mx-auto py-10">
    <h2 class="text-xl font-semibold mb-4">¿Tienes prisa? ¡Lo sabemos!</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <a href="{{ route('retiro') }}" class="bg-gray-100 p-4 rounded-lg text-center shadow hover:bg-gray-200">
    <img src="" class="mx-auto mb-2"/>
    <p>Retiro</p>
</a>

<a href="{{ route('deposito') }}" class="bg-gray-100 p-4 rounded-lg text-center shadow hover:bg-gray-200">
    <img src="https://img.icons8.com/ios-filled/50/000000/id-verified.png" class="mx-auto mb-2"/>
    <p>Depósito</p>
</a>

<a href="{{ route('pago-servicio') }}" class="bg-gray-100 p-4 rounded-lg text-center shadow hover:bg-gray-200">
    <img src="https://img.icons8.com/ios-filled/50/000000/services.png" class="mx-auto mb-2"/>
    <p>Pago de Servicio</p>
</a>

        <!-- Puedes duplicar más ítems de ejemplo -->
    </div>
</div>

<div class="text-center py-10 bg-gray-50">
    <h2 class="text-xl font-semibold mb-4">¡Conoce cómo realizar tus trámites!</h2>
    <img src="https://www.pagalo.pe/assets/img/banner.png" alt="Demo banner" class="mx-auto">
</div>

<div class="text-center py-10">
    <h2 class="text-xl font-semibold">¡Rápido y fácil de usar!</h2>
    <div class="flex justify-center gap-6 mt-4">
        <img src="{{ asset('images/logo_14083016.png') }}" alt="Logo" width="40" height="40"/>
        <img src="{{ asset('images/1490135018-mastercard_82253.png') }}" alt="Mastercard" width="40" height="40"/>
        <img src="{{ asset('images/yape-app-seeklogo.png') }}" alt="Yape" width="40" height="40"/>
    </div>
</div>
@endsection

