@extends('admin/layouts/app')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Mapping</h4>
                  </div>
                   <form class="needs-validation" novalidate="" action="{{ route('state.storemapping',['id' => $masterStateId])}}" method="POST">
				    @csrf
                  <div class="card-body">
	 				<div class="row">
	 				<?php $i =1; foreach($tablecolumnHeader as $tablecolumnHeaders) { ?>
	 				<div class="col-12 col-md-6 col-lg-6">
	                    <div class="form-group">
	                    	<?php 
								//$data=json_decode($masterstatedata->state_field);
								$columnname=$tablecolumnHeaders->name;
							  ?>
	                        <label>{{ strtoupper(str_replace('_',' ',$tablecolumnHeaders->name)) }} </label>
		                    <input type="text" class="form-control popup-show" value="<?php echo $masterstatedata->$columnname; ?>" name='<?php echo $columnname; ?>' required="" id="field_id<?php echo $tablecolumnHeaders->id; ?>" onclick="showPopup('<?php echo strtoupper(str_replace('_',' ',$tablecolumnHeaders->name)); ?>', '<?php echo $tablecolumnHeaders->name; ?>', '<?php echo $tablecolumnHeaders->id; ?>');" readonly>
		                  </div>
						  <?php if($errors->has('<?php echo $columnname; ?>')): ?>
							<?php 	foreach($errors->get('<?php echo $columnname; ?>') as $error): ?>
								<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
							<?php 	endforeach; ?>
						<?php	endif;  ?>
		                  </div>




					<?php $i++; } ?>


					
                <div class="card-footer">
                   	 	<button class="btn btn-primary">Save</button>
						<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
                	</div>
              </div>
              </form>
            </div>   
		<!--modal show start-->
			<div class="modal" id="stateModal" role="dialog">
		      <div class="modal-dialog" role="document">
		        <div class="modal-content">
		          <div class="modal-header">
		            <h5 class="modal-title" id="pop_up_title">Title</h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		              <span aria-hidden="true">&times;</span>
		            </button>
		          </div>
		          <div class="modal-body">
		            <form class="" method="post">
		              <div class="form-group">
		                <label id="input_type_label">Drop down</label>
		                <div class="input-group">
		                  <select name="" class="form-control" id="drop_down_headers_val" onchange="showOthersInput(this.value);">
		                  	<option value=" ">--Choose value--</option>
		                  	<option value="others">Others</option>
		                  </select>
		                </div>
		              </div>
		             
		              <div class="form-group" id="others">
		                <label>Others</label>
		                <div class="input-group">
		                  <input type="text" class="form-control" placeholder="Please enter others value" id="others_input" name="others_value">
		                </div>
		              </div>
		              <input type="hidden" id="hidden_header_id" value="">
		              <button type="button" id="add_button" onclick="addOthersValue()" class="btn btn-primary m-t-15 waves-effect">Add</button>
		            </form>
		          </div>
		        </div>
		      </div>
		    </div>
			<!--modal show end-->
           @endsection

