<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    //
    protected $fillable = [
        'order_id',
        'pics',
        'type'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function getRealNamePicsAttribute()
    {
        if($this->pics != NULL){
            $real_name = explode('/', $this->pics);
            return $real_name[4];
        }else{
            return null;
        }
        
    }
}
