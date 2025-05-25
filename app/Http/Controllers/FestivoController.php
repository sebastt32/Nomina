<?php

namespace App\Http\Controllers;

use App\Models\Festivo;
use Illuminate\Http\Request;

class FestivoController extends Controller
{
    public function index()
    {
        $festivos = Festivo::all();
        return view('festivos.index', compact('festivos'));
    }

    public function create()
    {
        return view('festivos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'es_dominical' => 'boolean',
        ]);
        Festivo::create($data);
        return redirect()->route('festivos.index');
    }

    public function show(Festivo $festivo)
    {
        return view('festivos.show', compact('festivo'));
    }

    public function edit(Festivo $festivo)
    {
        return view('festivos.edit', compact('festivo'));
    }

    public function update(Request $request, Festivo $festivo)
    {
        $data = $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'es_dominical' => 'boolean',
        ]);
        $festivo->update($data);
        return redirect()->route('festivos.index');
    }

    public function destroy(Festivo $festivo)
    {
        $festivo->delete();
        return redirect()->route('festivos.index');
    }
} 