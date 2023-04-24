<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SectionBlockedPeriod extends Model
{
    use HasFactory;

    public function section(): HasOne
    {
        return $this->hasOne(Section::class);
    }
}
