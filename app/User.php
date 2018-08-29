<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \Cartalyst\Sentinel\Users\EloquentUser
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'username',
        'password',
        'last_name',
        'first_name',
        'permissions',
        'name',
        'gender',
    ];

    protected $appends = ['image'];
    
    protected $loginNames = ['username'];

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function announcements()
    {
        return $this->hasMany(Client::class);
    }
    

}
