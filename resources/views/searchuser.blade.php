@extends('layouts.app')

@section('content')

<div class="">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-4">
            @if($search != "")
            <div class="card" style="background-color:#4267b2; color:white">
                <div class="card-header">
                  
                    Search : {{$search}}
                </div>
             
                <div class="card-body">
                @forelse($userfound as $user)
                <div class="row mt-4 ml-2">
               
                <img src="img/{{$user->avatar}}" style="border-radius: 10px 100px / 120px;" class="w-25"/>
              
                <div class="col-6 mr-5">
                <a href="{{$user->name}}" class="text-white"><h5>{{ $user->name}}</h5></a>
                <p>{{ $user->email}}</p>
                </div>
                </div>
                @empty
                <h4 class="text-center mt-5">No user found !</h4>
                @endforelse
               <div class="mt-5 float-right">
                {{ $userfound->links() }}
                </div>
                </div>
            </div>
            @else
            <div class="card" style="background-color:#4267b2; color:white">
                <div class="card-header">
                  
                    Search : {{$search}}
                </div>
                
                <h4 class="text-center mt-5">{{$message}}</h4>
               
            </div>
            @endif
        </div>
    </div>
</div>

</div>

@endsection