@extends('layouts.app')
@section('title','Depósito')
@section('content')
<div class="container-fluid">
  <div class="card mx-auto" style="max-width:720px">
    <div class="card-header">Registrar Depósito</div>
    <div class="card-body">
      <form method="POST" action="{{ route('movimientos.deposito.store') }}">@csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id" required>
              <option value="" selected disabled>Seleccione</option>
              @foreach($clientes as $c)
                <option value="{{ $c->id }}">{{ $c->nombre }}</option>
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
        </div>
        <div class="d-flex justify-content-end mt-3">
          <button class="btn btn-theme">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
