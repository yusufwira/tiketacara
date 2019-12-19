@extends('admin.dashboard')
@section('content')
          <h1 class="h3 mb-2 text-gray-800">Add New Event</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Add Event</h6>
            </div>
            <div class="card-body">
            	<form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
            		{{ method_field("PUT") }}
            		{{ csrf_field() }}
				  <div class="form-group">
				    <label for="Nama">Nama Event</label>
				    <input type="text" class="form-control" id="nama" name="nama"  value="{{$event->nama_event}}">
				  </div>
				  <div class="form-group">
				    <label for="Keterangan">Keterangan Event</label>
				   <textarea class="form-control" rows="3" name="keterangan" >{{$event->keterangan_event}}</textarea>
				   <!--  <input type="text" class="form-control" id="keterangan" style="height: 300px" > -->
				  </div>
				  <div class="form-group">
				    <label for="Alamat">Alamat Event</label>
				    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$event->alamat_event}}">
				  </div>
				  <div class="form-group">
				    <label for="mulai">Tanggal Mulai</label>
				    <input type="datetime" class="form-control" id="mulai" name="mulai" value="{{$event->tangggal_event_mulai}}">
				  </div>
				  <div class="form-group">
				    <label for="akhir">Tanggal Akhir</label>
				    <input type="datetime" class="form-control" id="akhir" name="akhir" value="{{$event->tangggal_event_akhir}}">
				  </div>
				   <div class="form-group">
				    <label for="stock">Stock Tiket</label>
				    <input type="number" class="form-control" id="stock" name="stock" value="{{$event->stock}}">
				  </div>
				   <div class="form-group">
				    <label for="harga">Harga Tiket</label>
				    <input type="number" class="form-control" id="harga" name="harga" value="{{$event->harga}}">
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
