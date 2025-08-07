<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ward_number',
        'name',
        'llg_id',
    ];

    /**
     * Get the LLG that owns the Ward.
     */
    public function llg()
    {
        return $this->belongsTo(Llg::class);
    }

    /**
     * Get the projects for the Ward.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
