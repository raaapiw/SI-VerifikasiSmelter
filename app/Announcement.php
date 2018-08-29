<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    //
    protected $fillable =[
        'id',
        'user_id',
        'field',
        'state'
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
