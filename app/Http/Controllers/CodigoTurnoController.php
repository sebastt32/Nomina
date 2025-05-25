<?php

namespace App\Http\Controllers;

use App\Models\CodigoTurno;
use Illuminate\Http\Request;

class CodigoTurnoController extends Controller
{
    public function index()
    {
        $codigos = CodigoTurno::all();
        return view('codigo_turnos.index', compact('codigos'));
    }

    public function create()
    {
        return view('codigo_turnos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string|unique:codigo_turnos',
            'horas' => 'required|numeric|min:0',
        ]);
        CodigoTurno::create($data);
        return redirect()->route('codigo-turnos.index');
    }

    public function show(CodigoTurno $codigoTurno)
    {
        return view('codigo_turnos.show', compact('codigoTurno'));
    }

    public function edit(CodigoTurno $codigoTurno)
    {
        return view('codigo_turnos.edit', compact('codigoTurno'));
    }

    public function update(Request $request, CodigoTurno $codigoTurno)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string|unique:codigo_turnos,codigo,' . $codigoTurno->id,
            'horas' => 'required|numeric|min:0',
        ]);
        $codigoTurno->update($data);
        return redirect()->route('codigo-turnos.index');
    }

    public function destroy(CodigoTurno $codigoTurno)
    {
        $codigoTurno->delete();
        return redirect()->route('codigo-turnos.index');
    }
} 