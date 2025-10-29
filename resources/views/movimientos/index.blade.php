@extends('layouts.app')
@section('title','Movimientos')
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="m-0">Movimientos</h4>
    <div class="d-flex gap-2">
      <a class="btn btn-sm btn-outline-theme" href="{{ route('movimientos.deposito') }}">Depósito</a>
      <a class="btn btn-sm btn-outline-theme" href="{{ route('movimientos.retiro') }}">Retiro</a>
      <a class="btn btn-sm btn-outline-theme" href="{{ route('movimientos.pago_servicio') }}">Pago servicio</a>
    </div>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-app mb-0">
        <thead><tr><th>Fecha</th><th>Cliente</th><th>Tipo</th><th>Monto</th><th>Estado</th></tr></thead>
        <tbody>
        @forelse($movimientos as $m)
          <tr>
            <td>{{ $m->created_at?->format('d/m/Y H:i') }}</td>
            <td>{{ $m->cliente->nombre ?? '-' }}</td>
            <td><span class="badge rounded-pill bg-type-{{ $m->tipo }}">{{ ucfirst($m->tipo) }}</span></td>
            <td>S/ {{ number_format($m->monto,2) }}</td>
            <td>
              <form action="{{ route('movimientos.estado', $m->id) }}" method="POST" class="d-flex gap-2">
                @csrf @method('PUT')
                <select class="form-select form-select-sm w-auto" name="estado">
                  <option value="pendiente" @selected($m->estado==='pendiente')>Pendiente</option>
                  <option value="aprobado" @selected($m->estado==='aprobado')>Aprobado</option>
                  <option value="rechazado" @selected($m->estado==='rechazado')>Rechazado</option>
                </select>
                <button class="btn btn-sm btn-theme" type="submit">Guardar</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-center text-muted">Sin registros</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer">{{ $movimientos->links() }}</div>
  </div>
</div>
@endsection
