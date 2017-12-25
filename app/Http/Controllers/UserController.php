<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\RequestModel;
use App\Friendship;

class UserController extends Controller
{
  public function showUsers() {

  }

  public function requestFriend($friendId) {

    if($friendId != null) {
        $newRequest = new RequestModel();

        $newRequest->user_id = $friendId;
        $newRequest->friend_id = Auth::user()->id;
        $newRequest->status = FALSE;

        $newRequest->save();
      }

    return redirect()->back();
  }

  public function acceptFriend($friendId) {

    if($friendId != null) {
        $newRequest1 = new Friendship();

        $newRequest1->user_id = Auth::user()->id;
        $newRequest1->friend_id = $friendId;

        $newRequest1->save();
        //////////
        $newRequest2 = new Friendship();

        $newRequest2->user_id = $friendId;
        $newRequest2->friend_id = Auth::user()->id;

        $newRequest2->save();
        //////////
        $newRequest3 = RequestModel::where('user_id', Auth::user()->id)->where('friend_id', $friendId)->first();
        $newRequest3->status = TRUE;

        $newRequest3->save();
      }

    return redirect()->back();

  }

  public function removeRequest($friendId) {

      if($friendId != null) {

        $newRequest3 = RequestModel::where('user_id', Auth::user()->id)->where('friend_id', $friendId);
        $newRequest3->delete();

      }

      return redirect()->back();

  }

  public function hasAddButton() {



  }
}
