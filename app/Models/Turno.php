<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Turno extends Model
{
    protected $fillable = [
        'empleado_id',
        'fecha',
        'codigo_turno_id',
    ];

    protected $casts = [
        'fecha' => 'date'
    ];

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
    }

    public function codigoTurno(): BelongsTo
    {
        return $this->belongsTo(CodigoTurno::class);
    }
} 