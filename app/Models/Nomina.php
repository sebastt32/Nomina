<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nomina extends Model
{
    protected $fillable = [
        'empleado_id',
        'mes',
        'horas_total',
        'valor_total',
        'detalle'
    ];

    protected $casts = [
        'mes' => 'date',
        'detalle' => 'array'
    ];

    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
    }
} 