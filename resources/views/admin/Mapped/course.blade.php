@extends('admin/layouts/app')
@section('main-content')
<div class="row">
	  <div class="col-12">
		<div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Topic</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Select Module</label>
                      <select  name="fieldname[]"  id="fieldnames" class="form-control">
                          <option value=''>Select Module</option>
                        @foreach($course_topics as $course_topic )
                        {{ print_r($course_topic) }}
                       <option value='{{ $course_topic->SCED_course_code }}'>{{ $course_topic->SCED_course_title }}</option>
                       @endforeach
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-8">
                        <div class="tab-content no-padding" id="myTab2Content">
                          <div class="tab-pane fade active show" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                            <div class="accordion" id="accordion">
		                        <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
		                          <h4>Resource</h4>
		                        </div>
		                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion" style="">
		                          <p class="mb-0">PDF File</p>
		                          <p class="mb-0">Doc File</p>
		                          <p class="mb-0">Video Tutorial</p>
		                          <p class="mb-0">Internet Link</p>
		                        </div>

		                        <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-2" aria-expanded="false">
		                          <h4>Activity</h4>
		                        </div>
		                        <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion" style="">
		                          <p class="mb-0">Quiz</p>
		                          <p class="mb-0">Assignment</p>
		                        </div>
                      		</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
	  </div>
	</div>
@endsection