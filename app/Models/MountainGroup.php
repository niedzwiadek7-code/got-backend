<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MountainGroup extends Model
{
    use HasFactory;

    public function leaders(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function mountainRanges(): HasMany
    {
        return $this->hasMany(MountainRange::class);
    }
}
