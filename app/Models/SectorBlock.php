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

    protected static function booted()
    {
        static::saving(function (SectorBlock $block) {
            if (! empty($block->label)) {
                return;
            }

            $content = $block->content ?? [];
            $heading = is_array($content) ? ($content['heading'] ?? null) : null;

            if (is_string($heading) && $heading !== '') {
                $block->label = $heading;
                return;
            }

            $labelMap = [
                'heading' => 'Heading',
                'paragraph' => 'Paragraph',
                'stats_grid' => 'Stats Grid',
                'table' => 'Table',
                'note' => 'Note',
                'divider' => 'Divider',
            ];

            $block->label = $labelMap[$block->type] ?? 'Block';
        });
    }

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
