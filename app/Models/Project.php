<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'project_code',
        'title',
        'description',
        'location',
        'coordinates',
        'llg_id',
        'ward_id',
        'project_type_id',
        'funding_source_id',
        'budget',
        'amount_spent',
        'start_date',
        'expected_end_date',
        'actual_end_date',
        'status',
        'progress_percentage',
        'featured_image',
        'is_public',
        'published_at',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'start_date' => 'date',
        'expected_end_date' => 'date',
        'actual_end_date' => 'date',
        'published_at' => 'datetime',
        'is_public' => 'boolean',
        'budget' => 'decimal:2',
        'amount_spent' => 'decimal:2',
    ];

    /**
     * Status constants for easy reference
     */
    public const STATUS_PLANNED = 'planned';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_DELAYED = 'delayed';
    public const STATUS_CANCELLED = 'cancelled';

    /**
     * Relationships
     */
    public function llg()
    {
        return $this->belongsTo(Llg::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function type()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    public function fundingSource()
    {
        return $this->belongsTo(FundingSource::class);
    }

    // Relationship to creator
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship to last updater
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function updates()
    {
        return $this->hasMany(ProjectUpdate::class)->latest();
    }
    protected static function booted()
    {
        static::creating(function (Project $project) {
            // Ensure created_by is set
            if (empty($project->created_by)) {
                $project->created_by = auth()->id();
            }
            // Always set updated_by on create
            $project->updated_by = auth()->id();
        });

        static::updating(function (Project $project) {
            // Always update updated_by
            $project->updated_by = auth()->id();
        });
    }

    /**
     * Accessors
     */
    public function getFeaturedImageUrlAttribute()
    {
        return $this->featured_image ? Storage::url($this->featured_image) : asset('images/default-project.jpg');
    }

    public function getStatusLabelAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->status));
    }

    public function getDaysRemainingAttribute()
    {
        if ($this->actual_end_date || !$this->expected_end_date) return null;

        return now()->diffInDays($this->expected_end_date, false);
    }

    public function getBudgetUtilizationAttribute()
    {
        if ($this->budget == 0) return 0;
        return round(($this->amount_spent / $this->budget) * 100, 2);
    }

    public function getIsOverdueAttribute()
    {
        return $this->status === self::STATUS_DELAYED ||
               (!$this->actual_end_date && $this->expected_end_date && now()->gt($this->expected_end_date));
    }

    /**
     * Scopes
     */
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', [self::STATUS_APPROVED, self::STATUS_IN_PROGRESS]);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', self::STATUS_COMPLETED);
    }

    public function scopeDelayed($query)
    {
        return $query->where('status', self::STATUS_DELAYED);
    }

    public function scopeByWard($query, $wardId)
    {
        return $query->where('ward_id', $wardId);
    }

    /**
     * Business Logic Methods
     */
    public function markAsCompleted()
    {
        $this->update([
            'status' => self::STATUS_COMPLETED,
            'actual_end_date' => now(),
            'progress_percentage' => 100
        ]);
    }

    public function publish(User $publisher)
    {
        $this->update([
            'is_public' => true,
            'published_at' => now(),
            'published_by' => $publisher->id
        ]);
    }

    public function unpublish()
    {
        $this->update(['is_public' => false]);
    }

    public function updateProgress(int $percentage, string $notes = null)
    {
        $this->update([
            'progress_percentage' => $percentage,
            'status' => $percentage >= 100 ? self::STATUS_COMPLETED : $this->status
        ]);

        if ($notes) {
            $this->updates()->create([
                'progress_percentage' => $percentage,
                'update_text' => $notes,
                'created_by' => auth()->id()
            ]);
        }
    }

    public function flagAsDelayed(string $reason)
    {
        $this->update([
            'status' => self::STATUS_DELAYED
        ]);

        $this->updates()->create([
            'update_text' => "Project delayed. Reason: $reason",
            'created_by' => auth()->id()
        ]);
    }

    /**
     * Helper Methods
     */
    public function remainingBudget()
    {
        return $this->budget - $this->amount_spent;
    }

    public function timelineProgress()
    {
        if (!$this->start_date || !$this->expected_end_date) return 0;

        $totalDays = $this->start_date->diffInDays($this->expected_end_date);
        $daysPassed = $this->start_date->diffInDays(now());

        return $totalDays > 0 ? min(100, round(($daysPassed / $totalDays) * 100, 2)) : 100;
    }
}
