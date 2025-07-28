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

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
