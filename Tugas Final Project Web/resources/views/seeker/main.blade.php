<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f8fafc;
        color: #2d3748;
    }

    #app {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    nav {
        background-color: #7d147d;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
        color: #ffffff;
        font-size: 1.5rem;
        font-weight: 700;
        text-decoration: none;
    }

    .navbar-toggler {
        border: none;
        padding: 0;
    }

    .navbar-toggler-icon {
        background-color: #ffffff;
    }

    .navbar-nav .nav-item {
        margin-right: 10px;
    }

    .navbar-nav .nav-link {
        color: #ffffff;
        font-weight: 500;
        transition: color 0.3s;
    }

    .navbar-nav .nav-link:hover {
        color: #dcdcdc;
    }

    .dropdown-menu {
        background-color: #7d147d;
        border: none;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
        color: #ffffff;
        font-weight: 500;
        transition: color 0.3s;
    }

    .dropdown-item:hover {
        background-color: #5b2056;
        color: #ffffff;
    }

    .py-4 {
        flex-grow: 1;
    }
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
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

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('seeker') }}">Home</a>
                                    <a class="dropdown-item" href="{{ route('seeker.job') }}">Job Post Management</a>
                                    <a class="dropdown-item" href="{{ route('seeker.applications') }}">My Application</a>
                                    <a class="dropdown-item" href="{{ route('seeker.profile') }}">Profile</a>
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
