<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('js/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    
    <script src="{{ asset('js/boostrap5js.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/material.js') }}"></script>
    <script src="{{ asset('js/proper.js') }}"></script>
    <!-- <script src="{{ asset('js/materialSelect.js') }}"></script> -->
    @yield('script')
    <script>
        window.onload = function(){
            $("#navbarDropdown").click(function(){
                    $(".dropdown-menu").toggleClass("d-block");
            })
            $("button[data-bs-target='#navbarSupportedContent']").on('click', function(){
                $("#nav-left").slideToggle();
            });
        }
        
    </script>    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
        

    <!-- Styles -->
    <style>
        .tableheaderHolder{
            position: absolute !important;
            top: 88px;
            left: 30% !important;
            display: flex;
            justify-content: center;
        }
        #nav-left ul{
            list-style: none;
            margin: 0px;
            padding:0px;
            width: 100%;
            user-select: none;

        }
        #nav-left ul li > a{            
            padding: 12px 10px;
            color:#555;
            text-decoration: none;
            display: block;
            cursor: pointer;            
            border-bottom: 1px solid #ccc;
        }
        #nav-left ul li:hover{
            background-color: #0d6efd;
        }
        #nav-left ul li:hover a{
            color:white;
            
        }
        .Active{
            background-color: #f8f9fa;
        }
        .Active a{
            color:#555 !important;
        }       

/* width */
::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 6px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: rgb(135, 207, 230);
  border-radius: 6x;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: rgb(98, 187, 214);
}
#table1212 div{
    padding: 0px !important;
}
</style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="position-relative">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="m-0 p-0 row">
            @guest
            @else
            <div id="nav-left" class="col-md-2 bg-white pt-5 mx-0 px-0">
                <ul>
                    <li class="{{ Request::is('home')?'Active': ''}}"><a href="/home">Home</a></li>
                    <li class="{{ Request::is('add-user')?'Active': ''}}"><a href="/add-user">Add New</a></li>
                    <li class="{{ Request::is('death-list')?'Active': ''}}"><a href="/death-list">Death List</a></li>
                    <li class="{{ Request::is('dismissal')?'Active': ''}}"><a href="/dismissal">Dismissal</a></li>
                    <li class="{{ Request::is('phone')?'Active': ''}}"><a href="/phone-book">Phone Book</a></li>
                    <li class="{{ Request::is('transfer')?'Active': ''}}"><a href="/transfer">Transfer List</a></li>
                </ul>
            </div>
            @endguest
            <main class="py-4 @guest col-md-12 @else col-md-10 @endguest">
                <?php
                    $routes = array(

                        'home',
                        'add-user',
                        'transfer',
                        'death-list',
                        'dismissal'
                        );
                ?>
                @foreach($routes as $rt)
                    @if(Request::is($rt))
                    <h4 class="text-info p-2 m-0 bg-white" style="text-transform: uppercase;">::{{$rt}}</h4>
                    @endif
                @endforeach
                @yield('content')
            </main>
            
        </div>
    </div>
</body>
</html>
