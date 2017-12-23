<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  public function user() {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function Day() {
    return $this->hasOne('App\Day');
  }
}
