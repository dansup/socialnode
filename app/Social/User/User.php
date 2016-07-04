<?php

namespace App\Social\User;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function statuses()
    {
        return $this->hasMany('App\Social\Graph\Status');
    }

    public function profile()
    {
        return $this->hasOne('App\Social\User\Profile', 'user_id', 'id');
    }

    public function followers()
    {
        return $this->hasMany('App\Social\Graph\Follower', 'followed_id', 'id');
    }

    public function following()
    {
        return $this->hasMany('App\Social\Graph\Follower', 'follower_id', 'id');
    }
}
