<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sector_blocks', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sector_page_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('type'); 
            // heading | paragraph | table | stats_grid | note_box | image | divider

            $table->string('label')->nullable(); 
            // Admin internal label

            $table->json('content')->nullable(); 
            // Flexible content storage

            $table->integer('position')->default(0); 
            // Order of block on page

            $table->boolean('is_visible')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sector_blocks');
    }
};

