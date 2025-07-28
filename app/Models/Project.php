<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'project_code',
        'name',
        'description',
        'location',
        'coordinates',
        'project_type_id',
        'funding_source_id',
        'llg_id',
        'ward_id',
        'budget',
        'amount_spent',
        'start_date',
        'expected_end_date',
        'actual_end_date',
        'status',
        'progress_percentage',
        'feature_image',
        'approved',
        'approved_at',
        'approved_by',
    ];

    public function projectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function fundingSource()
    {
        return $this->belongsTo(FundingSource::class);
    }

    public function llg()
    {
        return $this->belongsTo(Llg::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
