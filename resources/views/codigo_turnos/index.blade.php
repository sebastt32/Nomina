@extends('layouts.app')
@section('title', 'Códigos de Turno')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Códigos de Turno</h1>
    <a href="{{ route('codigo-turnos.create') }}" class="btn btn-success">Nuevo Código</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Horas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($codigos as $codigo)
        <tr>
            <td>{{ $codigo->id }}</td>
            <td>{{ $codigo->nombre }}</td>
            <td>{{ $codigo->codigo }}</td>
            <td>{{ $codigo->horas }}</td>
            <td>
                <a href="{{ route('codigo-turnos.show', $codigo) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('codigo-turnos.edit', $codigo) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('codigo-turnos.destroy', $codigo) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este código?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection 