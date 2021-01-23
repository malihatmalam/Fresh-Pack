<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $guarded = [];

    // Order - Order Detail (One to Many)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Product - Order Detail (One to Many) 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
