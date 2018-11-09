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
        'admin_id',
        'state_work',
        'state_report',
        'author_work',
        'author_report',
        'author_order',
        'pics',
        'dirkom'
    ];
    
    protected $appends =[
        'new_date',
        'real_name_offer_letter'
    ];

    
    public function work()
    {
        return $this->hasOne(Work::class);
    }
    public function docpers()
    {
        return $this->hasMany(Docper::class);
    }
    public function draft()
    {
        return $this->hasMany(Draft::class);
    }
    public function others()
    {
        return $this->hasMany(Other::class);
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
