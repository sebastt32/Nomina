@extends('layouts.app')
@section('title', 'Detalle de Empleado')
@section('content')
<h1>Detalle de Empleado</h1>
<div class="card col-md-6">
    <div class="card-body">
        <h5 class="card-title">{{ $empleado->nombre }}</h5>
        <p class="card-text"><strong>Identificación:</strong> {{ $empleado->identificacion }}</p>
        <p class="card-text"><strong>Cargo:</strong> {{ $empleado->cargo }}</p>
        <p class="card-text"><strong>Salario Base:</strong> ${{ number_format($empleado->salario_base, 2) }}</p>
        <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection 