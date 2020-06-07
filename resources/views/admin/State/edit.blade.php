@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Role</h4>
                  </div>
				   <form class="needs-validation" novalidate="" action="{{ route('admin.role.update', ['id' => $roles->id]) }}" method="POST">
				    @csrf
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Role Name</label>
		                    <input type="text" class="form-control" name='rname'  value='{{$roles->roleName}}' required="">
		                  </div>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Institute Name</label>
							  <select class="form-control" required="" name='rinstitute'>
							    <option value=''>Select Institute</option>
							    <option value='0' selected>Test0 institute</option>
								<option value='1'>Test1 institute</option>
								<option value='2'>Test2 institute</option>
								<option value='3'>Test3 institute</option>
								<option value='4'>Test4 institute</option>
								<option value='5'>Test5 institute</option>
								<option value='6'>Test1 institute</option>
							  </select>
							</div>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>Status</label>
							  <select class="form-control" name='rstatus'  required="" >
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
                   	 	<button class="btn btn-primary">Update</button>
						<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                	</div>
              </div>
			  </form>
            </div>   
           @endsection