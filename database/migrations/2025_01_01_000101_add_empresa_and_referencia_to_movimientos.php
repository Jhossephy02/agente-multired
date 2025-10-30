<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('movimientos', function (Blueprint $table) {
            if (!Schema::hasColumn('movimientos', 'empresa_id')) {
                $table->foreignId('empresa_id')->nullable()->after('cliente_id')->constrained('empresas')->nullOnDelete();
            }
            if (!Schema::hasColumn('movimientos', 'referencia')) {
                $table->string('referencia', 100)->nullable()->after('monto');
            }
        });
    }

    public function down(): void
    {
        Schema::table('movimientos', function (Blueprint $table) {
            if (Schema::hasColumn('movimientos', 'empresa_id')) {
                $table->dropConstrainedForeignId('empresa_id');
            }
            if (Schema::hasColumn('movimientos', 'referencia')) {
                $table->dropColumn('referencia');
            }
        });
    }
};
