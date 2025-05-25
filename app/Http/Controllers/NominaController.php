<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Services\NominaService;
use Carbon\Carbon;

class NominaController extends Controller
{
    public function index(Request $request)
    {
        $mes = $request->input('mes', Carbon::now()->format('Y-m-01'));
        $nominas = Nomina::where('mes', $mes)->with('empleado')->get();
        return view('nominas.index', compact('nominas', 'mes'));
    }

    public function show(Nomina $nomina)
    {
        return view('nominas.show', compact('nomina'));
    }

    public function generar(Request $request, NominaService $service)
    {
        $mes = $request->input('mes', Carbon::now()->format('Y-m-01'));
        $service->generarNominaParaMes($mes);
        return redirect()->route('nominas.index', ['mes' => $mes]);
    }
} 