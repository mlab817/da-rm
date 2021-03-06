<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commodity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'office_id'
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }
}
