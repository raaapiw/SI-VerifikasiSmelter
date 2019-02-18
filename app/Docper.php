<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docper extends Model
{
    protected $fillable =[
        'order_id',
        'evidence',
        'type'
    ];
    protected $appends =[
        'new_date',
        'real_name_evidence',
        'name_type'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function getRealNameEvidenceAttribute()
    {
        if($this->evidence != NULL){
            $real_name = explode('/', $this->evidence);
            return $real_name[4];
        }else{
            return null;
        }
        
    }
}
