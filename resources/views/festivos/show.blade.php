@extends('layouts.app')
@section('title', 'Detalle de Festivo')
@section('content')
<h1>Detalle de Festivo</h1>
<div class="card col-md-6">
    <div class="card-body">
        <h5 class="card-title">{{ $festivo->fecha->format('Y-m-d') }}</h5>
        <p class="card-text"><strong>Descripción:</strong> {{ $festivo->descripcion }}</p>
        <p class="card-text"><strong>¿Es Dominical?:</strong> {{ $festivo->es_dominical ? 'Sí' : 'No' }}</p>
        <a href="{{ route('festivos.edit', $festivo) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('festivos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection 