<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Commodity extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'office_id'
    ];

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'office'    => $this->office->name ?? '',
        ];
    }
}
