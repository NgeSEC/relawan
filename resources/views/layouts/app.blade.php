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
    
    <!-- Plugin Geolocation Library -->
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('map/css/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('map/css/leaflet.usermarker.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
</head>
<body>
    <div class="modal fade" id="featureModal" tabindex="-1" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title text-primary" id="feature-title"></h4>
          </div>
          <div class="modal-body" id="feature-info"></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
    
    <!-- Plugin Geolocation Library -->
	<script type="text/javascript" src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
    
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.31&region=ID&language=id&key=AIzaSyAtqWsq5Ai3GYv6dSa6311tZiYKlbYT4mw&libraries=places"></script> 

    @if (Route::getCurrentRoute()->uri() == '/')
    @include('layouts.homescript')
    @endif
</body>
</html>
