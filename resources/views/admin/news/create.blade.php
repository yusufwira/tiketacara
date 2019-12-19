@extends('admin.dashboard')
@section('content')
          <h1 class="h3 mb-2 text-gray-800">Tambah Berita</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Berita</h6>
            </div>
            <div class="card-body">
            	<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            		{{ csrf_field() }}
				  <div class="form-group">
				    <label for="Nama">Judul Berita</label>
				    <input type="text" class="form-control" id="nama" name="judul">
				  </div>
				  <div class="form-group">
				    <label for="Keterangan">Isi Berita</label>
				   <textarea class="form-control" rows="3" name="keterangan" style="height: 300px"></textarea>
				   <!--  <input type="text" class="form-control" id="keterangan" style="height: 300px" > -->
				  </div>
				   <div class="form-group">
				    <label for="harga">Kategori Berita</label>
				    <select class="form-control" name="kat_id">
				   	@foreach($kategori as $data)
					  <option value="{{$data->id}}">{{$data->nama_kat}}</option>
					@endforeach
					</select>
				  </div>				  
				  <div class="form-group">
				    <label for="exampleInputFile">Foto Berita</label>
				    <input type="file" id="exampleInputFile" name="poster">	
				    <input type="hidden" id="exampleInputFile" name="idusers" value="{{ Auth::user()->id }}">				    
				  </div>
				 
				  <button type="submit" class="btn btn-primary">Submit</button>
				</form>
            </div>
           </div>	
            
@endsection
