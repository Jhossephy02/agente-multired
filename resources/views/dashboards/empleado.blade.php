@extends('layouts.app')
@section('title','Panel Empleado')
@section('content')
<div class="row g-3">
  <div class="col-md-4">
    <a href="{{ route('movimientos.deposito') }}" class="btn btn-theme w-100 p-4 card-app d-block text-center">
      <i class="bi bi-cash-coin d-block fs-3 mb-2"></i> Depositar
    </a>
  </div>
  <div class="col-md-4">
    <a href="{{ route('movimientos.retiro') }}" class="btn btn-outline-light w-100 p-4 card-app d-block text-center">
      <i class="bi bi-wallet2 d-block fs-3 mb-2"></i> Retirar
    </a>
  </div>
  <div class="col-md-4">
    <a href="{{ route('movimientos.pago_servicio') }}" class="btn btn-outline-light w-100 p-4 card-app d-block text-center">
      <i class="bi bi-receipt d-block fs-3 mb-2"></i> Pago Servicio
    </a>
  </div>
</div>
@endsection
