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
        <label for="codigo_turno_id" class="form-label">Código de Turno</label>
        <select name="codigo_turno_id" id="codigo_turno_id" class="form-select" required>
            <option value="">Seleccione...</option>
            @foreach($codigos as $codigo)
                <option value="{{ $codigo->id }}" {{ old('codigo_turno_id') == $codigo->id ? 'selected' : '' }}>{{ $codigo->codigo }} - {{ $codigo->nombre }} ({{ $codigo->horas }}h)</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('turnos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 