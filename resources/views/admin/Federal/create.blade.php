@extends('admin/layouts/app')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Mapping mandatory with optional field</h4>
                  </div>
                   <form class="needs-validation" novalidate="" action="{{ route('admin.user.store')}}" method="POST">
				    @csrf
				    <input type="hidden" name="field_type" value="element">
                  <div class="card-body">
	 				<div class="row">
	 					<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                        <label>SCED Course Code *</label>
		                    <input type="text" class="form-control" value="01001" name='fname' required="" readonly>
		                  </div>
						  <?php if($errors->has('fname')): ?>
							<?php 	foreach($errors->get('fname') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>SCED Course Title *</label>
		                      <input type="text" class="form-control" value="English/Language Arts I (9th grade) " name='lname' readonly required="">
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
	                          <label>SCED Course Description *</label>
		                       <textarea class="form-control" readonly name='addressid'>English/Language Arts I (9th grade) courses build upon students’ prior knowledge of grammar, vocabulary, word usage, and the mechanics of writing and usually include the four aspects of language use: reading, writing, speaking, and listening. Typically, these courses introduce and define various genres of literature, with writing exercises often linked to reading selections. </textarea>
		                  </div>
						  <?php if($errors->has('email')): ?>
							<?php 	foreach($errors->get('email') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Data Course Subject Area *</label>
		                        <select class="form-control">
							    <option value='01'>01</option>
								<option value='02'>02</option>
							  </select>
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
	                          <label>Data Course Level  </label>
		                     <select class="form-control">
							    <option value='B'>B</option>
								<option value='E'>E</option>
								<option value='G'>G</option>
								<option value='H'>H</option>
								<option value='C'>C</option>
								<option value='X'>X</option>
							  </select>
		                  </div>
						  <?php if($errors->has('password')): ?>
							<?php 	foreach($errors->get('password') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Carnegie Unit Credit</label>
		                     <input type="text" class="form-control" name='lname' required="">
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
		                  </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>Grade Span</label>
		                       <select class="form-control">
							    
							    <option value='4'>4</option>
							  </select>
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
		                      <label>Sequence of Course</label>
		                       <select class="form-control">
							    <option value='10'>10</option>
							  </select>
		                  </div>
						  <?php if($errors->has('instituteId')): ?>
							<?php 	foreach($errors->get('instituteId') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
	                    </div>
		                  <div class="col-12 col-md-6 col-lg-6">
		                  	<div class="form-group">
		                      <label>SCED Career Cluster</label>
		                      <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							  <option value="01">Agriculture, Food & Natural Resources</option>
							  <option value="02">Architecture & Construction</option>
							  <option value="03">Arts, A/V Technology & Communications</option>
							  <option value="04">Business Management & Administration</option>
							  <option value="05">Education & Training</option>
							  </select>
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
							  <label>Additional Credit Type</label>
							  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='AdvancedPlacement'>Advanced Placement</option>
								<option value='ApprenticeshipCredit'>Apprenticeship Credit</option>
								<option value='CTE'>Career and Technical Education</option>
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
							  <label>Course GPA Applicability</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='Applicable'>Applicable in GPA</option>
								<option value='NotApplicable'>Not Applicable in GPA</option>
								<option value='Weighted'>Weighted in GPA</option>
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
							  <label>High School Course Requirement</label>
							  <select class="form-control">
							   
								<option value='Yes'>Yes</option>
								<option value='No'>No</option>
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
							  <label>Instruction Language</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='aar'>Afar</option>
								<option value='abk'>Abkhazian</option>
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
							  <label>Curriculum Framework Type</label>
							  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='LEA'>Local Education Agency (LEA) curriculum framework</option>
								<option value='NationalStandard'>National curriculum standard</option>
								<option value='PrivateOrReligious'>Private, religious curriculum</option>
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
							  <label>Course Aligned with Standards</label>
							 <select class="form-control">
							   
								<option value='YES'>Yes</option>
								<option value='No'>No</option>
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
							  <label>Course Certification Description</label>
							  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='300'>300</option>
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
							  <label>K12 End of Course Requirement</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='LEAOnly'>LEA only</option>
								<option value='SEAOnly'>SEA only</option>
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
							  <label>Course Applicable Education Level</label>
							  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='IT'>Infant/toddler</option>
								<option value='PR'>Preschool</option>
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
							  <label>Course Section Instructional Delivery Mode</label>
							<select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='Broadcast'>Broadcast</option>
								<option value='Correspondence'>Correspondence</option>
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
							  <label>NCAA Eligibility</label>
							  <select class="form-control">
							   
								<option value='Yes'>Yes</option>
								<option value='No'>No</option>
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
							  <label>Family and Consumer Sciences Course Indicator</label>
							 <select class="form-control">
							   
								<option value='Yes'>Yes</option>
								<option value='No'>No</option>
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
							  <label>Work-based Learning Opportunity Type</label>
							  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="height: 100%;" >
							   
								<option value='Apprenticeship'>Apprenticeship</option>
								<option value='ClinicalWork'>Clinical work experience</option>>
							  </select>
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

