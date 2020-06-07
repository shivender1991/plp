@extends('admin/layouts/app')
@section('main-content')
<div class="row">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header">
		  <h4>Mapped LSP with Federa/State</h4>
		  <div class="card-header-action"> 
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
					<th>Course ID</th>
					<th>Course Title</th>
					<th>Course Description</th>
					<th>SCED Course Code</th>
					<!-- <th>Chnage Status </th>
					<th>Action</th> -->
				  </tr>
				</thead>
				<tbody>
				@if(!$lspMappedDatas->isEmpty())
				  @foreach($lspMappedDatas as $lspMappedData)


				  <tr>
					<td>		
					 {{ $loop->iteration }}
					</td>
					<td>{{ $lspMappedData->course_id }}</td>
					<td>{{ $lspMappedData->SCED_course_title }}</td>
					<td data-toggle="tooltip" data-placement="top" data-original-title="{{  Illuminate\Support\Str::limit($lspMappedData->SCED_course_description) }}">{{  Illuminate\Support\Str::limit($lspMappedData->SCED_course_description, 50) }}</td>
					<td>{{ $lspMappedData->sced_course_id }}</td>
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