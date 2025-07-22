<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsUpdateCategory extends Model
{
    use HasFactory;

    protected $table = 'newsupdate_categories';

    protected $fillable = [
        'category',
        'slug',
        'description',
    ];

    public function newsUpdates()
    {
        return $this->hasMany(NewsUpdate::class, 'newsupdate_category_id');
    }
}
