@extends('layouts.app')
@section('title','Panel Admin')
@section('content')
<div class="container-fluid">
  <div class="row g-3">
    <div class="col-md-6 col-xl-3">
      <div class="card kpi"><div class="card-body">
        <div class="kpi-label">Depósitos del día</div>
        <div class="kpi-value">S/ {{ number_format($depositosHoy ?? 0, 2) }}</div>
      </div></div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card kpi"><div class="card-body">
        <div class="kpi-label">Retiros del día</div>
        <div class="kpi-value">S/ {{ number_format($retirosHoy ?? 0, 2) }}</div>
      </div></div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card kpi"><div class="card-body">
        <div class="kpi-label">Operaciones</div>
        <div class="kpi-value">{{ $totalMovimientos ?? 0 }}</div>
      </div></div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card kpi"><div class="card-body">
        <div class="kpi-label">Saldo total</div>
        <div class="kpi-value">S/ {{ number_format($saldoTotal ?? 0, 2) }}</div>
      </div></div>
    </div>
  </div>

  <div class="row mt-3">
  <div class="col-md-3">
    <a href="{{ route('movimientos.deposito') }}" class="btn btn-primary w-100">➕ Depósito</a>
  </div>
  <div class="col-md-3">
    <a href="{{ route('movimientos.retiro') }}" class="btn btn-danger w-100">➖ Retiro</a>
  </div>
  <div class="col-md-3">
    <a href="{{ route('movimientos.pago_servicio') }}" class="btn btn-warning w-100">💡 Pago de servicio</a>
  </div>
  <div class="col-md-3">
    <a href="{{ route('movimientos.tramites') }}" class="btn btn-info w-100">📄 Trámites</a>
  </div>
</div>


  <div class="row g-3 mt-1">
    <div class="col-lg-7">
      <div class="card">
        <div class="card-header">Ingresos vs Egresos</div>
        <div class="card-body"><canvas id="opsChart" height="120"></canvas></div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header">Últimas operaciones</div>
        <div class="table-responsive">
          <table class="table table-app mb-0">
            <thead><tr><th>Fecha</th><th>Cliente</th><th>Tipo</th><th class="text-end">Monto</th></tr></thead>
            <tbody>
            @forelse(($ultimos ?? []) as $m)
              <tr>
                <td>{{ $m->created_at?->format('d/m H:i') }}</td>
                <td>{{ $m->cliente->nombre ?? '-' }}</td>
                <td><span class="badge rounded-pill bg-type-{{ $m->tipo }}">{{ ucfirst($m->tipo) }}</span></td>
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
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  const depositos = {{ (int)($depositosHoy ?? 0) }};
  const retiros = {{ (int)($retirosHoy ?? 0) }};
  const pagos = 0;
  const tramites = 0;

  const ctx = document.getElementById('opsChart').getContext('2d');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Depósitos', 'Retiros', 'Pagos', 'Trámites'],
      datasets: [{
        label: 'Montos',
        data: [depositos, retiros, pagos, tramites],
        backgroundColor: 'rgba(255,111,63,0.35)',
        borderColor: '#ff6f3f',
        borderWidth: 2,
        tension: 0.4,
        fill: true
      }]
    }
  });

});
</script>
@endpush
@endsection