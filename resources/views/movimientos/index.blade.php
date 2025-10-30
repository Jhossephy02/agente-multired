@extends('layouts.app')
@section('title','Movimientos')
@section('content')
<div class="card card-app p-3">
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h5 class="m-0">Movimientos</h5>
    <div class="text-muted">Saldo: <strong>S/ {{ number_format($saldo ?? 0,2) }}</strong></div>
  </div>
  <div class="table-responsive">
    <table class="table table-app mb-0">
      <thead><tr><th>Fecha</th><th>Cliente</th><th>Tipo</th><th>Estado</th><th class="text-end">Monto</th></tr></thead>
      <tbody>
      @forelse($movimientos as $m)
        <tr>
          <td>{{ $m->created_at?->format('d/m H:i') }}</td>
          <td>{{ $m->cliente->nombre ?? '-' }}</td>
          <td><span class="badge badge-type bg-type-{{ $m->tipo }}">{{ ucfirst($m->tipo) }}</span></td>
          <td>
            <span class="badge @if($m->estado=='aprobado') bg-success-subtle text-success @elseif($m->estado=='rechazado') bg-danger-subtle text-danger @else bg-warning-subtle text-warning @endif">
              {{ ucfirst($m->estado) }}
            </span>
          </td>
          <td class="text-end">S/ {{ number_format($m->monto,2) }}</td>
        </tr>
      @empty
        <tr><td colspan="5" class="text-center text-muted">Sin registros</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
  <div class="mt-3">{{ $movimientos->links() }}</div>
</div>
@endsection
