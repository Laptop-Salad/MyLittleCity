<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function cities(): HasMany {
        return $this->hasMany(City::class);
    }

    public function buildings(): HasManyThrough {
        return $this->hasManyThrough(Building::class, City::class);
    }

    public function people(): HasMany {
        return $this->hasMany(Person::class);
    }
}
