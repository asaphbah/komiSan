<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->date('birth'); // Data de nascimento, opcional (nullable)
            $table->string('username')->unique(); // Nome de usuário único
            $table->string('img_cover')->nullable(); // URL da foto de capa, opcional (nullable)
            $table->string('img_user')->nullable(); // URL da foto do usuário, opcional (nullable)
            $table->text('bio')->nullable(); // Biografia, opcional (nullable)
            $table->boolean('artist')->default(false); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
