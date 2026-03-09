<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExploreWabagSection extends Model
{
    use HasFactory;

    protected $table = 'explore_wabag_sections';

    protected $fillable = [
        'title',
        'subtitle',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
