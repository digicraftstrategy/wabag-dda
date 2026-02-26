<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SectorBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_page_id',
        'type',
        'label',
        'content',
        'position',
        'is_visible',
    ];

    protected $casts = [
        'content' => 'array',
        'is_visible' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function page()
    {
        return $this->belongsTo(SectorPage::class, 'sector_page_id');
    }

    public function items()
    {
        return $this->hasMany(SectorBlockItem::class)
            ->orderBy('position');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isTable(): bool
    {
        return $this->type === 'table';
    }

    public function isStats(): bool
    {
        return $this->type === 'stats_grid';
    }
}
