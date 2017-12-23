<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Task extends Model
{
    public function user() {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function day() {
      return $this->belongsTo('App\Day', 'day_id', 'id');
    }
}
