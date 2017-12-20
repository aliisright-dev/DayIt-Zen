<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Day;
use App\User;

class UserController extends Controller
{

  public function createDays(Request $request) {

    for($i = 1; $i<=31; $i++) {
      $day = new Day();

      $day->day = $i;
      $day->message = NULL;
      $day->user_id = Auth::user()->id;
      $day->color_id = 1;

      $day->save();
    }

    return redirect()->route('days.show');
  }

}
