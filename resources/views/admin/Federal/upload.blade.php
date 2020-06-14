@extends('admin/layouts/app')
@section('main-content')
<div class="row">
              <div class="col-12">
              		<form class="needs-validation" novalidate="" action="{{ route('federal.store')}}" method="POST" enctype="multipart/form-data">
				    @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>SCED Upload Data</h4>
                  </div>
                  <div class="card-body">

                  	<div class="form-group">
                      <label>Please Choose one of the following option</label>
                      <select class="form-control" onchange="displayFields(this.value);" name="format">
                        <option value="">--Choose Option--</option>
                         <option value="manual">Manual</option>
                        <option value="import">Import Excel file</option>
                        <option value="api">API</option>
                      </select> 
                    </div>
				 <!-- select Form start -->
                    <div id="form" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>SCED Course code *</label>
		                    <input type="number" class="form-control"  name='scedcoursecode' placeholder="SCED Course code" maxlength="5" onkeypress="return isNumberKey(event)">
		                  </div>
						  <?php if($errors->has('scedcoursecode')): ?>
							<?php 	foreach($errors->get('scedcoursecode') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Course Title *</label>
		                      <input type="text" class="form-control" name='coursetitle' placeholder="Course Title">
		                  </div>
						  <?php if($errors->has('coursetitle')): ?>
							<?php 	foreach($errors->get('coursetitle') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Course Description *</label>
		                    <textarea class="form-control" placeholder="Course Description" name='coursedescription'></textarea>
		                  </div>
						  <?php if($errors->has('coursedescription')): ?>
							<?php 	foreach($errors->get('coursedescription') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Change Status *</label>
		                      <select class="form-control" name='changestatus'>
                       			 <option value=" ">--Choose Option--</option>
		                         <option value="1">Archived Course</option>
		                         <option value="2">Editorial update</option>
		                         <option value="3">New Course</option>
		                         <option value="4">No change</option>
		                         <option value="5">Substantive update</option>
                      		  </select> 
		                  </div>
						  <?php if($errors->has('changestatus')): ?>
							<?php 	foreach($errors->get('changestatus') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
		                  
					</div>
					<div class="card-footer text-right">
                  	  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                   <!-- <button class="btn btn-secondary" type="reset">Reset</button>-->
                  </div>
				</div>
                    <!-- select Form end -->
				 <!-- select import start -->
				<div id="import" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Download Excel file format</label>
							<a href="{{ url('public/assets/excel-format/masterScedData.xlsx') }}" target="_blank" class="btn" title="Download Excel file ( .xls, xlsx )"><i class="fa fa-download"></i>Excel file download</a>
		                  </div>
						  <div class="form-group">
		                     <label>Import downloaded Excel file with Format</label>
		                      <input type="file" class="form-control" name='select_file' placeholder="Import downloaded Excel file with Format" required="" readonly>
		                  </div>
						  <?php if($errors->has('select_file')): ?>
							<?php 	foreach($errors->get('select_file') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
						  
		                  </div>
		                  
					</div>
					<div class="card-footer text-right">
                  	  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                   <!-- <button class="btn btn-secondary" type="reset">Reset</button>-->
                  </div>
				</div>
				 <!-- select import end -->
				  <!-- select API start -->
				<div id="api" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>API Name</label>
		                    <input type="text" class="form-control" placeholder="API Name" name='fname' required="" readonly >
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
		                      <input type="text" class="form-control" placeholder="API URL" name='lname' required="" readonly>
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
		                    <input type="text" class="form-control" placeholder="API Key" name='fname' required="" readonly >
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
		                      <input type="text" class="form-control"  name='lname' placeholder="Parameters (Enter multiple parameters with comma separated)" required="" readonly>
		                  </div>
						  <?php if($errors->has('lname')): ?>
							<?php 	foreach($errors->get('lname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
		                  
					</div>
					<div class="card-footer text-right">
                  	  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                   <!-- <button class="btn btn-secondary" type="reset">Reset</button>-->
                  </div>
				</div>
                    <!-- select API end -->
                  </div>
                </div>
            </form>
			</div>
		</div> 
           @endsection

