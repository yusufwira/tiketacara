@extends('layouts.app')
@section('content')

            <section class="sale" id="sale">
                <div class="container">
                  <div class="row">
                    <br>
                 
                  </div>
                  <div class="row text-center">
                    <br>
                   
                    <h2> LIST EVENT</h2><hr>
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
                      
                      	<br>
                      	<a href="{{ route('detailevent',$data->id, {{ Auth::user()->id }}) }}" class="btn btn-warning">Detail Info <span class="glyphicon glyphicon-search"></span></a>
                      
                    </div>
                  </div>

                  @endforeach

                  </div>

                  
                </div>
              </section>
@endsection