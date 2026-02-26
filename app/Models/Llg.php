<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llg extends Model
{
    use HasFactory;

    protected $table = 'llgs';

    protected $fillable = [
        'name',
        'code',
    ];

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }

    public function primaryProjects()
    {
        return $this->hasMany(Project::class, 'llg_id');
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_llg');
    }

}

