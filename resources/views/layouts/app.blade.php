<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="description" content="@yield('description')" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta property="og:title" content="Altiora" />
    <meta property="og:description"
        content="Altiora is an esports community founded on principles of sportsmanship, respect, and diversity. We aim to provide a safe space c..." />
    <meta property="og:image" content="/img/embed_img.png" />
    <meta property="og:image:url" content="/img/embed_img.png" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="500" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Altiora" />
    <meta name="twitter:description"
        content="Altiora is an esports community founded on principles of sportsmanship, respect, and diversity. We aim to provide a safe space c..." />
    <meta name="twitter:image" content="/img/embed_img.png" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Altiora') }} - @yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.structure.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/purecookie.css') }}">
</head>

<body @auth style="margin-top: 40px;" @endauth>
    <div id="app">

        @auth
            <div class="fixed-top logged-in">
                <span>You are logged in, {{ Auth::user()->name }}!</span>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="float-right">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <span class="float-right">|</span>
                <a href="/backend" class="float-right">Go to backend</a>

            </div>
        @endauth
        <header>
            <nav class="navbar navbar-expand-md navbar-light p-0">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="brand-img" src="/img/logo_darklineonly.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse border-t-b" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav w-100 justify-content-around">
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('about-us') ? ' active' : '' }}"
                                    href="{{ route('about-us') }}">
                                    {{ __('About us') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('staff') ? ' active' : '' }}"
                                    href="{{ route('staff') }}">
                                    Staff
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link{{ Request::is('teams*') ? ' active' : '' }}"
                                    href="{{ route('teams') }}">
                                    Teams
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                                    <a class="nav-link{{ Request::is('downloads*') ? ' active' : '' }}"
                                                       href="{{ route('downloads') }}">
                                                        Downloads
                                                    </a>
                                                </li> --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle{{ Request::is('downloads*') || Request::is('wallpapers*') ? ' active' : '' }}"
                                    href="#" data-toggle="dropdown">Downloads</a>
                                <ul class="dropdown-menu altiora-dropdown">
                                    <li><a href="{{ route('downloads') }}" class="dropdown-item">Documents</a></li>
                                    <li><a href="{{ route('wallpapers') }}" class="dropdown-item">Wallpapers</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact.applications') }}"
                                    class="nav-link{{ Request::is('*applications*') ? ' active' : '' }}">Apply!</a>
                            </li>
                            {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle{{ Request::is('contact*') ? ' active' : '' }}" href="#"
                               data-toggle="dropdown">
                                Contact us
                            </a>
                            <ul class="dropdown-menu altiora-dropdown">
                                <li><a href="{{ route('contact.applications') }}" class="dropdown-item">Apply</a></li>
                            </ul>
                        </li> --}}
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @if (session('success'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-9">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(session('error'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-9">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <main class="pt-4">
            @yield('content')
        </main>
        <footer class="footer">
            <div class="container-fluid dark-background">
                <div class="row">
                    <div class="col-md-5 d-flex d-md-block justify-content-center">
                        <a href="/">
                            <div class="footer-column d-flex align-items-center">
                                <img src="/img/logo_darklineonly.png" alt="logo" class="logo">
                                <h2>Altiora</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 d-flex d-md-block justify-content-center">
                        <div class="footer-column d-flex flex-column justify-content-center">
                            <h2>Info:</h2>
                            <a href="{{ url('/privacy-policy') }}">Privacy policy</a>
                            <a href="{{ url('/legal-notice') }}">About this website</a>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex d-md-block justify-content-center">
                        <div class="footer-column d-flex flex-column justify-content-center">
                            <h2>Find us on social media:</h2>
                            <a href="https://twitter.com/Altiora_Gaming" target="_blank">
                                <img src="/img/brand-icons/twitter.png" alt="Twitter logo" class="social-logo">
                                Altiora_Gaming
                            </a>
                            <a href="https://www.twitch.tv/altiora_gaming" target="_blank">
                                <img src="/img/brand-icons/twitch.png" alt="Twitch logo" class="social-logo">
                                Altiora_Gaming
                            </a>
                            <a href="https://www.youtube.com/channel/UCsPUuzhqko-4_x8HB1N5_XA" target="_blank">
                                <img src="/img/brand-icons/youtube.png" alt="YouTube logo" class="social-logo"> Altiora
                            </a>
                            <a href="http://discord.altiora.rocks" target="_blank">

                                <img src="/img/brand-icons/discord.png" alt="Discord logo" class="social-logo"> Discord
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Scripts -->

    <script src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/lightbox.min.js') }}" defer></script>
    <script src="{{ asset('js/lazy.js') }}" defer></script>
    <script src="{{ asset('js/select2.full.js') }}"></script>
    <script src="{{ asset('js/twitch.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/purecookie.js') }}"></script>
</body>

</html>
