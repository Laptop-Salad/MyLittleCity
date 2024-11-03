<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PersonAddress extends Model
{
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function (self $model) {
            $addressable = $model->addressable;

            if ($addressable instanceof Building) {
                $model->city_id = $addressable->city_id;
            }
        });
    }


    public function person(): BelongsTo {
        return $this->belongsTo(Person::class);
    }

    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }

    public function addressable(): MorphTo {
        return $this->morphTo();
    }
}
