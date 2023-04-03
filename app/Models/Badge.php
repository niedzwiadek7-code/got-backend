<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Badge extends Model
{
    use HasFactory;

    public function awards(): HasMany
    {
        return $this->hasMany(BadgeAward::class);
    }

    public function previousBadge(): HasOne
    {
        return $this->hasOne("previous_badge");
    }

    public function nextBadge(): HasOne
    {
        return $this->hasOne("nextBadge");
    }
}
