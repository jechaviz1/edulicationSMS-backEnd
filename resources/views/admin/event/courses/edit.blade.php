 
<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Courses</h4>
                <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('course-list') }}" class="btn btn-primary light">Courses list</a>
                    </li>

                </ul>
            </div>
	
            <div class="card-body">
                
                <div class="tab-content" id="myTabContent">
    				<div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
    					<div class="card-body pt-0">
    						<!-- Nav tabs -->
    						<div class="default-tab">
    							<ul class="nav nav-tabs" role="tablist">
    								<li class="nav-item">
    									<!--<a class="nav-link active" data-bs-toggle="tab" href="#course_info"><i class="la la-home me-2"></i> Course Info</a>-->
    									<a class="nav-link active" data-bs-toggle="tab" href="#course_info">Course Info</a>
    								</li>
    								<li class="nav-item">
    									<a class="nav-link" data-bs-toggle="tab" href="#avetmiss_code"> Avetmiss Codes</a>
    								</li>
    								<li class="nav-item">
    									<a class="nav-link" data-bs-toggle="tab" href="#units_of_competency">Units of Competency</a>
    								</li>
    							</ul>
    							<div class="tab-content">
    								<div class="tab-pane fade show active" id="course_info" role="tabpanel">
                                        <div class="form-validation">
                    
                                            <form class="needs-validation mt-4" novalidate  method="POST" action="{{ route('update-course',$course->id ) }}" >
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Course Code <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control" id="validationCustom02"  placeholder="Course Code" required name="course_code" value="{{$course->code}}">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a Course Code.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Course Name <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control" id="validationCustom02"  placeholder="Title" required name="name" value="{{$course->name}}">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a name.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                        
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Course Category <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <select class="default-select wide form-control" name="course_category" id="course_category">
                                                                        @foreach( $course_category as $cate )
                                                                        <option value="{{ $cate->id }}" @foreach($course_category as $selected_category) {{ $selected_category->id == $cate->id ? 'selected' : '' }} @endforeach>{{ $cate->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select Course Category.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Default Course Cost ($) <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <input type="text" class="form-control" id="validationCustom02"  placeholder="Default Course Cost" name="cost" value="{{$course->default_course_cost}}">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a Course cost.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Description <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <textarea class="form-txtarea form-control" rows="4" id="description" name="description">{{$course->description}}</textarea>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a Description.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Course Comments <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <textarea class="form-txtarea form-control" rows="4" id="comment" name="comment">{{$course->comments}}</textarea>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a comment.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                        
                                                            
                                                        </div>
                                                        
                                                        <div class="col-xl-6">
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Follow-up Enquiry <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <select class="default-select wide form-control" name="follow_enquiry" id="follow_enquiry">
                                                                        <option value="">Select</option>
                                                                        @foreach( $user as $row )
                                                                        <option value="{{ $row->id }}" @foreach($user as $selected_category) {{ $selected_category->id == $row->id ? 'selected' : '' }} @endforeach>{{ $row->first_name }} {{$row->last_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        Please select follow up enquiry.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Delivery method(s) <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6 row">
                                                                    <div class="col-md-12 form-check custom-checkbox">
                        												<input type="checkbox" class="form-check-input" id="customCheckBox1" value="Self Paced" name="delivery_method_self" @if( strpos( $course->delivery_method, 'Self Paced' ) !== false) checked @endif>
                        												<label class="form-check-label" for="customCheckBox1">Self Paced</label>
                                                                    </div>
                                                                    <div class="col-md-6 form-check custom-checkbox">
                        												<input type="checkbox" class="form-check-input" id="customCheckBox1" value="Public Sessions" name="delivery_method_public" @if( strpos( $course->delivery_method, 'Public Sessions' ) !== false) checked @endif>
                        												<label class="form-check-label" for="customCheckBox1">Public Sessions</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select class="default-select wide form-control" name="public_session_options" id="follow_enquiry">
                                                                            <option value="Single Session" @if( strpos( $course->delivery_method, 'Single Session' ) !== false && strpos( $course->delivery_method, 'Public Sessions' ) !== false) selected @endif>Single Session</option>
                                                                            <option value="Multiple Sessions" @if( strpos( $course->delivery_method, 'Multiple Session' ) !== false && strpos( $course->delivery_method, 'Public Sessions' ) !== false) selected @endif>Multiple Sessions</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6 form-check custom-checkbox">
                        												<input type="checkbox" class="form-check-input" id="customCheckBox1" value="Private Sessions" name="delivery_method_private" @if( strpos( $course->delivery_method, 'Private Sessions' ) !== false) checked @endif>
                        												<label class="form-check-label" for="customCheckBox1">Private Sessions</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select class="default-select wide form-control" name="private_session_options" id="follow_enquiry">
                                                                             <option value="Single Session" @if( strpos( $course->delivery_method, 'Single Session' ) !== false && strpos( $course->delivery_method, 'Private Sessions' ) !== false) selected @endif>Single Session</option>
                                                                            <option value="Multiple Sessions" @if( strpos( $course->delivery_method, 'Multiple Session' ) !== false && strpos( $course->delivery_method, 'Private Sessions' ) !== false) selected @endif>Multiple Sessions</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="invalid-feedback">
                                                                        Please select delivery method.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Required Number of Units to Complete <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6 d-flex">
                                                                    <div class="col-md-2">
                                                                      <input type="text" class="form-control" id="validationCustom02"  placeholder="" name="no_of_units" value="{{$course->required_no_of_unit}}">
                                                                    </div>
                                                                    <span style="margin: 11px 5px 0px 5px;"> Including</span>
                                                                    <div class="col-md-2">
                                                                        <input type="text" class="form-control col-md-2" id="validationCustom02"  placeholder="" name="core_unit" value="{{$course->core_unit}}">
                                                                    </div>
                                                                    <span style="margin: 11px 0px 0px 5px;"> Core Units</span>
                                                                    <div class="invalid-feedback">
                                                                        Please enter a number of units.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Default colour <span class="text-danger"></span>
                                                                </label>
                                                                    <div class="col-lg-6">
                        													<input type="text" class="as_colorpicker form-control" name="color" value="{{$course->color}}">
                        											</div>
                                                                    
                                                                    <div class="invalid-feedback">
                                                                        Please enter default color.
                                                                    </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Report this course <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <div class="col-md-6 form-check custom-checkbox">
                        												<input type="checkbox" class="form-check-input" id="customCheckBox1" name="report_this_course" @if( $course->reporting_this_course == 1 ) checked @endif>
                                                                    </div>
                                                                    
                                                                    <div class="invalid-feedback">
                                                                        Please check report this course.
                                                                    </div>
                                                                </div>
                                                            </div>
                        
                                                            <div class="mb-3 row">
                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">TGA Package <span class="text-danger"></span>
                                                                </label>
                                                                <div class="col-lg-6">
                                                                    <div class="col-md-6 form-check custom-checkbox">
                        												<input type="checkbox" class="form-check-input" id="customCheckBox1" name="tga_package" @if( $course->tga_package == 1 ) checked @endif>
                                                                    </div>
                                                                    
                                                                    <div class="invalid-feedback">
                                                                        Please check tga package.
                                                                    </div>
                        
                                                                </div>
                                                            </div>
                        
                                                            <div class="mb-3 row">
                                                                <div class="col-lg-8 ms-auto">
                                                                    <button type="submit" class="btn btn-primary light">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                        
                                        </div>
    								</div>
    								<div class="tab-pane fade" id="avetmiss_code">
                                        <div class="form-validation mt-4">
                                         <form class="needs-validation" novalidate  method="POST" action="{{ route('store-avetmisscode') }}" enctype="multipart/form-data">
                                                @csrf
                    
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <input name="id" type="hidden" value="{{ (isset($avetmiss_code->id))?$avetmiss_code->id:-1 }}">
                                                        <input name="course_id" type="hidden" value="{{ $course->id }}">
                                                
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Course Code<span class="text-danger"></span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom02"  placeholder="Course Code"  name="course_code" value="{{@$avetmiss_code->course_code}}">
                                                                <div class="invalid-feedback">
                                                                    Please enter a course code.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">State Course Code<span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom02"  placeholder="State Course Code"  name="state_course_code" value="{{@$avetmiss_code->state_course_code}}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter state course code.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                    
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Reporting State <span class="text-danger"></span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                    <select class="default-select wide form-control" name="reporting_state" id="reporting_state">
                                                                        <option value="1" {{ @$avetmiss_code->reporting_state == '1' ? 'selected' : '' }}>South Australia</option>
                                                                    </select>
                                                                <div class="invalid-feedback">
                                                                    Please select reporting state.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Nominal Hours <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom02"  placeholder="Nominal Hours"  name="nominal_hours" value="{{@$avetmiss_code->nominal_hours}}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a Nominal Hours.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Recognition Identifier <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                    <select class="default-select wide form-control" name="recognition_identifier" id="recognition_identifier" required>
                                                                        <option value="1" {{ @$avetmiss_code->recognition_identifier == '1' ? 'selected' : '' }}>Higher-level qualifications, other than training package qualifications or nationally recognised accredited courses</option>
                                                                        <option value="2" {{ @$avetmiss_code->recognition_identifier == '2' ? 'selected' : '' }}>Locally recognised skill set, other than those specified in training packages</option>
                                                                        <option value="3" {{ @$avetmiss_code->recognition_identifier == '3' ? 'selected' : '' }}>Nationally accredited qualification specified in a national training package</option>
                                                                        <option value="4" {{ @$avetmiss_code->recognition_identifier == '4' ? 'selected' : '' }}>Nationally recognised accredited course, other than a qualification specified in  a national training package</option>
                                                                        <option value="5" {{ @$avetmiss_code->recognition_identifier == '5' ? 'selected' : '' }}>Nationally recognised skill set, specified in a national training package</option>
                                                                        <option value="6" {{ @$avetmiss_code->recognition_identifier == '6' ? 'selected' : '' }}>Other courses</option>
                                                                    </select>
                                                                <div class="invalid-feedback">
                                                                    Please select recognition identifier.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Qualification Category <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                    <select class="default-select wide form-control" name="qualification_category" id="qualification_category" required>
                                                                        <option value="1" {{ @$avetmiss_code->qualification_category == '1' ? 'selected' : '' }}>Advanced Diploma</option>
                                                                        <option value="2" {{ @$avetmiss_code->qualification_category == '2' ? 'selected' : '' }}>Associate Degree</option>
                                                                        <option value="3" {{ @$avetmiss_code->qualification_category == '3' ? 'selected' : '' }}>Bachelor Degree (Honours)</option>
                                                                        <option value="4" {{ @$avetmiss_code->qualification_category == '4' ? 'selected' : '' }}>Bachelor Degree (pass)</option>
                                                                        <option value="5" {{ @$avetmiss_code->qualification_category == '5' ? 'selected' : '' }}>Bridging and enabling courses not identifiable by level</option>
                                                                        <option value="6" {{ @$avetmiss_code->qualification_category == '6' ? 'selected' : '' }}>Certificate I</option>
                                                                        <option value="7" {{ @$avetmiss_code->qualification_category == '7' ? 'selected' : '' }}>Certificate II</option>
                                                                        <option value="8" {{ @$avetmiss_code->qualification_category == '8' ? 'selected' : '' }}>Certificate III</option>
                                                                        <option value="9" {{ @$avetmiss_code->qualification_category == '9' ? 'selected' : '' }}>Certificate IV</option>
                                                                        <option value="10" {{ @$avetmiss_code->qualification_category == '10' ? 'selected' : '' }}>Diploma</option>
                                                                        <option value="11" {{ @$avetmiss_code->qualification_category == '11' ? 'selected' : '' }}>Education not elsewhere classified</option>
                                                                        <option value="12" {{ @$avetmiss_code->qualification_category == '12' ? 'selected' : '' }}>Graduate Certificate</option>
                                                                        <option value="13" {{ @$avetmiss_code->qualification_category == '13' ? 'selected' : '' }}>Graduate Diploma</option>
                                                                        <option value="14" {{ @$avetmiss_code->qualification_category == '14' ? 'selected' : '' }}>Other non-award courses</option>
                                                                        <option value="15" {{ @$avetmiss_code->qualification_category == '15' ? 'selected' : '' }}>Professional Specialist Qualification at Graduate Certificate level</option>
                                                                        <option value="16" {{ @$avetmiss_code->qualification_category == '16' ? 'selected' : '' }}>Professional specialist qualification at Graduate Diploma level</option>
                                                                        <option value="17" {{ @$avetmiss_code->qualification_category == '17' ? 'selected' : '' }}>Statement of attainment not identifiable by level</option>
                                                                        <option value="18" {{ @$avetmiss_code->qualification_category == '18' ? 'selected' : '' }}>Year 10</option>
                                                                        <option value="19" {{ @$avetmiss_code->qualification_category == '19' ? 'selected' : '' }}>Year 11</option>
                                                                        <option value="20" {{ @$avetmiss_code->qualification_category == '20' ? 'selected' : '' }}>Year 12</option>
                                                                    </select>
                                                                <div class="invalid-feedback">
                                                                    Please select Qualification Category.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-xl-6">
                    
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">ANZSCO ID <span class="text-danger"></span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom02"  placeholder="ANZSCO ID"  name="anzscod_id" value="{{@$avetmiss_code->anzscod_id}}">
                                                                <div class="invalid-feedback">
                                                                    Please enter a anzsco id.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">VET Flag <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                    <select class="default-select wide form-control" name="vet_flag" id="vet_flag" required>
                                                                        <option value="0" {{ @$avetmiss_code->vet_flag == '0' ? 'selected' : '' }}>No</option>
                                                                        <option value="1" {{ @$avetmiss_code->vet_flag == '1' ? 'selected' : '' }}>Yes</option>
                                                                        
                                                                    </select>
                                                                <div class="invalid-feedback">
                                                                    Please select vet flag.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Field of Education <span class="text-danger"></span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom02"  placeholder="Field of Education"  name="field_of_education" value="{{@$avetmiss_code->field_of_education}}">
                                                                <div class="invalid-feedback">
                                                                    Please enter a field of education.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Associated Course Identifier <span class="text-danger"></span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom02"  placeholder="Associated Course Identifier "  name="associated_course_identifier" value="{{@$avetmiss_code->associated_course_identifier}}">
                                                                <div class="invalid-feedback">
                                                                    Please enter a Associated Course Identifier.
                                                                </div>
                    
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="mb-3 row">
                                                            <div class="col-lg-8 ms-auto">
                                                                <button type="submit" class="btn btn-primary light">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                                                
                        
                                        </div>
    								</div>
    								<div class="tab-pane fade" id="units_of_competency">
                                        <div class="table-responsive mt-4">
                                            <div class="row bg-primary text-white">
                                                <div class="col-md-6">
                                                    <p class="mb-0" style="padding: 3px 0px 3px 12px;">Core</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-0" style="text-align: right; padding: 3px 12px 3px 0px;" data-bs-toggle="modal" data-bs-target="#addunit">Add Unit</p>
                                                    @include($view.'.addunit')
                                                </div>
                                            </div>
                                            <table id="example_new" class="display table" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Field Of Education</th>
                                                        <th>Nominal Hours</th>
                                                        <th>VET</th>
                                                        <th>Compentency Flag</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($unit_core_active as $k=> $row)
                                                    
                                                    <tr>
                                                        <td>{{$row->code}}</td>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->field_of_education}}</td>
                                                        <td>{{$row->nominal_hours}}</td>
                                                        <td>
                                                            @if($row->vet == '0')
                                                            No
                                                            @else
                                                            Yes
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($row->competency_flag == '0')
                                                            Competency
                                                            @else
                                                            Module
                                                            @endif
                                                            
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a class="btn btn-primary light shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editunit-{{ $row->id }}"><i class="fa fa-pencil"></i></a>
                                                                @include($view.'.editunit')
                                                                <a href="{{ route('delete-unit',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                @if($row->status == '1')
                                                                  <a href="{{ route('change-unit-status',[$row->id,$row->status=0]) }}" onclick="return confirm('Are you sure you want to deactive this course?')" class=""><i title="Deactivate Course" class="fa fa-toggle-on fa-2x text-success" aria-hidden="true"></i></a>
                                                                @else
                                                                 <a href="{{ route('change-unit-status',[$row->id,$row->status=1]) }}" onclick="return confirm('Are you sure you want to active this course?')" class=""><i title="Activate Course" class="fa fa-toggle-off fa-2x text-success" aria-hidden="true"></i></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <!--elective -->
                                        
                                        <div class="table-responsive mt-4">
                                            <div class="row bg-primary text-white">
                                                <div class="col-md-6">
                                                    <p class="mb-0" style="padding: 3px 0px 3px 12px;">Elective</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-0" style="text-align: right; padding: 3px 12px 3px 0px;" data-bs-toggle="modal" data-bs-target="#addunitelective">Add Unit</p>
                                                    @include($view.'.addunitelective')
                                                </div>
                                            </div>
                                            <table id="example_new" class="display table" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Field Of Education</th>
                                                        <th>Nominal Hours</th>
                                                        <th>VET</th>
                                                        <th>Compentency Flag</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($unit_elective_active as $k=> $row)
                                                    
                                                    <tr>
                                                        <td>{{$row->code}}</td>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->field_of_education}}</td>
                                                        <td>{{$row->nominal_hours}}</td>
                                                        <td>
                                                            @if($row->vet == '0')
                                                            No
                                                            @else
                                                            Yes
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($row->competency_flag == '0')
                                                            Competency
                                                            @else
                                                            Module
                                                            @endif
                                                            
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a class="btn btn-primary light shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editunit-{{ $row->id }}"><i class="fa fa-pencil"></i></a>
                                                                @include($view.'.editunit')
                                                                <a href="{{ route('delete-unit',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                @if($row->status == '1')
                                                                  <a href="{{ route('change-unit-status',[$row->id,$row->status=0]) }}" onclick="return confirm('Are you sure you want to deactive this course?')" class=""><i title="Deactivate Course" class="fa fa-toggle-on fa-2x text-success" aria-hidden="true"></i></a>
                                                                @else
                                                                 <a href="{{ route('change-unit-status',[$row->id,$row->status=1]) }}" onclick="return confirm('Are you sure you want to active this course?')" class=""><i title="Activate Course" class="fa fa-toggle-off fa-2x text-success" aria-hidden="true"></i></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="table-responsive mt-4">
                                            <div class="row bg-primary text-white">
                                                <div class="col-md-6">
                                                    <p class="mb-0" style="padding: 3px 0px 3px 12px;">Inactive Core Units</p>
                                                </div>
                                        
                                            </div>
                                            <table id="example_new" class="display table" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Field Of Education</th>
                                                        <th>Nominal Hours</th>
                                                        <th>VET</th>
                                                        <th>Compentency Flag</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($unit_core_inactive as $k=> $row)
                                                    
                                                    <tr>
                                                        <td>{{$row->code}}</td>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->field_of_education}}</td>
                                                        <td>{{$row->nominal_hours}}</td>
                                                        <td>
                                                            @if($row->vet == '0')
                                                            No
                                                            @else
                                                            Yes
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($row->competency_flag == '0')
                                                            Competency
                                                            @else
                                                            Module
                                                            @endif
                                                            
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a class="btn btn-primary light shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editunit-{{ $row->id }}"><i class="fa fa-pencil"></i></a>
                                                                @include($view.'.editunit')
                                                                <a href="{{ route('delete-unit',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                @if($row->status == '1')
                                                                  <a href="{{ route('change-unit-status',[$row->id,$row->status=0]) }}" onclick="return confirm('Are you sure you want to deactive this course?')" class=""><i title="Deactivate Course" class="fa fa-toggle-on fa-2x text-success" aria-hidden="true"></i></a>
                                                                @else
                                                                 <a href="{{ route('change-unit-status',[$row->id,$row->status=1]) }}" onclick="return confirm('Are you sure you want to active this course?')" class=""><i title="Activate Course" class="fa fa-toggle-off fa-2x text-success" aria-hidden="true"></i></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="table-responsive mt-4">
                                            <div class="row bg-primary text-white">
                                                <div class="col-md-6">
                                                    <p class="mb-0" style="padding: 3px 0px 3px 12px;">Inactive Elective Units</p>
                                                </div>
                                            
                                            </div>
                                            <table id="example_new" class="display table" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Field Of Education</th>
                                                        <th>Nominal Hours</th>
                                                        <th>VET</th>
                                                        <th>Compentency Flag</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($unit_elective_inactive as $k=> $row)
                                                    
                                                    <tr>
                                                        <td>{{$row->code}}</td>
                                                        <td>{{$row->name}}</td>
                                                        <td>{{$row->field_of_education}}</td>
                                                        <td>{{$row->nominal_hours}}</td>
                                                        <td>
                                                            @if($row->vet == '0')
                                                            No
                                                            @else
                                                            Yes
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($row->competency_flag == '0')
                                                            Competency
                                                            @else
                                                            Module
                                                            @endif
                                                            
                                                        </td>
                                                        <td>
                                                            <div class="d-flex">
                                                                <a class="btn btn-primary light shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#editunit-{{ $row->id }}"><i class="fa fa-pencil"></i></a>
                                                                @include($view.'.editunit')
                                                                <a href="{{ route('delete-unit',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                                @if($row->status == '1')
                                                                  <a href="{{ route('change-unit-status',[$row->id,$row->status=0]) }}" onclick="return confirm('Are you sure you want to deactive this course?')" class=""><i title="Deactivate Course" class="fa fa-toggle-on fa-2x text-success" aria-hidden="true"></i></a>
                                                                @else
                                                                 <a href="{{ route('change-unit-status',[$row->id,$row->status=1]) }}" onclick="return confirm('Are you sure you want to active this course?')" class=""><i title="Activate Course" class="fa fa-toggle-off fa-2x text-success" aria-hidden="true"></i></a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
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


<style>
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #a0cf1a;
        color: white;
    }
    .asColorPicker-dropdown {
        max-width: 100%;
    }
    .asColorPicker-wrap {
        display: inline-flex;
    }
    .asColorPicker-trigger {
        width: 35px;
        height: 38px;
        border: 0 none !important;
        left: -5px;
    }
</style>

@section('customjs')
 
 


<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated');
                    }, false);
                })
    })()


    $('[name=tab]').each(function (i, d) {
        var p = $(this).prop('checked');
//   console.log(p);
        if (p) {
            $('article').eq(i)
                    .addClass('on');
        }
    });

    $('[name=tab]').on('change', function () {
        var p = $(this).prop('checked');

        // $(type).index(this) == nth-of-type
        var i = $('[name=tab]').index(this);

        $('article').removeClass('on');
        $('article').eq(i).addClass('on');
    });
</script>



<!--select2 js-->

<script src="{{ asset('admin/vendor/select2/js/select2.full.min.js')}}"></script>


<script type="text/javascript">
(function($) {
    "use strict"
    
    // Colorpicker
    $(".as_colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
})(jQuery);

</script>


<!-- Daterangepicker -->
<!-- momment js is must -->
<!--<script src="./vendor/moment/moment.min.js"></script>-->
<script src="{{ asset('admin/vendor/moment/moment.min.js')}}"></script>
<!--<script src="./vendor/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<script src="{{ asset('admin/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- clockpicker -->
<script src="./vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<!-- asColorPicker -->
<script src="./vendor/jquery-asColor/jquery-asColor.min.js"></script>
<script src="./vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
<script src="./vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
<!-- Material color picker -->
<script src="./vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<!-- pickdate -->
<!--<script src="./vendor/pickadate/picker.js"></script>-->
<script src="{{ asset('admin/vendor/pickadate/picker.js')}}"></script>
<script src="./vendor/pickadate/picker.time.js"></script>
<!--<script src="./vendor/pickadate/picker.date.js"></script>-->
<script src="{{ asset('admin/vendor/pickadate/picker.date.js')}}"></script>


<!-- Daterangepicker -->
<!--<script src="./js/plugins-init/bs-daterange-picker-init.js"></script>-->
<script src="{{ asset('admin/js/plugins-init/bs-daterange-picker-init.js')}}"></script>

<!-- Clockpicker init -->
<script src="./js/plugins-init/clock-picker-init.js"></script>
<!-- asColorPicker init -->
<script src="./js/plugins-init/jquery-asColorPicker.init.js"></script>
<!-- Material color picker init -->
<!--<script src="./js/plugins-init/material-date-picker-init.js"></script>-->
<script src="{{ asset('admin/js/plugins-init/material-date-picker-init.js')}}"></script>

<!-- Pickdate -->
<script src="./js/plugins-init/pickadate-init.js"></script>

<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('admin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>

        <!--<script src="./js/custom.js"></script>-->
<script src="{{ asset('admin/js/custom.js')}}"></script>
<!--<script src="./js/deznav-init.js"></script>-->
<script src="{{ asset('admin/js/deznav-init.js')}}"></script>
@endsection
@stop