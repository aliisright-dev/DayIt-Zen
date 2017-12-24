<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  public function user() {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function day() {
    return $this->hasOne('App\Day');
  }
}
