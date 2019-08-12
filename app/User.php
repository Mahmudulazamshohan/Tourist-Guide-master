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
        'fname','name', 'email', 'password','role','user_img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userDetails(){
        return $this->hasOne(UserDetail::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
