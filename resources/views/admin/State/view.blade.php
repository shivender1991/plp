@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View Role</h4>
                  </div>
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Role Name</label>
		                    <input type="text" class="form-control" name='rname'  value='{{$roles->roleName}}' readonly >
		                  </div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Institute Name</label>
		                      <input type="text" class="form-control"  value='{{$roles->instituteId}}' name='rinstitute' readonly>
		                  </div>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
								<label>Status</label>
								  <select class="form-control" name='rstatus'  disabled>
								   <option value=''>Select</option>
									<option value='1'>Active</option>
									<option value='0'>Deactive</option>
								  </select>
							</div>
		                  </div>
						  <div class="col-12 col-md-6 col-lg-6">
		                  	
	                    </div>
		                  
					</div>
                </div>
                <div class="card-footer">
                   	 	<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                	</div>
              </div>
            </div>   
           @endsection