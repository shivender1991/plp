@extends('admin/layouts/app')
@section('main-content')
<div class="row">

              <div class="col-12">
              	 <form class="needs-validation" novalidate="" action="{{ route('element.store')}}" method="POST" enctype="multipart/form-data">

				    @csrf
				     <input type="hidden" name="field_type" value="element">
                <div class="card">
                  <div class="card-header">
                    <h4>Elements SCED Upload </h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Please Choose one of the following option</label>
                      <select class="form-control" name="element_id" id="element_id">
                        	<option value="">---Choose Element--</option>
                        	@if($datas)
							@foreach($datas as $data)
	                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
	                        @endforeach
	                        @endif
                      </select> 
                    </div>

                  	<div class="form-group">
                      <label>Choose one of the following option</label>
                      <select class="form-control" onchange="displayFields(this.value);" name="format" id="format">
                        <option value="">---Choose Option--</option>
                        <option value="manual">Manual</option>
                        <option value="import">Import CSV file</option>
                        <option value="api">API</option>
                      </select> 
                    </div>

                    <!-- select Form start -->
                    <div id="form" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Description *</label>
		                    <input type="text" class="form-control"  name="description" id="description" placeholder="Description">
		                  </div>
						  <?php if($errors->has('description')): ?>
							<?php 	foreach($errors->get('description') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Defination </label>
		                      <input type="text" class="form-control"  name="definition" id="definition"  placeholder="Definition">
		                  </div>
						  <?php if($errors->has('definition')): ?>
							<?php 	foreach($errors->get('definition') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>Code *</label>
		                    <input type="text" class="form-control" placeholder="Code" name='code'>
		                  </div>
						  <?php if($errors->has('code')): ?>
							<?php 	foreach($errors->get('code') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
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
							<a href="{{ url('public/assets/excel-format/element_data.xlsx') }}" target="_blank" class="btn" title="Download Excel file ( .xls, xlsx )"><i class="fa fa-download"></i>Excel file download</a>
		                  </div>
						  <div class="form-group">
		                     <label>Import downloaded Excel file with Format</label>
		                      <input type="file" class="form-control" name='select_file' placeholder="Import downloaded Excel file with Format" >
		                  </div>
						  <?php if($errors->has('select_file')): ?>
							<?php 	foreach($errors->get('select_file') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
						  
		                  </div>
		                  
					</div>
				</div>
                    <!-- select import end -->

                    <!-- select API start -->
                    <div id="api" style="display: none;">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>API Name </label>
		                    <input type="text" class="form-control"  name='api_name' placeholder="API Name" required="" readonly >
		                  </div>
						  <?php if($errors->has('api_name')): ?>
							<?php 	foreach($errors->get('api_name') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>API URL *</label>
		                      <input type="text" class="form-control"  name='api_url' placeholder="API URL" required="" readonly>
		                  </div>
						  <?php if($errors->has('api_url')): ?>
							<?php 	foreach($errors->get('api_url') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
					</div>
					<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>API Key *</label>
		                    <input type="text" class="form-control" name='apikey' placeholder="API Key" required="" readonly >
		                  </div>
						  <?php if($errors->has('apikey')): ?>
							<?php 	foreach($errors->get('apikey') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
						  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Parameters (Enter multiple parameters with comma separated) *</label>
		                      <input type="text" class="form-control"  name='parameters' placeholder="Parameters (Enter multiple parameters with comma separated)" required="" readonly>
		                  </div>
						  <?php if($errors->has('parameters')): ?>
							<?php 	foreach($errors->get('parameters') as $error): ?>
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
                  </div>
                </div>
			</div>
		</form>
              <div class="col-12 col-md-2 col-lg-2">
            	</div>

              
            </div> 

<script>
	function validate(){
	// for validation
	var full_name = document.getElementById('full_name');
    
    // Check each input in the order that it appears in the form!
    if(isAlphabet(full_name)){
    	return true;						
    }                       
	return false;
}
</script>
@endsection

