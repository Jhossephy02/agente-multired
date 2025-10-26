<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'cliente_id',
        'empleado_id',
    ];

    // 🔹 Cada trámite pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // 🔹 Cada trámite pertenece a un empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
