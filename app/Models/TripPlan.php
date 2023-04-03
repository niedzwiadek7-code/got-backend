<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TripPlan extends Model
{
    use HasFactory;

    public function tourist(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function tripPlanEntries(): HasMany
    {
        return $this->hasMany(TripPlanEntry::class);
    }
}
