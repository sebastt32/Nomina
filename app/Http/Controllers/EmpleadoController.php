<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'identificacion' => 'required|string|unique:empleados',
            'cargo' => 'nullable|string',
            'salario_base' => 'nullable|numeric',
        ]);
        Empleado::create($data);
        return redirect()->route('empleados.index');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'identificacion' => 'required|string|unique:empleados,identificacion,' . $empleado->id,
            'cargo' => 'nullable|string',
            'salario_base' => 'nullable|numeric',
        ]);
        $empleado->update($data);
        return redirect()->route('empleados.index');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }
} 