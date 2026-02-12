<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Education Sector
            $table->string('slug')->unique(); // education-sector
            $table->string('badge_label')->nullable(); // Education Sector (optional display label)
            $table->string('badge_color')->nullable(); // yellow, green, blue etc.
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors');
    }
};

