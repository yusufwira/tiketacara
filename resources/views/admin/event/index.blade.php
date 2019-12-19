@extends('admin.dashboard')
@section('content')
			
          <h1 class="h3 mb-2 text-gray-800">Events</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Events</h6>
            </div>
            <div class="card-body">
              @can('isAdmin')
            	<div>
            		<a class="btn btn-success"  href="{{ route('event.create') }}"><i class="fas fa-plus"></i> Add Event</a>
            	</div>
              @endcan
            	<br>
            	
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama Event</th>
                      <th>Alamat</th>
                      <th>Tgl Mulai</th>
                      <th>Tgl Selesai</th>
                      <th>Stock</th>
                      <th>Harga</th>
                      <th>Action</th>
                    </tr>
                  </thead>                
                  <tbody>
                  	@foreach($events as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->nama_event}}</td>
                      <td>{{$data->alamat_event}}</td>
                      <td>{{$data->tangggal_event_mulai}}</td>
                      <td>{{$data->tangggal_event_akhir}}</td>
                      <td>{{$data->stock}}</td>
                      <td>{{$data->harga}}</td>
                      <td>
                      <a href="{{ route('event.show',$data->id) }}" class="btn btn-info btn-circle">
                           <i class="fas fa-eye"></i>
                        </a>   
                        @can('isAdmin')
	                      <a href="{{ route('event.edit',$data->id) }}" class="btn btn-warning btn-circle">
		                   		 <i class="fas fa-edit"></i>
		                    </a>   
                                          	
                  		  <form action="{{route('event.destroy',$data->id)}}" method="POST">
          				      		{{ csrf_field() }}
          	        				{{ method_field("DELETE") }}				    			        									      	
	                  		  	<button class="btn btn-danger btn-circle">
	                   		 		<i class="fas fa-trash"></i>
	                  		  	</button>
			      		         </form>
                  		  @endcan
                  	  </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

	
 @endsection
