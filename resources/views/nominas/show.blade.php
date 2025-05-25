@extends('layouts.app')
@section('title', 'Detalle de Nómina')
@section('content')
<h1>Detalle de Nómina</h1>
<div class="card col-md-8">
    <div class="card-body">
        <h5 class="card-title">{{ $nomina->empleado->nombre }}</h5>
        <p class="card-text"><strong>Mes:</strong> {{ \Carbon\Carbon::parse($nomina->mes)->format('F Y') }}</p>
        <p class="card-text"><strong>Identificación:</strong> {{ $nomina->empleado->identificacion }}</p>
        <hr>
        <h6>Desglose de Horas</h6>
        <ul>
            <li><strong>Horas Diurnas:</strong> {{ $nomina->detalle['Diu'] ?? 0 }}</li>
            <li><strong>Horas Nocturnas:</strong> {{ $nomina->detalle['Noc'] ?? 0 }}</li>
            <li><strong>Horas Diurnas Festivas:</strong> {{ $nomina->detalle['Diu F'] ?? 0 }}</li>
            <li><strong>Horas Nocturnas Festivas:</strong> {{ $nomina->detalle['Noc F'] ?? 0 }}</li>
        </ul>
        <p class="card-text"><strong>Total de Horas:</strong> {{ $nomina->horas_total }}</p>
        <p class="card-text"><strong>Valor Total:</strong> ${{ number_format($nomina->valor_total, 2) }}</p>
        <a href="{{ route('nominas.index', ['mes' => \Carbon\Carbon::parse($nomina->mes)->format('Y-m-01')]) }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection 