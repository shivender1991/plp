@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View Permission</h4>
                  </div>
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Permission Name</label>
		                    <input type="text" class="form-control" name='pname'  value='{{$permissions->permissionName	}}' readonly >
		                  </div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Permission URL</label>
		                      <input type="text" class="form-control"  value='{{$permissions->	permissionUrl}}' name='purl' readonly>
		                  </div>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Custom Data</label>
		                    <input type="text" class="form-control" name='ccata'  value='{{$permissions->customData}}' readonly >
		                  </div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Status</label>
							  <select class="form-control" name='pstatus'  required="" disabled>
							   <option value=''>Select</option>
								<option value='1'>Active</option>
								<option value='0'>Deactive</option>
							  </select>
							</div>
	                    </div>
					</div>
                </div>
                <div class="card-footer">
                   	 	<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                	</div>
              </div>
            </div>   
           @endsection