<!doctype html>
<html lang="{{  app()->getLocale() }}">

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
            position:relative
        }
        .btn-outline-dark:not(:disabled):not(:disabled):active {
            background: red;
        } 

    </style>
</head>
<body>
        <nav class=" navbar navbar-expand-lg navbar-light bg-warning">
            <div class="d-flex justify-content-between align-items-center">
                <i class=" fas fa-store-alt fa-2x text-success"></i>
                <h1 class="ml-3">ShopERP</h1>
                @guest
                    <a class="nav-link" style="text-decoration:none;" href="{{ route('product.publicIndex') }}"><h5>{{ __('Products') }}</h5></a>
                @endguest
            </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="ml-auto navbar-nav">
                        <li class="nav-item">
                            <a class="ml-5 nav-link active" aria-current="page" href="/">{{__('Home')}}</a>
                        </li>
                        <!-- starts -- THE USER NEED TO BE LOGGED FOR SEE THESE LINKS-->
                        @if (Route::has('login'))
                        @auth
                        @if(Auth::user()->type === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index')}}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clients.index')}}">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Orders</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
                        </li>
                        @elseif(Auth::user()->type ==='client')
                        <li class="nav-item">
                            <a class="nav-link" href="">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('clients.index')}}">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Orders</a>
                        </li>
                        @elseif(Auth::user()->type === 'employee')
                        <li class="nav-item">
                            <a class="nav-link " href="#">Orders</a>
                        </li>
                        @endif
                        @endauth
                        @endif
                        <!-- ends -- THE USER NEED TO BE LOGGED FOR SEE THESE LINKS-->
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
                        @include('cart.partials.navbar')
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
                                {{ Auth::user()->name }}   <span class="ml-2"> {{ Auth::user()->type }} </span>
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
                <ul class="ml-5 navbar-nav">
                        <a href="{{ url('locale/ca') }}" class="btn btn-outline-dark">CAT</a>
                        <a href="{{ url('locale/en') }}" class="btn btn-outline-dark">EN</a>
                        <a href="{{ url('locale/es') }}" class="btn btn-outline-dark">CAST</a>
                    </ul>

        </nav>
        <main class="py-5 ">
            @yield('content')
        </main>
    @include('layouts.footer')
</body>
</html>
