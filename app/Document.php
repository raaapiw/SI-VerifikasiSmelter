<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable =[
        'work_id',
        'evidence',
    ];
    protected $appends =[
        'new_date',
        'real_name_evidence'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
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
