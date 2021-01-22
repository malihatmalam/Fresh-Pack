<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    protected $table = 'livestocks';
    protected $fillable = [
        'kode',
        'kode_kandang',
        'jenis',
        'type',
        'jenis_kelamin',
        'warna',
        'tgl_lahir',
        'description',
        'berat',
        'foto',
        'status',
        'order_id',
    ];
    protected $dates = ['tgl_lahir'];

    public function order()
    {
        return $this->belongsTo('App\Order', 'orders','id');
    }
}
