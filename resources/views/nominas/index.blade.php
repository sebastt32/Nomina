@extends('layouts.app')
@section('title', 'Nómina Mensual')
@section('content')
<h1>Nómina Mensual</h1>
<form action="{{ route('nominas.generar') }}" method="POST" class="mb-3 d-flex align-items-end gap-2">
    @csrf
    <div>
        <label for="mes" class="form-label">Mes</label>
        <input type="month" name="mes" id="mes" class="form-control" value="{{ \Carbon\Carbon::parse($mes)->format('Y-m') }}">
    </div>
    <button type="submit" class="btn btn-primary">Generar Nómina</button>
</form>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Empleado</th>
            <th>Horas Diurnas</th>
            <th>Horas Nocturnas</th>
            <th>Horas Diurnas Festivas</th>
            <th>Horas Nocturnas Festivas</th>
            <th>Total Horas</th>
            <th>Valor Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nominas as $nomina)
        <tr>
            <td>{{ $nomina->empleado->nombre }}</td>
            <td>{{ $nomina->detalle['Diu'] ?? 0 }}</td>
            <td>{{ $nomina->detalle['Noc'] ?? 0 }}</td>
            <td>{{ $nomina->detalle['Diu F'] ?? 0 }}</td>
            <td>{{ $nomina->detalle['Noc F'] ?? 0 }}</td>
            <td>{{ $nomina->horas_total }}</td>
            <td>${{ number_format($nomina->valor_total, 2) }}</td>
            <td>
                <a href="{{ route('nominas.show', $nomina) }}" class="btn btn-info btn-sm">Ver Detalle</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection 