<!DOCTYPE html>
<html lang="en">
<head>
  <title>Expense Tracker Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Scripts -->
  
    <!-- Fonts -->
      <link rel="icon" href="{{ URL::asset('photo/icon1.svg') }}" type="image/x-icon"/>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
     
  <style>
     html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                margin: 0;
  }
  .nav-link{
      font-family: 'Nunito', sans-serif;
     font-weight: 200;
  }
  .fakeimg {
    height: 500px;
     margin: 0;
  }
  .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
    font-family:Allerta Stencil;
   font-size:16px;
   font:bold;
   text-align: center;
}
  </style>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <img src="{{ asset('photo/icon1.svg') }}" style="height:50px;" alt="">
  <a class="navbar-brand" style="font-family:Allerta Stencil;font-size:20px;">Expense Tracker Admin Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  </div>
      <div class="pull-right">
      <ul class="navbar-nav"> 
      <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>welcome Admin
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 
                                {{-- <div class="dropdown-menu" aria-labelledby="navbarDropdown"> --}}
          
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a> 


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> 
    </ul></div>
  </div>  
</nav>

<div class="container" style="margin-top:30px;">
  <div class="row">
    <div class="col-sm-4">
      <ul class="nav nav-pills flex-column border border-dark rounded bg-dark">
        <li class="navbar-brand">
          <a class="nav-link" style="color: white;">Action</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('category.index') }}">Manage Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Manage User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">logout</a>
        </li>
      </ul>

      <hr class="d-sm-none">
    </div>
    <div class="col-sm-8">
      @yield('title')
    
      <div class="fakeimg border border-primary rounded">
      @yield('content')
    </div>
      <br/>
    </div>
  </div>
</div>
 <br/>
<div class="footer text-center bg-dark py-1">
© 2020 Copyright:
    ExpenseTracker
</div>

  <script src="{{ asset('js/app.js') }}" defer></script>
 
</body>

</html>
