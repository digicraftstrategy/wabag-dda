<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsUpdateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('newsupdate_categories')->insert([
            [
                'category' => 'Announcements',
                'slug' => 'announcements',
                'description' => 'Important public announcements and alerts.',
            ],
            [
                'category' => 'Projects',
                'slug' => 'projects',
                'description' => 'Updates on ongoing and upcoming projects.',
            ],
            [
                'category' => 'Health',
                'slug' => 'health',
                'description' => 'News related to community health and medical updates.',
            ],
            [
                'category' => 'Education',
                'slug' => 'education',
                'description' => 'Education sector updates including schools and scholarships.',
            ],
            [
                'category' => 'Infrastructure',
                'slug' => 'infrastructure',
                'description' => 'Development and maintenance of public infrastructure.',
            ],
            [
                'category' => 'Environment',
                'slug' => 'environment',
                'description' => 'Climate, conservation, and environmental protection news.',
            ],
            [
                'category' => 'Sports',
                'slug' => 'sports',
                'description' => 'Local sports events and athletic achievements.',
            ],
            [
                'category' => 'Culture',
                'slug' => 'culture',
                'description' => 'Cultural programs, traditions, and community celebrations.',
            ],
            [
                'category' => 'Government',
                'slug' => 'government',
                'description' => 'Official government policies, notices, and meetings.',
            ],
            [
                'category' => 'Disaster Alerts',
                'slug' => 'disaster-alerts',
                'description' => 'Emergency alerts and disaster preparedness news.',
            ],
        ]);
    }
}
