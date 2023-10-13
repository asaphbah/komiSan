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
        Schema::create('resends', function (Blueprint $table) {
            $table->id();
            $table->string('resend');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('request_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('artist_id')->references('id')->on('users');
            $table->foreign('request_id')->references('id')->on('request_artists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resends');
    }
};
