<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany('App\Post', 'user_id', 'id')->orderBy('id', 'desc');
    }
    public function friends(){
    return $this->belongsToMany('App\User', 'friends', 'friend_user_id', 'user_id')->withTimestamps();
    }
    public function isFriends(User $user){
        return !is_null($this->friends()->where('user_id', $user->id)->first());
    }
    public function likes(){
        return $this->belongsToMany('App\User', 'likes', 'user_id', 'post_id')->withTimestamps();
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function timeline(){
       
        $following = $this->friends()->with(['posts' => function ($query) {
            $query->orderBy('id', 'desc'); 
            $query->paginate(5);
        }])->get();
 
       
    
        $timeline = $following->flatMap(function ($values) {
            return $values->posts;
        });
    
        return $timeline;
    }

}
