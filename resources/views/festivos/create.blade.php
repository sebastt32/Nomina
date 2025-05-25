@extends('layouts.app')
@section('title', 'Nuevo Festivo')
@section('content')
<h1>Nuevo Festivo</h1>
<form action="{{ route('festivos.store') }}" method="POST" class="col-md-6">
    @csrf
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required value="{{ old('fecha') }}">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}">
    </div>
    <div class="mb-3">
        <label for="es_dominical" class="form-label">¿Es Dominical?</label>
        <select name="es_dominical" id="es_dominical" class="form-select">
            <option value="0" {{ old('es_dominical') == '0' ? 'selected' : '' }}>No</option>
            <option value="1" {{ old('es_dominical') == '1' ? 'selected' : '' }}>Sí</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('festivos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 