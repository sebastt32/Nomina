<?php

namespace App\Services;

use App\Models\Empleado;
use App\Models\Turno;
use App\Models\Nomina;
use Carbon\Carbon;

class NominaService
{
    public function generarNominaParaMes($mes)
    {
        $fecha = Carbon::parse($mes);
        $empleados = Empleado::all();
        foreach ($empleados as $empleado) {
            $turnos = Turno::where('empleado_id', $empleado->id)
                ->whereMonth('fecha', $fecha->month)
                ->whereYear('fecha', $fecha->year)
                ->with('codigoTurno')
                ->get();

            $resumen = [];
            $horas_total = 0;
            foreach ($turnos as $turno) {
                $codigo = $turno->codigoTurno;
                if (!$codigo) continue;
                $key = $codigo->codigo;
                $resumen[$key] = ($resumen[$key] ?? 0) + $codigo->horas;
                $horas_total += $codigo->horas;
            }
            $valor_total = $this->calcularValorTotal($empleado, $resumen);
            Nomina::updateOrCreate(
                [
                    'empleado_id' => $empleado->id,
                    'mes' => $fecha->copy()->startOfMonth(),
                ],
                [
                    'horas_total' => $horas_total,
                    'valor_total' => $valor_total,
                    'detalle' => $resumen,
                ]
            );
        }
    }

    private function calcularValorTotal($empleado, $resumen)
    {
        // Lógica de ejemplo: puedes ajustar los recargos según tu necesidad
        $base = $empleado->salario_base ?? 0;
        $valor = 0;
        foreach ($resumen as $codigo => $horas) {
            // Aquí puedes personalizar los recargos según el código
            $valor += $horas * ($base / 240); // Ejemplo: todas las horas al mismo valor base
        }
        return round($valor, 2);
    }
} 