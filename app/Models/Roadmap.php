<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'commodity_id',
        'start_date',
        'participants_involved',
        'activities_done',
        'activities_ongoing',
        'overall_status',
        'report_date',
    ];

    public function commodity(): BelongsTo
    {
        return $this->belongsTo(Commodity::class);
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    public function upload(): BelongsTo
    {
        return $this->belongsTo(Upload::class);
    }
}
