<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExploreWabagSection;
use App\Models\ExploreWabagItem;

class ExploreWabagSeeder extends Seeder
{
    public function run(): void
    {
        $section = ExploreWabagSection::updateOrCreate(
            ['title' => 'Explore Wabag District'],
            [
                'subtitle' => 'Discover the rich cultural heritage and natural beauty of our Highlands home',
                'is_published' => true,
            ]
        );

        $items = [
            [
                'category_label' => 'CULTURAL HERITAGE',
                'title' => 'Traditional Sing-Sing Festivals',
                'description' => 'Experience our vibrant cultural festivals featuring traditional dances, elaborate headdresses, and sacred rituals passed down through generations.',
                'icon' => 'cultural',
                'link_label' => 'Learn More',
                'link_url' => '/culture',
                'sort_order' => 1,
            ],
            [
                'category_label' => 'NATURAL WONDERS',
                'title' => 'Highlands Landscapes',
                'description' => "Explore our breathtaking mountain vistas, pristine rivers, and fertile valleys that make Wabag one of PNG's most beautiful districts.",
                'icon' => 'nature',
                'link_label' => 'Explore',
                'link_url' => '/tourism',
                'sort_order' => 2,
            ],
            [
                'category_label' => 'COMMUNITY',
                'title' => 'Local Artisans & Crafts',
                'description' => 'Support our talented weavers, carvers, and artisans who create traditional bilums, sculptures, and artifacts using centuries-old techniques.',
                'icon' => 'community',
                'link_label' => 'Discover',
                'link_url' => '/artisans',
                'sort_order' => 3,
            ],
            [
                'category_label' => 'ADVENTURE',
                'title' => 'Mountain Treks & Trails',
                'description' => 'Take guided hikes through rugged ranges and cloud forests that showcase the Highlands’ dramatic terrain and biodiversity.',
                'icon' => 'nature',
                'link_label' => 'Plan a Trek',
                'link_url' => '/trekking',
                'sort_order' => 4,
            ],
            [
                'category_label' => 'AGRICULTURE',
                'title' => 'Coffee & Market Gardens',
                'description' => 'Visit local growers and markets to taste fresh Highlands produce and learn about community-based agriculture.',
                'icon' => 'community',
                'link_label' => 'Visit Markets',
                'link_url' => '/agriculture',
                'sort_order' => 5,
            ],
            [
                'category_label' => 'HISTORY',
                'title' => 'Heritage Sites & Stories',
                'description' => 'Discover meaningful places and oral histories that keep Wabag’s identity and traditions alive.',
                'icon' => 'cultural',
                'link_label' => 'Read Stories',
                'link_url' => '/heritage',
                'sort_order' => 6,
            ],
        ];

        foreach ($items as $item) {
            ExploreWabagItem::updateOrCreate(
                [
                    'title' => $item['title'],
                ],
                array_merge($item, [
                    'slug' => \Illuminate\Support\Str::slug($item['title']),
                    'is_published' => true,
                ])
            );
        }
    }
}
