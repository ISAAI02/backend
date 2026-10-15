<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactoEmergencia extends Model
{
    protected $table = 'contactos_emergencia';

    protected $fillable = [
        'user_id',
        'nombre',
        'telefono',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}