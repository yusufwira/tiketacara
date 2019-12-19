@extends('admin.dashboard')
@section('content')
		<h3>{{$event->nama_event}}</h3>
		<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Tiket Terjual</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Harga/tiket</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$event->harga}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Pembeli</h6>
                  <div class="dropdown no-arrow">
                    
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> No </th>                    
                      <th>Nama Lengkap</th>
                      <th>Jumlah</th>
                      <th>Harga</th> 
                      <th>Tanggal Pembelian </th>                     
                    </tr>
                  </thead>                
                  <tbody>
                  @can('isAdmin')
                  @foreach($detail as $data)
                    <tr>
                      <td>1</td>
                      <td><a href="{{ route('profile.show',$data->id_member) }}">{{$data->name_member}}</a></td>
                      <td>{{$data->jumlah}}</td>
                      <td>{{$data->total}}</td> 
                      <td>{{$data->tanggal}}</td> 
                      <td>
                      	<a href="{{ route('event.edit',$data->id) }}" class="btn btn-success btn-circle">
		                   		 <i class="fas fa-check"></i>
		                    </a>
		                    <a href="{{ route('event.edit',$data->id) }}" class="btn btn-danger btn-circle">
		                   		 <i class="fas fa-ban"></i>
		                    </a>
                      </td>                 	  
                    </tr>
              	  @endforeach
              	  @endcan
                  </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
      

		
@endsection