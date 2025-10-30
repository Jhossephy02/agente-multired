@extends('layouts.app')
@section('title','Pago de servicio')
@section('content')
<div class="card card-app mx-auto p-3" style="max-width:720px">
  <h5 class="mb-3">Registrar Pago de Servicio</h5>
  <form method="POST" action="{{ route('movimientos.pago_servicio.store') }}">@csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Empresa</label>
        <select name="cliente_id" class="form-select" required>
          <option value="">Seleccione empresa</option>
          @foreach($clientes as $e)
            <option value="{{ $e->id }}">{{ $e->nombre }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Monto</label>
        <input type="number" step="0.01" class="form-control" name="monto" required>
      </div>
      <div class="col-12">
        <label class="form-label">Código / Referencia</label>
        <input type="text" class="form-control" name="referencia" placeholder="Ej: REC-001-2025">
      </div>
    </div>
    <div class="d-flex justify-content-end mt-3">
      <button class="btn btn-theme">Guardar</button>
    </div>
  </form>
</div>
@endsection
