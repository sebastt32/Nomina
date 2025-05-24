<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResumenTurno extends Model
{
    protected $fillable = [
        'empleado_id',
        'mes',
        'horas_diurnas',
        'horas_nocturnas',
        'horas_diurnas_festivas',
        'horas_nocturnas_festivas'
    ];

    protected $casts = [
        'mes' => 'date'
    ];

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
    }
} 