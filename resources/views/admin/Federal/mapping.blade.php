@extends('admin/layouts/app')
@section('main-content')
<?php $MasterSCEDDataJson = json_decode($MasterSCEDData['map_field_data']);
//echo '<pre>'; print_r($MasterSCEDDataJson); echo '</pre>'; exit;

 ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Mapping</h4>
      </div>
       <form class="needs-validation" novalidate="" action="{{ route('federal.storemapping',['id' => $MasterSCEDData['id']]) }}" method="POST">
	    @csrf
      <div class="card-body">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label>SCED Course Code *</label>
                <input type="text" class="form-control" value="{{ $MasterSCEDData['SCED_course_code'] }}" name='scedcourse' required="" readonly>
              </div>
			  <?php if($errors->has('scedcourse')): ?>
				<?php 	foreach($errors->get('scedcourse') as $error): ?>
					<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
				<?php 	endforeach; ?>
			<?php	endif;  ?>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
              	<div class="form-group">
                  <label>SCED Course Title *</label>
                  <input type="text" class="form-control" value="{{ $MasterSCEDData['SCED_course_title'] }}" name='scedtitle' readonly required="">
              </div>
			  <?php if($errors->has('scedtitle')): ?>
				<?php 	foreach($errors->get('scedtitle') as $error): ?>
					<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
				<?php 	endforeach; ?>
			<?php	endif;  ?>
            </div>
		</div>
		<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
            <div class="form-group">
                  <label>SCED Course Description *</label>
                   <textarea class="form-control" readonly name='sceddesc'>{{ $MasterSCEDData['SCED_course_description'] }}</textarea>
              </div>
			  <?php if($errors->has('sceddesc')): ?>
				<?php 	foreach($errors->get('sceddesc') as $error): ?>
					<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
				<?php 	endforeach; ?>
			<?php	endif;  ?>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
              	<div class="form-group">
                  <label>Change Status *</label>
                    <select class="form-control" name='changestatus' readonly>
           			 <option  value="1"  {{ ( $MasterSCEDData['change_status'] == 1) ? 'selected' : '' }} >Archived Course</option>
                     <option  value="2" {{ ( $MasterSCEDData['change_status'] == 2) ? 'selected' : '' }}>Editorial update</option>
                     <option  value="3"  {{ ( $MasterSCEDData['change_status'] == 3) ? 'selected' : '' }}>New Course</option>
                     <option  value="4" {{ ( $MasterSCEDData['change_status'] == 4) ? 'selected' : '' }}>No change</option>
                     <option  value="5" {{ ( $MasterSCEDData['change_status'] == 5) ? 'selected' : '' }}>Substantive update</option>
          		  </select> 
              </div>
			  <?php if($errors->has('changestatus')): ?>
				<?php 	foreach($errors->get('changestatus') as $error): ?>
					<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
				<?php 	endforeach; ?>
			<?php	endif;  ?>
            </div>
		</div>
	<div class="card-header-attribute">Elements</div>
		@if($elements)
		<div class="row">
		@foreach($elements as $element)
		<?php
		$element_db_values = App\Admin\Model\MasterScedElementAttribute::where('field_type', 'element')->where('element_attribute_id', $element['id'])->get();
		$element_input_type = $element['input_type_name'];
		$element_map = $MasterSCEDDataJson->$element_input_type;
		?>
		<div class="col-12 col-md-6 col-lg-6">
				@if ($element['input_type'] == 'drop-down')
            	<div class="form-group">
                  <label>{{ $element['input_type_label'] }}</label>
                 <select class="form-control" name="{{ $element['input_type_name'] }}" >
                 	
                 	<option value="">--choose data--</option>
                 	@if($element_db_values)
                 	@foreach($element_db_values as $element_db_value)
				    <option value="<?php echo $element_db_value['code']; ?>" <?php if( $element_map == $element_db_value['code'] ){ echo "selected"; } ?> >{{ $element_db_value['description'] }}</option>
				    @endforeach
				    @endif
				  </select>
              	</div>
              	@elseif ($element['input_type'] == 'text')
              	<div class="form-group">
                  <label>{{ $element['input_type_label'] }}</label>
                  <input type="number" class="form-control" name="{{ $element['input_type_name'] }}" required="" step="0.01">
              	</div>
              	@endif

			  <?php if($errors->has($element['input_type_name'])): ?>
				<?php 	foreach($errors->get($element['input_type_name']) as $error): ?>
					<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
				<?php 	endforeach; ?>
			<?php	endif;  ?>
              </div>

				@endforeach
		</div>
		
		@endif
		
		<div class="card-header-attribute">Attributes</div>
		
		@if($attributes)
		<div class="row">
		@foreach($attributes as $attribute)
		<?php
		$attribute_db_values = App\Admin\Model\MasterScedElementAttribute::where('field_type', 'attribute')->where('element_attribute_id', $attribute['id'])->get();
		$attribute_input_type = $attribute['input_type_name'];
		$attribute_map = $MasterSCEDDataJson->$attribute_input_type;
		?>
		<div class="col-12 col-md-6 col-lg-6">
				@if ($attribute['input_type'] == 'drop-down')
            	<div class="form-group">
                  <label>{{ $attribute['input_type_label'] }}</label>
                 <select class="form-control" name="{{ $attribute['input_type_name'] }}">
                 	<option value="">--choose data--</option>
                 	@if($attribute_db_values)
                 	@foreach($attribute_db_values as $attribute_db_value)
				    <option value="{{ $attribute_db_value['code'] }}" <?php if( $attribute_map == $attribute_db_value['code'] ){ echo "selected"; } ?>>{{ $attribute_db_value['description'] }}</option>
				    @endforeach
				    @endif
				  </select>
              	</div>
              	@elseif ($attribute['input_type'] == 'text')
              	<div class="form-group">
                  <label>{{ $attribute['input_type_label'] }}</label>
                  <input type="number" class="form-control" name="{{ $attribute['input_type_name'] }}" required="" step="0.01">
              	</div>
              	@endif

			  <?php if($errors->has($attribute['input_type_name'])): ?>
				<?php 	foreach($errors->get($attribute['input_type_name']) as $error): ?>
					<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
				<?php 	endforeach; ?>
			<?php	endif;  ?>
              </div>

				@endforeach
		</div>
		
		@endif
		
		
    </div>
    <div class="card-footer">
       	 	<button class="btn btn-primary">Save</button>
			<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
    	</div>
  </div>
  </form>
</div>   
@endsection

