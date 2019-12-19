@extends('layouts.app')
@section('content')

            <section class="sale" id="sale">
                <div class="container">
                  <div class="row">
                    <br>
                 
                  </div>
                  <div class="row text-center">
                    <br>
                   
                    <h2> Berita </h2><hr>
                  </div>
                  @foreach($news as $data)
                  <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                      <a href="detail_produk.html" class="thumbnail">
                         <img src="{{asset('/image/news/'.$data->id.'/'.$data->poster)}}">
                      </a>
                    </div>
                    <div class="col-sm-7">
                      <p><b>{{$data->nama_news}}</b></p>
                      <p>{{$data->nama_kat}}</p>
                      <p>{{$data-> created_at}}</p>
                      <p><br><a href="{{ route('detailnews',$data->id) }}" class="btn btn-warning">Lihat Selengkapnya<span class="glyphicon glyphicon-search"></span></a></p>
                    </div>
                  </div>

                  @endforeach

                  </div>

                  
                </div>
              </section>
@endsection