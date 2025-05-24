<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    protected $fillable = [
        'nombre',
        'identificacion',
        'cargo',
        'salario_base'
    ];

    public function turnos(): HasMany
    {
        return $this->hasMany(Turno::class);
    }

    public function resumenTurnos(): HasMany
    {
        return $this->hasMany(ResumenTurno::class);
    }

    public function nominas(): HasMany
    {
        return $this->hasMany(Nomina::class);
    }
} 