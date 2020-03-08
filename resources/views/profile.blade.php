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
                        <button type="button" class="btn btn-default text-danger col-12 mb-3">Remove friend</button>
                       
                    </a>
                    @endif
        </div>
        @endif
    <div class="card m-auto" style="width: 18rem; ">
 
  <div class="card-body">
    <h5 class="card-title"> @ {{ $userprofil->name  }} friends</h5>
   
  </div>
</div>

    </div>

    <div class="col-8">
    <div class="container mt-5 mb-5 ml-4">
         <h2 class="">@ {{ $userprofil->name  }} profil</h2>
    </div>

@forelse ($userprofil->posts()->get() as $post)
          
                  <div class="row m-auto border border-dark border-left-0 border-right-0 border-top-0 col-11">
                    <div class="col-1 mt-3">
                        <img src="img/{{$post->user->avatar}}" class="" style="width: 40PX"/>
                    </div>

                    <div class=" col-10 mt-3">

                    <a href="" class=""><h5>{{$post->user->name}}</h5> </a>
                   
                    <p class="">{{$post->post}}</p>

                    <p class="">{{$post->created_at->diffForHumans()}}</p>
                    </div>

                         
                  </div>
                
               
          @empty
          <div class="mt-3 text-center col-12 d-flex flex-column justify-content-center align-items-center align-content-center">
 
               <h5 class="mt-5">No tweet</h5>
               <img src="/img/notweet.png" class="w-50">

          </div>
             
          @endforelse
    </div>

</div>



@endsection