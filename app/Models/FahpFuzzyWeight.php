<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FahpFuzzyWeight extends Model
{
    use HasFactory;

    public function getSegStringAttribute()
    {
        return "{$this->seg1},{$this->seg2},{$this->seg3}";
    }
}
