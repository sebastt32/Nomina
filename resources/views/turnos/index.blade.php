@extends('layouts.app')
@section('title', 'Turnos')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Turnos</h1>
    <a href="{{ route('turnos.create') }}" class="btn btn-success">Nuevo Turno</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Empleado</th>
            <th>Fecha</th>
            <th>Código de Turno</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos as $turno)
        <tr>
            <td>{{ $turno->id }}</td>
            <td>{{ $turno->empleado->nombre }}</td>
            <td>{{ $turno->fecha->format('Y-m-d') }}</td>
            <td>{{ $turno->codigoTurno->codigo }} - {{ $turno->codigoTurno->nombre }}</td>
            <td>
                <a href="{{ route('turnos.show', $turno) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('turnos.edit', $turno) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('turnos.destroy', $turno) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este turno?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection 