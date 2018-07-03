<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable =[
        'id',
        'report',
        'covering_letter',
        'receipt',
    ];
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
