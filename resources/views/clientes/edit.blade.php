
@extends('layouts.app')
@section('content')
<div class="p-6">
<h1>Editar Cliente</h1>
<form action="{{ route('clientes.update') }}" method="post" @method('PUT') enctype="multipart/form-data">@csrf
<input name="dni" placeholder="DNI">
<input name="nombre" placeholder="Nombre">
<input name="email" placeholder="Email">
<input name="telefono" placeholder="Teléfono">
<input type="file" name="foto">
<button>Guardar</button>
</form>
</div>
@endsection
