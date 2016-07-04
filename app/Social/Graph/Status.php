<?php

namespace App\Social\Graph;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    public function buildUrl()
    {
      $id = $this->id;
      $username = $this->user->username;
      return env('APP_URL')."/{$username}/status/{$id}";
    }

    public function user()
    {
      return $this->belongsTo('App\Social\User\User');
    }
}
