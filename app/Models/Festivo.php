<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festivo extends Model
{
    protected $fillable = [
        'fecha',
        'descripcion',
        'es_dominical'
    ];

    protected $casts = [
        'fecha' => 'date',
        'es_dominical' => 'boolean'
    ];
} 