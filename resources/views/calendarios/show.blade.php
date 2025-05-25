@extends('layouts.app')
@section('title', 'Detalle de Calendario')
@section('content')
<h1>Detalle de Calendario</h1>
<div class="card col-md-6">
    <div class="card-body">
        <h5 class="card-title">Fecha de Inicio: {{ $calendario->fecha_inicio->format('Y-m-d') }}</h5>
        <p class="card-text"><strong>Días Laborales:</strong> {{ $calendario->dias_laborales }}</p>
        <p class="card-text"><strong>Festivos No Dominicales:</strong>
            @foreach($calendario->festivos_no_dominicales as $festivo)
                <span class="badge bg-info">{{ $festivo }}</span>
            @endforeach
        </p>
        <a href="{{ route('calendarios.edit', $calendario) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('calendarios.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection 