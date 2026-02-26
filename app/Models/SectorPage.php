<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class SectorPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_id',
        'title',
        'slug',
        'excerpt',
        'is_published',
        'published_at',
    ];


    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function blocks()
    {
        return $this->hasMany(SectorBlock::class)
            ->orderBy('position');
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

}
