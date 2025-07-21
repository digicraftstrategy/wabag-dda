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
        'newsupdate_category_id',
    ];

    public function newsCategory()
    {
        return $this->belongsTo(NewsUpdateCategory::class, 'newsupdate_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

public function getFormattedPublishedDateAttribute()
    {
        return $this->published_date
            ? \Carbon\Carbon::parse($this->published_date)->format('F j, Y')
            : null;
    }
}
