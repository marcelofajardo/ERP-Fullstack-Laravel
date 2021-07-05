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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&family=Oswald:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            font-family: 'Oswald', sans-serif;
        }

        .logo {
            font-family: 'Nunito', sans-serif;
        }

        body {
            height:100%;
            position:relative;
        }
        

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="mr-auto navbar-nav">
                        <li class="nav-item">
                            <a class=" nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <!-- starts -- THE USER NEED TO BE LOGGED FOR SEE THESE LINKS-->
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product.index')}}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('clients.index')}}">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('employees.index') }}">Employees</a>
                        </li>
                        @endauth
                        @endif
                        <!-- ends -- THE USER NEED TO BE LOGGED FOR SEE THESE LINKS-->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
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
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="py-5 ">
            @yield('content')
        </main>
    </div>
   @include('layouts.footer')
   <script src=
"https://code.jquery.com/jquery-3.3.1.slim.min.js" 
                integrity=
"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
                crossorigin="anonymous"></script>
        <script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
                integrity=
"sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 
                crossorigin="anonymous"></script>
        <script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
                integrity=
"sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
                crossorigin="anonymous"></script>
</body>

</html>
