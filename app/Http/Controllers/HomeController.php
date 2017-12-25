<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\RequestModel;
use App\Friendship;
use App\Calendar;
use App\Month;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Récupération des (user_id) et des (friend_id) dans la table (requests)
        $requestUserIds = RequestModel::select('user_id')->where('status', FALSE)->where('friend_id', Auth::user()->id);
        $requestFriendIds = RequestModel::select('friend_id')->where('status', FALSE)->where('user_id', Auth::user()->id);

        //Récupération des (friend_id) demandeurs d'amitié en attente
        $friendId1 = RequestModel::select('friend_id')->where('user_id', Auth::user()->id)->where('status', FALSE);
        //Récupération des (friend_id) amis acceptés
        $friendId2 = Friendship::select('friend_id')->where('user_id', Auth::user()->id);

        //Fetch des utilisateurs ayant envoyé ou reçu une demande d'amitié de l'utilisateur connecté
        $reqUsers = User::wherein('id', $requestUserIds)->orwherein('id', $requestFriendIds)->whereNotIn('id', $friendId2)->where('id', '!=', Auth::user()->id)->get();
        //Fetch des utilisateurs sans aucune demande d'amitié émue ou reçue de l'utilisateur connecté
        $noReqUsers = User::whereNotIn('id', $requestUserIds)->whereNotIn('id', $requestFriendIds)->whereNotIn('id', $friendId2)->where('id', '!=', Auth::user()->id)->get();
        //Notifications : liste de demande d'amitié reçues
        $fRequests = User::wherein('id', $friendId1)->where('id', '!=', Auth::user()->id)->get();
        //Liste d'amis de l'utilisateur connecté
        $friends = User::wherein('id', $friendId2)->where('id', '!=', Auth::user()->id)->get();

        return view('home', ['reqUsers' => $reqUsers, 'noReqUsers' => $noReqUsers, 'fRequests' => $fRequests, 'friends' => $friends]);
    }
}
