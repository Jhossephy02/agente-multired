<?php

namespace App\Models;
// database/migrations/2025_01_01_000001_add_role_to_users.php
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class User extends Authenticatable
{
    use HasFactory, Notifiable;
};

class AddRoleToUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin','worker'])->default('worker')->after('email');
            $table->string('phone')->nullable()->after('role');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role','phone']);
        });
    }
}