<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar;
use App\Month;

class OfficeController extends Controller
{
    public function index()
    {

          $months = Month::All();
          $calendars = Calendar::All();

          return view('office', ['months' => $months, 'calendars' => $calendars]);

    }
}
