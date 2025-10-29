@extends('layouts.app')
@section('title', 'Trámites')
@section('content')
<h1 class="text-2xl font-semibold mb-4">Registrar Trámite</h1>
<form action="{{ route('movimientos.tramites.store') }}" method="POST" class="grid gap-3 max-w-xl">
  @csrf
  <label>Cliente
    <select name="cliente_id">@foreach($clientes as $c)<option value="{{ $c->id }}">{{ $c->nombre ?? ('Cliente #'.$c->id) }}</option>@endforeach</select>
  </label>
  <label>Monto <input type="number" step="0.01" name="monto" required></label>
  <label>Detalle <input type="text" name="detalle"></label>
  <button class="btn">Guardar</button>
</form>
@endsection
