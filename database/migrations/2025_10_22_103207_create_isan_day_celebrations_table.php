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
        Schema::create('isan_day_celebrations', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "Isan Day 2024"
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('full_description')->nullable();
            $table->date('celebration_date'); // The date of the celebration
            $table->string('location')->nullable(); // Where it was/will be held
            $table->string('theme')->nullable(); // Theme of the celebration
            $table->string('image_url')->nullable(); // Main image
            $table->json('gallery')->nullable(); // Array of gallery images
            $table->string('status')->default('upcoming'); // upcoming, completed, cancelled
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isan_day_celebrations');
    }
};
