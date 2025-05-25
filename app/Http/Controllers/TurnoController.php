<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use App\Models\Empleado;
use App\Models\CodigoTurno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        $turnos = Turno::with('empleado')->get();
        return view('turnos.index', compact('turnos'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        $codigos = CodigoTurno::all();
        return view('turnos.create', compact('empleados', 'codigos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'fecha' => 'required|date',
            'tipo_turno' => 'required|in:Diu,Noc,Diu F,Noc F',
        ]);
        Turno::create($data);
        return redirect()->route('turnos.index');
    }

    public function show(Turno $turno)
    {
        return view('turnos.show', compact('turno'));
    }

    public function edit(Turno $turno)
    {
        $empleados = Empleado::all();
        $codigos = CodigoTurno::all();
        return view('turnos.edit', compact('turno', 'empleados', 'codigos'));
    }

    public function update(Request $request, Turno $turno)
    {
        $data = $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'fecha' => 'required|date',
            'tipo_turno' => 'required|in:Diu,Noc,Diu F,Noc F',
        ]);
        $turno->update($data);
        return redirect()->route('turnos.index');
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();
        return redirect()->route('turnos.index');
    }
} 