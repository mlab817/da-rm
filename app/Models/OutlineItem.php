<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OutlineItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_number',
        'title',
        'description',
        'parent_id',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(OutlineItem::class,'parent_id','id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(OutlineItem::class,'parent_id','id');
    }
}
