<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //
    protected $fillable =[
        'bap',
        'date',
        'time',
        'place',
        
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
