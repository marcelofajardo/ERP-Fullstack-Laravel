@include('layouts.head')

<body style="background-color: rgb(222, 247, 247)">
        <nav class=" navbar navbar-expand-lg navbar-light rgba-primary-0">
            <div class="d-flex justify-content-between align-items-center">
                <a class=" fas fa-store-alt fa-2x rgba-complement-letter-3"  href="/"></a>
                <h1 class="ml-3 rgba-complement-letter-3">ShopERP</h1>
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
                            <a class="nav-link " href="{{ route('product.index')}}">Products</a>
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
        <main>
            @yield('content')
        </main>

    @include('layouts.footer')
</body>
</html>
