<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $fillable = [
        'numero_unidad',
        'placas',
        'capacidad_litros',
        'estatus',
    ];

    public function operadores(): HasMany
    {
        return $this->hasMany(User::class, 'unidad_id');
    }

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class, 'unidad_id');
    }
}