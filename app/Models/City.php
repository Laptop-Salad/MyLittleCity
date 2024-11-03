<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function residents(): HasManyThrough
    {
        return $this->hasManyThrough(
            Person::class,// Final model we want to access (Person)
            PersonAddress::class, // Intermediate model (PersonAddress)
            'city_id', // Foreign key on PersonAddress (points to City)
            'id', // Foreign key on Person (points to PersonAddress's person_id)
            'id', // Local key on City (points to city_id in PersonAddress)
            'person_id' // Local key on PersonAddress (points to people.id)
        );
    }

    public function personAddresses(): HasMany {
        return $this->hasMany(PersonAddress::class);
    }
}
