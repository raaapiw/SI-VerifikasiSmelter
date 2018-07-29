<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable =[
        'order_id',
        'report',
        'covering_letter',
        'receipt',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
