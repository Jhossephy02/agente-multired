<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->enum('tipo',['deposito','retiro','pago_servicio','tramite']);
            $table->decimal('monto',10,2);
            $table->string('cci')->nullable();
            $table->enum('estado',['pendiente','aprobado','denegado'])->default('pendiente');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('movimientos');
    }
};
