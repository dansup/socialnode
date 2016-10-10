<?php

namespace App\Social\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profile";

    public function user()
    {
      return $this->belongsTo('App\Social\User\User', 'id', 'user_id');
    }
}
