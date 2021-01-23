<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $guarded = [];
 
    // Order - Delivery (One to One)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Courir - Delivery (One to One)
    public function courir()
    {
        return $this->belongsTo(Courir::class);
    }
}
