<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable =[
        'company_name',
        'address',
        'phone',
        
    ];

    protected $appends =[
        'full_company_name',
        'new_date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }
    public function getFullCompanyNameAttribute()
    {
        $full_company_name = ''.$this->company_name;
        return $full_company_name;
    }
    
}
