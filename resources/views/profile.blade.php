@extends('layouts.app')

@section('content')

<div class="row">


    <div class="col-4 mt-5">
    @if (Auth::check())
    <div class="m-auto" style="width: 18rem; ">
                    @if ($is_edit_profile)
                    <a href="/account" >
                        <button type="button" class="btn btn-primary text-white col-12 mb-3">Edit Profile</button>
                    </a>
                    @elseif ($button_add_friend)
                    <a href="{{ url('/add-friends/' . $userprofil->name) }}">
                        <button type="button" class="btn btn-primary text-white col-12 mb-3">
                       
                            Add as friend
                        </button>
                       
                    </a>
                    @else
                    <a href="{{ url('/delete-friends/' . $userprofil->name) }}">
                        <button type="button" class="btn border-danger text-danger col-12 mb-3">Remove friend</button>
                       
                    </a>
                    @endif
        </div>
        @endif
    <div class="card m-auto" style="width: 18rem; ">
 
  <div class="card-body">
    <h5 class="card-title"> &#x40;{{ $userprofil->name  }} friends</h5>

    @forelse ($listoffriends as $friends)
                   
                        <div class="row m-auto border border-dark border-left-0 border-right-0 border-top-0 pb-2">

                        <img src="img/{{ $friends->avatar }}"  style="border-radius: 10px 100px / 120px; width: 40%;" class=""/>

                                <a href="{{ url('/' . $friends->username) }}" class="text-info col-6">
                                    <h4 class="list-group-item-heading">{{ $friends->name }}</h4>
                                    <strong class="list-group-item-text text-info ">{{ $friends->created_at->diffForHumans() }}</strong>
                                </a>
                               
                        </div>
                  
                    @empty
                    <div class="mt-3 text-center  col-12 d-flex flex-column justify-content-center align-items-center align-content-center">
   
                        <h5 class="mt-5">No friends yet</h5>
                        <img src="/img/nofriends.png" class="w-50">

                    </div>
                    @endforelse
   
  </div>
</div>

    </div>

    <div class="col-8">
    <div class="container mt-5 mb-5 ml-4">
         <h2 class="">&#x40;{{ $userprofil->name  }} profil</h2>
    </div>

@forelse ($userprofil->posts()->get() as $post)
          
                  <div class="row m-auto border border-dark border-left-0 border-right-0 border-top-0 col-11">
                    <div class="col-1 mt-3">
                        <img src="img/{{$post->user->avatar}}"  style="border-radius: 10px 100px / 120px; width: 100%;" class=""/>
                    </div>

                    <div class=" col-10 mt-3">

                    <a href="" class=""><h5>{{$post->user->name}}</h5> </a>

                    @if($post->UserLikedPost())
                    <div class="row">
                            <a href="{{ url('/remove-like/' . $post->post) }}" class="ml-3"><i class='fas fa-thumbs-up' style='font-size:24px'></i></a>
                            <p class="mt-2 ml-1 text-primary"> {{$post->likes()->where('post_id',  $post->id)->count()}}</p>
                       
                    </div>
                    @else
                    <div class="row">
                         <a href="{{ url('/like/' .  $post->post ) }}" class="ml-3"><i class='far fa-thumbs-up' style='font-size:24px'></i></a>
                         <p class="mt-2  text-primary"> {{$post->likes()->where('post_id',  $post->id)->count()}}</p>
                    </div>
                    @endif
                   
                    <p class="">{{$post->post}}</p>
                   
                  

                    <p class="">{{$post->created_at->diffForHumans()}}</p>
                    </div>

                         
                  </div>
                
               
          @empty
          <div class="mt-3 text-center col-12 d-flex flex-column justify-content-center align-items-center align-content-center">
 
               <h5 class="mt-5">Pas encore de publication</h5>
               <img src="/img/pasdepost.png" class="w-50">

          </div>
             
          @endforelse
    </div>

</div>



@endsection