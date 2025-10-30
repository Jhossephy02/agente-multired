@extends('layouts.app')
@section('title','Trámites')
@section('content')
<div class="card card-app mx-auto p-3" style="max-width:720px">
  <h5 class="mb-3">Registrar Trámite</h5>
  <form method="POST" action="{{ route('movimientos.tramites.store') }}">@csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Cliente</label>
        <select name="cliente_id" class="form-select" required>
          <option value="">Seleccione</option>
          @foreach($clientes as $c)
            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Monto</label>
        <input type="number" step="0.01" class="form-control" name="monto" required>
      </div>
      <div class="col-12">
        <label class="form-label">Detalle</label>
        <input type="text" class="form-control" name="detalle">
      </div>
    </div>
    <div class="d-flex justify-content-end mt-3">
      <button class="btn btn-theme">Guardar</button>
    </div>
  </form>
</div>
@endsection
