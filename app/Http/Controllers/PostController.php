<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, Like $like, User $user)
    {
        
    
         if (Auth::check()) {
           
        
            return view('index', [ 
                'user' => Auth::user() ,
              
               
               
                
                ]);
        }
        else{
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post, Request $request)
    {
        $validate = $request->validate([
            'post' => 'required',
        
        ]);
        

        if (Auth::check()) {

            $post = new Post;
            $post->post = $request->post;
            $post->user_id = Auth::user()->id;
            $post->save();

           return redirect()->back()->with('alertcreate', "Votre post  : $post->post a bien été crée" );
        }
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,  Request $request)
    {
        $post = Post::find($post->id = $request->id);
        
        if (Auth::check()) {
          
            $post->delete();
            return redirect()->back()->with('alertdelete', "Votre post  :   $post->post  a bien été suprimer" );
        }
    }

    public function like($post)
    {
        
        $post = Post::where('post', $post)->firstOrFail();
    
        $id = Auth::id();
        $me = User::find($id);
        $me->likes()->attach($post->id);
      
        

        return redirect('/timeline');
    }
    public function removelike($post){
    
        $post = Post::where('post', $post)->firstOrFail();

        $id = Auth::id();
        $me = User::find($id);
        $me->likes()->detach($post->id);
        return redirect('/timeline');
    }
}
