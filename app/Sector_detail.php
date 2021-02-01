<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector_detail extends Model
{
    protected $guarded = [];

    // City - Sector Detail  (One to One)
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    
}
