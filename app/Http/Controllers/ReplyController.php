<?php

namespace App\Http\Controllers;
use App\User;
use App\Reply;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class ReplyController extends Controller
{
    public function create(Reply $reply, Request $request)
    {
        $validate = $request->validate([
            'reply' => 'required',
        
        ]);
        

        if (Auth::check()) {

            $reply = new Reply;
            $reply->reply = $request->reply;
            $reply->post_id = $request->post_id;
            $reply->user_id = $request->user_id;
            $reply->save();

           return redirect()->back()->with('alertcreatereply', "Votre commentaire  : $reply->reply a bien été crée" );
        }
    }
}
