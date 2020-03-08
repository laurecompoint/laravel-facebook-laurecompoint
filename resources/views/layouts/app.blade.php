<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <!-- Styles -->
     <style>

.title {
    font-size: 84px;
}

.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}

.m-b-md {
    margin-bottom: 30px;
}
html, body { font-family: 'Nunito', sans-serif; font-weight: 200; margin: 0; box-sizing: border-box; }
section { position: relative; height: 100vh; width: 100%; }
.left, .right { width: 100%; }
.left { background: url('/img/facebook.jpg') no-repeat;  background-size: cover; background-position: center; }
img { width: 100%; }
input { border:none; border-bottom: 1px solid #999; width: 50%;}
span { font-weight: 600; }
footer { position: absolute; bottom: 8%; font-size: 12px;}
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  shadow-sm"  style="background-color:white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#4267b2">
                <i class="fa fa-facebook-square" style="font-size:24px"></i>  {{ config('app.name', 'Laravel') }} 
                </a>
            
                <form method="POST" action="{{URL::to('/search')}}" role="search">
                {{csrf_field()}}
                <div class="input-group mb-3">
                <input type="text" class="form-control mt-3"  name="search" placeholder="Search...">
                <div class="input-group-append mt-3">
                    <button class="btn buttonsearch" style="border-color: #4267b2;" type="submit"><i class='fas fa-search' style='font-size:15px'></i></button>
                </div>
                </div>
                </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-white" >
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"  style="color:#4267b2">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"  style="color:#4267b2">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                    <a class="nav-link" href="friends"  style="color:#4267b2">Friends</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="timeline"  style="color:#4267b2">TimeLine</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"  style="color:#4267b2" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"  
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="/account">
                                        Account
                                    </a>
                                    <a class="dropdown-item" href="/{{ Auth::user()->name }}">
                                        Profil
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
