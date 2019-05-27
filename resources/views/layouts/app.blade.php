<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <!-- Autorefresh the page every 5 minutes.Only for guest to avoid reloading form when administrating the datas -->
    @guest
        <meta http-equiv="refresh" content="300">
    @endguest
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="main">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>

                <ul class="navbar-nav mm-auto">
                        @auth
                        <a class="navbar-brand" href="{{ route('edit_picket') }}">Liste des piquets</a>   
                    @endauth
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <img src="{{ asset('images/POLYCOM_VD_logo_blanc.png') }}" alt="plycom logo" class="p-1 polycom-logo"/>
        <img src="{{ asset('images/PolCant_DT_badge.png') }}" alt="polcant logo" class="p-1 polcant-logo"/>
    </footer>
</div>

@yield('javascript')
</body>
</html>
    