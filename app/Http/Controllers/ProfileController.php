<?php

namespace App\Http\Controllers;
use App\User;
use App\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //page user profil tweet ( + nav profile )
    public function show($username, User $user, Friend $friend)
    {
        
        if (Auth::check()) {
            
            $me = Auth::user();
            $userprofil = User::where('name', $username)->firstOrFail();
          
            $tweet_count = $userprofil->posts()->get()->count();
            
            $is_edit_profile = (Auth::id() == $userprofil->id);
            $button_add_friend = !$is_edit_profile ;
            $listoffriends = $userprofil->friends()->orderBy('name')->get();
          
           
            $friends = Friend::where( ['friend_id' => Auth::user()->id, 'accepte' => 0])->get();
               
            
            return view('profile', [
                'tweet_count' => $tweet_count,
                'listoffriends' => $listoffriends,
                'is_edit_profile' => $is_edit_profile, 
                'button_add_friend' => $button_add_friend, 
                'userprofil' => $userprofil, 
                'friends' => $friends,
                ]);
        }
       else{
        return view('welcome');
       }
        
     
      
    }



  

 

  
  
   
}
