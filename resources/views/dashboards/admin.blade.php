@extends('layouts.app')
@section('title', 'Panel Administrativo')
@section('content')

<h1 class="text-2xl font-semibold mb-4">Panel Administrativo</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
  <div class="shadow rounded p-4 bg-[var(--bg-alt)]">
    <p class="text-muted">Saldo del Sistema</p>
    <h2 class="text-2xl font-bold">S/ {{ number_format($saldoTotal, 2) }}</h2>
  </div>
  <div class="shadow rounded p-4 bg-[var(--bg-alt)]">
    <p class="text-muted">Depósitos Hoy</p>
    <h2 class="text-2xl font-bold text-green-400">S/ {{ number_format($depositosHoy, 2) }}</h2>
  </div>
  <div class="shadow rounded p-4 bg-[var(--bg-alt)]">
    <p class="text-muted">Retiros Hoy</p>
    <h2 class="text-2xl font-bold text-red-400">S/ {{ number_format($retirosHoy, 2) }}</h2>
  </div>
  <div class="shadow rounded p-4 bg-[var(--bg-alt)]">
    <p class="text-muted">Operaciones</p>
    <h2 class="text-2xl font-bold">{{ $totalMovimientos }}</h2>
  </div>
</div>

<div class="shadow rounded p-4 bg-[var(--bg-alt)]">
  <h3 class="mb-3">Últimas operaciones</h3>
  <table class="table">
    <thead><tr><th>Fecha</th><th>Cliente</th><th>Tipo</th><th>Monto</th><th>Estado</th></tr></thead>
    <tbody>
      @forelse($ultimos as $m)
      <tr>
        <td>{{ $m->created_at }}</td>
        <td>{{ optional($m->cliente)->nombre ?? '—' }}</td>
        <td>{{ ucfirst($m->tipo) }}</td>
        <td>S/ {{ number_format($m->monto,2) }}</td>
        <td><span class="chip {{ $m->estado === 'aprobado' ? 'approved' : ($m->estado === 'pendiente' ? 'pending' : 'denied') }}">{{ $m->estado }}</span></td>
      </tr>
      @empty
      <tr><td colspan="5">Sin registros</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection
