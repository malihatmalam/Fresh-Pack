<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    // Customer - Order (One to Many)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Sector - Order (One to Many)
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    // Order - Order Detail (One to Many)
    public function orderDetail()
    {
        return $this->hasMany(Order_detail::class);
    }

    // Order - Delivery (One to One)
    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
