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
        Schema::table('site_settings', function (Blueprint $table) {
            // Tile images for home page sections
            $table->string('tile_history_image')->nullable()->after('homepage_hero_subtitle');
            $table->string('tile_heroes_image')->nullable()->after('tile_history_image');
            $table->string('tile_attractions_image')->nullable()->after('tile_heroes_image');
            $table->string('tile_isan_day_image')->nullable()->after('tile_attractions_image');
            $table->string('tile_news_image')->nullable()->after('tile_isan_day_image');
            $table->string('tile_forum_image')->nullable()->after('tile_news_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'tile_history_image',
                'tile_heroes_image',
                'tile_attractions_image',
                'tile_isan_day_image',
                'tile_news_image',
                'tile_forum_image',
            ]);
        });
    }
};
