<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tenant extends Model
{
    protected $guarded = ['id'];

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'tenant_users');
    }

    public function projects(): HasMany {
        return $this->hasMany(Project::class);
    }
}
