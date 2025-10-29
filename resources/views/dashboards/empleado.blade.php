@extends('layouts.app')
@section('title','Panel Empleado')
@section('content')
<div class="container-fluid">
  <div class="row g-3 align-items-stretch">
    <div class="col-md-4"><a href="{{ route('movimientos.deposito') }}" class="tile btn w-100 h-100 d-flex align-items-center justify-content-center">Depósito</a></div>
    <div class="col-md-4"><a href="{{ route('movimientos.retiro') }}" class="tile btn w-100 h-100 d-flex align-items-center justify-content-center">Retiro</a></div>
    <div class="col-md-4"><a href="{{ route('movimientos.pago_servicio') }}" class="tile btn w-100 h-100 d-flex align-items-center justify-content-center">Pago de servicio</a></div>
  </div>
  <div class="card mt-4"><div class="card-body">
    <div class="kpi-label">Saldo del Sistema</div>
    <div class="kpi-value">S/ {{ number_format($saldoTotal ?? 0, 2) }}</div>
    <div class="row mt-3">
  <div class="col-md-4">
    <a href="{{ route('movimientos.deposito') }}" class="btn btn-primary w-100">➕ Depósito</a>
  </div>
  <div class="col-md-4">
    <a href="{{ route('movimientos.retiro') }}" class="btn btn-danger w-100">➖ Retiro</a>
  </div>
  <div class="col-md-4">
    <a href="{{ route('movimientos.pago_servicio') }}" class="btn btn-warning w-100">💡 Pago de servicio</a>
  </div>
</div>

  </div></div>
</div>
@endsection
