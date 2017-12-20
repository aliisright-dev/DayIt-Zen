<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
  public function user() {
      return $this->belongsTo('App\User', 'user_id', 'id');
  }

  public function color() {
      return $this->belongsTo('App\Color', 'color_id', 'id');
  }

  public function image() {
      return $this->belongsTo('App\Image', 'image_id', 'id');
  }
}
