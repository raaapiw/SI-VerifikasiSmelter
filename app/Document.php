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

    public function work()
    {
        return $this->belongsTo(Work::class);
    }
}
