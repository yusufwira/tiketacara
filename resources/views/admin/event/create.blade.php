@extends('admin.dashboard')
@section('content')
          <h1 class="h3 mb-2 text-gray-800">Add New Event</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Add Event</h6>
            </div>
            <div class="card-body">
            	<form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            		{{ csrf_field() }}
				  <div class="form-group">
				    <label for="Nama">Nama Event</label>
				    <input type="text" class="form-control" id="nama" name="nama">
				  </div>
				  <div class="form-group">
				    <label for="Keterangan">Keterangan Event</label>
				   <textarea class="form-control" rows="3" name="keterangan"></textarea>
				   <!--  <input type="text" class="form-control" id="keterangan" style="height: 300px" > -->
				  </div>
				  <div class="form-group">
				    <label for="Alamat">Alamat Event</label>
				    <input type="text" class="form-control" id="alamat" name="alamat">
				  </div>
				  <div class="form-group">
				    <label for="mulai">Tanggal Mulai</label>
				    <input type="date" class="form-control" id="mulai" name="mulai">
				  </div>
				  <div class="form-group">
				    <label for="akhir">Tanggal Akhir</label>
				    <input type="date" class="form-control" id="akhir" name="akhir">
				  </div>
				   <div class="form-group">
				    <label for="stock">Stock Tiket</label>
				    <input type="number" class="form-control" id="stock" name="stock">
				  </div>
				   <div class="form-group">
				    <label for="harga">Harga Tiket</label>
				    <input type="number" class="form-control" id="harga" name="harga">
				  </div>				  
				  <div class="form-group">
				    <label for="exampleInputFile">File input</label>
				    <input type="file" id="exampleInputFile" name="poster">				    
				  </div>
				 
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
            </div>
           </div>	
            
@endsection
