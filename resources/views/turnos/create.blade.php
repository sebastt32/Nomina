@extends('layouts.app')
@section('title', 'Nuevo Turno')
@section('content')
<h1>Nuevo Turno</h1>
<form action="{{ route('turnos.store') }}" method="POST" class="col-md-6">
    @csrf
    <div class="mb-3">
        <label for="empleado_id" class="form-label">Empleado</label>
        <select name="empleado_id" id="empleado_id" class="form-select" required>
            <option value="">Seleccione...</option>
            @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}" {{ old('empleado_id') == $empleado->id ? 'selected' : '' }}>{{ $empleado->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required value="{{ old('fecha') }}">
    </div>
    <div class="mb-3">
        <label for="tipo_turno" class="form-label">Tipo de Turno</label>
        <select name="tipo_turno" id="tipo_turno" class="form-select" required>
            <option value="">Seleccione...</option>
            <option value="Diu" {{ old('tipo_turno') == 'Diu' ? 'selected' : '' }}>Diurno</option>
            <option value="Noc" {{ old('tipo_turno') == 'Noc' ? 'selected' : '' }}>Nocturno</option>
            <option value="Diu F" {{ old('tipo_turno') == 'Diu F' ? 'selected' : '' }}>Diurno Festivo</option>
            <option value="Noc F" {{ old('tipo_turno') == 'Noc F' ? 'selected' : '' }}>Nocturno Festivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('turnos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 