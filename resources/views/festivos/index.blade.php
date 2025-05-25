@extends('layouts.app')
@section('title', 'Festivos')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Festivos</h1>
    <a href="{{ route('festivos.create') }}" class="btn btn-success">Nuevo Festivo</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>¿Dominical?</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($festivos as $festivo)
        <tr>
            <td>{{ $festivo->id }}</td>
            <td>{{ $festivo->fecha->format('Y-m-d') }}</td>
            <td>{{ $festivo->descripcion }}</td>
            <td>{{ $festivo->es_dominical ? 'Sí' : 'No' }}</td>
            <td>
                <a href="{{ route('festivos.show', $festivo) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('festivos.edit', $festivo) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('festivos.destroy', $festivo) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este festivo?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection 