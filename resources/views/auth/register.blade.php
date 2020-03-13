@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header" style="background-color:#4267b2; color:white"><h4 class="mt-2">{{ __('Register') }}</h4></div>

                <div class="card-body" style="background: url('/img/registerimage.png') no-repeat;  background-size: 400px; background-position: right;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                           

                            <div class="col-md-7">
                            <label for="name" class="">{{ __('Name') }}</label>
                                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                           

                            <div class="col-md-7">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                           
                            <div class="col-md-7">
                            <label for="password" class="">{{ __('Password') }}</label>
                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                           

                            <div class="col-md-7">
                            <label for="password-confirm" class="">{{ __('PasswordConfirm') }}</label>
                                <input id="password-confirm" placeholder="Password Confirme" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn text-white" style="background-color:#4267b2">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
