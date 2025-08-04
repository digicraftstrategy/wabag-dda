<?php

namespace Database\Seeders;

use App\Models\NewsUpdate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class NewsUpdateSeeder extends Seeder
{
    public function run(): void
    {
        NewsUpdate::insert([
            [
                'title' => 'New Classroom Buildings Opened at Lakolam Primary',
                'slug' => Str::slug('New Classroom Buildings Opened at Lakolam Primary'),
                'newsupdate_category_id' => 4, // Education
                'featured_image' => 'news-updates/classrooms.jpg',
                'content' => '<p>Two double classrooms funded by DSIP were officially opened at Lakolam Primary School by the Wabag DDA. The project aims to reduce overcrowding and improve learning conditions for over 300 students.</p>',
                'published_date' => Carbon::parse('2024-06-15'),
                'is_published' => true,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Health Awareness Held in Aipus Village',
                'slug' => Str::slug('Health Awareness Held in Aipus Village'),
                'newsupdate_category_id' => 3, // Health
                'featured_image' => 'news-updates/health-awareness.jpg',
                'content' => '<p>A joint health awareness campaign was conducted in Aipus by the Enga Provincial Health team and Wabag District health officers, focusing on TB and COVID-19 prevention measures.</p>',
                'published_date' => Carbon::parse('2024-05-28'),
                'is_published' => true,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sakarip Bridge Temporarily Closed Due to Landslide',
                'slug' => Str::slug('Sakarip Bridge Temporarily Closed Due to Landslide'),
                'newsupdate_category_id' => 10, // Disaster Alerts
                'featured_image' => 'news-updates/landslide.jpg',
                'content' => '<p>The Sakarip bridge has been closed to heavy vehicles following a landslide after recent rains. Authorities are assessing the damage, and travelers are advised to use alternative routes.</p>',
                'published_date' => Carbon::parse('2024-04-10'),
                'is_published' => true,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Wabag Market Gets Major Upgrade',
                'slug' => Str::slug('Wabag Market Gets Major Upgrade'),
                'newsupdate_category_id' => 5, // Infrastructure
                'featured_image' => 'news-updates/wabag-market.jpg',
                'content' => '<p>Vendors and customers are celebrating the reopening of the Wabag Town Market after a 6-month upgrade that added new stalls, lighting, and sanitation facilities.</p>',
                'published_date' => Carbon::parse('2024-03-20'),
                'is_published' => true,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Police Community Outreach in Wabag Urban',
                'slug' => Str::slug('Police Community Outreach in Wabag Urban'),
                'newsupdate_category_id' => 9, // Government
                'featured_image' => 'news-updates/police-outreach.jpg',
                'content' => '<p>Local police conducted a successful community outreach in Wabag Urban to address law-and-order concerns and encourage youth participation in community policing initiatives.</p>',
                'published_date' => Carbon::parse('2024-02-11'),
                'is_published' => true,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
