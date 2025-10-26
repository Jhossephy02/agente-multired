@extends('layouts.app')

@section('content')
<div style="text-align:center; margin-top:50px;">
    <h2>Retiro de dinero</h2>
    <form action="#" method="POST">
        @csrf
        <input type="number" name="monto" placeholder="Ingrese el monto" required>
        <button type="submit">Retirar</button>
    </form>
</div>
@endsection
