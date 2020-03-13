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
                      
                    <input type="text" class="form-control inputpost" placeholder="Que voulez-vous dire, {{ Auth::user()->name }} ?" name="post" />
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
<div class="container ">
    @if (session('alertcreatereply'))
          <div class="alert alert-success m-auto h-100 col-md-8 justify-content-center">
                {{ session('alertcreatereply') }}
          </div>
    @endif
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
        @foreach ( $user->posts()->get() as $post  )
            <div class="card mt-5">
                <div class="card-header bg-white">

               
                  <div class="row m-auto">
                    <div class="col-1">
                        <img src="img/{{$post->user->avatar}}" class="ml-1" style="width: 40PX; border-radius: 10px 100px / 120px;"/>
                    </div>

                    <div class="ml-2 col-10 row ">

                    <a href="" class=""><h5>{{$post->user->name}}</h5> </a> <p class="ml-2 ">- {{$post->created_at->diffForHumans()}}</p>
                   
                     @if($post->UserLikedPost())
                         <a href="{{ url('/remove-like/' . $post->post) }}" class="ml-5"><i class='fas fa-thumbs-up' style='font-size:20px'></i></a>
                         <p class="mt-1 ml-1 text-primary"> {{$post->likes()->where('post_id',  $post->id)->count()}}</p>
                        
                    @else
                         <a href="{{ url('/like/' .  $post->post ) }}" class="ml-5"><i class='far fa-thumbs-up' style='font-size:20px'></i></a>
                         <p class="mt-1 ml-1 text-primary"> {{$post->likes()->where('post_id',  $post->id)->count()}}</p>

                    @endif
                  
                    </div>

                         
                  </div>
               


                </div>

                <div class="card-body" style="background-color: rgba(0,0,0,.03);">

                <p>{{$post->post}}</p>
               

                       

                        <div class="row float-right mr-5 col-10">
                        @foreach ( $post->reply()->get() as $replypost  )
                            <div class="col-1">
                                <img src="img/{{$replypost->user->avatar}}" class="ml-1" style="width: 40PX; border-radius: 10px 100px / 120px;"/>
                            </div>

                                <div class="ml-2 col-10  ">

                                <a href="/{{$replypost->user->name}}" class=""><h5>{{$replypost->user->name}}</h5> </a> 
                            
                                <p class="mb-3">{{$replypost->reply}}</p>
                                <p class=""> {{$replypost->created_at->diffForHumans()}}</p>
                                </div>
                                @endforeach
                         
                        </div>
                      

              

                <form method="post" action="{{route('replys.create')}}">
                <input type="hidden" class="form-control" name="post_id" value="{{$post->id}}" placeholder="" aria-label="" aria-describedby="basic-addon1">
                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}" placeholder="test" aria-label="" aria-describedby="basic-addon1">
                     
                <div class="input-group col-10 mt-4 float-right">
                <input type="text" class="form-control" name="reply" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                        {{csrf_field()}}
                            <button class="btn btn-primary" type="summit">Reply</button>
                        </div>
                </div>
                 </form>
                  
                   
               
                </div>
                
            </div>
            @endforeach

            @foreach ( $user->timeline() as $post  )
            <div class="card mt-5">
                <div class="card-header bg-white">

               
                  <div class="row m-auto">
                    <div class="col-1">
                        <img src="img/{{$post->user->avatar}}" class="ml-1" style="width: 40PX; border-radius: 10px 100px / 120px;"/>
                    </div>

                    <div class="ml-2 col-10 row ">

                    <a href="" class=""><h5>{{$post->user->name}}</h5> </a> <p class="ml-2 ">- {{$post->created_at->diffForHumans()}}</p>
                   
                     @if($post->UserLikedPost())
                         <a href="{{ url('/remove-like/' . $post->post) }}" class="ml-5"><i class='fas fa-thumbs-up' style='font-size:20px'></i></a>
                         <p class="mt-1 ml-1 text-primary"> {{$post->likes()->where('post_id',  $post->id)->count()}}</p>
                        
                    @else
                         <a href="{{ url('/like/' .  $post->post ) }}" class="ml-5"><i class='far fa-thumbs-up' style='font-size:20px'></i></a>
                         <p class="mt-1 ml-1 text-primary"> {{$post->likes()->where('post_id',  $post->id)->count()}}</p>

                    @endif
                  
                    </div>

                         
                  </div>
               


                </div>

                <div class="card-body" style="background-color: rgba(0,0,0,.03);">

                <p>{{$post->post}}</p>
                 
                <div class="row float-right mr-5 col-10">
                        @foreach ( $post->reply()->get() as $replypost  )
                            <div class="col-1">
                                <img src="img/{{$replypost->user->avatar}}" class="ml-1" style="width: 40PX; border-radius: 10px 100px / 120px;"/>
                            </div>

                                <div class="ml-2 col-10  ">

                                <a href="/{{$replypost->user->name}}" class=""><h5>{{$replypost->user->name}}</h5> </a> 
                            
                                <p class="mb-3">{{$replypost->reply}}</p>
                                <p class=""> {{$replypost->created_at->diffForHumans()}}</p>
                                </div>
                                @endforeach
                         
                        </div>
                      

              

                <form method="post" action="{{route('replys.create')}}">
                <input type="hidden" class="form-control" name="post_id" value="{{$post->id}}" placeholder="" aria-label="" aria-describedby="basic-addon1">
                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}" placeholder="test" aria-label="" aria-describedby="basic-addon1">
                <div class="input-group col-10 mt-4 float-right">
                        
                        <input type="text" class="form-control" name="reply" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                        {{csrf_field()}}
                            <button class="btn btn-primary" type="summit">Reply</button>
                        </div>
                </div>
                 </form>
                  
                  
                   
               
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
  
</div>
@endsection
