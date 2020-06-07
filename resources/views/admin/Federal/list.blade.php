@extends('admin/layouts/app')
@section('main-content')
<div class="row">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header">
		  <h4>SCED Data</h4>
		  <div class="card-header-action"> <a class="btn btn-outline-primary" href="{{ route('element.create') }}"> Elements SCED Upload</a>&nbsp <a class="btn btn-outline-primary" href="{{ route('attribute.create') }}"> Attributes SCED Upload</a>&nbsp;<a class="btn btn-outline-primary" href="{{ route('federal.upload') }}">SCED Upload Data</a>
		  </div>
		</div>
		  <div class="card-body">
			<div class="table-responsive">
			  <table class="table table-striped" id="table-1">
				<thead>
				  <tr>
					<th class="text-center">
					  #
					</th>
					<th>SCED Course Code</th>
					<th>SCED Course Title</th>
					<th>SCED course Description</th>
					<th>Chnage Status </th>
					<th>Action</th>
				  </tr>
				</thead>
				<tbody>
				@if(!$scedData->isEmpty())
				  @foreach($scedData as $scedDatas)
				  <tr>
					<td>		
					 {{ $loop->iteration }}
					</td>
					<td data-toggle="tooltip" data-placement="top" data-original-title="{{  Illuminate\Support\Str::limit($scedDatas->SCED_course_code, 50) }}">{{  Illuminate\Support\Str::limit($scedDatas->SCED_course_code, 50) }}</td>
					<td data-toggle="tooltip" data-placement="top" data-original-title="{{  Illuminate\Support\Str::limit($scedDatas->SCED_course_title, 50) }}">{{  Illuminate\Support\Str::limit($scedDatas->SCED_course_title, 50) }}</td>
					<td data-toggle="tooltip" data-placement="top" data-original-title="{{  Illuminate\Support\Str::limit($scedDatas->SCED_course_description, 50) }}">{{  Illuminate\Support\Str::limit($scedDatas->SCED_course_description, 50) }}</td>
					<td data-toggle="tooltip" data-placement="top" data-original-title="{{  Illuminate\Support\Str::limit($scedDatas->change_status, 50) }}">{{  Illuminate\Support\Str::limit($scedDatas->change_status, 50) }}></td>
					<td><a class="btn btn-primary" href="{{ route('federal.mapping', ['id' => $scedDatas->id]) }}">Map </a></td>
				  </tr>
			   @endforeach
				   @else
				    <tr>
						<td colspan="10">
							<center style="font-size: 18px;color: red;font-weight: bold;">Data not founds.</center>
						</td>
					</tr>
				  @endif		
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
	  </div>
	</div>
			

@endsection