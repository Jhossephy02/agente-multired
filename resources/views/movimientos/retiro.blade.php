@extends('layouts.app')
@section('title', 'Registro de Retiro')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Registrar Retiro</h1>
<div class="mb-2 text-muted">Saldo disponible: <strong>S/ {{ number_format($saldo, 2) }}</strong></div>
@if(session('error')) <div class="mb-2 chip denied">{{ session('error') }}</div> @endif
<form action="{{ route('movimientos.retiro.store') }}" method="POST" class="grid gap-3 max-w-xl">
  @csrf
  <label>Cliente
    <select name="cliente_id">@foreach($clientes as $c)<option value="{{ $c->id }}">{{ $c->nombre ?? ('Cliente #'.$c->id) }}</option>@endforeach</select>
  </label>
  <label>Monto <input type="number" step="0.01" name="monto" required></label>
  <label>CCI <input type="text" name="cci"></label>
  <label>DNI <input type="text" name="dni"></label>
  <label>Teléfono <input type="text" name="telefono"></label>
  <label>Correo <input type="email" name="correo"></label>
  <button class="btn">Guardar</button>
</form>
@endsection
