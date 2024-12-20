<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'middle_names' => 'array',
    ];

    public function family(): BelongsTo {
        return $this->belongsTo(Family::class);
    }

    public function getName($include_first = true, $include_middle = true, $include_last = true): string {
        $name = "";

        if ($include_first) {
            $name .= $this->first_name;
        }

        if ($include_middle) {
            $name .=  " " . implode(" ", $this->middle_names);
        }

        if ($include_last) {
            $name .= " " . $this->family->name;
        }

        return $name;
    }

    public function personAddresses(): HasMany {
        return $this->hasMany(PersonAddress::class);
    }
}
