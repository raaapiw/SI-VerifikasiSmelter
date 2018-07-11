<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $fillable =[
        'order_id',
        'curva_s',
        'evidence',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
