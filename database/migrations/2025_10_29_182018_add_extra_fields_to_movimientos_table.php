<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('movimientos', function (Blueprint $table) {
            if (!Schema::hasColumn('movimientos','cci')) $table->string('cci', 60)->nullable();
            if (!Schema::hasColumn('movimientos','dni')) $table->string('dni', 20)->nullable();
            if (!Schema::hasColumn('movimientos','telefono')) $table->string('telefono', 30)->nullable();
            if (!Schema::hasColumn('movimientos','correo')) $table->string('correo', 120)->nullable();
            if (!Schema::hasColumn('movimientos','referencia')) $table->string('referencia', 120)->nullable();
            if (!Schema::hasColumn('movimientos','detalle')) $table->string('detalle', 200)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('movimientos', function (Blueprint $table) {
            $table->dropColumn(['cci','dni','telefono','correo','referencia','detalle']);
        });
    }
};
