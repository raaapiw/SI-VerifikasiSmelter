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

    public function user(){
        return $this->belongsTo(User::class);
    }

}
