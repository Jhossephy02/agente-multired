<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'nombre',
        'email',      // ← Incluye o excluye según tu tabla
        'telefono',
    ];
}