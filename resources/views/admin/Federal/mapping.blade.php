@extends('admin/layouts/app')
@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Mapping </h4>
         <button type="button" class="btn btn-primary form-fields" onclick="federalWithElementAttributeMapping()"><i class="fas fa-cog"></i></button> 
      </div>
       <!-- <form class="needs-validation" novalidate="" action="{{ route('federal.storemapping',['id' => $masterScedData['id']]) }}" method="POST"> -->
	    @csrf
      <div class="card-body">
			<div class="row">
					@foreach($masterScedHeaders as $masterScedHeaders)
					<div class="col-12 col-md-6 col-lg-6">
						 <div class="form-group">
		                <label>{{  ucwords(str_replace('_',' ',$masterScedHeaders['name'])) }}</label>
		                <input type="text" class="form-control" value="{{ $masterScedData[$masterScedHeaders['name']] }}" name="{{ $masterScedHeaders['name'] }}" readonly="{{ $masterScedHeaders['readonly'] }}">
		              </div>
				  <?php if($errors->has('scedcourse')): ?>
					<?php 	foreach($errors->get('scedcourse') as $error): ?>
						<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
					<?php 	endforeach; ?>
				<?php	endif;  ?>
  					</div>
					@endforeach 
					<!--  start for element-->
					@foreach($elements as $element)
					<?php 
					  $elementValues= App\Admin\Model\MasterScedElementAttribute::where('field_type','element')->where('element_attribute_id',$element['id'])->get();
					?>
					<div class="col-12 col-md-6 col-lg-6">
						 <div class="form-group">
		                <label>{{  ucwords(str_replace('_',' ',$element['name'])) }}</label>

		                @if($element['input_type']  == 'drop-down')
		                <select class="form-control" name="{{ $element['input_name_type'] }}">
		                 	<option value=''>Select {{ $element['name'] }}</option>
		                 	@foreach($elementValues as $elementValue)
								<option value="{{ $elementValue['code'] }}">{{ $elementValue['description'] }}</option>
		                 	@endforeach   
						  </select>
		            	@else
		                <input type="text" class="form-control" value="{{ $masterScedData[$element['input_type_name']] }}"name="{{ $element['input_type_name'] }}">
		                @endif
		              </div>
				  <?php if($errors->has('scedcourse')): ?>
					<?php 	foreach($errors->get('scedcourse') as $error): ?>
						<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
					<?php 	endforeach; ?>
				<?php	endif;  ?>
  					</div>
					@endforeach   
					<!--  end for element-->
					<!--  start for attribute-->  
					@foreach($attributes as $attribute)
					<?php 
					  $attributeValues= App\Admin\Model\MasterScedElementAttribute::where('field_type','attribute')->where('element_attribute_id',$attribute['id'])->get();
					?>
					<div class="col-12 col-md-6 col-lg-6">
						 <div class="form-group">
		                <label>{{  ucwords(str_replace('_',' ',$attribute['name'])) }}</label>
		                @if($attribute['input_type']  == 'drop-down')
		                <select class="form-control" name="{{ $attribute['input_type_name'] }}" >
		                 	<option value=''>Select {{ $attribute['name'] }}</option>
		                 	@foreach($attributeValues as $attributeValue)
								<option value="{{ $attributeValue['code'] }}">{{ $attributeValue['description'] }}</option>
		                 	@endforeach
						    
						  </select>

		            	@else
		                <input type="text" class="form-control" value="{{ $masterScedData[$attribute['input_type_name']] }}"name="{{ $attribute['input_type_name'] }}">
		                @endif
		              </div>
				  <?php if($errors->has('scedcourse')): ?>
					<?php 	foreach($errors->get('scedcourse') as $error): ?>
						<div class="invalid-feedback-server-side"> <?php echo $error ?></div>
					<?php 	endforeach; ?>
				<?php	endif;  ?>
  					</div>
					@endforeach 
					<!--  start for attribute-->  
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

