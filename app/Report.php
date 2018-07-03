<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable =[
        'report',
        'covering_letter',
        'receipt',
    ];
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
