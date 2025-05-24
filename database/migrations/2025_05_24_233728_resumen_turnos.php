<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resumen_turnos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados')->onDelete('cascade');
            $table->date('mes'); // Ejemplo: 2025-04-01 (representa el mes completo)
            $table->integer('horas_diurnas')->default(0);
            $table->integer('horas_nocturnas')->default(0);
            $table->integer('horas_diurnas_festivas')->default(0);
            $table->integer('horas_nocturnas_festivas')->default(0);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumen_turnos');
    }
};
