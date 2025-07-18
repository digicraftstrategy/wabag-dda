<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsUpdate extends Model
{
    protected $table = 'newsupdates';

    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'featured_image',
        'published_date',
        'is_published',
        'user_id',
        'news_category_id',
    ];

    public function newsCategory()
    {
        return $this->belongsTo(NewsUpdateCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
