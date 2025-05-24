<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $fillable = [
        'fecha_inicio',
        'dias_laborales',
        'festivos_no_dominicales'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'festivos_no_dominicales' => 'array'
    ];
} 