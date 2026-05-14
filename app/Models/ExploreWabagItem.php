<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ExploreWabagItem extends Model
{
    use HasFactory;

    protected $table = 'explore_wabag_items';

    protected $fillable = [
        'category_label',
        'title',
        'slug',
        'description',
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
        'image_path',
        'gallery_images',
        'latitude',
        'longitude',
        'map_embed_url',
        'icon',
        'link_label',
        'link_url',
        'sort_order',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order' => 'integer',
        'highlights' => 'array',
        'tips' => 'array',
        'checklist' => 'array',
        'itinerary' => 'array',
        'locations' => 'array',
        'gallery_images' => 'array',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    protected static function booted()
    {
        static::creating(function (self $item) {
            if (! $item->slug) {
                $item->slug = Str::slug($item->title);
            }
        });

        static::updating(function (self $item) {
            $item->slug = Str::slug($item->title);
        });
    }
}
