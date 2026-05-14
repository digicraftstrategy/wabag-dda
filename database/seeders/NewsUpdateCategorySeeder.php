<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsUpdateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        DB::table('newsupdate_categories')->upsert([
            [
                'category' => 'Announcements',
                'slug' => 'announcements',
                'description' => 'Important public announcements and alerts.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Projects',
                'slug' => 'projects',
                'description' => 'Updates on ongoing and upcoming projects.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Health',
                'slug' => 'health',
                'description' => 'News related to community health and medical updates.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Education',
                'slug' => 'education',
                'description' => 'Education sector updates including schools and scholarships.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Infrastructure',
                'slug' => 'infrastructure',
                'description' => 'Development and maintenance of public infrastructure.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Environment',
                'slug' => 'environment',
                'description' => 'Climate, conservation, and environmental protection news.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Sports',
                'slug' => 'sports',
                'description' => 'Local sports events and athletic achievements.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Culture',
                'slug' => 'culture',
                'description' => 'Cultural programs, traditions, and community celebrations.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Government',
                'slug' => 'government',
                'description' => 'Official government policies, notices, and meetings.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'category' => 'Disaster Alerts',
                'slug' => 'disaster-alerts',
                'description' => 'Emergency alerts and disaster preparedness news.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ], ['slug'], ['category', 'description', 'updated_at']);
    }
}