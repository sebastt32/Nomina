@extends('layouts.app')
@section('title', 'Editar Empleado')
@section('content')
<h1>Editar Empleado</h1>
<form action="{{ route('empleados.update', $empleado) }}" method="POST" class="col-md-6">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ old('nombre', $empleado->nombre) }}">
    </div>
    <div class="mb-3">
        <label for="identificacion" class="form-label">Identificación</label>
        <input type="text" name="identificacion" id="identificacion" class="form-control" required value="{{ old('identificacion', $empleado->identificacion) }}">
    </div>
    <div class="mb-3">
        <label for="cargo" class="form-label">Cargo</label>
        <input type="text" name="cargo" id="cargo" class="form-control" value="{{ old('cargo', $empleado->cargo) }}">
    </div>
    <div class="mb-3">
        <label for="salario_base" class="form-label">Salario Base</label>
        <input type="number" step="0.01" name="salario_base" id="salario_base" class="form-control" value="{{ old('salario_base', $empleado->salario_base) }}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 