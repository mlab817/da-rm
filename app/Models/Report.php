<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;

class Report extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'office_id',
        'commodity_id',
        'start_date',
        'participants_involved',
        'activities_done',
        'activities_ongoing',
        'overall_status',
        'report_date',
        'report_period_id',
        'user_id',
        'upload_id',
    ];

    protected $casts = [
        'report_date' => 'datetime:Y-m-d'
    ];

    protected $appends = [
        'title',
    ];

    public function commodities(): BelongsToMany
    {
        return $this->belongsToMany(Commodity::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function report_period(): BelongsTo
    {
        return $this->belongsTo(ReportPeriod::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function upload(): BelongsTo
    {
        return $this->belongsTo(Upload::class);
    }

    public function getTitleAttribute(): string
    {
        return ($this->office && $this->report_period)
            ? $this->office->short_name . ' as of ' . $this->report_period->name
            : '';
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'participants_involved' => $this->participants_involved,
            'activities_done' => $this->activities_done,
            'activities_ongoing' => $this->activities_ongoing,
            'overall_status' => $this->overall_status,
        ];
    }
}
