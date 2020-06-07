@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View User</h4>
                  </div>
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>First Name</label>
		                    <input type="text" class="form-control" name='fname'  value='{{$users->firstName}}' readonly >
		                  </div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Last Name</label>
		                      <input type="text" class="form-control"  value='{{$users->	lastName}}' name='lname' readonly>
		                  </div>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Email</label>
		                      <input type="text" class="form-control" value='{{$users->email}}' name='email' readonly>
		                  </div>
		                  </div>
						  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Institute Name</label>
		                      <input type="text" class="form-control" value='{{$users->instituteId}}' name='instituteId' readonly>
		                  </div>
	                    </div>
		                  
					</div>
								
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Address</label>
		                      <input type="text" class="form-control" value='{{$users->	addressId}}' name='addressid' readonly>
		                  </div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Title Id</label>
		                      <input type="text" class="form-control" value='{{$users->	titleId}}' name='titleid'  readonly>
		                  </div>
	                    </div>
					</div>
					
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>Status</label>
							  <select class="form-control" name='rstatus'  disabled>
							   <option value=''>Select</option>
								<option value='1'>Male</option>
								<option value='2'>Female</option>
								<option value='3'>Others</option>
							  </select>
							</div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <div class="form-group">
							  <label>Status</label>
							  <select class="form-control" name='rstatus'  disabled>
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