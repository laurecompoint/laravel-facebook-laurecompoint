<?php

namespace App;
use App\User;
use App\Like;
use App\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reply(){
        return $this->hasMany('App\Reply', 'post_id', 'id')->orderBy('id', 'asc');
    }
    
    public function likes(){
        return $this->hasMany(Like::class);
     }
     public function UserLikedPost(){
        $like = $this->likes()->where('user_id',  Auth::user()->id)->get();
        if ($like->isEmpty()){
            return false;
        }
        return true;
     }

    
    
     
}
