<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'POSKO.ID') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('map/css/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('map/css/leaflet.usermarker.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="POSKO.ID" title="POSKO.ID" height="28"/>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                        <li><a href="{{ route('daftar-posko') }}">Posko</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <form method="post" action="/" class="search-head">
                                <input type="search" name="search">
                            </form>
                        </li>   
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    @include('layouts.footer')
    <!-- Scripts -->
    <script src="{{ asset('map/js/leaflet.js') }}"></script>
    <script src="{{ asset('map/js/leaflet.extras.js') }}"></script>
    <script src="{{ asset('map/js/leaflet.usermarker.js') }}"></script>
    <script type="text/javascript">
    
        L.Control.ResetView.TITLE = "Reset view";
        L.Control.ResetView.ICON = "url({{ asset('map/js/images/reset-view.png') }})";
        
    </script>
    <script src="{{ asset('map/js/kml.js') }}"></script>
    @if (Route::getCurrentRoute()->uri() == '/')
    @include('layouts.homescript')
    @endif
</body>
</html>
