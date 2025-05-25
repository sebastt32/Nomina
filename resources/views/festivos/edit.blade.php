@extends('layouts.app')
@section('title', 'Editar Festivo')
@section('content')
<h1>Editar Festivo</h1>
<form action="{{ route('festivos.update', $festivo) }}" method="POST" class="col-md-6">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required value="{{ old('fecha', $festivo->fecha->format('Y-m-d')) }}">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion', $festivo->descripcion) }}">
    </div>
    <div class="mb-3">
        <label for="es_dominical" class="form-label">¿Es Dominical?</label>
        <select name="es_dominical" id="es_dominical" class="form-select">
            <option value="0" {{ old('es_dominical', $festivo->es_dominical) == '0' ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('es_dominical', $festivo->es_dominical) == '1' ? 'selected' : '' }}>Sí</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('festivos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 