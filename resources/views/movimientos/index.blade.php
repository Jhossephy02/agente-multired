@extends('layouts.app')
@section('title', 'Movimientos')
@section('content')
  <h1 class="text-2xl font-semibold mb-4">Movimientos</h1>

  <div class="mb-4">Saldo del sistema: <strong>S/ {{ number_format($saldo, 2) }}</strong></div>

  <table class="table">
    <thead>
      <tr>
        <th>Fecha</th><th>Cliente</th><th>Tipo</th><th>Monto</th><th>Estado</th>
      </tr>
    </thead>
    <tbody>
      @forelse($movimientos as $m)
        <tr>
          <td>{{ $m->created_at }}</td>
          <td>{{ optional($m->cliente)->nombre ?? '—' }}</td>
          <td>{{ ucfirst($m->tipo) }}</td>
          <td>S/ {{ number_format($m->monto, 2) }}</td>
          <td><span class="chip {{ $m->estado === 'aprobado' ? 'approved' : ($m->estado === 'pendiente' ? 'pending' : 'denied') }}">{{ $m->estado }}</span></td>
        </tr>
      @empty
        <tr><td colspan="5">Sin registros</td></tr>
      @endforelse
    </tbody>
  </table>

  <div class="mt-3">
    {{ $movimientos->links() }}
  </div>
@endsection
