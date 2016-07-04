<?php

namespace App\Social\Graph;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function followerUser()
    {
      return $this->belongsTo('App\Social\User\User', 'follower_id', 'id');
    }
    public function followedUser()
    {
      return $this->belongsTo('App\Social\User\User', 'followed_id', 'id');
    }
}
