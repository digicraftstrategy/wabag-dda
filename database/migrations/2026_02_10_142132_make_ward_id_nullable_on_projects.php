<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop FK first (required by MySQL)
            $table->dropForeign(['ward_id']);

            // Make ward_id nullable
            $table->foreignId('ward_id')
                ->nullable()
                ->change();

            // Re-add FK constraint
            $table->foreign('ward_id')
                ->references('id')
                ->on('wards')
                ->nullOnDelete(); // important for safety
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop FK again
            $table->dropForeign(['ward_id']);

            // Restore NOT NULL constraint
            $table->foreignId('ward_id')
                ->nullable(false)
                ->change();

            // Restore FK
            $table->foreign('ward_id')
                ->references('id')
                ->on('wards')
                ->cascadeOnDelete();
        });
    }
};
