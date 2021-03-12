<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'commodity_id',
        'start_date',
    ];

    public function commodity(): BelongsTo
    {
        return $this->belongsTo(Commodity::class);
    }

    public function compliance_reviews(): HasManyThrough
    {
        return $this->hasManyThrough(ComplianceReview::class, RoadmapVersion::class);
    }

    public function focals(): HasMany
    {
        return $this->hasMany(Focal::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    public function roadmap_updates(): HasMany
    {
        return $this->hasMany(RoadmapUpdate::class);
    }

    public function roadmap_versions(): HasMany
    {
        return $this->hasMany(RoadmapVersion::class);
    }

    public function upload(): BelongsTo
    {
        return $this->belongsTo(Upload::class);
    }
}
