<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colonia extends Model
{
    protected $table = 'colonias';

    protected $fillable = [
        'nombre',
        'codigo_postal',
    ];

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class, 'colonia_id');
    }
}