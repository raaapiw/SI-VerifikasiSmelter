<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable =[
        'offer_letter',
        'dp_invoice',
        'transfer_proof',
        'companion_letter',
        
    ];
    public function works()
    {
        return $this->hasMany(Work::class);
    }
    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
    public function reports()
    {
        return $this->hasOne(Report::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }

}
