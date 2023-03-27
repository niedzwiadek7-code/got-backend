<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BadgeAward extends Model
{
    use HasFactory;

    public function badge(): HasOne
    {
        return $this->hasOne(Badge::class);
    }

    public function tourist(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
