@extends('layouts.app')
@section('content')
	<section class="profile" id="profile">	
	<br>
	 <div class="container">	
          <H2>PROFILE</H2> 
          	<div class="col-sm-4" >
          		<img src="https://www.jumpstarttech.com/files/2018/08/Network-Profile.png" style="width: 300px">
          	</div> 
          	<div class="col-sm-1"></div>         
            <div class="col-sm-4">
            	<form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
            		{{ csrf_field() }}
            	<div class="form-group">
				    <label for="exampleInputFile">Input Foto Profile</label>
				    <input type="file" id="exampleInputFile" name="foto">				    
				  </div>
				  <div class="form-group">
				    <label for="Nama">Nama Lengkap</label>
				    <input type="text" class="form-control" id="nama" name="nama">
				  </div>
				  <div class="form-group">
				    <label for="Nama">Email</label>
				    <input type="email" class="form-control" id="nama" name="email">
				  </div>
				  <div class="form-group">
				    <label for="Keterangan">Alamat</label>
				   <textarea class="form-control" rows="3" name="alamat"></textarea>
				   <!--  <input type="text" class="form-control" id="keterangan" style="height: 300px" > -->
				  </div>
				  <div class="form-group">
				    <label for="Alamat">No telephone / WA</label>
				    <input type="text" class="form-control" id="no_telp" name="no_telp">
				  </div>
				  <div class="form-group">
				    <label for="mulai">No KTP</label>
				    <input type="text" class="form-control" id="no_ktp" name="no_ktp">
				 </div>	
				 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">			  
				 
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
            </div>
          </div>
	</section>
@endsection