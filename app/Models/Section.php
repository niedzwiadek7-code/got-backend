<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;

    public function mountainRange(): HasMany
    {
        return $this->hasMany(MountainRange::class);
    }

    public function terrainPointA(): HasOne
    {
        return $this->hasOne(TerrainPoint::class, "id" ,"terrain_point_a_id");
    }

    public function terrainPointB(): HasOne
    {
        return $this->hasOne(TerrainPoint::class, "id",  "terrain_point_b_id");
    }

    public function tripPlanEntries(): HasMany
    {
        return $this->hasMany(TripPlanEntry::class);
    }

    public function gotBookEntries(): HasMany
    {
        return $this->hasMany(GotBookEntry::class);
    }

    public function blockedPeriods(): HasMany
    {
        return $this->hasMany(SectionBlockedPeriod::class);
    }

}
