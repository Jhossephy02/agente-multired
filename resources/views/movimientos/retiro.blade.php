@extends('layouts.app')
@section('title','Retiro')
@section('content')
<div class="card card-app mx-auto p-3" style="max-width:720px">
  <div class="d-flex justify-content-between align-items-center">
    <h5 class="mb-3">Registrar Retiro</h5>
    <div class="text-muted small">Saldo actual: <strong>S/ {{ number_format($saldo ?? 0,2) }}</strong></div>
  </div>
  <form method="POST" action="{{ route('movimientos.retiro.store') }}">@csrf
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Cliente</label>
        <select name="cliente_id" class="form-select" required>
          <option value="">Seleccione</option>
          @foreach($clientes as $c)
            <option value="{{ $c->id }}">{{ $c->nombre }} ({{ $c->dni }})</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Monto</label>
        <input type="number" step="0.01" class="form-control" name="monto" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">CCI</label>
        <input type="text" class="form-control" name="cci">
      </div>
      <div class="col-md-6">
        <label class="form-label">Correo</label>
        <input type="email" class="form-control" name="correo">
      </div>
      <div class="col-md-6">
        <label class="form-label">DNI</label>
        <input type="text" class="form-control" name="dni">
      </div>
      <div class="col-md-6">
        <label class="form-label">Teléfono</label>
        <input type="text" class="form-control" name="telefono">
      </div>
    </div>
    <div class="d-flex justify-content-end mt-3">
      <button class="btn btn-theme">Guardar</button>
    </div>
  </form>
</div>
@endsection
