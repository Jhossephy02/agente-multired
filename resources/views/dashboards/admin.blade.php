@extends('layouts.app')
@section('title','Panel Admin')

@section('content')
<div class="row g-3">
  <div class="col-md-3">
    <div class="card card-app kpi p-3">
      <div class="text-muted small">Depósitos (hoy)</div>
      <div class="value">S/ {{ number_format($depositosHoy ?? 0,2) }}</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-app kpi p-3">
      <div class="text-muted small">Retiros (hoy)</div>
      <div class="value">S/ {{ number_format($retirosHoy ?? 0,2) }}</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-app kpi p-3">
      <div class="text-muted small">Operaciones</div>
      <div class="value">{{ $totalMovimientos ?? 0 }}</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card card-app kpi p-3">
      <div class="text-muted small">Saldo total</div>
      <div class="value">S/ {{ number_format($saldoTotal ?? 0,2) }}</div>
    </div>
  </div>
</div>

<div class="row g-3 mt-1">
  <div class="col-lg-7">
    <div class="card card-app p-3">
      <h6 class="mb-3">Ingresos vs Egresos</h6>
      <canvas id="opsChart" height="120"></canvas>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card card-app p-3">
      <h6 class="mb-3">Últimas operaciones</h6>
      <div class="table-responsive">
        <table class="table table-app mb-0">
          <thead>
            <tr>
              <th>Fecha</th><th>Cliente</th><th>Tipo</th><th class="text-end">Monto</th>
            </tr>
          </thead>
          <tbody>
            @forelse(($ultimos ?? []) as $m)
              <tr>
                <td>{{ $m->created_at?->format('d/m H:i') }}</td>
                <td>{{ $m->cliente->nombre ?? '-' }}</td>
                <td><span class="badge badge-type bg-type-{{ $m->tipo }}">{{ ucfirst($m->tipo) }}</span></td>
                <td class="text-end">S/ {{ number_format($m->monto,2) }}</td>
              </tr>
            @empty
              <tr><td colspan="4" class="text-center text-muted">Sin registros</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const ctx = document.getElementById('opsChart');
  if(!ctx) return;
  const data = {
    labels: ['Depósitos','Retiros','Pagos','Trámites'],
    datasets: [{
      label: 'Montos',
      data: @json([ 
      (int)($depositosHoy ?? 0),
      (int)($retirosHoy ?? 0), 
      0, 
      0 ]),
      borderWidth: 2, fill: true
    }]
  };
  new Chart(ctx, { type: 'line', data });
});
</script>
@endpush
