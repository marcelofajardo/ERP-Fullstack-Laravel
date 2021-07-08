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
            position:relative;
        }


    </style>
</head>

<body>


        <nav class=" navbar navbar-expand-lg navbar-light bg-warning">
            <div class="d-flex justify-content-between align-items-center">


                <i class=" fas fa-store-alt fa-2x text-success"></i>

                <h1 class="ml-3">ShopERP</h1>
            </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="ml-auto navbar-nav">
                        <li class="nav-item">
                            <a class="ml-5 nav-link active" aria-current="page" href="/">Home</a>
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
                    <ul class="ml-5 navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Languages
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('locale/en') }}">English</a>
                                <a class="dropdown-item" href="{{ url('locale/ca') }}">Catalan</a>

                                <a class="dropdown-item" href="{{ url('locale/es') }}">Spanish</a>
                              </div>
                        </li>


                    </ul>
                    <p class="m-auto ">{{ App::getLocale() }}</p>
                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.publicIndex') }}">{{ __('Products') }}</a>
                        </li>
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index', 0) }}" data-toggle="tooltip" data-placement="bottom" title="{{ __('cart.show_cart') }}"><i class="fas fa-shopping-cart"></i> {{ __('cart.cart') }}</a>
                        </li>
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

        </nav>





        <main class="py-5 ">
            @yield('content')
        </main>

   @include('layouts.footer')
</body>

</html>
