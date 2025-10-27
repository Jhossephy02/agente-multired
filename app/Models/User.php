<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ✅ Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone'
    ];

    // ✅ Campos ocultos al serializar (por seguridad)
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
