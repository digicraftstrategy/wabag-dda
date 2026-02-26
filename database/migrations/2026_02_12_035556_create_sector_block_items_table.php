<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sector_block_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('sector_block_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->json('data'); 
            // Example for table row:
            // { "level": "Primary", "total": 12, "govt": 6 }

            $table->integer('position')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sector_block_items');
    }
};
