<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectUpdate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'project_id',
        'progress_update',
        'progress_change',
        'new_progress_percentage',
        'images',
        'current_status_snapshot',
        //'additional_spending',
        'new_expected_end_date',
        'created_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'images' => 'array',
        //'additional_spending' => 'decimal:2',
        'new_expected_end_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
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
     * Get all available status options
     */
    public static function getStatusOptions(): array
    {
        return [
            self::STATUS_PLANNED,
            self::STATUS_APPROVED,
            self::STATUS_IN_PROGRESS,
            self::STATUS_COMPLETED,
            self::STATUS_DELAYED,
            self::STATUS_CANCELLED,
        ];
    }

    /**
     * Relationship to the Project
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relationship to the User who created the update
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope for updates that changed the timeline
     */
    public function scopeWithTimelineChanges($query)
    {
        return $query->whereNotNull('new_expected_end_date');
    }

    /**
     * Scope for updates with significant progress changes
     */
    public function scopeWithSignificantProgress($query, int $threshold = 10)
    {
        return $query->where('progress_change', '>=', $threshold);
    }

    /**
     * Accessor for formatted additional spending
     */
    public function getFormattedAdditionalSpendingAttribute(): string
    {
        return number_format($this->additional_spending, 2);
    }
}
