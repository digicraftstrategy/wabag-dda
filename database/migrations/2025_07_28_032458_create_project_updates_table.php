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
        Schema::create('project_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();

            // Update Content
            $table->text('progress_update');
            $table->integer('progress_change')->default(0);
            $table->integer('new_progress_percentage');

             // Status context
            $table->enum('current_status_snapshot', [
                'planned',
                'approved',
                'in_progress',
                'completed',
                'delayed',
                'cancelled'
            ]);

            // Timeline updates
            $table->date('new_expected_end_date')->nullable();
            $table->json('images')->nullable();

            $table->timestamps();
            $table->foreignId('created_by')->constrained('users');

            // Indexes
            $table->index('project_id');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_updates');
    }
};
