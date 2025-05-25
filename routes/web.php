<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\FestivoController;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\CodigoTurnoController;

Route::get('/', function () {
    return redirect()->route('empleados.index');
});

Route::resource('empleados', EmpleadoController::class);
Route::resource('turnos', TurnoController::class);
Route::resource('calendarios', CalendarioController::class);
Route::resource('festivos', FestivoController::class);
Route::resource('nominas', NominaController::class)->only(['index', 'show']);
Route::resource('codigo-turnos', CodigoTurnoController::class);

Route::post('nominas/generar', [NominaController::class, 'generar'])->name('nominas.generar');
