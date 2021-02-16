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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            @yield('css')


    <style type="text/css">
        .modal-dialog.left-sidebar {
            position: absolute;
            left: 0;
            top: 0;
            margin: 0;
        }

        .modal-dialog.left-sidebar .modal-content {
            width: 200px;
        }
        .modal-dialog.left-sidebar .modal-body {
            padding: 0;
        }
        .sidebar-menu ul {
            list-style: none;
            padding: 0;
        }
        .sidebar-menu ul li a {
            font-size: 15px;
            padding: 10px 20px;
            display: block;
        }

        .sidebar-menu ul li a i {
            padding: 0 5px 0 0;
        }

        .sidebar-menu ul li {
            font-weight: 700;
        }

        .sidebar-menu ul li:hover a{
            background: #1cbfa1;
        }

        .sidebar-menu ul li:hover a{
            color: white;
        }
        .sidebar-menu ul li.active {
            background: #1cbfa1;
            color: #fff;
        }
        .sidebar-menu ul li.active a{
            color: #fff;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-list"></i></a></li>
                        <li><a href="{{ route('home') }}" class="btn btn-outline-primary">Home</a></li>
                        <li><a href="{{ route('user.index') }}" class="btn btn-outline-primary">User</a></li>
                        <li><a href="{{ route('product.index') }}" class="btn btn-outline-primary">Product</a></li>
                        <li><a href="{{ route('order.index') }}" class="btn btn-outline-primary">Order</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog left-sidebar">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Sidebar</b></h5>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close"> <i class="fa fa-times"></i> </button>
      </div>
      <div class="modal-body">
        @include('layouts.sidebar')
      </div>
    </div>
  </div>
</div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
@yield('js')
</body>
</html>
