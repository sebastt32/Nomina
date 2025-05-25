<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CodigoTurno;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        CodigoTurno::insert([
            ['nombre' => 'Noche', 'codigo' => 'N', 'horas' => 12],
            ['nombre' => 'Corrido', 'codigo' => 'C', 'horas' => 12],
            ['nombre' => 'Mañana', 'codigo' => 'M', 'horas' => 6],
            ['nombre' => 'Tarde', 'codigo' => 'T', 'horas' => 6],
            ['nombre' => 'INDUCCION', 'codigo' => 'IN', 'horas' => 8],
            ['nombre' => 'Procedimientos', 'codigo' => 'PX', 'horas' => 10],
            ['nombre' => 'Sala de Prealta', 'codigo' => 'SP', 'horas' => 10],
            ['nombre' => 'Administrativo', 'codigo' => 'AD', 'horas' => 10.5],
            ['nombre' => 'Oncología', 'codigo' => 'O', 'horas' => 8],
            ['nombre' => '10 Horas', 'codigo' => '10H', 'horas' => 10],
            ['nombre' => 'Brigada', 'codigo' => 'BG', 'horas' => 3],
            ['nombre' => 'Capacitación', 'codigo' => 'CAP', 'horas' => 6],
            ['nombre' => 'Ruta 1 (6 - 14 hr)', 'codigo' => 'R1', 'horas' => 8],
            ['nombre' => 'Ruta 2 (13 - 21 hr)', 'codigo' => 'R2', 'horas' => 8],
            ['nombre' => 'Ruta 3 (16 - 24 hr)', 'codigo' => 'R3', 'horas' => 8],
            ['nombre' => 'Ruta 1 C (5 - 13 hr)', 'codigo' => 'R1C', 'horas' => 8],
            ['nombre' => 'Programador 1 (6 - 14 hr)', 'codigo' => 'R5', 'horas' => 8],
            ['nombre' => 'R6', 'codigo' => 'R6', 'horas' => 8],
            ['nombre' => 'Noche de INDUCCIÓN', 'codigo' => 'NI', 'horas' => 12],
            ['nombre' => 'Corrido de INDUCCIÓN', 'codigo' => 'CI', 'horas' => 12],
            ['nombre' => 'Licencia Maternidad', 'codigo' => 'LM', 'horas' => 0],
            ['nombre' => 'Incapacidad', 'codigo' => 'I', 'horas' => 0],
            ['nombre' => 'Calamidad', 'codigo' => 'CAL', 'horas' => 0],
            ['nombre' => 'Equipo de Mejoramiento', 'codigo' => 'EM', 'horas' => 8],
            ['nombre' => 'Gestores de Seguridad', 'codigo' => 'GS', 'horas' => 10],
            ['nombre' => 'Libre', 'codigo' => 'L', 'horas' => 0],
            ['nombre' => 'Posturno', 'codigo' => 'P', 'horas' => 0],
            ['nombre' => 'Vacaciones', 'codigo' => 'V', 'horas' => 0],
        ]);
    }
}
