@extends('admin/layouts/app')
@section('main-content')
<div class="row">
	  <div class="col-12">
		<div class="card">
		  <div class="card-header">
		  <h4>State SCED Data</h4>
		  <div class="card-header-action"><a class="btn btn-outline-primary" href="{{ route('state.upload') }}">State SCED Upload Data</a>
		</div>
		</div>
		  <div class="card-body">
			<div class="table-responsive">
			  <table class="table table-striped" id="table-1">
				<thead>
				  <tr>
					<th class="text-center">#</th>
					<th>Subject Area Code</th>
					<th>Subject Area</th>
					<th>Course Code</th>
					<th>Course Title</th>
					<th>Description</th> 
					<th>Action</th>
				  </tr>
				</thead>
			   <tbody>
			   	<tr>
					<td>
					1
					</td>
					<td>AZ01</td>
					<td>English Language and Literature </td>
					<td>004</td>
					<td>English/Language Arts IV (12th grade)</td>
					<td>English/Language Arts IV (12th grade) courses blend composition and literature into a cohesive whole as students write critical and comparative analyses of selected literature, continuing to develop their language arts skills. Typically, students primarily write multi-paragraph essays, but they may also write one or more major research papers.</td>
					<td><a class="btn btn-primary" href="{{ route('state.create', ['id' => 1]) }}">Map </a></td>
				  </tr>
				  <tr>
					<td>
					1
					</td>
					<td>AZ02</td>
					<td>English Language and Literature </td>
					<td>004</td>
					<td>AP English Language and Composition</td>
					<td>Following the College Board’s suggested curriculum designed to parallel college-level English courses, AP English Language and Composition courses expose students to prose written in a variety of periods, disciplines, and rhetorical contexts. These courses emphasize the interaction of authorial purpose, intended audience, and the subject at hand, and through them, students learn to develop stylistic flexibility as they write compositions covering a variety of subjects that are intended for various purposes.</td>
					<td><a class="btn btn-primary" href="{{ route('state.create', ['id' => 1]) }}">Map </a></td>
				  </tr>
			   <!--<tr>
				<td colspan="10">
				<center style="font-size: 18px;color: red;font-weight: bold;">Data not founds.</center>
				</td>
			</tr>-->
		</tbody>
	  </table>
	</div>
  </div>
</div>
</div>
</div>
<!-- Modal with form -->
@endsection