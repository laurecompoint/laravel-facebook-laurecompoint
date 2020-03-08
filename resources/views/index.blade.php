@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card mt-5">
                <div class="card-header">Créer une publication</div>

                <div class="card-body">
                <form method="post" action="{{route('posts.create')}}">
                  <div class="row m-auto col-12">
                    <div class="">
                        <img src="img/avatar.png" class="ml-1" style="width: 40PX"/>
                    </div>

                    <div class="ml-2 col-11">
                      
                    <input type="text" class="form-control inputpost" placeholder="Que voulez-vous dire, laure ?" name="post" />
                    </div>

                         
                        
                  </div>
                  {{csrf_field()}}
                  <button type="summit" class="btn col-11 text-white mt-3 color">Publier</button>
                  </form>
                </div>
                
            </div>
        </div>
    </div>
  
</div>
<div class="container ">
    @if (session('alertcreate'))
          <div class="alert alert-success m-auto h-100 col-md-8 justify-content-center">
                {{ session('alertcreate') }}
          </div>
    @endif
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
        @foreach ( $posts as $post )
            <div class="card mt-5">
                <div class="card-header bg-white">

               
                  <div class="row m-auto">
                    <div class="col-1">
                        <img src="img/{{$post->user->avatar}}" class="ml-1" style="width: 40PX"/>
                    </div>

                    <div class="ml-2 col-10 row ">

                    <a href="" class=""><h5>{{$post->user->name}}</h5> </a> <p class="ml-2 ">- {{$post->created_at->diffForHumans()}}</p>
                   
                      
                 
                    </div>

                         
                  </div>
               


                </div>

                <div class="card-body" style="background-color: rgba(0,0,0,.03);">

                <p>{{$post->post}}</p>
               
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
  
</div>
@endsection
