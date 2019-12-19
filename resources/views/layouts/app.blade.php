<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

 
    <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css ') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


</head>
<body>
  
         <nav class="navbar navbar-inverse navbar-fixed-top" >
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="{{ route('index') }}"><img src="{{ asset('img/icon.png') }}" style="width: 70px; margin-top: 5px; opacity: 2"></a>
       <!--        <a href="#home" class="navbar-brand page-scroll">Tiket Acara</a> -->
            </div>

             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          </ul>         
          <ul class="nav navbar-nav navbar-right"  style="opacity:  2">                       
            
           <li>           
                  @guest
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Feathur <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="{{ route('listevent') }}">Event</a></li>
                                <li><a href="{{ route('listnews') }}">Berita</a></li>                
                              </ul>
                            </li>
                            <li><a href="#">Contact us</a></li>
                            <!-- <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"> </span><span class="badge"> 0</span></a></li>        -->    
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Feathur <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ route('listevent') }}">Event</a></li>
                            <li><a href="{{ route('listnews') }}">Berita</a></li>                
                          </ul>
                        </li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="{{ url('keranjang') }}"><span class="glyphicon glyphicon-shopping-cart"> </span><span class="badge"> 3</span></a></li>   
                             <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="glyphicon glyphicon-user"></a>
                          <ul class="dropdown-menu">
                            @can('isAdmin')
                            <li><a href="{{ url('/home') }}">Dashboard</a></li>
                            @endcan
                            @can('isAdminAcara')
                            <li><a href="{{ url('/home') }}">Dashboard</a></li>
                            @endcan
                            <li><a href="{{ route('profile') }}">Profile</a></li> 
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a></li>   
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>            
                          </ul>
                        </li>
                        @endguest
          </ul>
          </div>
        </nav>
       <!--  -->

        <main class="py-4">
            @yield('content')
        </main>
        <!--  <footer class="page-footer" style=" bottom: 0">
                <div class="container-fluid text-center">  
                  <div class="row"> 
                    <div class="col-sm-12">
                      <p> &copy;copyright 2019 | Built by<a href="https://www.instagram.com/yusufkencana/">Tiket Acara</a> </p>
                       <a href="#" class="fa fa-facebook">  </a> <a href="https://www.instagram.com/yusufkencana" class="fa fa-instagram">  </a> <a href="yusufkencana@gmail.com" class="fa fa-google">  </a> 
                    </div>
                  </div>  
                </div>  
              </footer> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>
