<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileFriendsController extends Controller
{


    
    public function friends($username, User $user){

        if (Auth::check()) {
            
            $me = Auth::user();
            $userprofil = User::where('name', $username)->firstOrFail();
            $listoffriends = $userprofil->friends()->orderBy('name')->get();
          
          
            return view('friends', [
                'listoffriends' => $listoffriends,
                'userprofil' => $userprofil, 
                ]);
        }
       else{
        return view('welcome');
       }

    }
}
