<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MountainRange extends Model
{
    use HasFactory;

    public function mountainGroup(): HasOne
    {
        return $this->hasOne(MountainGroup::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
}
