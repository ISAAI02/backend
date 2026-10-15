<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'rol_id',
        'unidad_id',
        'nombre',
        'email',
        'password',
        'telefono',
        'curp',
        'nss',
        'activo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            
            'password' => 'hashed',
            'activo'   => 'boolean',
        ];
    }

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'unidad_id');
    }

    public function detalleOperador(): HasOne
    {
        return $this->hasOne(DetalleOperador::class, 'user_id');
    }

    public function contactosEmergencia(): HasMany
    {
        return $this->hasMany(ContactoEmergencia::class, 'user_id');
    }

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class, 'user_id');
    }

    // Genera las iniciales a partir de la columna 'nombre' (ej. "Juan P. Martínez" -> "JM")
    public function getInicialesAttribute(): string
    {
        $partes = preg_split('/\s+/', trim($this->nombre));
        $primera = isset($partes[0]) ? mb_substr($partes[0], 0, 1) : 'O';
        $segunda = count($partes) > 1 ? mb_substr(end($partes), 0, 1) : 'P';
        return mb_strtoupper($primera . $segunda);
    }
}
