<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Focal extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'commodity_id',
        'name',
        'designation',
        'email',
        'office_id',
        'telephone_number',
        'fax_number',
        'mobile_number',
        'viber_number',
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function commodity(): BelongsTo
    {
        return $this->belongsTo(Commodity::class);
    }
}
