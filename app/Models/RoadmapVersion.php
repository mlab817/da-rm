<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoadmapVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'roadmap_id',
        'title',
        'url',
        'date',
    ];

    protected $with = [
        'roadmap',
        'report',
    ];

    public function compliance_reviews(): HasMany
    {
        return $this->hasMany(ComplianceReview::class);
    }

    public function roadmap(): BelongsTo
    {
        return $this->belongsTo(Roadmap::class);
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
