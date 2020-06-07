@extends('admin/layouts/app')

@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Permission</h4>
                  </div>
				     <form class="needs-validation" novalidate="" action="{{ route('admin.permission.store') }}" method="POST">
				    @csrf
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Permission Name</label>
		                    <input type="text" class="form-control" name='pname' required="">
		                  </div>
						  <?php if($errors->has('pname')): ?>
							<?php 	foreach($errors->get('pname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Permission URL</label>
		                      <input type="text" class="form-control"  name='purl' required="">
		                  </div>
						   <?php if($errors->has('purl')): ?>
							<?php 	foreach($errors->get('purl') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Custom Data</label>
		                    <input type="text" class="form-control" name='ccata' required="">
		                  </div>
						  <?php if($errors->has('ccata')): ?>
							<?php 	foreach($errors->get('ccata') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Status</label>
							  <select class="form-control" name='pstatus' required="">
							   <option value=''>Select</option>
								<option value='1'>Active</option>
								<option value='0'>Deactive</option>
							  </select>
							</div>
							<?php if($errors->has('pstatus')): ?>
							<?php 	foreach($errors->get('pstatus') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
                </div>
                <div class="card-footer">
                   	 	<button class="btn btn-primary">Add</button>
                	</div>
              </div>
			  </form>
            </div>   
           @endsection