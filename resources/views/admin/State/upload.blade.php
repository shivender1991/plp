@extends('admin/layouts/app')
@section('main-content')

<div class="row">
              <div class="col-12">
              		<form class="needs-validation" novalidate="" action="{{ route('state.store')}}" method="POST" enctype="multipart/form-data">
				    @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>State SCED Data Upload</h4>
                  </div>
                  <div class="card-body">

                  	<div class="form-group">
                      <label>Please Choose one of the following option</label>
                      <select class="form-control" onchange="displayFields(this.value);" name="format">
                        <option value="">--Choose Option--</option>
                         <option value="manual">Manual</option>
                        <option value="import">Import CSV file</option>
                        <option value="api">API</option>
                      </select> 
                    </div>
				 <!-- select Form start -->
                    <div id="form" style="display: none;">
	 				<div class="row">
	 					<div class="col-12">
				                <div class="card">
				                  <div class="card-header">
				                    <h4>Mapping</h4>
				                  </div>
				                   
				                  <div class="card-body">
					 				<div class="row">
					 				<?php $i =1; foreach($tablecolumnHeader as $tablecolumnHeaders) { ?>
					 				<div class="col-12 col-md-6 col-lg-6">
					                    <div class="form-group">
					                    	<?php 
												$columnname=$tablecolumnHeaders->name;
											  ?>
					                        <label>{{ ucwords(str_replace('_',' ',$tablecolumnHeaders->name)) }} </label>
						                    <input type="text" class="form-control popup-show" name="{{ $tablecolumnHeaders->name }}" placeholder="{{ucwords(str_replace('_',' ',$tablecolumnHeaders->name)) }}">
						                  </div>
										  <?php if($errors->has('<?php echo $columnname; ?>')): ?>
											<?php 	foreach($errors->get('<?php echo $columnname; ?>') as $error): ?>
												<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
											<?php 	endforeach; ?>
										<?php	endif;  ?>
						                  </div>
									<?php $i++; } ?>
				                	
				              </div>
				             
				            </div>
				        </div>
					</div>
					<div class="card-footer text-right">
                  	  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                   <!-- <button class="btn btn-secondary" type="reset">Reset</button>-->
                  </div>
				</div>
			</div>
                    <!-- select Form end -->
				 <!-- select import start -->
				<div id="import" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Download Excel file format</label>
		                     <a class="btn btn-primary mr-1" href="{{ url('public/assets/excel-format/master_state_sced.xlsx') }}" target="_blank" class="btn" title="Download Excel file ( .xls, xlsx )"><i class="fa fa-download"></i>Excel file download</a>
		                  </div>
						  <div class="form-group">
		                     <label>Import downloaded Excel file with Format</label>
		                      <input type="file" class="form-control" name='select_file' placeholder="Import downloaded Excel file with format" required="" readonly>
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

