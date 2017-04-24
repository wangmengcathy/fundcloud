<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
=======
    <style>

    #search-bar{
        display: none;
    }
    #i1{
        cursor: pointer;
    }
    </style>
>>>>>>> origin/master

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<<<<<<< HEAD
   
=======
    <script>
            function main() {
                $(document).ready(function(){
                    $("#i1").click(function(){
                        $("#i1").css("display", "none");
                        $("#search-bar").css("display", "inline-block");
                    });
                });
                $(document).ready(function(){
                    $("#content").click(function(){
                        $("#i1").css("display", "inline-block");
                        $("#search-bar").css("display", "none");
                    });
                });
            }
            $(document).ready(main); 
    </script>
>>>>>>> origin/master
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
<<<<<<< HEAD
                    <a class="navbar-brand" href="{{ url('/home') }}" id = "lefttop">
=======
                    <a class="navbar-brand" href="{{ url('/') }}" id = "lefttop">
>>>>>>> origin/master
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <script>
                        document.getElementById("lefttop").innerHTML += "\u26F1";
                    </script>
                    <a class="navbar-brand" href="{{ url('/projects/create') }}" id = "lefttop">
                        <span>Start a project</span>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li>
                                <svg width="30" height="30"> 
                                        <g id = "search-tag" >
                                        <img src="http://worldartsme.com/images/search-button-clipart-1.jpg" alt="Smiley face" height="25" width="25" id = "i1">
                                        </g>
                                </svg>
                            </li>
                            <li>
                                <svg width="30" height="30"> 
                                        <div class="form-group" id="search-bar">
                                            <input type="text" class="form-control" id="search-content">
                                        </div>
                                </svg>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
<<<<<<< HEAD
        <div class = "content">
=======
        <div id = "content">
>>>>>>> origin/master
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
       
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
            $(document).ready(topBar); 
    </script>
</body>
</html>
