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

    // Sector - City (One to Many)
    public function city()
    {
        return $this->hasMany(City::class);
    }

    // Sector - Courir (One to Many)
    public function courir()
    {
        return $this->hasMany(Courir::class);
    }


}
