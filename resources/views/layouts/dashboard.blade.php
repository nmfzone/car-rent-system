<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @stack('stylesheets')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
          <div class="row m-b-md">
            <div class="col-md-9 col-md-offset-3">
              @yield('content_header')
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="panel panel-primary panel-flush">
                <div class="panel-heading">
                  Menu
                </div>
                <div class="panel-body">
                  <div class="tabs">
                    <ul class="nav menu-stacked-tabs" role="tablist">
                      <li class="active">
                        <a href="{{ route('dashboard') }}">
                          <i class="fa fa-fw fa-btn fa-home"></i>&nbsp;&nbsp;Dashboard
                        </a>
                      </li>
                      @if (auth()->user()->isOwner())
                        <li>
                          <a href="{{ route('cars.index') }}">
                            <i class="fa fa-fw fa-btn fa-car"></i>&nbsp;&nbsp;Mobil
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('bookings.index') }}">
                            <i class="fa fa-fw fa-btn fa-shopping-cart"></i>&nbsp;&nbsp;Booking
                          </a>
                        </li>
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-9">
              @yield('content')
            </div>
          </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    @stack('javascripts')
</body>
</html>
