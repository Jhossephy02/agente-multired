<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Movimiento extends Model
{
    protected $fillable = [
        'tipo','cliente_id','monto','cci','dni','telefono','correo','referencia','detalle','estado'
    ];

    protected $casts = [
        'monto' => 'decimal:2',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public static function saldoActual(): float
    {
        $row = static::selectRaw("
            SUM(
              CASE
                WHEN tipo = 'deposito' THEN monto
                WHEN tipo IN ('retiro','pago_servicio','tramite') THEN -monto
                ELSE 0
              END
            ) as saldo
        ")->value('saldo');

        return (float) ($row ?? 0);
    }

    public function scopeDelDia(Builder $q): Builder
    {
        return $q->whereDate('created_at', today());
    }
    public function scopeDepositos(Builder $q): Builder
    {
        return $q->where('tipo','deposito');
    }
    public function scopeRetiros(Builder $q): Builder
    {
        return $q->where('tipo','retiro');
    }
}
