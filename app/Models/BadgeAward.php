<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function badge(): BelongsTo
    {
        return $this->belongsTo(Badge::class);
    }

    public function entries(): HasMany
    {
        return $this->hasMany(GotBookEntry::class);
    }

    public function tourist(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
