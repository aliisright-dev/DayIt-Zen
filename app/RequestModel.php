<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{

  protected $table = 'requests';

  public function user() {
    return $this->belongsTo('App\User', 'user_id');
  }

  public function fiend() {
    return $this->belongsTo('App\User', 'friend_id');
  }
}
