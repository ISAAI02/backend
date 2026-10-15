<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleOperador extends Model
{
    protected $table = 'detalles_operador';

    protected $fillable = [
        'user_id',
        'numero_licencia',
        'vigencia_licencia',
    ];

    protected $casts = [
        'vigencia_licencia' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}