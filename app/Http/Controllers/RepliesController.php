<?php

namespace App\Http\Controllers;
use App\User;
use App\Replies;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class RepliesController extends Controller
{
    public function create(Replies $replies, Request $request)
    {
        $validate = $request->validate([
            'reply' => 'required',
        
        ]);
        

        if (Auth::check()) {

            $replies = new Replies;
            $replies->reply = $request->reply;
            $replies->post_id = $request->post_id;
            $replies->user_id = $request->user_id;
            $replies->save();

           return redirect()->back()->with('alertcreatereply', "Votre commentaire  : $replies->reply a bien été crée" );
        }
    }
}
