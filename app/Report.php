<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $fillable =[
        'client_id',
        'order_id',
        'report',
        'covering_letter',
        'receipt',
        'state',
        'jenis',
        'link'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
