@extends('layouts.app')

@section('content')
<div class="p-6">
<h1 class="text-2xl font-bold mb-4">Movimientos</h1>

@if(session('success'))
<div class="bg-green-100 text-green-800 p-2 rounded">{{ session('success') }}</div>
@endif

<table class="w-full bg-white rounded shadow mt-4">
<tr class="border-b">
<th class="p-2">Cliente</th>
<th class="p-2">Tipo</th>
<th class="p-2">Monto</th>
<th class="p-2">Estado</th>
<th class="p-2">Acción</th>
</tr>
@foreach($movimientos as $m)
<tr class="border-b">
<td class="p-2">{{ $m->cliente->name ?? '—' }}</td>
<td class="p-2">{{ ucfirst($m->tipo) }}</td>
<td class="p-2">S/ {{ $m->monto }}</td>
<td class="p-2">{{ ucfirst($m->estado) }}</td>
<td class="p-2">
<form method="POST" action="{{ route('movimientos.estado',$m) }}">
@csrf @method('PUT')
<select name="estado" onchange="this.form.submit()">
<option>pendiente</option>
<option>aprobado</option>
<option>denegado</option>
</select>
</form>
</td>
</tr>
@endforeach
</table>

{{ $movimientos->links() }}
</div>
@endsection
