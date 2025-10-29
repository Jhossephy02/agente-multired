<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo'); // deposito, retiro, pago_servicio
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('monto', 10, 2);
            $table->string('estado')->default('proceso'); // proceso, aprobado, denegado
            $table->string('cci')->nullable();
            $table->string('referencia')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('transacciones');
    }
};
