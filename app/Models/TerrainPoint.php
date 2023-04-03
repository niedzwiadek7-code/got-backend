<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TerrainPoint extends Model
{
    use HasFactory;

    public function terrainPointAs(): HasMany
    {
        return $this->hasMany("terrain_point_a");
    }

    public function terrainPointBs(): HasMany
    {
        return $this->hasMany("terrain_point_b");
    }
}
