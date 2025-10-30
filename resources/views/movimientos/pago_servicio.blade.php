@extends('layouts.app')
@section('title','Pago de servicio')
@section('content')
<div class="container-fluid">
  <div class="card mx-auto" style="max-width:720px">
    <div class="card-header">Registrar Pago</div>
    <div class="card-body">
      <form method="POST" action="{{ route('movimientos.pago_servicio.store') }}">@csrf

        <label class="form-label">Empresa</label>
        <select name="empresa_id" class="form-select" required>
          <option value="">Seleccione</option>
          @foreach($empresas as $empresa)
            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
          @endforeach
        </select>

        <label class="form-label mt-2">Código</label>
        <input type="text" name="codigo" class="form-control" required>

        <label class="form-label mt-2">Monto</label>
        <input type="number" name="monto" step="0.01" class="form-control" required>

        <button class="btn btn-theme mt-3">Guardar</button>

      </form>
    </div>
  </div>
</div>
@endsection
