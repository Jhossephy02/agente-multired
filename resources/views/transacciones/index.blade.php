@extends('layouts.app')

@section('content')
<div class="p-6">
<h1 class="text-2xl font-bold mb-4">Transacciones</h1>
<a href="{{ route('transacciones.create') }}" class="btn-primary mb-4">Nueva transacción</a>
<table class="table-auto w-full">
<thead><tr><th>Fecha</th><th>Cliente</th><th>Tipo</th><th>Monto</th><th>Estado</th><th></th></tr></thead>
<tbody>
@foreach($transacciones as $t)
<tr>
<td>{{ $t->created_at->format('d/m H:i') }}</td>
<td>{{ $t->cliente->nombre }}</td>
<td>{{ ucfirst($t->tipo) }}</td>
<td>S/ {{ number_format($t->monto,2) }}</td>
<td><span class="badge {{ $t->estado }}">{{ $t->estado }}</span></td>
<td>
<a href="{{ route('transacciones.edit',$t) }}">Editar</a>
<form action="{{ route('transacciones.destroy',$t) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button>Eliminar</button></form>
</td>
</tr>
@endforeach
</tbody>
</table>
{{ $transacciones->links() }}
</div>
@endsection
