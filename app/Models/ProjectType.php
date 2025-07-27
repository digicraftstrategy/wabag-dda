<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    protected $table = 'project_types';

    protected $fillable = [
        'type',
        'code',
        'description',
        'is_active'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
