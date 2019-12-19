@extends('admin.dashboard')
@section('content')
	<h1 class="h3 mb-2 text-gray-800">Jumbotron</h1>
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Setting Jumbotron</h6>
            </div>
            <div class="card-body">
            	<form action="" method="POST" enctype="multipart/form-data">
            		<div class="form-group">
				    	<label for="exampleInputFile">Jumbtron ke-1 </label>
				    	<input type="file" id="exampleInputFile" name="jumbo1">				    
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputFile">Jumbtron ke-2 </label>
				    	<input type="file" id="exampleInputFile" name="jumbo2">				    
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputFile">Jumbtron ke-3 </label>
				    	<input type="file" id="exampleInputFile" name="jumbo3">				    
				  	</div>
				  	<div class="form-group">
				    	<label for="exampleInputFile">Jumbtron ke-4 </label>
				    	<input type="file" id="exampleInputFile" name="jumbo4">				    
				  	</div>
            		 <button type="submit" class="btn btn-primary">Submit</button>
            	</form>
            </div>
    </div>
@endsection