<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Customer - Order (One to Many)
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    // Sector - Customer (One to Many)
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

}
