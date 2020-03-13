@extends('layouts.app')

@section('content')


<div class="row">


    <div class="col-4 mt-5">
   
    <div class="card m-auto" style="width: 18rem; ">
 
  <div class="card-body">
    <h5 class="card-title"> &#x40;{{ $userprofil->name  }} friends</h5>

    @forelse ($listoffriends as $friends)
                   
                        <div class="row m-auto border border-dark border-left-0 border-right-0 border-top-0 pb-2">

                        <img src="img/{{ $friends->avatar }}"  style="border-radius: 10px 100px / 120px; width: 40%;" class=""/>

                                <a href="{{ url('/' . $friends->username) }}" class="text-info col-7">
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
       
    </div>


    </div>

</div>



@endsection