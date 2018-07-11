<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable =[
        'client_id',
        'offer_letter',
        'letter_of_request',
        'dp_invoice',
        'transfer_proof',
        'companion_letter',
        'state',
        'state_offer',
        'contract',
        
    ];
    
    protected $appends =[
        'new_date'
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
    public function getNewDateAttribute()
    {
        $new_date = $this->created_at->format('d - m - Y');
        return $new_date;
    }

}
