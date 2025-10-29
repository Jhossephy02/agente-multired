@extends('layouts.app')
@section('title', 'Panel Administrativo')
@section('content')

<h1 class="text-2xl font-semibold mb-4">Panel Administrativo</h1>

<div class="grid grid-cols-4 gap-4 mb-6">
  <div class="shadow rounded p-4 bg-[var(--bg-alt)]">
    <p class="text-muted">Saldo total</p>
    <h2 class="text-xl font-bold">S/ {{ number_format($saldo, 2) }}</h2>
  </div>
  <a href="{{ route('movimientos.deposito') }}" class="shadow rounded p-4 button-soft">
    <h2 class="text-lg font-semibold">Realizar Depósito</h2>
  </a>
  <a href="{{ route('movimientos.retiro') }}" class="shadow rounded p-4 button-soft">
    <h2 class="text-lg font-semibold">Registrar Retiro</h2>
  </a>
  <a href="{{ route('movimientos.index') }}" class="shadow rounded p-4 button-soft">
    <h2 class="text-lg font-semibold">Ver Movimientos</h2>
  </a>
</div>

@endsection
