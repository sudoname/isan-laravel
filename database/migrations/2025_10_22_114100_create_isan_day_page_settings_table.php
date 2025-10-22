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
        Schema::create('isan_day_page_settings', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_image')->nullable();

            // About Section
            $table->string('about_image')->nullable();

            // Event Highlights (6 cards)
            $table->string('highlight_cultural_image')->nullable();
            $table->string('highlight_reception_image')->nullable();
            $table->string('highlight_sports_image')->nullable();
            $table->string('highlight_summit_image')->nullable();
            $table->string('highlight_cuisine_image')->nullable();
            $table->string('highlight_gala_image')->nullable();

            // CTA Sections
            $table->string('cta_image')->nullable();
            $table->string('final_cta_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isan_day_page_settings');
    }
};
