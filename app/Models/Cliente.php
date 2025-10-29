<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = [
        'dni',
        'nombre',
        'email',      // ← Incluye o excluye según tu tabla
        'telefono',
    ];
}
=======
    protected $table = 'clientes'; // 👈 importante
    protected $fillable = ['dni', 'noe', 'email', 'telefono'];
}
>>>>>>> 818eeb5 (auto)
