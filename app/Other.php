<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    //
    protected $fillable = [
        'order_id',
        'pics'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
