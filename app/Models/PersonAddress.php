<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonAddress extends Model
{
    protected $guarded = ['id'];

    public function person(): BelongsTo {
        return $this->belongsTo(Person::class);
    }

    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }
}
