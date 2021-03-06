<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
    ];

    public function commodities(): BelongsToMany
    {
        return $this->belongsToMany(Commodity::class);
    }
}
