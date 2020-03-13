<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
  
   
}

