<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Day;
use App\User;
use App\Image;
use App\Color;
use App\Task;
use App\Calendar;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class DayController extends Controller
{
    public function showCalendar($year, $monthId) {

      $colors = Color::All();

      $calendar = Calendar::where('month_id', $monthId)->where('year', $year)->first();

      $days = Day::where('calendar_id', $calendar->id)->get();


      return view('calendar', ['days' => $days, 'colors' => $colors, 'calendar' => $calendar]);

    }

    public function editDay(Request $request) {

      if(Input::hasFile('image')) {

            $file = Request()->file('image');
            $extension = $file->getClientOriginalExtension();

            Storage::disk('public')->put(
              $file->getFilename().'.'.$extension,
              File::get($file)
            );

            $entry = new Image();
            $entry->mime = $file->getClientMimeType();
            $entry->name = $file->getFilename().'.'.$extension;
            $entry->path = "/storage/app/public/".$entry->name;
            $entry->user_id = Auth::user()->id;

            $entry->save();

            $newImageId = Day::where('day', '=', $request->input('day'))->first();
            $newImageId->image_id = $entry->id;

            $newImageId->save();

      }

      if($request->input('color') !== null) {

            $color = $request->input('color');

            $newColor = Day::where('day', '=', $request->input('day'))->first();
            $newColor->color_id = $color;

            $newColor->save();

      }

      if($request->input('message') !== null) {

            $message = $request->input('message');

            $newMessage = Day::where('day', '=', $request->input('day'))->first();
            $newMessage->message = $message;

            $newMessage->save();

      }



      return redirect()->back();

    }

    public function deleteMessage($dayId) {

      $deleteDayMessage = Day::where('day', $dayId)->first();

      $deleteDayMessage->message = null;

      $deleteDayMessage->save();

      return redirect()->back();
    }
}
