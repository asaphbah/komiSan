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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('artist_id'); // ID of the artist
            $table->unsignedBigInteger('request_id'); // ID of the artist
            $table->unsignedBigInteger('client_id'); // ID of the client
            $table->integer('rating'); // Rating from 0 to 5
            $table->string('assessment_type'); // Type of assessment
            $table->text('comment')->nullable(); // Comment

            $table->foreign('artist_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('request_id')->references('id')->on('request_artists')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};