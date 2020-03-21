<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
  
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function friendsAccepted()
    {
        return $this->belongsToMany('App\user', 'friends','friend_id','user_id')
            ->withPivot('accepte')
            ->wherePivot('accepte', true);
    }
   
}
