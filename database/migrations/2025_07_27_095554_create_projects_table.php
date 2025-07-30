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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // Common Information
            $table->string('project_code')->unique();
            $table->string('title');
            $table->text('description');

            // Location Information
            $table->string('location')->nullable();
            $table->string('coordinates')->nullable();
            $table->foreignId('llg_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ward_id')->constrained()->cascadeOnDelete();

            // Project categorization
            $table->foreignId('project_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('funding_source_id')->constrained()->cascadeOnDelete();

            // Financials
            $table->decimal('budget', 12, 2);
            $table->decimal('amount_spent', 12, 2)->default(0);

            // Timeline
            $table->date('start_date');
            $table->date('expected_end_date');
            $table->date('actual_end_date')->nullable();

            // Status tracking
            $table->enum('status', [
                'planned',
                'approved',
                'in_progress',
                'completed',
                'delayed',
                'cancelled'
            ])->default('planned');
            $table->integer('progress_percentage')->default(0);

            // Media
            $table->string('featured_image')->nullable();

            // Approval workflow
            $table->boolean('is_public')->default(false);
            $table->timestamp('published_at')->nullable();

            // Auditing
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
