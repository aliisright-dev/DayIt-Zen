<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Calendar;
use App\Day;

class CalendarController extends Controller
{
  public function createCalendar(Request $request) {

    $months_30 = array(2, 4, 6, 9, 11);
    $months_31 = array(1, 3, 5, 7, 8, 10, 12);

    $newCalendar = new Calendar();

    $newCalendar->year = $request->input('year');
    $newCalendar->month_id = $request->input('month');
    $newCalendar->user_id = Auth::user()->id;

    $newCalendar->save();

    if(in_array($request->input('month'), $months_30) ) {
      for($i = 1; $i<=30; $i++) {
        $day = new Day();

        $day->day = $i;
        $day->message = NULL;
        $day->user_id = Auth::user()->id;
        $day->color_id = 1;
        $day->calendar_id = $newCalendar->id;

        $day->save();
      }
    } else {
      for($i = 1; $i<=31; $i++) {
        $day = new Day();

        $day->day = $i;
        $day->message = NULL;
        $day->user_id = Auth::user()->id;
        $day->color_id = 1;
        $day->calendar_id = $newCalendar->id;

        $day->save();
      }
    }


    return redirect()->route('show.home');
  }
}
