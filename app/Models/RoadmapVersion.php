<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function compliance_reviews(): HasMany
    {
        return $this->hasMany(ComplianceReview::class);
    }
}
