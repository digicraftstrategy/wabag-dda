<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop FK first (MySQL requirement)
            $table->dropForeign(['llg_id']);

            // Make llg_id nullable
            $table->foreignId('llg_id')
                ->nullable()
                ->change();

            // Re-add FK constraint
            $table->foreign('llg_id')
                ->references('id')
                ->on('llgs')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Drop FK again
            $table->dropForeign(['llg_id']);

            // Restore NOT NULL constraint
            $table->foreignId('llg_id')
                ->nullable(false)
                ->change();

            // Restore FK behavior
            $table->foreign('llg_id')
                ->references('id')
                ->on('llgs')
                ->cascadeOnDelete();
        });
    }
};
