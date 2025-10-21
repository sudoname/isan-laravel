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
        Schema::create('onisans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('title')->default('Onisan'); // e.g., "His Royal Highness"
            $table->string('full_title')->nullable(); // Full royal title
            $table->text('short_description'); // Brief intro
            $table->longText('biography'); // Full biography
            $table->string('image_url')->nullable();
            $table->date('reign_start')->nullable(); // When reign started
            $table->date('reign_end')->nullable(); // When reign ended (null for current)
            $table->boolean('is_current')->default(false); // Is this the current Onisan?
            $table->json('achievements')->nullable(); // Notable achievements
            $table->json('development_projects')->nullable(); // Development initiatives
            $table->string('palace_address')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onisans');
    }
};
