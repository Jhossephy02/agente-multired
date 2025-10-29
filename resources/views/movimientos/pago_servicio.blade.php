@extends('layouts.app')
@section('title','Pago de servicio')
@section('content')
<div class="container-fluid">
  <div class="card mx-auto" style="max-width:720px">
    <div class="card-header">Registrar Pago</div>
    <div class="card-body">
      <form method="POST" action="{{ route('movimientos.pago_servicio.store') }}">@csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Cliente</label>
            <select name="empresa_id" class="form-select" required>
    <option value="">Seleccione una empresa</option>
    @foreach($empresas as $empresa)
        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
    @endforeach
</select>

<input type="text" name="codigo" class="form-control" placeholder="Código de referencia" required>

<input type="number" step="0.01" name="monto" class="form-control" placeholder="Monto" required>

          </div>
          <div class="col-md-6">
            <label class="form-label">Monto</label>
            <input type="number" step="0.01" class="form-control" name="monto" required>
          </div>
          <div class="col-12">
            <label class="form-label">Referencia</label>
            <input type="text" class="form-control" name="referencia">
          </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
          <button class="btn btn-theme">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
