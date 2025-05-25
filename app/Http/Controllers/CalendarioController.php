<?php

namespace App\Http\Controllers;

use App\Models\Calendario;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index()
    {
        $calendarios = Calendario::all();
        return view('calendarios.index', compact('calendarios'));
    }

    public function create()
    {
        return view('calendarios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha_inicio' => 'required|date',
            'dias_laborales' => 'nullable|integer',
            'festivos_no_dominicales' => 'required|array',
        ]);
        Calendario::create($data);
        return redirect()->route('calendarios.index');
    }

    public function show(Calendario $calendario)
    {
        return view('calendarios.show', compact('calendario'));
    }

    public function edit(Calendario $calendario)
    {
        return view('calendarios.edit', compact('calendario'));
    }

    public function update(Request $request, Calendario $calendario)
    {
        $data = $request->validate([
            'fecha_inicio' => 'required|date',
            'dias_laborales' => 'nullable|integer',
            'festivos_no_dominicales' => 'required|array',
        ]);
        $calendario->update($data);
        return redirect()->route('calendarios.index');
    }

    public function destroy(Calendario $calendario)
    {
        $calendario->delete();
        return redirect()->route('calendarios.index');
    }
} 