<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $fillable =[
        'work_id',
        'evidence',
        'type'
    ];
    protected $appends =[
        'new_date',
        'real_name_evidence',
        'name_type'
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
    public function getNameTypeAttribute()
    {
        if($this->type != NULL){
            if($this->type == 1){
                return 'PERSIAPAN AWAL';
            }elseif($this->type == 2){
                return 'PERSIAPAN PROYEK';
            }elseif($this->type == 3){
                return 'PELAKSANAAN PROYEK';
            }elseif($this->type == 4){
                return 'UTILITAS';
            }elseif($this->type == 5){
                return 'INFRASTRUKTUR PENDUKUNG';
            }else{
                return 'COMMISIONING & START UP';
            }
        }else{
            return null;
        }
    }
}
