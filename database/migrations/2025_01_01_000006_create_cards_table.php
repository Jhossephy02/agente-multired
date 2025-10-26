<?php
// database/migrations/2025_01_01_000003_create_cards_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained('clients')->onDelete('set null');
            $table->string('bank')->nullable(); // nombre banco
            $table->string('card_alias')->nullable(); // "Visa del cliente"
            $table->string('last4')->nullable(); // últimos 4 dígitos (no almacenar PAN completo)
            $table->string('brand')->nullable(); // "Visa", "Mastercard"
            $table->string('country')->default('PE'); // Perú
            $table->string('currency')->default('PEN');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
