@extends('layouts.app')

@section('content')

<div class="container">
                
               
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header " style="background-color:white; color: #4267b2"> 
                <div class="row">
                <h2 class="col-9">{{ $user->name }} Account</h2>
                <button type="button" class="btn btn-danger text-center col-3 "  style="opacity: 0.90;" data-toggle="modal" data-target="#exampleModal2">
               Suprimer mon compte <i class="fa fa-user-times" style="font-size:18px;color:white"></i>
                </button>
                </div>
               
                
                </div>
              
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   

                 
                </div>
                <div class="col-12">
                @if ($errors->any())
                    <div class="">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center col-12" role="alert">
                    <p>{{ $error }}</p>
                                
                    </div>
                @endforeach
                @endif
                @if (session('alertupdate'))
                <div class="alert alert-success  h-100 col-12">
                    {{ session('alertupdate') }}
                </div>
                @endif
                @if (session('alertdeleteavatar'))
                <div class="alert alert-success  h-100 col-12">
                    {{ session('alertdeleteavatar') }}
                </div>
                @endif
                
               
                </div>              
                <form class="col-12" enctype="multipart/form-data" method="post" action="{{route('account.update')}}">
               
                <div class="form-group">
                    <input name="id" type="hidden" value="{{ Auth::user()->id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="img/{{ $user->avatar }}" style="width:150px; height:150px; float:left; margin-right:25px;border-radius: 10px 100px / 120px;">
                        @if (Auth::user()->avatar === 'avatar.png')
                            <label class="text-success">Update Profile Avatar : </label>
                            <input type="file" name="avatar" value="avatar.png">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           
                        @else
                        <button type="button" class="btn text-danger mt-2"  style="opacity: 0.90; margin-left: -15px" data-toggle="modal" data-target="#exampleModal">
                                Suprimer votre avatar
                        </button>   
                        @endif
                    </div>
                </div>
                <div class="row">
                <div class="form-group mt-2 col-6">
                    <label>Name</label>
                    <input name="name" value="{{ Auth::user()->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group mt-2 col-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                </div>
            
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                   
                    <input id="password" type="password" name="password"  class="form-control">
                  
                </div>
              
                {{csrf_field()}}
                <button type="summit" class="btn  mt-3 mb-3 col-12 text-white" style="background-color:#4267b2">Save</button>
                </form>
               
                <div class="modal fade " id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel">Supression alerte </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <h6>Etês vous sur de vouloir supprimer votre compte ?</h6>
                        
                            </div>
                            <div class="modal-footer">
                            
                            <form method="post" action="{{route('compte.destroyuser')}}" >
                        
                                {{csrf_field()}}
                                <button class="btn text-white"   style="opacity: 0.90;background-color: #660A11">Oui</button>
                            </form>
                            </div>
                        </div>     
                    </div>
               
                </div>

                <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title text-danger" id="exampleModalLabel">Supression alerte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <h6>Etês vous sur de vouloir supprimer votre avatar ?</h6>
                            <p>L'avatar par défaut sera alors attribué à votre user...</p>
                        
                            </div>
                            <div class="modal-footer">
                            
                            <form method="post" action="{{route('compte.destroyavatar')}}" >
                        
                                {{csrf_field()}}
                                <button class="btn text-white"   style="opacity: 0.90;background-color: #660A11">Oui</button>
                            </form>
                            </div>
                        </div>     
                    </div>
               
                </div>


        </div>
    </div>
</div>
@endsection
