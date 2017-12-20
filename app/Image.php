<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  public function user() {
    $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function Day() {
    $this->hasOne('App\Day');
  }
}
