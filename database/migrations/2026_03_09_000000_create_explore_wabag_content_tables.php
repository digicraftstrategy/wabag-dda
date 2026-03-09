<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('explore_wabag_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('explore_wabag_items', function (Blueprint $table) {
            $table->id();
            $table->string('category_label')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->string('icon')->nullable();
            $table->string('link_label')->nullable();
            $table->string('link_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('explore_wabag_items');
        Schema::dropIfExists('explore_wabag_sections');
    }
};
