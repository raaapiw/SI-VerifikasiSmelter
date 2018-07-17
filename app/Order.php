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
        'spk',
        
    ];
    
    protected $appends =[
        'new_date',
        'real_name_offer_letter'
    ];

    
    public function works()
    {
        return $this->hasMany(Work::class);
    }
    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
    public function report()
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
    public function getRealNameOfferLetterAttribute()
    {
        if($this->offer_letter != NULL){
            $real_name = explode('/', $this->offer_letter);
            return $real_name[2];
        }else{
            return null;
        }
        
    }

}
