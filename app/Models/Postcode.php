<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Postcode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }

    public function getFullPostcodeAttribute(): string {
        return $this->area +
            $this->district +
            $this->sector +
            $this->unit;
    }
}
