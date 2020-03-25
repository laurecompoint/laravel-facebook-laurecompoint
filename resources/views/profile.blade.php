@extends('layouts.app')

@section('content')

<div class="row">


    <div class="col-4 mt-5">
    
   
    @if (Auth::check())
    <div class="m-auto" style="width: 18rem; ">
    
                    @if ($is_edit_profile)
                   
                    @if (session('alertremovefriends'))
                                <div class="alert alert-success  mt-4 col-12">
                                    {{ session('alertremovefriends') }}
                                </div>
                    @endif

                    @if (session('alertacceptfriends'))
                                <div class="alert alert-success  mt-4 col-12">
                                    {{ session('alertacceptfriends') }}
                                </div>
                    @endif
                    
                    @foreach($friends as $friendrequettes) 
                   
                    <div class="alert alert-success  mb-3 col-12 justify-content-center">
                    <p>{{$friendrequettes->user->name}} vous à envoyer une demande d'amie</p>
                    <form class="col-12" method="post" action="{{route('friends.accept')}}">
                    <input type="hidden" name="userid" value="{{$friendrequettes->user->id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    {{csrf_field()}}
                  
                        <button type="summit" class="btn btn-primary text-white col-12 mb-3">
                       
                            Accepte l'invitation
                        </button>
                       
                    </form>
                   
                    </div>
                  
                    @endforeach
                 
                  
                   

                    <a href="/account" >
                        <button type="button" class="btn btn-primary text-white col-12 mb-3">Edit Profile</button>
                    </a>
                   
                    @elseif($userprofil->NoFriendYet())
                    <a href="{{ url('/add-friends/' . $userprofil->name) }}">
                        <button type="button" class="btn btn-primary text-white col-12 mb-3">
                       
                            Add as friend
                        </button>
                       
                    </a>
                    @else
                    <div class="">
                        @foreach($userprofil->friendsNoAccepted as $requestfriendencour) 
    
                        @if($requestfriendencour->pivot->accepte) 
                        <div class="alert alert-success  mb-3 col-12 justify-content-center">
                              Tout vos demande d'amie ont été accepter
                         </div>
                        @else 
                        <div class="alert alert-success  mb-3 col-12 justify-content-center">
                             Demande d'amis en cours, attente d'acceptation de la part de {{$userprofil->name}}
                         </div>
                        @endif 
                        @endforeach
                    </div>
                    <div class="">

                   
                    
                  
                    
                    </div>
                    @endif
        </div>
        @endif
    <div class="card m-auto" style="width: 18rem; ">
 
  <div class="card-body">
    <h5 class="card-title"> &#x40;{{ $userprofil->name  }} friends</h5>

    @forelse ($listoffriends as $friends)
                   
                        <div class="row m-auto border border-dark border-left-0 border-right-0 border-top-0 pb-1">

                        <img src="img/{{ $friends->avatar }}"  style="border-radius: 10px 100px / 120px; width: 40%;" class="mt-2"/>

                                <a href="{{ url('/' . $friends->name) }}" class="text-info col-6 mt-3">
                                    <h4 class="list-group-item-heading">{{ $friends->name }}</h4>
                                    <strong class="list-group-item-text text-info ">{{ $friends->created_at->diffForHumans() }}</strong>
                                </a>

                                @if($is_edit_profile) 
                              
                              
                                <button type="button" class="btn text-danger col-6  mr-5"  data-toggle="modal" data-target="#Modalalerte{{ $friends->id }}">
                                Remove friend
                               </button>  

                               <div class="modal fade " id="Modalalerte{{ $friends->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supression alerte ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <h6>Etês vous sur de vouloir supprimer votre amitier avec : " {{$friends->name}} " ?</h6>
                                    <p>Vous ne serez plus jamais amis!!!</p>

                                    </div>
                                    <div class="modal-footer">
                                    
                                    <a href="{{ url('/remove-friends/' . $userprofil->name) }}" class="">
                                    <button type="button" class="btn text-danger col-12 mb-1 ">Remove friend</button>
                                
                                </a>
                                    </div>
                                </div>     
                            </div>  
                         
                         </div>
           
                                @else 

                                @endif 
                                        
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
                                        <a href="{{ url('/remove-like/' . $post->post) }}" class="ml-3"><i class='fas fa-thumbs-up' style='font-size:20px'></i></a>
                                        <p class="mt-1 ml-1 text-primary"> {{$post->likes()->where('post_id',  $post->id)->count()}}</p>
                                
                                </div>
                                @else
                                <div class="row">
                                    <a href="{{ url('/like/' .  $post->post ) }}" class="ml-3"><i class='far fa-thumbs-up' style='font-size:20px'></i></a>
                                    <p class="mt-1  text-primary"> {{$post->likes()->where('post_id',  $post->id)->count()}}</p>
                                </div>
                                @endif
                    
                                <p class="">{{$post->post}}</p>
                    
                    

                                <p class="">{{$post->created_at->diffForHumans()}}</p>

                    
                        </div>
                        <div>
                        @if ($is_edit_profile)
                        <button type="button" class="btn text-white"  style="opacity: 0.90; margin-left: -40px" data-toggle="modal" data-target="#modaldelete{{ $post->id }}">
                             <i class="material-icons" style="font-size:36px; color: #660A11">delete_forever</i>
                         </button>
                        <div class="modal fade " id="modaldelete{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supression alerte ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <h6>Etês vous sur de vouloir supprimer votre publication : " {{$post->post}} " ?</h6>

                                    </div>
                                    <div class="modal-footer">
                                    
                                        <form action="delete/{{ $post->id }}" method="POST">
                                        {{ csrf_field() }}

                                        <button class="btn text-white"   style="opacity: 0.90;background-color: #660A11">Oui</button>
                                    
                                        </form>
                                    </div>
                                </div>     
                            </div>  
                         
                         </div>
                         @else
                         @endif
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