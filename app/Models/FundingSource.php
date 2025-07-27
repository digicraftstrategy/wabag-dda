<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingSource extends Model
{
    use HasFactory;

    protected $table = 'funding_sources';

    protected $fillable = [
        'funding_source',
        'code',
        'description',
        'type',
        'government_level',
        'recurring',
        'fiscal_year',
        'is_active',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
