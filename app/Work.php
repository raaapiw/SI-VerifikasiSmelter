<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    protected $fillable =[
        'curva_s',
        'evidence',
    ];

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
