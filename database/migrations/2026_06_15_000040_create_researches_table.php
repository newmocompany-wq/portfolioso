<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('researches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedSmallInteger('year');
            $table->text('abstract');
            $table->json('authors');
            $table->json('keywords')->nullable();
            $table->string('journal')->nullable();
            $table->string('conference')->nullable();
            $table->string('doi')->nullable();
            $table->string('link')->nullable();
            $table->string('pdf')->nullable();
            $table->string('cover')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('researches');
    }
};
