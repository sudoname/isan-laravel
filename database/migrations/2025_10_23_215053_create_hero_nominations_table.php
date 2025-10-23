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
        Schema::create('hero_nominations', function (Blueprint $table) {
            $table->id();
            $table->string('nominee_name');
            $table->string('nominee_title')->nullable();
            $table->string('category');
            $table->text('reason');
            $table->text('achievements')->nullable();
            $table->string('nominator_name');
            $table->string('nominator_email');
            $table->string('nominator_phone')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_nominations');
    }
};
