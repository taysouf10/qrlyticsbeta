<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="wrapper">
        @guest
            <main class="py-4">
                @yield('content')
            </main>
        @else
        <nav id="sidebar" class="sidebar-custom">
            <div class="sidebar-header">
                <h3>QRlytics</h3>
                <strong>BS</strong>
            </div>
            <div class="d-flex flex-column justify-content-around" style="height: 100%;">
                <div>
                    <ul class="list-unstyled ">
                        <li class="">
                            <a href="#">
                                <i class="fas fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteNamed('compaigns') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard/compaigns') }}">
                                <i class="fas fa-briefcase"></i>
                                Compaigns
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteNamed('links') ? 'active' : '' }}">
                            <a href="{{ url('/dashboard/links') }}">
                                <i class="fas fa-copy"></i>
                                Qr Codes
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-image"></i>
                                My Account
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-question"></i>
                                Plans and payments
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-paper-plane"></i>
                                Users
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">
                                <i class="fas fa-home"></i>
                                {{ Auth::user()->username }}
                            </a>
                        </li>
                        <li class="">
                            <div>
                                <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-home"></i>
                                        {{ __('Logout') }}
                                </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4 main-content">
            @yield('content')
        </main>
        @endguest

    </div>
</body>
</html>
