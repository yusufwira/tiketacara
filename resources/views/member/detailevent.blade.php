@extends('layouts.app')
@section('content')
		<section class="detil_produk" id="detil_produk">
		 <div class="container">
		   <div class="row">
		   	<!-- <form></form> -->
		     <div class="col-sm-12">
		       <h2>{{$event->nama_event}}</h2><hr>
		     </div>
		   </div>
		   <div class="row">
		     <div class="col-sm-4">
		      <div class="thumbnail">
		        <img src="{{asset('/image/event/'.$event->id.'/'.$event->poster)}}">
		      </div>
		     </div>
		     <div class="col-sm-4">
		      <h3>Detail Event</h3>
		      <textarea style="height:400px; width: 300px; border: none;"  readonly="readonly">{{$event->keterangan_event}}</textarea>
		     </div>
		     <div class="col-sm-4">
		     <form action="{{ route('orders.store') }}" method="POST">
		     	{{ csrf_field() }}
		     <h2>Harga Tiket</h2>
		      <h2 style="color: orange">{{$event->harga}}</h2>
		      <h5> Stock : {{$event->stock}}</h5>
		      
		      Qty : <select name="qty">
		        <option value="1">1</option>
		        <option value="2">2</option>
		        <option value="3">3</option>
		        <option value="4">4</option>		 
		      </select><br><br>
		      <input type="hidden" name="harga" value="{{$coba}}">
		      <input type="hidden" name="event_id" value="{{$event->id}}">
		      <input type="hidden" name="user_id" value="{{$event->user_id}}">
		      <p><button type="submit" class="btn btn-warning" role="button">Add To Cart <span class="glyphicon glyphicon-shopping-cart"></span> </button></p>

	
		     </form>
		      
		     </div>
		   </div>
		 </div>
		  
		</section>
@endsection