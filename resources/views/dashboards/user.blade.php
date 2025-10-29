@extends('layouts.app')
@section('title','Dashboard — Cosmiko')
@section('content')
<section class="grid">
    <article class="card span-2">
        <h3>Acciones rápidas</h3>
        <div class="actions-row">
            <a href="#" class="btn primary">Nuevo Depósito</a>
            <a href="#" class="btn ghost">Nuevo Retiro</a>
            <a href="#" class="btn ghost">Pago Servicio</a>
        </div>
    </article>
    <article class="card">
        <h3>Turno</h3>
        <p>Abierto — 09:00 a 18:00</p>
    </article>
    <article class="card">
        <h3>Operaciones</h3>
        <p class="big">12</p>
    </article>
</section>
@endsection
