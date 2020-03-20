<?php

namespace App\Http\Controllers;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileFriendsController extends Controller
{


    
    public function friends($username, User $user){

        if (Auth::check()) {
            
            $me = Auth::user();
            $userprofil = User::where('name', Auth::user()->name)->firstOrFail();
            $listoffriends = $userprofil->friendsAccepted()->orderBy('name')->get();
            $friendsrequeste = Friend::where( ['friend_id' => Auth::user()->id, 'accepte' => 0])->get();
          
            return view('friends', [
                'listoffriends' => $listoffriends,
                'userprofil' => $userprofil, 
                'friendsrequeste' => $friendsrequeste,
                ]);
        }
       else{
        return view('welcome');
       }

    }
}
