<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Task;
use App\User;
use App\Day;

class TaskController extends Controller
{

    public function addTask(Request $request) {

      if($request->input('task') !== null) {
        $newTask = new Task();

        $newTask->name = $request->input('task');
        $newTask->user_id = Auth::User()->id;
        $newTask->day_id = $request->input('day');
        $newTask->done = FALSE;

        $newTask->save();
      }

      return redirect()->back();

    }

    public function deleteTask(Request $request) {

      $taskId = $request->input('taskId');
      $deleteTask = Task::find($taskId);
      $deleteTask->delete();

      return redirect()->back();
    }

    public function modifyTask(Request $request) {

      $taskId = $request->input('taskId');
      $modifyTask = Task::find($taskId);

      $modifyTask->name = $request->input('task');

      $modifyTask->save();

      return redirect()->back();
    }

    public function statusTask(Request $request) {

      $taskId = $request->input('taskId');
      $statusTask = Task::find($taskId);

      if($statusTask->done == FALSE) {
        $statusTask->done = TRUE;

        $statusTask->save();
      } else {
        $statusTask->done = FALSE;

        $statusTask->save();
      }


      return redirect()->back();
    }

}
