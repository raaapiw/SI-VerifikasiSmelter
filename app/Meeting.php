<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //
    protected $fillable =[
        'order_id',
        'bap',
        'date',
        'time',
        'place',
        'admin_id'
        
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
