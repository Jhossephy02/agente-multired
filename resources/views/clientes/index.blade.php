
@extends('layouts.app')
@section('content')
<div class="p-6">
<h1 class="text-2xl font-bold mb-4">Clientes</h1>
<a href="{{ route('clientes.create') }}" class="btn">Nuevo Cliente</a>
<table class="table">
<thead><tr><th>Foto</th><th>Nombre</th><th>DNI</th><th>Email</th><th>Acciones</th></tr></thead>
<tbody>
@foreach($clientes as $c)
<tr>
<td>@if($c->foto)<img src="{{ asset('storage/'.$c->foto) }}" width="40">@endif</td>
<td>{{ $c->nombre }}</td>
<td>{{ $c->dni }}</td>
<td>{{ $c->email }}</td>
<td>
<a href="{{ route('clientes.edit',$c) }}">Editar</a>
<form action="{{ route('clientes.destroy',$c) }}" method="post">@csrf @method('DELETE') <button>Eliminar</button></form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
