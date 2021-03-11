<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplianceReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'roadmap_version_id',
        'outline_item_id',
        'finding',
        'recommendations',
        'remarks',
    ];

    public function outline_item(): BelongsTo
    {
        return $this->belongsTo(OutlineItem::class);
    }

    public function roadmap_version(): BelongsTo
    {
        return $this->belongsTo(RoadmapVersion::class);
    }
}
