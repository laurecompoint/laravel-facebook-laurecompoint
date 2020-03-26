<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Friend;
use Image;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

//page account affichage
public function show()
{
    if (Auth::check()) {
        
        return view('account', ['user' => Auth::user()] );
    }
    else{
        return view('welcome');
    }
  
}
//mise à jour du compte
public function update(Request $request)
{
    if(!empty($request->password)){
        $validate = $request->validate([
            'password' => ['required', 'string', 'min:8'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            ]);
    }
    $validate = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
    ]);
    $user = Auth::user();
    if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/img/' . $filename ) );
        $user->avatar =  $filename;

    }

    $user->name = $request->name;
    $user->email = $request->email;
    if(!empty($request->password)){
        $user->password = Hash::make($request->password);
    }
  
    $user->save();
    return redirect()->back()->with('alertupdate', "User name :   $user->name  à bien été mis à jour" );
    
}
//suprime l'avatar 
public function destroyavatar(User $user)
{
    $user->where('avatar', Auth::user()->avatar)->update([  'avatar'  => 'avatar.png']);
    return redirect()->back()->with('alertdeleteavatar', "Votre avatar à bien été suprime et remplacer par celui par défaut" );
}


//destroy account user
public function destroy(User $user)
{
    $user = User::find(Auth::user()->id);
    $user->delete();
    return redirect()->route('login')->with('alertdeleteuser', "Votre compte à bien été suprime" );
}

public function search(User $user, Request $request){
  
        $search = $request->search;
        $message = "No user found!";
   
    
        if($search != ""){
            $user = User::where('name', 'LIKE', '%'.$search.'%')->paginate(10);
    
           
            return view('searchuser', ['userfound' => $user, 'search' => $search] );
           
        }
        else{
            return view('searchuser', ['message' => $message, 'search' => $search] );
        }

}




public function addfriendsRequeste($username)
{
    
    $user = User::where('name', $username)->firstOrFail();

    $id = Auth::id();
    //$me = User::find($id);

    $friend = new Friend;
    $friend->accepte = 0;
    $friend->user_id = $id;
    $friend->friend_id = $user->id ;
    $friend->save();
    
    return redirect('/' . $username);
}

public function FriendsAccept(Friend $friend, Request $request)
{
    
    $friend->where('user_id', $friend->user_id = $request->userid)->update([  'accepte'  =>  $friend->accepte = 1 ]);
    $id = Auth::id();
    $friends = new Friend;
    $friends->accepte = 1;
    $friends->user_id = $id;
    $friends->friend_id = $request->userid ;
    $friends->save();
  
    return redirect()->back()->with('alertacceptfriends', "Vous avez un nouvel ami" );;
}

public function removefriends(Friend $friend, Request $request)
{
   
   // $user = User::where('name', $username)->firstOrFail();

    $user = Friend::where(['friend_id' => Auth::user()->id, 'user_id' => $request->idfriend])->firstOrFail();
    $friend = Friend::find($user->id);
    //dd($user->id);
    $friend->delete();

    $user = Friend::where(['friend_id' =>  $request->idfriend, 'user_id' => Auth::user()->id])->firstOrFail();
    $friendremove = Friend::find($user->id);
    //dd($user->id);
    $friendremove->delete();
  
   
    return redirect()->back()->with('alertremovefriends', "Vous etes desormais plus amies" );
}
public function refuseinvitationfriends(Request $request, Friend $friend)
{

    $friend = Friend::find($friend->id = $request->id);
 
    $friend->delete();
      
    return redirect()->back()->with('alertrefuserequettes', "Cette demande a bien été refuser" );

}

    


}
