<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'cargo',
    ];
}
