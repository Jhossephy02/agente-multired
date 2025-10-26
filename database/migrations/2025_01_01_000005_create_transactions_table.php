<?php 
// database/migrations/2025_01_01_000004_create_transactions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // quien ejecutó
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('type', ['deposit','withdraw','service_payment']);
            $table->decimal('amount', 12, 2);
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

