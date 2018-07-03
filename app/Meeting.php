<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //
    protected $fillable =[
        'bap',
        
    ];
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

}
