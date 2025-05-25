@extends('layouts.app')
@section('title', 'Detalle de Código de Turno')
@section('content')
<h1>Detalle de Código de Turno</h1>
<div class="card col-md-6">
    <div class="card-body">
        <h5 class="card-title">{{ $codigoTurno->nombre }}</h5>
        <p class="card-text"><strong>Código:</strong> {{ $codigoTurno->codigo }}</p>
        <p class="card-text"><strong>Horas:</strong> {{ $codigoTurno->horas }}</p>
        <a href="{{ route('codigo-turnos.edit', $codigoTurno) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('codigo-turnos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection 