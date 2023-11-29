<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BadgeAward extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'badge_id',
        'grant_date',
        'badge_award_status',
        'points_from_previous_badge',
    ];

    public function badge(): HasOne
    {
        return $this->hasOne(Badge::class);
    }

    public function entries(): HasMany
    {
        return $this->hasMany(GotBookEntry::class);
    }

    public function tourist(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
