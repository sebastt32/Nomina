@extends('layouts.app')
@section('title', 'Empleados')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-success">Nuevo Empleado</a>
</div>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Identificación</th>
            <th>Cargo</th>
            <th>Salario Base</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->identificacion }}</td>
            <td>{{ $empleado->cargo }}</td>
            <td>${{ number_format($empleado->salario_base, 2) }}</td>
            <td>
                <a href="{{ route('empleados.show', $empleado) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este empleado?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection 