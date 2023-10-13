<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title'); // Título do chat
            $table->unsignedBigInteger('request_id'); // ID do pedido
            $table->unsignedBigInteger('user_id'); // ID do usuário (cliente)
            $table->unsignedBigInteger('artist_id'); // ID do artista
            $table->string('status'); // Status do chat
            
            // Define as chaves estrangeiras para 'request_id', 'user_id', e 'artist_id'
            $table->foreign('request_id')->references('id')->on('request_artists')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
};