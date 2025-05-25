<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodigoTurno extends Model
{
    protected $fillable = [
        'nombre',
        'codigo',
        'horas',
    ];
}
