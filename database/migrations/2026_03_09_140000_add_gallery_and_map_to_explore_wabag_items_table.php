<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('explore_wabag_items', function (Blueprint $table) {
            $table->json('gallery_images')->nullable()->after('image_path');
            $table->decimal('latitude', 10, 7)->nullable()->after('gallery_images');
            $table->decimal('longitude', 10, 7)->nullable()->after('latitude');
            $table->string('map_embed_url')->nullable()->after('longitude');
        });
    }

    public function down(): void
    {
        Schema::table('explore_wabag_items', function (Blueprint $table) {
            $table->dropColumn(['gallery_images', 'latitude', 'longitude', 'map_embed_url']);
        });
    }
};
