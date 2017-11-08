<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'firstname', 'lastname', 'phone', 'sex', 'spam'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarAttribute()
    {
        return './imgs/avatars/'.$this->id.'.jpg';
    }

    public function getPhoneRawAttribute()
    {
        return preg_replace('#[^\d+]+#is', '', $this->phone);
    }
}
