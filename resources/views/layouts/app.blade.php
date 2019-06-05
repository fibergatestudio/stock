<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'STOCK') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    {{ config('app.name', 'STOCK') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="navbar-nav mr-auto col-md-5">
                        <div style="margin-left: 50px;" class="input-group md-form form-sm form-2 pl-0">
                            <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <span class="input-group-text red lighten-3" id="basic-text1"><i class="fa fa-search text-grey" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>


                    <!-- Right Side Of Navbar -->
                    <!-- <div class="col-md-1 row">
                        <div class="col-md-2"><i class="fa fa-circle mr-3 fa-2x text-white" aria-hidden="true"></div>
                    </div> -->
                    <div class="navbar-nav ml-auto col-md-2">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" >
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <div style="font-size: 20px;" class="col-md-1"><i style="margin-left: -20px;" class="fa fa-circle mr-3 fa-2x text-white" aria-hidden="true"></i></div>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-dark" href="{{ url('/account/'.$id) }}">Account</a>
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </div>
                    <div class="col-md-4 row">
                        <!-- <div class="col-md-1"><i class="fa fa-circle mr-3 fa-2x text-white" aria-hidden="true"></div> -->
                        <div class="col-md-2"><i class="fa fa-envelope mr-3 fa-2x text-white" aria-hidden="true"></i></div>
                        <div class="col-md-2"><i class="fa fa-cog mr-3 fa-2x text-white" aria-hidden="true"></i></div>
                        <div class="col-md-2"><i class="fa fa-heart fa-2x text-white" aria-hidden="true"></i></div>
                        <div class="col-md-2"><i class="fa fa-shopping-cart fa-2x text-white" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
