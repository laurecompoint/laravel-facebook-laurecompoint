@extends('layouts.app')

@section('content')


<div class="row">


    <div class="col-4 mt-5">
   
    <div class="card m-auto" style="width: 18rem; ">
 
      <div class="card-body">
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
        <h5 class="card-title"> &#x40;{{ $userprofil->name  }} friends</h5>

        @forelse ($listoffriends as $friends)
                      
                            <div class="row m-auto border border-dark border-left-0 border-right-0 border-top-0 pb-2">

                            <img src="/img/{{ $friends->avatar }}"  style="border-radius: 10px 100px / 120px; width: 40%;" class="mt-3"/>

                                    <a href="{{ url('/' . $friends->username) }}" class="text-info col-7 mt-4">
                                        <h4 class="list-group-item-heading">{{ $friends->name }}</h4>
                                        <strong class="list-group-item-text text-info ">{{ $friends->created_at->diffForHumans() }}</strong>
                                    </a>

                                    <a href="{{ url('/remove-friends/' . $userprofil->name) }}" class="mr-5">
                                    <button type="button" class="btn text-danger col-12 mb-1 ">Remove friend</button>
                                
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
    <div class="container mt-5 ">


    <div class="card m-auto col-10" style=" ">
 
      <div class="card-body">
        <h5 class="card-title"> &#x40;{{ $userprofil->name  }} friends requeste en attente</h5>

        @forelse ($friendsrequeste as $friends)
                      
                            <div class="row m-auto border border-dark border-left-0 border-right-0 border-top-0 pb-2">

                            <img src="/img/{{ $friends->user->avatar }}"  style="border-radius: 10px 100px / 120px; width: 20%;" class="mt-3"/>
                            <div class="">
                                    <a href="{{ url('/' . $friends->name) }}" class="text-info col-7 mt-4">
                                        <h4 class="list-group-item-heading ml-2">{{ $friends->user->name }}</h4>
                                      
                                    </a>

                                    <form class="col-12" method="post" action="{{route('friends.accept')}}">
                                      <input type="hidden" name="userid" value="{{$friends->user->id}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                      {{csrf_field()}}
                                    
                                      <button type="summit" class="btn btn-primary text-white col-12 mb-3 mt-3">
                                        
                                              Accepte l'invitation
                                      </button>
                       
                                      </form>
                                      </div>
                            </div>
                      
                        @empty
                        <div class="mt-3 text-center  col-12 d-flex flex-column justify-content-center align-items-center align-content-center">
      
                            <h5 class="mt-5">No friends requeste yet</h5>
                            <img src="/img/nofriends.png" class="w-50">

                        </div>
        @endforelse
      
      </div>
      </div>

       
    </div>


    </div>

</div>



@endsection