@extends('admin/layouts/app')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Mapping</h4>
                  </div>
                   <form class="needs-validation" novalidate="" action="{{ route('admin.user.store')}}" method="POST">
				    @csrf
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Subject Area Code *</label>
		                    <input type="text" class="form-control" value="AZ01" name='fname' required="" readonly >
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
		                      <input type="text" class="form-control" value="English Language and Literature" name='lname' required="" readonly>
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
		                      <input type="email" class="form-control" value="004" name='email' required="" readonly>
		                  </div>
						  <?php if($errors->has('email')): ?>
							<?php 	foreach($errors->get('email') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Course Title *</label>
		                      <input type="text" class="form-control" value="English/Language Arts IV (12th grade)" name='username' required="" readonly>
		                  </div>
						  <?php if($errors->has('username')): ?>
							<?php 	foreach($errors->get('username') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Description  </label>
		                      <input type="text" class="form-control"  value="English/Language Arts IV (12th grade) courses blend composition and literature into a cohesive whole as students write critical and comparative analyses of selected literature, continuing to develop their language arts skills. Typically, students primarily write multi-paragraph essays, but they may also write one or more major research papers." name='password' required="" readonly>
		                  </div>
						  <?php if($errors->has('password')): ?>
							<?php 	foreach($errors->get('password') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Comments</label>
		                      <input type="text" class="form-control" name='instituteId' required="">
		                  </div>
						  <?php if($errors->has('instituteId')): ?>
							<?php 	foreach($errors->get('instituteId') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                          <label>Course Level  Code</label>
		                      <input type="text" class="form-control" name='addressid' required="">
		                  </div>
						  <?php if($errors->has('addressid')): ?>
							<?php 	foreach($errors->get('addressid') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Course Level</label>
		                      <input type="text" class="form-control" name='titleid' required="">
		                  </div>
						  <?php if($errors->has('titleid')): ?>
							<?php 	foreach($errors->get('titleid') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>Special Identifier</label>
							  <input type="text" class="form-control" name='instituteId' required="">
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Available Credit</label>
							   <input type="text" class="form-control" name='instituteId' required="">
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>Sequence</label>
							   <input type="text" class="form-control" name='instituteId' required="">
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>IB Indicator</label>
							  <select class="form-control" name='status'  required="" >
							    <option value=''>Select</option>
							    <option value='1'>TRUE</option>
								<option value='0'>FALSE</option>	
							  </select>
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>AP Indicator</label>
							  <select class="form-control" name='gender'  required="" >
							   <option value=''>Select</option>
							    <option value='1'>TRUE</option>
								<option value='0'>FALSE</option>
							  </select>
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Elementary Mapping Allowed</label>
							  <select class="form-control" name='status'  required="" >
							   <option value=''>Select</option>
							    <option value='1'>TRUE</option>
								<option value='0'>FALSE</option>
							  </select>
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>Secondary Mapping Allowed</label>
							  <select class="form-control" name='gender'  required="" >
							    <option value=''>Select</option>
							    <option value='1'>TRUE</option>
								<option value='0'>FALSE</option>
							  </select>
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Effective Date</label>
							 <input type="date" class="form-control" name='addressid' required="">
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>Expiration Date</label>
							  <input type="date" class="form-control" name='addressid' required="">
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>Version</label>
							  <input type="text" class="form-control" name='addressid' required="">
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
					<div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>SCED Subject Area Code</label>
							  <select class="form-control" name='status'  required="" >
							    <option value=''>Select</option>
								<option value='01'>01</option>
								<option value='02'>02</option>
							  </select>
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>SCED Code</label>
								<select class="form-control" name='status' >
							        <option value=''>Select SCED Code</option>
										<option value='01001'>01001</option>
										<option value='01002'>01002</option>
										<option value='01003'>01003</option>
							  </select>
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
							<?php	endif;  ?>
		                  </div> 
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>SCED Subject Area</label>
							  <input type="text" class="form-control" value="English Language and Literature"  name='addressid' readonly>
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>SCED Course Code</label>
							  <select class="form-control" name='status'  required="" >
							   <option value=''>Select</option>
								<option value='001'>001</option>
								<option value='002'>002</option>
								<option value='003'>003</option>
							  </select>
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>SCED Course Title</label>
							 <input type="text" class="form-control" value="English/Language Arts IV (12th grade)"  name='addressid' readonly>
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>SCED Course Description</label>
							   <textarea class="form-control" readonly name='addressid'>English/Language Arts IV (12th grade) courses blend composition and literature into a cohesive whole as students write critical and comparative analyses of selected literature, continuing to develop their language arts skills. Typically, students primarily write multi-paragraph essays, but they may also write one or more major research papers. </textarea>	
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>SCED IB Indicator</label>
							  <select class="form-control" name='gender'  required="" >
							   <option value=''>Select</option>
							    <option value='1'>TRUE</option>
								<option value='0'>FALSE</option>
							  </select>
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>SCED AP Indicator</label>
							  <select class="form-control" name='status'  required="" >
							    <option value=''>Select</option>
							    <option value='1'>TRUE</option>
								<option value='0'>FALSE</option>
							  </select>
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>SCED Elementary Mapping Allowed</label>
							  <select class="form-control" name='gender'  required="" >
							   <option value=''>Select</option>
							    <option value='1'>TRUE</option>
								<option value='0'>FALSE</option>
							  </select>
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
							  <label>SCED Secondary Mapping Allowed</label>
							  <select class="form-control" name='gender'  required="" >
							   <option value=''>Select</option>
							    <option value='1'>TRUE</option>
								<option value='0'>FALSE</option>
							  </select>
							  </select>
							</div>
							<?php if($errors->has('status')): ?>
							<?php 	foreach($errors->get('status') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
							<div class="form-group">
							  <label>SCED Other Mapping Allowed</label>
							  <input type="text" class="form-control"  name='addressid' >
							</div>
							<?php if($errors->has('gender')): ?>
							<?php 	foreach($errors->get('gender') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  
	                    </div>
					</div>
					
					
                </div>
                <div class="card-footer">
                   	 	<button class="btn btn-primary">Save</button>
						<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                	</div>
              </div>
              </form>
            </div>   
           @endsection

