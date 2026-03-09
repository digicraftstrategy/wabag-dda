<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('explore_wabag_items', function (Blueprint $table) {
            $table->text('detail_intro')->nullable()->after('description');
            $table->json('highlights')->nullable()->after('detail_intro');
            $table->json('tips')->nullable()->after('highlights');
            $table->json('checklist')->nullable()->after('tips');
            $table->json('itinerary')->nullable()->after('checklist');
            $table->json('locations')->nullable()->after('itinerary');
            $table->string('best_time')->nullable()->after('locations');
            $table->string('duration')->nullable()->after('best_time');
            $table->string('difficulty')->nullable()->after('duration');
            $table->string('opening_hours')->nullable()->after('difficulty');
            $table->string('price_info')->nullable()->after('opening_hours');
            $table->text('getting_there')->nullable()->after('price_info');
            $table->text('safety_notes')->nullable()->after('getting_there');
            $table->text('contact_info')->nullable()->after('safety_notes');
        });
    }

    public function down(): void
    {
        Schema::table('explore_wabag_items', function (Blueprint $table) {
            $table->dropColumn([
                'detail_intro',
                'highlights',
                'tips',
                'checklist',
                'itinerary',
                'locations',
                'best_time',
                'duration',
                'difficulty',
                'opening_hours',
                'price_info',
                'getting_there',
                'safety_notes',
                'contact_info',
            ]);
        });
    }
};
