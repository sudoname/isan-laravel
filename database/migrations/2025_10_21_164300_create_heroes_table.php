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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('title'); // e.g., "Professor", "Dr.", "Hon."
            $table->string('position'); // e.g., "Vice-Chancellor", "CEO"
            $table->string('category'); // e.g., "Academia", "Business", "Politics"
            $table->text('short_description'); // For tile display
            $table->longText('biography'); // Full biography for detail page
            $table->string('image_url')->nullable();
            $table->json('achievements')->nullable(); // Array of achievements
            $table->json('awards')->nullable(); // Array of awards
            $table->json('tags')->nullable(); // Array of tags
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('facebook_url')->nullable();
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
        Schema::dropIfExists('heroes');
    }
};
