@extends('layouts.app')
@section('title', 'Calendarios')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Calendarios</h1>
    <a href="{{ route('calendarios.create') }}" class="btn btn-success">Nuevo Calendario</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha de Inicio</th>
            <th>Días Laborales</th>
            <th>Festivos No Dominicales</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($calendarios as $calendario)
        <tr>
            <td>{{ $calendario->id }}</td>
            <td>{{ $calendario->fecha_inicio->format('Y-m-d') }}</td>
            <td>{{ $calendario->dias_laborales }}</td>
            <td>
                @foreach($calendario->festivos_no_dominicales as $festivo)
                    <span class="badge bg-info">{{ $festivo }}</span>
                @endforeach
            </td>
            <td>
                <a href="{{ route('calendarios.show', $calendario) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('calendarios.edit', $calendario) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('calendarios.destroy', $calendario) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este calendario?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection 