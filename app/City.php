<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    // Province - City (One to Many)
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    // Sector - City (One to Many)
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
