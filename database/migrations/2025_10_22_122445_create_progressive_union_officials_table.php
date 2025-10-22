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
        Schema::create('progressive_union_officials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->integer('year_from');
            $table->integer('year_to')->nullable();
            $table->string('image')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progressive_union_officials');
    }
};
