@extends('admin.dashboard')
@section('content')
			
          <h1 class="h3 mb-2 text-gray-800">News</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data News</h6>
            </div>
            <div class="card-body">
            	<div>
            		<a class="btn btn-success"  href="{{ route('news.create') }}"><i class="fas fa-plus"></i> Add News</a>
            	</div>
            	<br>
            	
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Judul Berita</th>
                      <th>Tanggal Berita</th>
                      <th>Kategori</th> 
                      <th>Admin Penulis</th>                     
                    </tr>
                  </thead>                
                  <tbody>
<!--                   	@foreach($news as $data) -->
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->nama_news}}</td>
                      <td>{{$data-> created_at}}</td>
                      <td>{{$data-> nama_kat}}</td>
                      <td>{{$data-> name}}</td>
                      <td>  
	                      <a href="{{ route('news.edit',$data->id) }}" class="btn btn-info btn-circle">
		                   		 <i class="fas fa-edit"></i>
		                  </a>                    	
                  		  <form action="{{route('news.destroy',$data->id)}}" method="POST">
				      		{{ csrf_field() }}
	        				{{ method_field("DELETE") }}				    			        									      	
	                  		  	<button class="btn btn-danger btn-circle">
	                   		 		<i class="fas fa-trash"></i>
	                  		  	</button>
			      		  </form>
                  		  
                  	  </td>
                    </tr>
<!--                   @endforeach -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

	
 @endsection
