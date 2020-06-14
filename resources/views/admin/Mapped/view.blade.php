@extends('admin/layouts/app')
@section('main-content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Mapping </h4>
         
      </div>

      <div class="card-body">
			<div class="row">
					@foreach($masterScedHeaders as $masterScedHeader)
					<div class="col-12 col-md-6 col-lg-6">
						 <div class="form-group">
		                <label>{{  ucwords(str_replace('_',' ',$masterScedHeader['name'])) }}</label>
		                <input type="text" class="form-control" readonly="{{ $masterScedHeader['readonly'] }}" value="{{ $masterScedData[$masterScedHeader['input_type_name']]}}">
		              </div>
  					</div>
  				
					@endforeach 
					<div class="card-header"><h4>Element </h4></div>
					@foreach($elements as $element)
					<?php 
					  $elementValues= App\Admin\Model\MasterScedElementAttribute::where('field_type','element')->where('element_attribute_id',$element['id'])->get();
					?>
					<div class="col-12 col-md-6 col-lg-6">
						 <div class="form-group">
		                <label>{{  ucwords(str_replace('_',' ',$element['name'])) }}</label>
		                <input type="text" class="form-control" value="{{ $masterScedData[$element['input_type_name']] }}"name="{{ $element['input_type_name'] }}">
		               
		              </div>
  					</div>
					@endforeach 
					<div class="card-header"><h4>Attribute </h4></div>
					<!--  start for attribute-->  
					@foreach($attributes as $attribute)
					<?php 
					  $attributeValues= App\Admin\Model\MasterScedElementAttribute::where('field_type','attribute')->where('element_attribute_id',$attribute['id'])->get();
					?>
					<div class="col-12 col-md-6 col-lg-6">
						 <div class="form-group">
		                <label>{{  ucwords(str_replace('_',' ',$attribute['name'])) }}</label>
		                <input type="text" class="form-control" value="{{ $masterScedData[$attribute['input_type_name']] }}"name="{{ $attribute['input_type_name'] }}">
		              </div>
  					</div>
					@endforeach 
					<!--  start for attribute-->   
					
					<div class="card-header"><h4>State Data </h4></div>  
					@foreach($masterStateHeaders as $masterStateHeader)

					
					<div class="col-12 col-md-6 col-lg-6">
						 <div class="form-group">
		                <label>{{  ucwords(str_replace('_',' ',$masterStateHeader['name'])) }}</label>
		                <input type="text" class="form-control" value="{{ $masterScedData[$masterStateHeader['input_type_name']] }}"name="{{ $masterStateHeader['input_type_name'] }}">
		              </div>
  					</div>
					@endforeach 
				</div>
			</div>
    	<div class="card-footer">
			<a class="btn btn-primary" href="{{ URL::previous() }}">Go Back</a>
    	</div>
  </div>
</div>   
@endsection

