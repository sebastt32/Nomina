@extends('layouts.app')
@section('title', 'Nuevo Código de Turno')
@section('content')
<h1>Nuevo Código de Turno</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('codigo-turnos.store') }}" method="POST" class="col-md-6">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ old('nombre') }}">
    </div>
    <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" name="codigo" id="codigo" class="form-control" required value="{{ old('codigo') }}">
    </div>
    <div class="mb-3">
        <label for="horas" class="form-label">Horas</label>
        <input type="number" step="0.01" name="horas" id="horas" class="form-control" required value="{{ old('horas') }}">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('codigo-turnos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 