@extends('layouts.app')
@section('title', 'Detalle de Turno')
@section('content')
<h1>Detalle de Turno</h1>
<div class="card col-md-6">
    <div class="card-body">
        <h5 class="card-title">{{ $turno->empleado->nombre }}</h5>
        <p class="card-text"><strong>Fecha:</strong> {{ $turno->fecha->format('Y-m-d') }}</p>
        <p class="card-text"><strong>Tipo de Turno:</strong> {{ $turno->tipo_turno }}</p>
        <a href="{{ route('turnos.edit', $turno) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('turnos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection 