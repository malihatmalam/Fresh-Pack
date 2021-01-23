<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courir extends Model
{
    protected $guarded = [];
    
    // Sector - Courir (One to Many)
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    // Courir - Delivery (One to One)
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
