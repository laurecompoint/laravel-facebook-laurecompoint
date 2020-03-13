@extends('layouts.app')

@section('content')

<div class="container" >


    <div class="row justify-content-center  ">

        <div class="col-md-8 ">
        @if (session('alertdeleteuser'))
                <div class="alert alert-success  mt-4 col-12">
                    {{ session('alertdeleteuser') }}
                </div>
        @endif
      
            <div class="card mt-4">
                <div class="card-header " style="background-color:#4267b2; color:white"><h4 class="mt-2">{{ __('Login') }}</h4></div>

                <div class="card-body  pt-5 col-12"  style="background: url('/img/loginimage.png') no-repeat;  background-size: cover; background-position: center; height: 300px">
              

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                         

                            <div class="col-md-12">
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                           

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn text-white" style="background-color:#4267b2">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
