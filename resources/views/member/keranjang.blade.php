@extends('layouts.app')
@section('content')
	<section class="keranjang" id="kerajang">
		<div class="container">
			<h1>Keranjang</h1>
			<table class="table table-sm ">
				  <thead>
				    <tr>
			
				      <th scope="col">Nama Event</th>
				      <th scope="col">Jumlah</th>
				      <th scope="col">Harga</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($data as $datas)
				    <tr>			
				      <td>{{$datas->nama_event}}</td>
				      <td>{{$datas->jumlah}}</td>
				      <td>{{$datas->total}}</td>
				      <td>
				      	<form action="{{route('orders.destroy',$datas->event_id)}}" method="POST">
          				      		{{ csrf_field() }}
          	        				{{ method_field("DELETE") }}				    			        								      	
	                  		  	<button class="btn btn-danger " >
	                   		 		<i class="glyphicon glyphicon-remove"></i>
	                  		  	</button>
			      		         </form>
				      </td>
				    </tr>
				   @endforeach
				  </tbody>
				</table>
		</div>
	</section>
@endsection