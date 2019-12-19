<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tiket Acara</title>

        <!-- Fonts -->
        <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css ') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
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
              <a href="{{ route('index') }}">
                <img src="{{ asset('img/icon.png') }}" style="width: 70px; margin-top: 5px; opacity: 2">
                </a>
       <!--        <a href="#home" class="navbar-brand page-scroll">Tiket Acara</a> -->
            </div>

             <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          </ul>         
          <ul class="nav navbar-nav navbar-right"  style="opacity:  2">                       
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Feathur <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('listevent') }}">Event</a></li>
                <li><a href="{{ route('listnews') }}">Berita</a></li>                
              </ul>
            </li>
            <li><a href="#">Contact us</a></li>
            <li><a href="{{ url('keranjang') }}"><span class="glyphicon glyphicon-shopping-cart"> </span><span class="badge"> 0</span></a></li>           
                 @if (Route::has('login'))
        
                    @auth
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
                       <!--  <li>
                            <a href="{{ url('/home') }}">{{ Auth::user()->name }}<span class="glyphicon glyphicon-user"></a>
                        </li> -->
                    @else
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                        @if (Route::has('register'))
                          <li><a href="{{ route('register') }}"> Register</a></li>
                        @endif
                    @endauth
             
            @endif
          </ul>
          </div>
        </nav>
        <br>
        <br>
        <br>
        <div > 
        <main class="py-4">                       
            <!-- Jumbotron -->             
                  <div class="col-sm-10">      
                    <div id="myCarousel" class="carousel slide " data-ride="carousel" style="width: 120%">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                   
                        <div class="item active">
                        <a href="">
                          <img src="{{ asset('image/jumbotron/gambar1.jpg') }}" alt="Los Angeles">
                        </a>
                        </div>

                        <div class="item">
                           <a href="">
                          <img src="{{ asset('image/jumbotron/gambar2.jpg') }}" alt="Los Angeles">
                        </a>
                        </div>

                        <div class="item">
                          <a href="">
                          <img src="{{ asset('image/jumbotron/gambar3.jpg') }}" alt="Los Angeles">
                        </a>
                        </div>

                        <div class="item">
                          <a href="">
                          <img src="{{ asset('image/jumbotron/gambar4.jpg') }}" alt="Los Angeles">
                        </a>
                        </div>
                      </div>                    

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div>
              </div>
       


            <section class="sale" id="sale">
                <div class="container">
                  <div class="row">
                    <br>                 
                  </div>

                  <div class="row text-center">
                    <br>                   
                    <h2> LIST EVENT ON THIS WEEKEND</h2><hr>
                  </div>

                  @foreach($event as $data)
                  <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                      <a href="detail_produk.html" class="thumbnail">
                         <img src="{{asset('/image/event/'.$data->id.'/'.$data->poster)}}">
                      </a>
                    </div>
                    <div class="col-sm-7">
                      <p><b>{{$data->nama_event}}</b></p>
                      <p>{{$data->keterangan_event}}</p>
                      <p><br><a href="{{ route('detailevent',$data->id) }}" class="btn btn-warning">Detail Info <span class="glyphicon glyphicon-search"></span></a></p>
                    </div>
                  </div>

                  @endforeach

                  <!-- <div class="row">
                     <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                      <a href="" class="thumbnail">
                        <img src="img/product/2.jpg">
                      </a>
                    </div>
                    <div class="col-sm-7">
                      <p><b>Wonderland Music</b></p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur.</p><p><br><a href="" class="btn btn-warning">Detail Info <span class="glyphicon glyphicon-search"></span></a></p>
                    </div>
                    </div>

 -->
                  <div class="row">
                    <div class="col-sm-3 col-sm-offset-9">
                         <a href="{{ route('listevent') }} " style="font-size: 20px">Show More >>> </a>
                    </div>
                  </div>  
                </div>            
              </section>

               <section class="product" id="product">
                    <div class="container">
                      <div class="row text-center">
                        <h2>EVENT</h2><hr>
                      </div>

                  <div class="row">
                @foreach($event as $data)
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                      <img src="{{asset('/image/event/'.$data->id.'/'.$data->poster)}}" style="height: 200px">
                      <div class="caption">
                        <h3>{{$data->nama_event}}</h3>
                 
                        <p><a href="#" class="btn btn-warning" role="button">Detail Info <span class="glyphicon glyphicon-search"></span> </a></p>
                      </div>
                    </div>
                  </div>
                @endforeach
                </div>
            </div>


                    
            </section>
          </main>
        
            <!-- fotter -->
            <!--  <footer class="page-footer" style=" bottom: 0">
                <div class="container-fluid text-center">  
                  <div class="row"> 
                    <div class="col-sm-12">
                      <p> &copy;copyright 2018 | Built by <i class="glyphicon glyphicon-forward"></i><a href="https://www.instagram.com/yusufkencana/">Yusuf wira</a> </p>
                       <a href="#" class="fa fa-facebook">  </a> <a href="https://www.instagram.com/yusufkencana" class="fa fa-instagram">  </a> <a href="yusufkencana@gmail.com" class="fa fa-google">  </a> <a href="https://www.youtube.com/channel/UC0u82JwsMGZAILrJEAdsHMQ?view_as=subscriber" class="fa fa-youtube">  </a> 
                    </div>
                  </div>  
                </div>  
              </footer> -->
            <!-- Selesai Footer -->
        
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
