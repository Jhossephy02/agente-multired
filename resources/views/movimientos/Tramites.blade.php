@extends('layouts.app')
@section('title','Trámites')

@section('content')
  <h1>Trámites</h1>
  <form method="POST" action="{{ route('movimientos.tramites.store') }}" class="mt-3">
    @csrf
    <label>Cliente</label>
    <select name="cliente_id">
      @foreach($clientes as $c)
        <option value="{{ $c->id }}">{{ $c->nombre ?? ('Cliente #'.$c->id) }}</option>
      @endforeach
    </select>

    <label class="mt-3">Monto</label>
    <input type="number" step="0.01" name="monto" required />

    <label class="mt-3">Detalle</label>
    <input type="text" name="detalle" />

    <div class="mt-3">
      <button class="btn">Guardar</button>
    </div>
  </form>
@endsection
