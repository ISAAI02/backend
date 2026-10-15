<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reporte extends Model
{
    protected $table = 'reportes';

    protected $fillable = [
        'user_id',
        'unidad_id',
        'colonia_id',
        'direccion',
        'litros_entregados',
        'observaciones',
        'estatus',
        'fecha_reporte',
    ];

    protected $casts = [
        'fecha_reporte' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }

    public function colonia(): BelongsTo
    {
        return $this->belongsTo(Colonia::class, 'colonia_id');
    }

    public function imagenes(): HasMany
    {
        return $this->hasMany(ReporteImagen::class, 'reporte_id');
    }
}