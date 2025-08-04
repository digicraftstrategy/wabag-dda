<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class NewsUpdate extends Model
{
    use HasFactory;

    protected $table = 'newsupdates';

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

    protected $casts = [
        'published_date' => 'datetime',
        'is_published' => 'boolean'
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
            $model->slug = Str::slug($model->title);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->title);
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getFormattedPublishedDateAttribute()
    {
        return $this->published_date
            ? $this->published_date->format('F j, Y')
            : null;
    }
}
