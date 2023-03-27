<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class GotBookEntry extends Model
{
    use HasFactory;

    public function gotBook(): HasOne
    {
        return $this->hasOne(GotBook::class);
    }

    public function section(): HasOne
    {
        return $this->hasOne(Section::class);
    }

    public function badge(): HasOne
    {
        return $this->hasOne(Badge::class);
    }
}
