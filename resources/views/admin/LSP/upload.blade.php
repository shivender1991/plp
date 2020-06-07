@extends('admin/layouts/app')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>State SCED Upload data</h4>
                  </div>
                  <div class="card-body">

                  	<div class="form-group">
                      <label>Choose one of the following option</label>
                      <select class="form-control" onchange="displayFields(this.value);">
                        <option value="">--Choose Option--</option>
                        <option value="form">Manual </option>
                        <option value="import">Import CSV file</option>
                        <option value="api">API</option>
                      </select> 
                    </div>
				<div class="card-body" id="form" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Subject Area Code *</label>
		                    <input type="text" class="form-control" name='fname' placeholder="SCED Course code" required="" readonly >
		                  </div>
						  <?php if($errors->has('fname')): ?>
							<?php 	foreach($errors->get('fname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Subject Area *</label>
		                      <input type="text" class="form-control" placeholder="Course Title" name='lname' required="" readonly>
		                  </div>
						  <?php if($errors->has('lname')): ?>
							<?php 	foreach($errors->get('lname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Course Code *</label>
		                    <input type="text" class="form-control" placeholder="Course Description" name='fname' required="" readonly >
		                  </div>
						  <?php if($errors->has('fname')): ?>
							<?php 	foreach($errors->get('fname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Course Title *</label>
		                      <input type="text" class="form-control" placeholder="Course Title" name='lname' required="" readonly>
		                  </div>
						  <?php if($errors->has('lname')): ?>
							<?php 	foreach($errors->get('lname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Description *</label>
		                    <input type="text" class="form-control" placeholder="Course Description" name='fname' required="" readonly >
		                  </div>
						  <?php if($errors->has('fname')): ?>
							<?php 	foreach($errors->get('fname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  
	                    </div>
					</div>

				</div>
				 <!-- select import start -->
				<div class="card-body" id="import" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Download CSV file format</label>
		                     <button type="button" class="btn btn-primary">CSV file download</button>
		                  </div>
						  <div class="form-group">
		                     <label>Import downloaded CSV file with changes</label>
		                      <input type="file" class="form-control" name='lname' required="" readonly>
		                  </div>
						  <?php if($errors->has('lname')): ?>
							<?php 	foreach($errors->get('lname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
						  
		                  </div>
		                  
					</div>
				</div>
				 <!-- select import end -->
				  <!-- select API start -->
				<div class="card-body" id="api" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>API Name</label>
		                    <input type="text" class="form-control" placeholder="API Name"  name='fname' required="" readonly >
		                  </div>
						  <?php if($errors->has('fname')): ?>
							<?php 	foreach($errors->get('fname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>API URL</label>
		                      <input type="text" class="form-control"  name='lname' placeholder="API URL" required="" readonly>
		                  </div>
						  <?php if($errors->has('lname')): ?>
							<?php 	foreach($errors->get('lname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>API Key</label>
		                    <input type="text" class="form-control" name='fname' placeholder="API URL" required="" readonly >
		                  </div>
						  <?php if($errors->has('fname')): ?>
							<?php 	foreach($errors->get('fname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
						  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Parameters (Enter multiple parameters with comma separated)</label>
		                      <input type="text" class="form-control"  name='lname'  placeholder="Parameters"  required="" readonly>
		                  </div>
						  <?php if($errors->has('lname')): ?>
							<?php 	foreach($errors->get('lname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
		                  
					</div>
				</div>
                    <!-- select API end -->
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                   <!-- <button class="btn btn-secondary" type="reset">Reset</button>-->
                  </div>
                </div>
			</div>
		</div> 
           @endsection

