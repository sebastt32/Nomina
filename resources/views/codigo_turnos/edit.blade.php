@extends('layouts.app')
@section('title', 'Editar Código de Turno')
@section('content')
<h1>Editar Código de Turno</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('codigo-turnos.update', $codigoTurno) }}" method="POST" class="col-md-6">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ old('nombre', $codigoTurno->nombre) }}">
    </div>
    <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" name="codigo" id="codigo" class="form-control" required value="{{ old('codigo', $codigoTurno->codigo) }}">
    </div>
    <div class="mb-3">
        <label for="horas" class="form-label">Horas</label>
        <input type="number" step="0.01" name="horas" id="horas" class="form-control" required value="{{ old('horas', $codigoTurno->horas) }}">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('codigo-turnos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection 