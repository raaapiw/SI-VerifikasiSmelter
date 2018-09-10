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
        'state'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
