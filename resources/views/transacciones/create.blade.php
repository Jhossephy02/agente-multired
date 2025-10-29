@extends('layouts.app')
@section('content')
<div class="p-6">
<h1 class="text-2xl font-bold mb-4">Nueva Transacción</h1>
<form method="POST" action="{{ route('transacciones.store') }}">
@csrf
<select name="tipo">
<option value="deposito">Depósito</option>
<option value="retiro">Retiro</option>
<option value="pago_servicio">Pago servicio</option>
</select>
<select name="cliente_id">
@foreach($clientes as $c)
<option value="{{ $c->id }}">{{ $c->nombre }}</option>
@endforeach
</select>
<input type="number" step="0.01" name="monto" placeholder="Monto">
<input type="text" name="cci" placeholder="CCI (opcional)">
<input type="text" name="referencia" placeholder="Referencia (opcional)">
<button class="btn-primary">Guardar</button>
</form>
</div>
@endsection
