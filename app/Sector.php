<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $guarded = [];

    // Sector - Order (One to Many)
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    // Sector - Customer (One to Many)
    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    // Sector - User (One to Many)
    public function user()
    {
        return $this->hasMany(User::class);
    }
    
    // Sector - Sector Detail (One to Many)
    public function sector_detail()
    {
        return $this->hasMany(Sector_detail::class);
    }

    // Sector - Courir (One to Many)
    public function courir()
    {
        return $this->hasMany(Courir::class);
    }


}
