<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SectorBlockItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector_block_id',
        'data',
        'position',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function block()
    {
        return $this->belongsTo(SectorBlock::class, 'sector_block_id');
    }
}
