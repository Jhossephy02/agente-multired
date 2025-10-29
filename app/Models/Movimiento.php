<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $fillable = ['tipo','cliente_id','monto','cci','estado'];

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
