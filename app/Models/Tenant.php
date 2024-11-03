<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tenant extends Model
{
    protected $guarded = ['id'];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
