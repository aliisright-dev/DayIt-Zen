<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  public function day() {
    return $this->hasOne('App\Day');
  }
}
