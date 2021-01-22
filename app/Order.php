<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'kode',
        'name',
        'email',
        'telephone',
        'total_livestock',
        'message',
        'tgl_beli',
        'tgl_antar',
        'tgl_pesan',
        'address',
        'manager_notes',
        'delivery_price',
        'total_price',
        'status',
    ];
    protected $dates = [
        'tgl_beli',
        'tgl_antar',
        'tgl_pesan',
    ];

    public function livestocks()
    {
        return $this->hasMany('App\Livestock');
    }
    
}
