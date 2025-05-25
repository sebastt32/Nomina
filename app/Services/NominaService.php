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
                ->get();

            $resumen = [
                'Diu' => 0,
                'Noc' => 0,
                'Diu F' => 0,
                'Noc F' => 0,
            ];
            foreach ($turnos as $turno) {
                $resumen[$turno->tipo_turno] = ($resumen[$turno->tipo_turno] ?? 0) + 12; // Asume 12h por turno
            }
            $horas_total = array_sum($resumen);
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
        $valor += ($resumen['Diu'] ?? 0) * ($base / 240); // 240h estándar
        $valor += ($resumen['Noc'] ?? 0) * ($base / 240) * 1.35; // 35% recargo nocturno
        $valor += ($resumen['Diu F'] ?? 0) * ($base / 240) * 1.75; // 75% recargo festivo diurno
        $valor += ($resumen['Noc F'] ?? 0) * ($base / 240) * 2.1; // 110% recargo festivo nocturno
        return round($valor, 2);
    }
} 