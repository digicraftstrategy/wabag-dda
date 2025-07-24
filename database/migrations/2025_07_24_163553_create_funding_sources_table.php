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
        Schema::create('funding_sources', function (Blueprint $table) {
            $table->id();
            $table->string('funding_source');
            $table->string('code');
            $table->string('description')->nullable();
            $table->enum('type', [
                'government',
                'donor',
                'private',
                'community',
                'other'
            ])->default('government');
            $table->string('government_level')->nullable(); // National, Provincial, District
            $table->boolean('recurring')->default(false); // Is this a recurring funding source?
            $table->string('fiscal_year')->nullable(); // FY2023, FY2024, etc.'
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funding_sources');
    }
};
