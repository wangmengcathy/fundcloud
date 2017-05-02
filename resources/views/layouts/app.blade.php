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
    <link href="{{ asset('css/autocomplete.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom:0px">
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
                    <a class="navbar-brand" href="{{ url('/home') }}" id = "lefttop">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <script>
                        document.getElementById("lefttop").innerHTML += "\u26F1";
                    </script>
                    <a class="navbar-brand" href="{{ url('/projects/create') }}" id = "lefttop">
                        <span>Start a project</span>
                    </a>
                    <a class="navbar-brand" href="{{ url('/projects') }}" id = "lefttop">
                        <span>Project Square</span>
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
                                        </div>
                                </svg>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">                               
                                    <li>
                                    <a href="/profile">Profile</a>
                                    </li>
                                    <li>
                                    <a href="/home/myprojects">My Projects</a>
                                    </li>
                                    <li>
                                    <a href="/home/likefeeds">Like Feeds</a>
                                    </li>
                                    <li>
                                    <a href="/home/pledgefeeds">Pledge Feeds</a>
                                    </li>
                                    <li>
                                    <a href="/home/follows">Follow Feeds</a>
                                    </li>
                                    <li>
                                    <a href="/home/recommend">Recommend Feeds</a>
                                    </li>
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
        <div class="content">
            @if(Session::has('flash_message'))
                <div class="alert alert-success alert-disappear">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('flash_message')}}
                </div>
            @endif
            @yield('content')

        </div>
        <div class="content2">
            @yield('content2')
        </div> 
    </div>
    <div class="col-sm-12">
        <div class="social-buttons">
            <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
            <a href="https://twitter.com/?lang=en" class="fa fa-twitter"></a>
            <a href="https://www.google.com/" class="fa fa-google"></a>
            <a href="https://www.linkedin.com" class="fa fa-linkedin"></a>
        </div>
    </div>
    

    <!-- Scripts -->
       
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
            var words = ['boat', 'dog', 'drink', 'drink a coffee', 'elephant', 'fruit', 'London'];
            $(document).ready(funcBegin); 
            $(document).ready(function(){
                $('#search-bar').autocomplete({
                    hints: words,
                    width: 300,
                    height: 30,
                    onSubmit: function(text) {
                        window.location="{{ url('/home/search') }}" + "/" + text;
                    }
                });
            });
    </script>
</body>
</html>
