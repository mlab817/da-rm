<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Focal extends Model
{
    use HasFactory;
    use Searchable;

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

    public function toSearchableArray(): array
    {
        return [
            'id'                => $this->id,
            'status'            => $this->status,
            'commodity'         => $this->commodity->name ?? '',
            'name'              => $this->name,
            'designation'       => $this->designation,
            'email'             => $this->email,
            'office_id'         => $this->office->name ?? '',
            'telephone_number'  => $this->telephone_number,
            'fax_number'        => $this->fax_number,
            'mobile_number'     => $this->mobile_number,
            'viber_number'      => $this->viber_number,
        ];
    }
}
