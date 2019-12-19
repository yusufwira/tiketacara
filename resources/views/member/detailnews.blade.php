@extends('layouts.app')
@section('content')
		<section class="detil_produk" id="detil_produk">
		 <div class="container">
		   <div class="row">
		     <div class="col-sm-12">
		       <h2>{{$news->nama_news}}</h2><hr>
		     </div>
		   </div>
		   <div class="row text-center">		 
		      <div class="thumbnail " >
		        <img src="{{asset('/image/news/'.$news->id.'/'.$news->poster)}}"  class="img-fluid" alt="Responsive image">
		      </div>		      		   	     
		   </div>
		   <div class="row">
		   	<div class="col-sm-12">
		   		<!-- <b>{{$news->keterangan_news}}</b> -->
		   		<textarea class="col-sm-9" style="height:700px; border: none;"  readonly="readonly">{{$news->keterangan_news}}</textarea>
		   	</div>
		   
		   </div>
		   </div>
		 </div>
		  
		</section>
@endsection