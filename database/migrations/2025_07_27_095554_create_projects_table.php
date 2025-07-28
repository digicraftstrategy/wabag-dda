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
            $table->string('project_code')->unique();
            $table->string('name');
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('coordinates')->nullable();

            $table->foreignId('project_type_id')->constrained();
            $table->foreignId('funding_source_id')->constrained();
            $table->foreignId('llg_id')->constrained();
            $table->foreignId('ward_id')->constrained();

            $table->decimal('budget', 10, 2);
            $table->decimal('amount_spent', 10, 2)->default(0);

            $table->date('start_date');
            $table->date('expected_end_date');
            $table->date('actual_end_date')->nullable();

            $table->enum('status', [
                'planned',
                'tendering',
                'awarded',
                'in_progress',
                'completed',
                'suspended',
                'terminated'
            ])->default('planned');
            $table->integer('progress_percentage')->default(0);

            $table->string('featured_image')->nullable();

            $table->boolean('approved')->default(false);
            $table->date('approved_at')->nullable();
            $table->string('approved_by')->nullable();

            $table->softDeletes();
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
