@extends('layouts.app')
@section('title', 'Panel Empleado')
@section('content')

<h1 class="text-2xl font-semibold mb-4">Bienvenido {{ auth()->user()->name }}</h1>

<div class="grid grid-cols-3 gap-4 mb-6">
  <a href="{{ route('movimientos.deposito') }}" class="shadow rounded p-4 button-soft">
    <h2 class="text-lg font-semibold">Depósito</h2>
  </a>
  <a href="{{ route('movimientos.retiro') }}" class="shadow rounded p-4 button-soft">
    <h2 class="text-lg font-semibold">Retiro</h2>
  </a>
  <a href="{{ route('movimientos.pago_servicio') }}" class="shadow rounded p-4 button-soft">
    <h2 class="text-lg font-semibold">Pago Servicio</h2>
  </a>
</div>

<div class="shadow rounded p-4 bg-[var(--bg-alt)]">
  <p class="text-muted mb-2">Saldo Disponible</p>
  <h2 class="text-xl font-bold">S/ {{ number_format($saldo, 2) }}</h2>
</div>

@endsection
