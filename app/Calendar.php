<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
  public function user() {
    return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function month() {
    return $this->belongsTo('App\Month', 'month_id', 'id');
  }

  public function day() {
    return $this->hasMany('App\Day');
  }
}
