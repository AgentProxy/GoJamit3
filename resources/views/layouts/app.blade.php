<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @yield('head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">

        .navbar-brand{
            font-size: 20px;
            font-weight: bold;
        }

        .navbar-brand:hover{
            background-color: rgb(0,0,0);
        }

        .navbar{
            margin-bottom: 0;
            background-color: rgb(15, 15, 15);

        }

        .nav-user *{
            float: left;
        }

        .navbar-brand img,
        .nav-user img{
            border-radius: 50%;
            width: 30px;
            height: 30px;
            margin-right: 0.5em;
            position: absolute;
        }

        .navbar-brand span,
        .nav-user{
            display: inline-flex;
            /*justify-content: center;*/
            align-items: center;
        }

        .navbar-brand p,
        .nav-user > p{
            margin: 0 0 0 35px;
        }

        .nav{
            font-weight: bold;
        }


    </style>

    <!-- Scripts -->
    <script type="text/javascript" src="/js/js.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top ">
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
                    <a class="navbar-brand" href="/">
                        <span>                        
                            <img class="logo" src="/img-uploads/gojammitLogo.png" /> 
                            <p>GOJamIt!</p>
                        </span>
                    </a>
                </div>
                @if (Auth::guest())
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
                @else
                <div class="navbar-left">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/home">Home</a>
                        </li>
                        <li>
                            <a href="/discover/{{Auth::user()->username}}">Discover</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">Messages <span class="badge">0</span></a>
                        </li>
                        <li>
                            <a id="notifs-tab" href="/notifications/{{Auth::user()->username}}"> Notifications <span class="badge">{{Auth::user()->notifications->where('seen',0)->count()}}</span>
                            </a> 
                        </li>
                         <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="nav-user">
                                    @if(Auth::user()->prof_pic == null)
                                    <img src="/img-uploads/maleDefault.png"/>
                                    @else
                                    <img src="/img-uploads/{{Auth::user()->prof_pic}}"/>
                                    @endif
                                    <p>{{ Auth::user()->fname }}</p>
                                    <span class="caret"></span>
                                </span>
                            </a>
                             <ul class="dropdown-menu" role="menu">
                                <li><a href="/profile/{{ Auth::user()->username }}/about">My profile</a></li>
                                <li><a href="/profile/{{ Auth::user()->username }}/settings">Settings</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
            
        </nav>

        @yield('content')
    </div>

     <!-- Notifs Modal -->
      <!--   <div class="modal fade" id="notifsModal" role="dialog">
            <div class="modal-dialog"> -->
                <!-- Modal content-->
                <!-- <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Notifications</h4>
                    </div>
                    <div class="modal-body">

                        @forelse(Auth::user()->notifications as $notification)
                            <div>
                                @if($notification->type == "1")
                                    <a>{{$notification->notifier_id}}</a> has followed you;
                                @elseif($notification->type == "2")
                                    {{$notification->id}} has liked your post;
                                @else
                                    {{$notification->id}} has commented on your post;
                                @endif
                            </div>
                            @empty
                                <p>Oh no! Nobody is following you.</p> 
                        @endforelse
                    </div>
                    <div class="modal-footer">
                        <p> </p>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div> -->
<!-- 
            </div>
        </div> -->
        <!--  END OF MODAL -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
