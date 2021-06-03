<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
  
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
      <link rel="icon" href="{{ URL::asset('photo/icon1.svg') }}" type="image/x-icon"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
     <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                 <img src="{{ asset('photo/icon1.svg') }}" style="height:50px;" alt="">
                <a class="pl-3 ml-3 pt-2" style="font-size:26px;font:bold;font-family:Jokerman;color: white;" href="">
                    {{ config('app.name', 'Expense Tracker') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="font-size:20px;font:bold;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:white;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color:white;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

         <li class="nav-item dropdown">
        <a style="color:white;" class="nav-link dropdown-toggle" role="dropdown-menu" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Manage Income
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" style="font-family:Allerta Stencil;" href="{{ route('credit.create') }}">Add Income</a>
          <a class="dropdown-item" style="font-family:Allerta Stencil;" href="{{ route('credit.index') }}">Update Income</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a style="color:white;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          Manage Expense
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" style="font-family:Allerta Stencil;" href="{{ route('debit.create') }}">Add Expense</a>
          <a class="dropdown-item" style="font-family:Allerta Stencil;" href="{{ route('debit.index') }}">Update Expense</a>
        <a class="dropdown-item" style="font-family:Allerta Stencil;" href="{{url('/chart')}}">View Chart</a>
          </div>
      </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:white;">
                                 WelCome,   {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="font-family:Allerta Stencil;" href="{{ route('logout') }}"
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
    <!-- Footer -->
<footer class="footer">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    ExpenseTracker
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
  <script src="{{ asset('js/app.js') }}" defer></script>
   @yield('javascript')
</body>
</html>
