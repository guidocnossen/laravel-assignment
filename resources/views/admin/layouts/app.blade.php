<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Huizen CMS | Fundamental</title>

    <meta name="format-detection" content="telephone=no">

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#801714">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#801714">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#801714">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/theme/favicon.png') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}?v=2"/>

    <link rel="manifest" href="manifest.json"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <nav class="masthead">
        <div class="header">
            
            <a class="header__name" href="{{ url('/') }}">
                Huizen CMS - Fundamental
            </a>

            <div class="header__account" id="navbarSupportedContent">

                <!-- Right Side Of Navbar -->
                <ul class="header__account-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="header__account-nav-item">
                            <a class="header__account-nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="header__account-nav-item">
                                <a class="header__account-nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="header__account-nav-item">
                            <a id="navbarDropdown" class="header__account-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->full_name() }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="dashboard">
        <aside class="dashboard__sidebar">

            <nav class="dashboard__sidebar-nav">
                <ul class="menu">
                    <li class="menu__item">
                        <a href="{{ route('admin.dashboard') }}" class="menu__link" title="Dashboard">
                            <div class="menu__link-icon">
                                <i class="far fa-tachometer-alt"></i>
                            </div>
                            <div class="menu__link-text">
                                Dashboard
                            </div>
                        </a>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('admin.houses.index') }}" class="menu__link" title="huizen">
                            <div class="menu__link-icon">
                                <i class="far fa-hands-heart"></i>
                            </div>
                            <div class="menu__link-text">
                                Huizen
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="flex-spacer"></div>

        </aside>
        <main class="dashboard__main">
            <div class="dashboard__inner">

                @include('flash::message')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                        @endforeach
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
