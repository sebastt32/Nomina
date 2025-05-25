@extends('layouts.app')
@section('title', 'Editar Calendario')
@section('content')
<h1>Editar Calendario</h1>
<form action="{{ route('calendarios.update', $calendario) }}" method="POST" class="col-md-6">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required value="{{ old('fecha_inicio', $calendario->fecha_inicio->format('Y-m-d')) }}">
    </div>
    <div class="mb-3">
        <label for="dias_laborales" class="form-label">Días Laborales</label>
        <input type="number" name="dias_laborales" id="dias_laborales" class="form-control" value="{{ old('dias_laborales', $calendario->dias_laborales) }}">
    </div>
    <div class="mb-3">
        <label for="festivos_no_dominicales" class="form-label">Festivos No Dominicales <small>(separados por coma, ej: 2025-04-07,2025-04-14)</small></label>
        <input type="text" name="festivos_no_dominicales" id="festivos_no_dominicales" class="form-control" value="{{ old('festivos_no_dominicales', implode(',', $calendario->festivos_no_dominicales ?? [])) }}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('calendarios.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 