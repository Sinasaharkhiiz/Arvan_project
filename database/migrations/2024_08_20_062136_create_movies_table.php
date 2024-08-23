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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('Poster')->default("movie_poster/poster.png");
            $table->string('Title');
            $table->integer('Year');
            $table->integer('Duration')->nullable();
            $table->string('Genre');
            $table->float('Rating')->nullable();
            $table->string('Director');
            $table->string('Cast')->nullable();
            $table->string('Description')->nullable();
            $table->unsignedBigInteger('Publisher_id')->nullable();
            $table->foreign('publisher_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
