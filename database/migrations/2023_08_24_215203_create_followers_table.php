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
        Schema::create('followers', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('follower'); // ID do seguidor
            $table->unsignedBigInteger('following'); // ID do usuário sendo seguido php artisan migrate
            
            $table->foreign('follower')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('following')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
