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
                     <div class="tab-content">
                         <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                             <div class="card-body pt-0">
                                 <!-- Nav tabs -->
                                 <div class="default-tab">
                                     <ul class="nav nav-tabs" role="tablist" id="myTab">
                                         <li class="nav-item">
                                             <!--<a class="nav-link active" data-bs-toggle="tab" href="#course_info"><i class="la la-home me-2"></i> Course Info</a>-->
                                             <a class="nav-link " data-bs-toggle="tab" href="#course_info">Course
                                                 Info</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" data-bs-toggle="tab" href="#avetmiss_code"> Avetmiss
                                                 Codes</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" data-bs-toggle="tab" href="#units_of_competency">Units of
                                                 Competency</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link active" data-bs-toggle="tab" href="#info_pak">infoPAK</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" data-bs-toggle="tab" href="#modules">Modules</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" data-bs-toggle="tab" href="#defaults">Defaults</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" data-bs-toggle="tab" href="#trainers">Trainers</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" data-bs-toggle="tab" href="#assessors">Assessors</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" data-bs-toggle="tab" href="#enrolment_confirm">Enrolment
                                                 Confirm</a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link" data-bs-toggle="tab" href="#certificate_email"> Certificate
                                                 & Email</a>
                                         </li>
                                     </ul>
                                     <div class="tab-content">
                                         <div class="tab-pane fade " id="course_info" role="tabpanel">
                                             <div class="form-validation">
                                                 <form class="needs-validation mt-4" novalidate method="POST"
                                                     action="{{ route('update-course', $course->id) }}">
                                                     @csrf
                                                     <div class="row">
                                                         <div class="col-xl-6">
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Course Code <span
                                                                         class="text-danger">*</span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02" placeholder="Course Code"
                                                                         required name="course_code"
                                                                         value="{{ $course->code }}">
                                                                     <div class="invalid-feedback">
                                                                         Please enter a Course Code.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Course Name <span
                                                                         class="text-danger">*</span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02" placeholder="Title"
                                                                         required name="name"
                                                                         value="{{ $course->name }}">
                                                                     <div class="invalid-feedback">
                                                                         Please enter a name.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Course Category <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <select class="default-select wide form-control"
                                                                         name="course_category" id="course_category">
                                                                         @foreach ($course_category as $cate)
                                                                             <option value="{{ $cate->id }}"
                                                                                 @foreach ($course_category as $selected_category) {{ $selected_category->id == $cate->id ? 'selected' : '' }} @endforeach>
                                                                                 {{ $cate->name }}</option>
                                                                         @endforeach
                                                                     </select>
                                                                     <div class="invalid-feedback">
                                                                         Please select Course Category.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Default Course Cost ($) <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02"
                                                                         placeholder="Default Course Cost" name="cost"
                                                                         value="{{ $course->default_course_cost }}">
                                                                     <div class="invalid-feedback">
                                                                         Please enter a Course cost.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Description <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <textarea class="form-txtarea form-control" rows="4" id="description" name="description">{{ $course->description }}</textarea>
                                                                     <div class="invalid-feedback">
                                                                         Please enter a Description.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Course Comments <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <textarea class="form-txtarea form-control" rows="4" id="comment" name="comment">{{ $course->comments }}</textarea>
                                                                     <div class="invalid-feedback">
                                                                         Please enter a comment.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="col-xl-6">
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Follow-up Enquiry <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <select class="default-select wide form-control"
                                                                         name="follow_enquiry" id="follow_enquiry">
                                                                         <option value="">Select</option>
                                                                         @foreach ($user as $row)
                                                                             <option value="{{ $row->id }}"
                                                                                 @foreach ($user as $selected_category) {{ $selected_category->id == $row->id ? 'selected' : '' }} @endforeach>
                                                                                 {{ $row->first_name }}
                                                                                 {{ $row->last_name }}</option>
                                                                         @endforeach
                                                                     </select>
                                                                     <div class="invalid-feedback">
                                                                         Please select follow up enquiry.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Delivery method(s) <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6 row">
                                                                     <div class="col-md-12 form-check custom-checkbox">
                                                                         <input type="checkbox" class="form-check-input"
                                                                             id="customCheckBox1" value="Self Paced"
                                                                             name="delivery_method_self"
                                                                             @if (strpos($course->delivery_method, 'Self Paced') !== false) checked @endif>
                                                                         <label class="form-check-label"
                                                                             for="customCheckBox1">Self Paced</label>
                                                                     </div>
                                                                     <div class="col-md-6 form-check custom-checkbox">
                                                                         <input type="checkbox" class="form-check-input"
                                                                             id="customCheckBox1" value="Public Sessions"
                                                                             name="delivery_method_public"
                                                                             @if (strpos($course->delivery_method, 'Public Sessions') !== false) checked @endif>
                                                                         <label class="form-check-label"
                                                                             for="customCheckBox1">Public Sessions</label>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                         <select class="default-select wide form-control"
                                                                             name="public_session_options"
                                                                             id="follow_enquiry">
                                                                             <option value="Single Session"
                                                                                 @if (strpos($course->delivery_method, 'Single Session') !== false &&
                                                                                         strpos($course->delivery_method, 'Public Sessions') !== false) selected @endif>
                                                                                 Single Session</option>
                                                                             <option value="Multiple Sessions"
                                                                                 @if (strpos($course->delivery_method, 'Multiple Session') !== false &&
                                                                                         strpos($course->delivery_method, 'Public Sessions') !== false) selected @endif>
                                                                                 Multiple Sessions</option>
                                                                         </select>
                                                                     </div>
                                                                     <div class="col-md-6 form-check custom-checkbox">
                                                                         <input type="checkbox" class="form-check-input"
                                                                             id="customCheckBox1" value="Private Sessions"
                                                                             name="delivery_method_private"
                                                                             @if (strpos($course->delivery_method, 'Private Sessions') !== false) checked @endif>
                                                                         <label class="form-check-label"
                                                                             for="customCheckBox1">Private Sessions</label>
                                                                     </div>
                                                                     <div class="col-md-6">
                                                                         <select class="default-select wide form-control"
                                                                             name="private_session_options"
                                                                             id="follow_enquiry">
                                                                             <option value="Single Session"
                                                                                 @if (strpos($course->delivery_method, 'Single Session') !== false &&
                                                                                         strpos($course->delivery_method, 'Private Sessions') !== false) selected @endif>
                                                                                 Single Session</option>
                                                                             <option value="Multiple Sessions"
                                                                                 @if (strpos($course->delivery_method, 'Multiple Session') !== false &&
                                                                                         strpos($course->delivery_method, 'Private Sessions') !== false) selected @endif>
                                                                                 Multiple Sessions</option>
                                                                         </select>
                                                                     </div>
                                                                     <div class="invalid-feedback">
                                                                         Please select delivery method.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Required Number of Units to
                                                                     Complete <span class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6 d-flex">
                                                                     <div class="col-md-2">
                                                                         <input type="text" class="form-control"
                                                                             id="validationCustom02" placeholder=""
                                                                             name="no_of_units"
                                                                             value="{{ $course->required_no_of_unit }}">
                                                                     </div>
                                                                     <span style="margin: 11px 5px 0px 5px;">
                                                                         Including</span>
                                                                     <div class="col-md-2">
                                                                         <input type="text"
                                                                             class="form-control col-md-2"
                                                                             id="validationCustom02" placeholder=""
                                                                             name="core_unit"
                                                                             value="{{ $course->core_unit }}">
                                                                     </div>
                                                                     <span style="margin: 11px 0px 0px 5px;"> Core
                                                                         Units</span>
                                                                     <div class="invalid-feedback">
                                                                         Please enter a number of units.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Default colour <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text"
                                                                         class="as_colorpicker form-control"
                                                                         name="color" value="{{ $course->color }}">
                                                                 </div>

                                                                 <div class="invalid-feedback">
                                                                     Please enter default color.
                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Report this course <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <div class="col-md-6 form-check custom-checkbox">
                                                                         <input type="checkbox" class="form-check-input"
                                                                             id="customCheckBox1"
                                                                             name="report_this_course"
                                                                             @if ($course->reporting_this_course == 1) checked @endif>
                                                                     </div>

                                                                     <div class="invalid-feedback">
                                                                         Please check report this course.
                                                                     </div>
                                                                 </div>
                                                             </div>

                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">TGA Package <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <div class="col-md-6 form-check custom-checkbox">
                                                                         <input type="checkbox" class="form-check-input"
                                                                             id="customCheckBox1" name="tga_package"
                                                                             @if ($course->tga_package == 1) checked @endif>
                                                                     </div>

                                                                     <div class="invalid-feedback">
                                                                         Please check tga package.
                                                                     </div>

                                                                 </div>
                                                             </div>

                                                             <div class="mb-3 row">
                                                                 <div class="col-lg-8 ms-auto">
                                                                     <button type="submit"
                                                                         class="btn btn-primary light">Submit</button>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </form>

                                             </div>
                                         </div>
                                         <div class="tab-pane fade" id="avetmiss_code">
                                             <div class="form-validation mt-4">
                                                 <form class="needs-validation" novalidate method="POST"
                                                     action="{{ route('store-avetmisscode') }}"
                                                     enctype="multipart/form-data">
                                                     @csrf
                                                     <div class="row">
                                                         <div class="col-xl-6">
                                                             <input name="id" type="hidden"
                                                                 value="{{ isset($avetmiss_code->id) ? $avetmiss_code->id : -1 }}">
                                                             <input name="course_id" type="hidden"
                                                                 value="{{ $course->id }}">

                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Course Code<span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02" placeholder="Course Code"
                                                                         name="course_code" value="{{ $course->code }}">
                                                                     <div class="invalid-feedback">
                                                                         Please enter a course code.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">State Course Code<span
                                                                         class="text-danger">*</span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02"
                                                                         placeholder="State Course Code"
                                                                         name="state_course_code"
                                                                         value="{{ $course->code }}" required>
                                                                     <div class="invalid-feedback">
                                                                         Please enter state course code.
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Reporting State <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <select class="default-select wide form-control"
                                                                         name="reporting_state" id="reporting_state">
                                                                         @foreach ($states as $state)
                                                                             <option value="{{ $state->id }}">
                                                                                 {{ $state->name }}</option>
                                                                         @endforeach
                                                                     </select>
                                                                     <div class="invalid-feedback">
                                                                         Please select reporting state.
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Nominal Hours <span
                                                                         class="text-danger">*</span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02"
                                                                         placeholder="Nominal Hours" name="nominal_hours"
                                                                         value="{{ @$avetmiss_code->nominal_hours }}"
                                                                         required>
                                                                     <div class="invalid-feedback">
                                                                         Please enter a Nominal Hours.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Recognition Identifier <span
                                                                         class="text-danger">*</span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <select class="default-select wide form-control"
                                                                         name="recognition_identifier"
                                                                         id="recognition_identifier" required>
                                                                         <option value="1"
                                                                             {{ @$avetmiss_code->recognition_identifier == '1' ? 'selected' : '' }}>
                                                                             Higher-level qualifications, other than
                                                                             training package qualifications or nationally
                                                                             recognised accredited courses</option>
                                                                         <option value="2"
                                                                             {{ @$avetmiss_code->recognition_identifier == '2' ? 'selected' : '' }}>
                                                                             Locally recognised skill set, other than those
                                                                             specified in training packages</option>
                                                                         <option value="3"
                                                                             {{ @$avetmiss_code->recognition_identifier == '3' ? 'selected' : '' }}>
                                                                             Nationally accredited qualification specified
                                                                             in a national training package</option>
                                                                         <option value="4"
                                                                             {{ @$avetmiss_code->recognition_identifier == '4' ? 'selected' : '' }}>
                                                                             Nationally recognised accredited course, other
                                                                             than a qualification specified in a national
                                                                             training package</option>
                                                                         <option value="5"
                                                                             {{ @$avetmiss_code->recognition_identifier == '5' ? 'selected' : '' }}>
                                                                             Nationally recognised skill set, specified in a
                                                                             national training package</option>
                                                                         <option value="6"
                                                                             {{ @$avetmiss_code->recognition_identifier == '6' ? 'selected' : '' }}>
                                                                             Other courses</option>
                                                                     </select>
                                                                     <div class="invalid-feedback">
                                                                         Please select recognition identifier.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Qualification Category <span
                                                                         class="text-danger">*</span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <select class="default-select wide form-control"
                                                                         name="qualification_category"
                                                                         id="qualification_category" required>
                                                                         <option value="1"
                                                                             {{ @$avetmiss_code->qualification_category == '1' ? 'selected' : '' }}>
                                                                             Advanced Diploma</option>
                                                                         <option value="2"
                                                                             {{ @$avetmiss_code->qualification_category == '2' ? 'selected' : '' }}>
                                                                             Associate Degree</option>
                                                                         <option value="3"
                                                                             {{ @$avetmiss_code->qualification_category == '3' ? 'selected' : '' }}>
                                                                             Bachelor Degree (Honours)</option>
                                                                         <option value="4"
                                                                             {{ @$avetmiss_code->qualification_category == '4' ? 'selected' : '' }}>
                                                                             Bachelor Degree (pass)</option>
                                                                         <option value="5"
                                                                             {{ @$avetmiss_code->qualification_category == '5' ? 'selected' : '' }}>
                                                                             Bridging and enabling courses not identifiable
                                                                             by level</option>
                                                                         <option value="6"
                                                                             {{ @$avetmiss_code->qualification_category == '6' ? 'selected' : '' }}>
                                                                             Certificate I</option>
                                                                         <option value="7"
                                                                             {{ @$avetmiss_code->qualification_category == '7' ? 'selected' : '' }}>
                                                                             Certificate II</option>
                                                                         <option value="8"
                                                                             {{ @$avetmiss_code->qualification_category == '8' ? 'selected' : '' }}>
                                                                             Certificate III</option>
                                                                         <option value="9"
                                                                             {{ @$avetmiss_code->qualification_category == '9' ? 'selected' : '' }}>
                                                                             Certificate IV</option>
                                                                         <option value="10"
                                                                             {{ @$avetmiss_code->qualification_category == '10' ? 'selected' : '' }}>
                                                                             Diploma</option>
                                                                         <option value="11"
                                                                             {{ @$avetmiss_code->qualification_category == '11' ? 'selected' : '' }}>
                                                                             Education not elsewhere classified</option>
                                                                         <option value="12"
                                                                             {{ @$avetmiss_code->qualification_category == '12' ? 'selected' : '' }}>
                                                                             Graduate Certificate</option>
                                                                         <option value="13"
                                                                             {{ @$avetmiss_code->qualification_category == '13' ? 'selected' : '' }}>
                                                                             Graduate Diploma</option>
                                                                         <option value="14"
                                                                             {{ @$avetmiss_code->qualification_category == '14' ? 'selected' : '' }}>
                                                                             Other non-award courses</option>
                                                                         <option value="15"
                                                                             {{ @$avetmiss_code->qualification_category == '15' ? 'selected' : '' }}>
                                                                             Professional Specialist Qualification at
                                                                             Graduate Certificate level</option>
                                                                         <option value="16"
                                                                             {{ @$avetmiss_code->qualification_category == '16' ? 'selected' : '' }}>
                                                                             Professional specialist qualification at
                                                                             Graduate Diploma level</option>
                                                                         <option value="17"
                                                                             {{ @$avetmiss_code->qualification_category == '17' ? 'selected' : '' }}>
                                                                             Statement of attainment not identifiable by
                                                                             level</option>
                                                                         <option value="18"
                                                                             {{ @$avetmiss_code->qualification_category == '18' ? 'selected' : '' }}>
                                                                             Year 10</option>
                                                                         <option value="19"
                                                                             {{ @$avetmiss_code->qualification_category == '19' ? 'selected' : '' }}>
                                                                             Year 11</option>
                                                                         <option value="20"
                                                                             {{ @$avetmiss_code->qualification_category == '20' ? 'selected' : '' }}>
                                                                             Year 12</option>
                                                                     </select>
                                                                     <div class="invalid-feedback">
                                                                         Please select Qualification Category.
                                                                     </div>

                                                                 </div>
                                                             </div>

                                                         </div>
                                                         <div class="col-xl-6">

                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">ANZSCO ID <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02" placeholder="ANZSCO ID"
                                                                         name="anzscod_id"
                                                                         value="{{ @$avetmiss_code->anzscod_id }}">
                                                                     <div class="invalid-feedback">
                                                                         Please enter a anzsco id.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">VET Flag <span
                                                                         class="text-danger">*</span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <select class="default-select wide form-control"
                                                                         name="vet_flag" id="vet_flag" required>
                                                                         <option value="0"
                                                                             {{ @$avetmiss_code->vet_flag == '0' ? 'selected' : '' }}>
                                                                             No</option>
                                                                         <option value="1"
                                                                             {{ @$avetmiss_code->vet_flag == '1' ? 'selected' : '' }}>
                                                                             Yes</option>

                                                                     </select>
                                                                     <div class="invalid-feedback">
                                                                         Please select vet flag.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Field of Education <span
                                                                         class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02"
                                                                         placeholder="Field of Education"
                                                                         name="field_of_education"
                                                                         value="{{ @$avetmiss_code->field_of_education }}">
                                                                     <div class="invalid-feedback">
                                                                         Please enter a field of education.
                                                                     </div>

                                                                 </div>
                                                             </div>
                                                             <div class="mb-3 row">
                                                                 <label class="col-lg-4 col-form-label"
                                                                     for="validationCustom02">Associated Course Identifier
                                                                     <span class="text-danger"></span>
                                                                 </label>
                                                                 <div class="col-lg-6">
                                                                     <input type="text" class="form-control"
                                                                         id="validationCustom02"
                                                                         placeholder="Associated Course Identifier "
                                                                         name="associated_course_identifier"
                                                                         value="{{ @$avetmiss_code->associated_course_identifier }}">
                                                                     <div class="invalid-feedback">
                                                                         Please enter a Associated Course Identifier.
                                                                     </div>

                                                                 </div>
                                                             </div>

                                                             <div class="mb-3 row">
                                                                 <div class="col-lg-8 ms-auto">
                                                                     <button type="submit"
                                                                         class="btn btn-primary light">Submit</button>
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
                                                         <p class="mb-0"
                                                             style="text-align: right; padding: 3px 12px 3px 0px;"
                                                             data-bs-toggle="modal" data-bs-target="#addunit">Add Unit</p>
                                                         @include($view . '.addunit')
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
                                                         @foreach ($unit_core_active as $k => $row)
                                                             <tr>
                                                                 <td>{{ $row->code }}</td>
                                                                 <td>{{ $row->name }}</td>
                                                                 <td>{{ $row->field_of_education }}</td>
                                                                 <td>{{ $row->nominal_hours }}</td>
                                                                 <td>
                                                                     @if ($row->vet == '0')
                                                                         No
                                                                     @else
                                                                         Yes
                                                                     @endif
                                                                 </td>
                                                                 <td>
                                                                     @if ($row->competency_flag == '0')
                                                                         Competency
                                                                     @else
                                                                         Module
                                                                     @endif

                                                                 </td>
                                                                 <td>
                                                                     <div class="d-flex">
                                                                         <a class="btn btn-primary light shadow btn-xs sharp me-1"
                                                                             data-bs-toggle="modal"
                                                                             data-bs-target="#editunit-{{ $row->id }}"><i
                                                                                 class="fa fa-pencil"></i></a>
                                                                         @include($view . '.editunit')
                                                                         <a href="{{ route('delete-unit', $row->id) }}"
                                                                             onclick="return confirm('Are you sure?')"
                                                                             class="btn btn-danger shadow btn-xs sharp"><i
                                                                                 class="fa fa-trash"></i></a>
                                                                         @if ($row->status == '1')
                                                                             <a href="{{ route('change-unit-status', [$row->id, ($row->status = 0)]) }}"
                                                                                 onclick="return confirm('Are you sure you want to deactive this course?')"
                                                                                 class=""><i
                                                                                     title="Deactivate Course"
                                                                                     class="fa fa-toggle-on fa-2x text-success"
                                                                                     aria-hidden="true"></i></a>
                                                                         @else
                                                                             <a href="{{ route('change-unit-status', [$row->id, ($row->status = 1)]) }}"
                                                                                 onclick="return confirm('Are you sure you want to active this course?')"
                                                                                 class=""><i title="Activate Course"
                                                                                     class="fa fa-toggle-off fa-2x text-success"
                                                                                     aria-hidden="true"></i></a>
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
                                                         <p class="mb-0"
                                                             style="text-align: right; padding: 3px 12px 3px 0px;"
                                                             data-bs-toggle="modal" data-bs-target="#addunitelective">Add
                                                             Unit</p>
                                                         @include($view . '.addunitelective')
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
                                                         @foreach ($unit_elective_active as $k => $row)
                                                             <tr>
                                                                 <td>{{ $row->code }}</td>
                                                                 <td>{{ $row->name }}</td>
                                                                 <td>{{ $row->field_of_education }}</td>
                                                                 <td>{{ $row->nominal_hours }}</td>
                                                                 <td>
                                                                     @if ($row->vet == '0')
                                                                         No
                                                                     @else
                                                                         Yes
                                                                     @endif
                                                                 </td>
                                                                 <td>
                                                                     @if ($row->competency_flag == '0')
                                                                         Competency
                                                                     @else
                                                                         Module
                                                                     @endif
                                                                 </td>
                                                                 <td>
                                                                     <div class="d-flex">
                                                                         <a class="btn btn-primary light shadow btn-xs sharp me-1"
                                                                             data-bs-toggle="modal"
                                                                             data-bs-target="#editunit-{{ $row->id }}"><i
                                                                                 class="fa fa-pencil"></i></a>
                                                                         @include($view . '.editunit')
                                                                         <a href="{{ route('delete-unit', $row->id) }}"
                                                                             onclick="return confirm('Are you sure?')"
                                                                             class="btn btn-danger shadow btn-xs sharp"><i
                                                                                 class="fa fa-trash"></i></a>
                                                                         @if ($row->status == '1')
                                                                             <a href="{{ route('change-unit-status', [$row->id, ($row->status = 0)]) }}"
                                                                                 onclick="return confirm('Are you sure you want to deactive this course?')"
                                                                                 class=""><i
                                                                                     title="Deactivate Course"
                                                                                     class="fa fa-toggle-on fa-2x text-success"
                                                                                     aria-hidden="true"></i></a>
                                                                         @else
                                                                             <a href="{{ route('change-unit-status', [$row->id, ($row->status = 1)]) }}"
                                                                                 onclick="return confirm('Are you sure you want to active this course?')"
                                                                                 class=""><i title="Activate Course"
                                                                                     class="fa fa-toggle-off fa-2x text-success"
                                                                                     aria-hidden="true"></i></a>
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
                                                         <p class="mb-0" style="padding: 3px 0px 3px 12px;">Inactive
                                                             Core Units</p>
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
                                                         @foreach ($unit_core_inactive as $k => $row)
                                                             <tr>
                                                                 <td>{{ $row->code }}</td>
                                                                 <td>{{ $row->name }}</td>
                                                                 <td>{{ $row->field_of_education }}</td>
                                                                 <td>{{ $row->nominal_hours }}</td>
                                                                 <td>
                                                                     @if ($row->vet == '0')
                                                                         No
                                                                     @else
                                                                         Yes
                                                                     @endif
                                                                 </td>
                                                                 <td>
                                                                     @if ($row->competency_flag == '0')
                                                                         Competency
                                                                     @else
                                                                         Module
                                                                     @endif
                                                                 </td>
                                                                 <td>
                                                                     <div class="d-flex">
                                                                         <a class="btn btn-primary light shadow btn-xs sharp me-1"
                                                                             data-bs-toggle="modal"
                                                                             data-bs-target="#editunit-{{ $row->id }}"><i
                                                                                 class="fa fa-pencil"></i></a>
                                                                         @include($view . '.editunit')
                                                                         <a href="{{ route('delete-unit', $row->id) }}"
                                                                             onclick="return confirm('Are you sure?')"
                                                                             class="btn btn-danger shadow btn-xs sharp"><i
                                                                                 class="fa fa-trash"></i></a>
                                                                         @if ($row->status == '1')
                                                                             <a href="{{ route('change-unit-status', [$row->id, ($row->status = 0)]) }}"
                                                                                 onclick="return confirm('Are you sure you want to deactive this course?')"
                                                                                 class=""><i
                                                                                     title="Deactivate Course"
                                                                                     class="fa fa-toggle-on fa-2x text-success"
                                                                                     aria-hidden="true"></i></a>
                                                                         @else
                                                                             <a href="{{ route('change-unit-status', [$row->id, ($row->status = 1)]) }}"
                                                                                 onclick="return confirm('Are you sure you want to active this course?')"
                                                                                 class=""><i title="Activate Course"
                                                                                     class="fa fa-toggle-off fa-2x text-success"
                                                                                     aria-hidden="true"></i></a>
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
                                                         <p class="mb-0" style="padding: 3px 0px 3px 12px;">Inactive
                                                             Elective Units</p>
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
                                                         @foreach ($unit_elective_inactive as $k => $row)
                                                             <tr>
                                                                 <td>{{ $row->code }}</td>
                                                                 <td>{{ $row->name }}</td>
                                                                 <td>{{ $row->field_of_education }}</td>
                                                                 <td>{{ $row->nominal_hours }}</td>
                                                                 <td>
                                                                     @if ($row->vet == '0')
                                                                         No
                                                                     @else
                                                                         Yes
                                                                     @endif
                                                                 </td>
                                                                 <td>
                                                                     @if ($row->competency_flag == '0')
                                                                         Competency
                                                                     @else
                                                                         Module
                                                                     @endif

                                                                 </td>
                                                                 <td>
                                                                     <div class="d-flex">
                                                                         <a class="btn btn-primary light shadow btn-xs sharp me-1"
                                                                             data-bs-toggle="modal"
                                                                             data-bs-target="#editunit-{{ $row->id }}"><i
                                                                                 class="fa fa-pencil"></i></a>
                                                                         @include($view . '.editunit')
                                                                         <a href="{{ route('delete-unit', $row->id) }}"
                                                                             onclick="return confirm('Are you sure?')"
                                                                             class="btn btn-danger shadow btn-xs sharp"><i
                                                                                 class="fa fa-trash"></i></a>
                                                                         @if ($row->status == '1')
                                                                             <a href="{{ route('change-unit-status', [$row->id, ($row->status = 0)]) }}"
                                                                                 onclick="return confirm('Are you sure you want to deactive this course?')"
                                                                                 class=""><i
                                                                                     title="Deactivate Course"
                                                                                     class="fa fa-toggle-on fa-2x text-success"
                                                                                     aria-hidden="true"></i></a>
                                                                         @else
                                                                             <a href="{{ route('change-unit-status', [$row->id, ($row->status = 1)]) }}"
                                                                                 onclick="return confirm('Are you sure you want to active this course?')"
                                                                                 class=""><i title="Activate Course"
                                                                                     class="fa fa-toggle-off fa-2x text-success"
                                                                                     aria-hidden="true"></i></a>
                                                                         @endif
                                                                     </div>
                                                                 </td>
                                                             </tr>
                                                         @endforeach

                                                     </tbody>
                                                 </table>
                                             </div>
                                         </div>
                                         {{-- Start infoPAK --}}
                                         <div class="tab-pane fade p-4" id="info_pak">
                                             <h6 class="mt-2">Email Content</h6>
                                             <form action="" method="POST" name="info_paks">
                                                 @csrf
                                                 @method('POST')
                                                 <div class="row mb-3">
                                                     <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                                                     <div class="col-sm-10">
                                                         <input type="text" class="form-control" id="subject"
                                                             value="">
                                                     </div>
                                                 </div>
                                                 <div class="row mb-3">
                                                     <label for="subject" class="col-sm-2 col-form-label">Note</label>
                                                     <div class="col-sm-10">

                                                         <textarea class="form-control texteditor" name="body" id="body" rows="4">{{ isset($row->body) ? $row->body : '' }}</textarea>
                                                     </div>
                                                 </div>
                                             </form>
                                             <div class="row">
                                                 <div class="col-sm-12">
                                                     <p>
                                                         Select which Company Documents are to be included in the InfoPak
                                                         Email
                                                     </p>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-sm-12">
                                                     <table id="example_new" class="display table"
                                                         style="min-width: 845px">
                                                         <thead>
                                                             <tr>
                                                                 <th>Document Name</th>
                                                                 <th>File Name</th>
                                                                 <th>Select</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody>
                                                             @foreach ($info_document as $k => $row)
                                                                 <tr>
                                                                     <td>{{ $row->document_name }}</td>
                                                                     <td><a href="{{ asset($row->file_name)}}" target="_blank">{{ $row->file_name }}</a> {{ $row->created_at }}</td>
                                                                     <td> <input type="checkbox" name="" id=""></td>
                                                                 </tr>
                                                             @endforeach
                                                         </tbody>
                                                     </table>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-sm-12">
                                                     <p>Attach Course Specific Documents to be included in the InfoPak Email
                                                     </p>
                                                     <table id="example_new" class="display table"
                                                         style="min-width: 845px">
                                                         <thead>
                                                             <tr>
                                                                 <th>Document Name</th>
                                                                 <th>File Name</th>
                                                                 <th>Select</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody id="document_email_upload">
                                                         
                                                         </tbody>
                                                     </table>
                                                     {{-- <form action="" method="post">
                                                         @csrf()
                                                         @method('post') --}}
                                                         <div class="row">
                                                             <div class="col-sm-4">
                                                                 <div style="">
                                                                     Upload Document: <input type="file"
                                                                         name="infoPakFile" id="infoPakFile"
                                                                         style="" class="form-control">
                                                                 </div>
                                                             </div>
                                                             <div class="col-sm-4">
                                                                 <div style="">
                                                                     Document Name: <input class="form-control"
                                                                         type="text" name="documentName"
                                                                         id="documentName" style="" maxlength="50"
                                                                         fdprocessedid="x4bhl">
                                                                     <input type="hidden" name="courseId" id="courseId"
                                                                         value="2565">
                                                                 </div>
                                                             </div>
                                                             <div class="col-sm-4 d-flex align-items-center">
                                                                 <input type="submit" class="btn btn-primary" value="Upload" fdprocessedid="0qoxp" onclick="uploadDocument()">
                                                             </div>
                                                         </div>
                                                     {{-- </form> --}}
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-sm-12 text-center">
                                                     <button class="btn btn-primary mt-3" type="submit"
                                                         id="info_paks">Save</button>
                                                 </div>
                                             </div>
                                         </div>
                                         {{-- End infoPAK --}}
                                         {{-- Start Modules --}}
                                         <div class="tab-pane fade p-4" id="modules">
                                             <div class="row">
                                                 <div class="col-sm-12">
                                                     @if ($modules != null)
                                                         <table width="70%" class="table" cellspacing="4"
                                                             cellpadding="0" border="0" align="center">
                                                             <thead>
                                                                 <tr>
                                                                     <th align="center">Module Name</th>
                                                                     <th align="center"></th>
                                                                 </tr>
                                                             </thead>
                                                             <tbody id="add_the_data">
                                                                 @foreach ($modules as $module)
                                                                     <tr>
                                                                         <td align="left">
                                                                             <div id="pName1050">{{ $module->title }}
                                                                             </div>
                                                                         </td>
                                                                         <td align="right">
                                                                             <i class="fa fa-pencil text-info fa-2x mr-2"
                                                                                 onclick="addModuleBtn_Click('{{ $module->id }}', jQuery('#pName1050').html());">
                                                                             </i>
                                                                             <i class="fa fa-trash text-danger fa-2x"
                                                                                 onclick="deleteModuleBtn_Click('{{ $module->id }}');">
                                                                             </i>
                                                                         </td>
                                                                     </tr>
                                                                 @endforeach

                                                             </tbody>
                                                         </table>
                                                         {!! $modules->render() !!}
                                                     @endif
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-sm-12 text-center py-3" id="addModulePanel">
                                                     <button type="button" class="btn btn-primary mt-3"
                                                         name="addModuleBtn" id="addModuleBtn"
                                                         onclick="addModuleBtn_Click();">Add Module</button>
                                                 </div>
                                             </div>
                                         </div>
                                         {{-- End Modules --}}
                                         {{-- Start Defaults --}}
                                         <div class="tab-pane fade p-4" id="defaults">
                                             <div class="mt-3">
                                                 <h5>Default Session Fields <small>(used when creating course
                                                         events)</small></h5>
                                             </div>
                                             <table width="80%" class="table" cellspacing="4" cellpadding="0"
                                                 border="0" align="center">
                                                 <thead>
                                                     <tr>
                                                         <th align="center">Id</th>
                                                         <th align="center">City Name</th>
                                                         <th align="center">Default Trainer</th>
                                                         <th align="center">Default Assessor</th>
                                                         <th align="center">Session Start Time</th>
                                                         <th align="center">Session End Time</th>
                                                         <th align="center">Action</th>
                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     @foreach ($default_session as $session)
                                                         {{-- @dd($session) --}}
                                                         <tr>
                                                             <td align="left" id="701cityName">{{ $session->id }}</td>
                                                             <td align="left">{{ $session->city->city_name }}</td>
                                                             <td align="left">{{ $session->teacher->first_name }}
                                                                 {{ $session->teacher->last_name }}</td>
                                                             <td align="left">{{ $session->teacher->first_name }}
                                                                 {{ $session->teacher->last_name }}</td>
                                                             <td align="left">{{ $session->dftstarttime }}</td>
                                                             <td align="left">{{ $session->dftendtime }}</td>
                                                             <td align="right">
                                                                 <i class="fa fa-pencil text-info fa-2x mr-2"
                                                                     href="#"
                                                                     onclick="addCityBtn_Click('701', '1519', 'new', '01:00:am', '03:00:pm', '921', '921');">

                                                                 </i>
                                                                 <i class="fa fa-trash text-danger fa-2x" href="#"
                                                                     style="text-decoration:none; color:#2C7FBA; cursor:pointer"
                                                                     onclick="deleteCityBtn_Click('701');"></i>
                                                             </td>
                                                         </tr>
                                                     @endforeach
                                                 </tbody>
                                             </table>
                                             {!! $default_session->render() !!}
                                             <br>
                                             <div class="row">
                                                 <div class="col-10" id="addCityPanel"><button type="button"
                                                         class="btn btn-primary" name="addCityBtn" id="addCityBtn"
                                                         onclick="addCityBtn_Click();">Add More Defaults</button></div>
                                             </div>
                                         </div>
                                         {{-- End Defaults --}}
                                         {{-- Start Trainers --}}
                                         <div class="tab-pane fade p-4" id="trainers">
                                             <div align="center" id="trainercompetency_2565" class="mt-5">
                                                 <form name="edit_competency_frm" id="edit_competency_frm" method="post"
                                                     action="{{ route('course.trainer') }}">
                                                     @csrf
                                                     @method('POST')
                                                     <input type="hidden" name="courseId" id="courseId"
                                                         value="{{ $course->id }}">
                                                     <table style="width:250px;" cellpadding="0" cellspacing="0">
                                                         <tbody>
                                                             @foreach ($teacher as $ter)
                                                                 <tr style="height: 20px;">
                                                                     <td align="left" style="padding-left:5px;"
                                                                         width="200"><label
                                                                             for="competency_921">{{ $ter->first_name }},
                                                                             {{ $ter->last_name }}</label></td>
                                                                     <td><input type="checkbox" class="custom-checkbox"
                                                                             name="competency_921" id="competency_921"
                                                                             checked=""></td>
                                                                 </tr>
                                                             @endforeach
                                                             <tr style="height:15px;">
                                                                 <td colspan="2"></td>
                                                             </tr>
                                                             <tr>
                                                                 <td colspan="2" align="center">
                                                                     <button type="submit" class="btn btn-primary"
                                                                         fdprocessedid="0kt6rb">Save</button>
                                                                 </td>
                                                             </tr>
                                                         </tbody>
                                                     </table>
                                                 </form>
                                             </div>
                                         </div>
                                         {{-- End Trainers --}}
                                         {{-- Start Assessors --}}
                                         <div class="tab-pane fade p-4" id="assessors">
                                             <form name="edit_competency_frm" id="edit_competency_frm" method="post"
                                                 action="{{ route('course.trainer') }}">
                                                 @csrf
                                                 @method('POST')
                                                 <input type="hidden" name="courseId" id="courseId"
                                                     value="{{ $course->id }}">
                                                 <table style="width:250px;" cellpadding="0" cellspacing="0">
                                                     <tbody>
                                                         @foreach ($teacher as $ter)
                                                             <tr style="height: 20px;">
                                                                 <td align="left" style="padding-left:5px;"
                                                                     width="200"><label for="competency_921">domadiya,
                                                                         kuldip</label></td>
                                                                 <td><input type="checkbox" class="custom-checkbox"
                                                                         name="competency_921" id="competency_921"
                                                                         checked=""></td>
                                                             </tr>
                                                         @endforeach
                                                         <tr style="height:15px;">
                                                             <td colspan="2"></td>
                                                         </tr>
                                                         <tr>
                                                             <td colspan="2" align="center">
                                                                 <button type="submit" class="btn btn-primary"
                                                                     fdprocessedid="0kt6rb">Save</button>
                                                             </td>
                                                         </tr>
                                                     </tbody>
                                                 </table>
                                             </form>
                                         </div>
                                         {{-- End Assessors --}}
                                         {{-- Start Enrolment Confirm --}}
                                         <div class="tab-pane fade p-4" id="enrolment_confirm">
                                             <h5>Email Content</h5>
                                             <form action="{{ route('course.document.email') }}" method="post">
                                                 @csrf
                                                 @method('POST')
                                                 <div class="form-group row">
                                                     <label for="subject" class="col-sm-1 col-form-label">Subject</label>
                                                     <div class="col-sm-11">
                                                         <input type="hidden" name="courId" id="courId"
                                                             value="{{ $course->id }}">
                                                         <input type="text" class="form-control" name="subject"
                                                             id="subject" maxlength="50"
                                                             value="Training Reservation: {course}"
                                                             fdprocessedid="0jdacb">
                                                     </div>
                                                 </div>
                                                 <div class="form-group row mt-3">
                                                     <label for="subject" class="col-sm-1 col-form-label">Subject</label>
                                                     <div class="col-sm-11">
                                                         <textarea class="form-control" name="note" id="" cols="30" rows="10"></textarea>
                                                     </div>
                                                 </div>
                                                 <p class="mt-5">Attach Course Specific Documents to be included in the
                                                     Enrolment Confirmation Email</p>
                                                 <table class="table" width="90%" border="0" cellpadding="0"
                                                     cellspacing="0">
                                                     <thead>
                                                         <tr>
                                                             <th style="width:40%">Document Name</th>
                                                             <th style="width:40%">File Name</th>
                                                             <th style="width:20%">Uploaded By</th>
                                                             <th style="width:20%">Action</th>
                                                             <th></th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($course_documents as $document)
                                                             <tr>
                                                                 <th style="width:40%">{{ $document->document_name }}
                                                                 </th>
                                                                 <th style="width:40%">{{ $document->file_name }}</th>
                                                                 <th style="width:20%">{{ $document->created_at }}</th>
                                                                 <th> <a href="{{ route('document.course.delete', $document->id) }}"
                                                                         onclick="return confirm('Are you sure?')"
                                                                         class="btn btn-danger shadow btn-xs sharp"><i
                                                                             class="fa fa-trash"></i></a></th>
                                                             </tr>
                                                         @endforeach
                                                     </tbody>
                                                 </table>
                                                 <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                 <div class="drop-zone">
                                                     <span class="drop-zone__prompt">Drop file here or click to
                                                         upload</span>
                                                     <input type="file" name="myFile" class="drop-zone__input"
                                                         id="myFile">
                                                 </div>
                                                 <button type="submit"
                                                     class="btn btn-primary mt-3 d-flex justify-content-center"
                                                     onclick='documentclick({{ $course->id }});'>Upload</button>
                                                 <p class="mt-3">Select which Company Documents are to be included in the
                                                     Enrolment Confirmation Email</p>
                                                 <table class="table" width="80%" border="0" cellpadding="0"
                                                     cellspacing="0">
                                                     <thead>
                                                         <tr>
                                                             <th style="width:40%">Document Name</th>
                                                             <th style="width:40%">File Name</th>
                                                             <th style="width:20%; text-align:center;">Select</th>
                                                         </tr>
                                                     </thead>
                                                     <tbody>
                                                         @foreach ($email_document as $email)
                                                             <tr style="height:20px;">
                                                                 <td align="left">{{ $email->document_name }}</td>
                                                                 <td align="left"><a
                                                                         href="{{ asset($email->file_name) }}"
                                                                         target="_blank">{{ asset($email->file_name) }}</a>
                                                                 </td>
                                                                 <td align="center"><input type="checkbox"
                                                                         name="com_chk[]" value="{{ $email->id }}"
                                                                         checked=""></td>
                                                             </tr>
                                                         @endforeach
                                                     </tbody>
                                                 </table>
                                                 <div class="row">
                                                     <div class="col-sm-12 d-flex justify-content-center">
                                                         <button class="btn btn-primary">Save</button>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                         {{-- End Enrolment Confirm  --}}
                                         {{-- Start Certificate & Email --}}
                                         <div class="tab-pane fade p-4" id="certificate_email">
                                             <form action="{{ route('courses.certificate.email')}}" method="post">
                                                @csrf
                                                @method('POST')
                                            <div class="row">
                                                 <div class="col-sm-12">
                                                     <label for="certificate" class="font-weight-bold">Set Course
                                                         Certificate</label>
                                                     <select name="certificate" id="certificate" class="form-control"
                                                         onchange="loadCertificateEmailContent(this.options[this.options.selectedIndex].value);" >
                                                         @foreach ($certificates as $certificate)
                                                         <option value="{{$certificate->id}}">{{ $certificate->newCertificateName }}</option>
                                                         @endforeach
                                                     </select>
                                                     <h5 class="mt-3">Email Content</h5>
                                                     <input type="text" class="form-control" value="Course Completion Certificate: {course}" name="subject">
                                                 </div>
                                                 <label for="certificate" class="font-weight-bold mt-3">Note</label>
                                                 <textarea class="form-control" name="note" id="note" cols="30" rows="10">

                                                 </textarea>
                                             </div>
                                             <button type="submit" class="btn btn-primary mt-3">Save</button>
                                            </form>
                                         </div>
                                         {{-- End Certificate & Email --}}
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

         .modal-backdrop {
             display: none;
         }

         .w-5 {
             width: 50px;
         }

         .h-5 {
             height: 50px;
         }

         .drop-zone {
             max-width: 100%;
             height: 200px;
             padding: 25px;
             display: flex;
             align-items: center;
             justify-content: center;
             text-align: center;
             font-family: "Quicksand", sans-serif;
             font-weight: 500;
             font-size: 20px;
             cursor: pointer;
             color: #cccccc;
             border: 1px dashed #a0cf1a;
             border-radius: 10px;
         }

         .drop-zone--over {
             border-style: solid;
         }

         .drop-zone__input {
             display: none;
         }

         .drop-zone__thumb {
             width: 100%;
             height: 100%;
             border-radius: 10px;
             overflow: hidden;
             background-color: #cccccc;
             background-size: cover;
             position: relative;
         }

         .drop-zone__thumb::after {
             content: attr(data-label);
             position: absolute;
             bottom: 0;
             left: 0;
             width: 100%;
             padding: 5px 0;
             color: #ffffff;
             background: rgba(0, 0, 0, 0.75);
             font-size: 14px;
             text-align: center;
         }
     </style>
 @section('customjs')
     <script>
         (function() {
             'use strict'
             // Fetch all the forms we want to apply custom Bootstrap validation styles to
             var forms = document.querySelectorAll('.needs-validation');

             // Loop over them and prevent submission
             Array.prototype.slice.call(forms)
                 .forEach(function(form) {
                     form.addEventListener('submit', function(event) {
                         if (!form.checkValidity()) {
                             event.preventDefault()
                             event.stopPropagation()
                         }

                         form.classList.add('was-validated');
                     }, false);
                 })
         })()


         $('[name=tab]').each(function(i, d) {
             var p = $(this).prop('checked');
             //   console.log(p);
             if (p) {
                 $('article').eq(i)
                     .addClass('on');
             }
         });

         $('[name=tab]').on('change', function() {
             var p = $(this).prop('checked');

             // $(type).index(this) == nth-of-type
             var i = $('[name=tab]').index(this);

             $('article').removeClass('on');
             $('article').eq(i).addClass('on');
         });
     </script>
     <!--select2 js-->
     <script src="{{ asset('admin/vendor/select2/js/select2.full.min.js') }}"></script>
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

     <script>
         function addModuleBtn_Click(moduleId, moduleName) {
             jQuery("#addModulePanel").html("");
             var htmlData = "<div style='height:30px;width:800px' align='center'>" +
                 "<div style='width:100px;float:left;margin-top:5px'>Module Name:</div><div style='float:left'>" +
                 "<input type='text' class='form-control' name='moduleName' id='moduleName' style='width:200px;' maxlength='20' tabindex='1'/>" +
                 "<input type='hidden' name='moduleId' id='moduleId'/></div>" +
                 "<div style='width:100px; float:left'>&nbsp;</div>" +
                 "<div style='float:left'><button type='button' class='btn btn-primary' onclick='saveNewModule();'>Save</button>&nbsp;&nbsp;&nbsp;" +
                 "<button type='button' class='btn btn-primary' onclick='cancelAddModule();'>Cancel</button>" +
                 "</div></div>";
             jQuery("#addModulePanel").html(htmlData);
             jQuery("#moduleId").val(moduleId);
             jQuery("#moduleName").val(moduleName);
             jQuery("#moduleName").focus();
         }

         function deleteModuleBtn_Click(moduleId) {
             if (confirm("Are you sure you want to delete the module?")) {
                 var url = "{{ route('module.delete') }}";
                 var courseId = "";
                 jQuery.ajax({
                     url: url,
                     data: {
                         "_token": "{{ csrf_token() }}",
                         'moduleId': moduleId
                     },
                     dataType: 'json',
                     type: 'POST',
                     success: function(response) {
                         if (response.response == "0") {
                             location.reload();
                         } else {
                             alert("Error while deleting module.");
                         }
                     }
                 });
             }
         }

         function cancelAddModule() {
             var htmlData =
                 "<button type='button' class='btn btn-primary' name='addModuleBtn' id='addModuleBtn' onclick='addModuleBtn_Click();'>Add Module</button>";
             jQuery("#addModulePanel").html(htmlData);
         }

         function saveNewModule() {
             var message = "";
             if (jQuery("#moduleName").val() == "")
                 message += "* Module Name\n";
             if (message != "") {
                 alert("Please fill in the following field(s):\n\n" + message);
                 return false;
             } else {
                 var moduleName = jQuery("#moduleName").val();
                 var courseId = "{{ $course->id }}";
                 if (jQuery("#moduleId").val() != "") {
                     var moduleId = jQuery("#moduleId").val();
                 } else {
                     var moduleId = jQuery("#moduleId").val();
                 }
                 var url = "{{ route('module.add') }}";
                 jQuery.ajax({
                     url: url,
                     type: 'POST',
                     dataType: 'json',
                     data: {
                         "_token": "{{ csrf_token() }}",
                         'courseId': courseId,
                         'moduleId': moduleId,
                         'moduleName': moduleName
                     },
                     success: function(response) {
                         if (response.response == "0") {
                             location.reload();
                         } else {
                             alert("Error while saving module.");
                         }
                     }
                 });
             }
         }

         function getElementsByClassName(classname, node) {
             if (!node)
                 node = document.getElementsByTagName("body")[0];
             var a = [];
             var re = new RegExp('\\b' + classname + '\\b');
             var els = node.getElementsByTagName("*");
             for (var i = 0, j = els.length; i < j; i++) {
                 if (re.test(els[i].className)) {
                     a.push(els[i]);
                 }
             }
             return a;
         }
     </script>
     <script>
         $('#myTab a').click(function(e) {
             console.log("hello")
             e.preventDefault();
             $(this).tab('active');
             console.log($(this).tab('active'))
         });
         // store the currently selected tab in the hash value
         $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
             var id = $(e.target).attr("href").substr(1);
             window.location.hash = id;
         });
         // on load of the page: switch to the currently selected tab
         var hash = window.location.hash;
         $('#myTab a[href="' + hash + '"]').tab('active');
     </script>
     {{-- //add Defaults --}}
     <script>
         var pTable;

         function addCityBtn_Click() {
             var htmlData = "";

             htmlData = `<form>
            <div class="form-group row">
                <label for="dftCity" class="col-sm-4 col-form-label">Defaults for City</label>
                <div class="col-sm-8">
                    <select name='dftCity' id='dftCity' class='form-control'></select>
                    <input type='hidden' name='courseCityId' id='courseCityId'/>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="dftTrainer" class="col-sm-4 col-form-label">Default Trainer</label>
                <div class="col-sm-8">
                    <select name='dftTrainer' id='dftTrainer' class='form-control'></select>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="dftAssessor" class="col-sm-4 col-form-label">Default Assessor</label>
                <div class="col-sm-8">
                    <select name='dftAssessor' id='dftAssessor' class='form-control'></select>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-4 col-form-label">Session Start Time</label>
                <div class="col-sm-8">
                    <select name='dftstarthour' id='dftstarthour' class='form-control' style='width:30%;display:inline'></select><span style=''> : </span><select name='dftstartmin' id='dftstartmin' class='form-control' style='width:30%;display:inline'></select> <select style='width:32%;display:inline' id='dftstartampm' class='form-control' name='dftstartampm'><option value='am'>am</option><option value='pm'>pm</option></select>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-4 col-form-label">Session End Time</label>
                <div class="col-sm-8">
                    <select name='dftendhour' id='dftendhour' class='form-control' style='width:30%;display:inline'></select><span style=''> : </span><select name='dftendmin' id='dftendmin' class='form-control' style='width:30%;display:inline'></select> 
                    <select style='width:32%;display:inline' id='dftendampm' class='form-control' name='dftendampm'><option value='am'>am</option><option value='pm'>pm</option></select>
                </div>
            </div>
            <div class="form-group row mt-3">
                <label for="" class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                    <button type='button' class='btn btn-primary' onclick='saveNewCourseCity();'>Save</button>
                       <button type='button' class='btn btn-secondary' onclick='cancelAddCity();'>Cancel</button>
                </div>
            </div>
            </form>`;

             jQuery("#dftstarthour").append(newOption);
             jQuery("#addCityPanel").html(htmlData);
             // City Start Add //
             jQuery.ajax({
                 url: "{{ route('api.city.list') }}",
                 type: 'GET',
                 dataType: 'json',
                 success: function(response) {
                     var options = '';
                     response.forEach(function(city) {

                         options += '<option value="' + city.id + '">' + city.city_name + '</option>';
                     });
                     console.log(response)
                     jQuery("#dftCity").append(options);
                 }
             });
             //City End Add  //
             //Teacher Start Add //
             jQuery.ajax({
                 url: "{{ route('api.teacher.list') }}",
                 type: 'GET',
                 dataType: 'json',
                 success: function(response) {
                     var options = '';
                     response.forEach(function(teacher) {
                         console.log(teacher)
                         options += '<option value="' + teacher.id + '">' + teacher.first_name + " " +
                             teacher.last_name + '</option>';
                     });

                     jQuery("#dftTrainer").append(options);
                     jQuery("#dftAssessor").append(options);
                 }
             });
             //Teacher End Add  //
             for (var i = 1; i <= 12; i++) {
                 var h = i;
                 if (i < 10) h = '0' + h;
                 var newOption = new Option(h, h);
                 var newOption1 = new Option(h, h);
                 jQuery("#dftstarthour").append(newOption);
                 jQuery("#dftendhour").append(newOption1);
                 if (arguments.length == 7) {
                     if (startTimeArray[0] == h)
                         newOption.selected = true;
                     if (endTimeArray[0] == h)
                         newOption1.selected = true;
                 }
             }

             for (var i = 0; i < 60; i = i + 5) {
                 var h = i;
                 if (i < 10) h = '0' + h;
                 var newOption = new Option(h, h);
                 var newOption1 = new Option(h, h);
                 jQuery("#dftstartmin").append(newOption);
                 jQuery("#dftendmin").append(newOption1);
                 if (arguments.length == 7) {
                     if (startTimeArray[1] == h)
                         newOption.selected = true;
                     if (endTimeArray[1] == h)
                         newOption1.selected = true;
                 }
             }

             if (startTimeArray[2] == "am") {
                 jQuery("#dftstartampm").val("am");
             } else {
                 jQuery("#dftstartampm").val("pm");
             }
             if (endTimeArray[2] == "am") {
                 jQuery("#dftendampm").val("am");
             } else {
                 jQuery("#dftendampm").val("pm");
             }
         }

         function cancelAddCity() {
             jQuery("#addCityPanel").html(
                 "<button type='button' class='btn btn-primary' name='addCityBtn' id='addCityBtn' onclick='addCityBtn_Click();'>Add More Defaults</button>"
             );
         }

         function saveNewCourseCity() {
             var message = "";
             if (jQuery("#dftCity").val() == "")
                 message += "* City Name\n";
             if (jQuery("#dftTrainer").val() == "")
                 message += "* Default Trainer\n";

             if (message != "") {
                 alert("Please fill in the following field(s):\n\n" + message);
                 return false;
             } else if (Date.parse('01/01/2011 ' + jQuery("#dftstarthour").val() + ':' + jQuery("#dftstartmin").val() + ' ' +
                     jQuery("#dftstartampm").val()) > Date.parse('01/01/2011 ' + jQuery("#dftendhour").val() + ':' + jQuery(
                     "#dftendmin").val() + ' ' + jQuery("#dftendampm").val())) {
                 alert("Session End Time should be not earlier than session Start Time.");
                 return false;

             } else if (Date.parse('01/01/2011 ' + jQuery("#dftstarthour").val() + ':' + jQuery("#dftstartmin").val() + ' ' +
                     jQuery("#dftstartampm").val()) - Date.parse('01/01/2011 ' + jQuery("#dftendhour").val() + ':' + jQuery(
                     "#dftendmin").val() + ' ' + jQuery("#dftendampm").val()) == 0) {
                 alert("Session End Time should be not earlier than session Start Time.");
                 return false;
             } else {
                 var dftCity = jQuery("#dftCity").val();
                 var dftTrainer = jQuery("#dftTrainer").val();
                 var dftAssessor = jQuery("#dftAssessor").val();
                 var dftstarttime = jQuery("#dftstarthour").val() + ":" + jQuery("#dftstartmin").val() + " " + jQuery(
                     "#dftstartampm").val();
                 var dftendtime = jQuery("#dftendhour").val() + ":" + jQuery("#dftendmin").val() + " " + jQuery(
                     "#dftendampm").val();

                 courseId = "{{ $course->id }}";
                 if (jQuery("#courseCityId").val() != "") {
                     var courseCityId = jQuery("#courseCityId").val();
                 } else {
                     var courseCityId = "";
                 }

                 jQuery.ajax({
                     url: "{{ route('saveCourseCity') }}",
                     type: 'POST',
                     data: {
                         "_token": "{{ csrf_token() }}",
                         'dftCity': dftCity,
                         'dftTrainer': dftTrainer,
                         'dftstarttime': dftstarttime,
                         'dftendtime': dftendtime,
                         'courseId': courseId,
                         'courseCityId': courseCityId,
                         'dftAssessor': dftAssessor
                     },
                     dataType: 'json',
                     success: function(response) {
                         if (response.response == "0") {
                             location.reload();
                         } else {
                             alert("Error while saving course defaults.");
                         }
                     }
                 });
             }
         }

         function getElementsByClassName(classname, node) {
             if (!node)
                 node = document.getElementsByTagName("body")[0];
             var a = [];
             var re = new RegExp('\\b' + classname + '\\b');
             var els = node.getElementsByTagName("*");
             for (var i = 0, j = els.length; i < j; i++) {
                 if (re.test(els[i].className)) {
                     a.push(els[i]);
                 }
             }
             return a;
         }


         jQuery('#addPaymentPlan').click(function() {
             jQuery('#addPaymentPlan').hide();
             jQuery('#addPlan').show();
         })

         jQuery('#cancelPlan').click(function() {
             jQuery('#addPaymentPlan').show();
             jQuery('#addPlan').hide();
         })

         pTable = jQuery("#thePlans").DataTable({
             "ajax": {
                 url: "../widgetFunctions/getPaymentPlans.php",
                 data: {
                     'courseId': 2565
                 },
                 type: "POST"
             },
             "columns": [{
                     "orderable": false,
                     "data": "0"
                 },
                 {
                     "orderable": false,
                     "data": "1"
                 },
                 {
                     "orderable": false,
                     "data": "2"
                 },
                 {
                     "orderable": false,
                     "data": "3",
                     className: "right"
                 },
             ],
             "language": {
                 "zeroRecords": "No plans to list"
             },
             "searching": false,
             "stateSave": true,
             "paging": false,
             "retrieve": true,
             "info": false
         });

         document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
             const dropZoneElement = inputElement.closest(".drop-zone");

             dropZoneElement.addEventListener("click", (e) => {
                 inputElement.click();
             });

             inputElement.addEventListener("change", (e) => {
                 if (inputElement.files.length) {
                     updateThumbnail(dropZoneElement, inputElement.files[0]);
                 }
             });

             dropZoneElement.addEventListener("dragover", (e) => {
                 e.preventDefault();
                 dropZoneElement.classList.add("drop-zone--over");
             });

             ["dragleave", "dragend"].forEach((type) => {
                 dropZoneElement.addEventListener(type, (e) => {
                     dropZoneElement.classList.remove("drop-zone--over");
                 });
             });

             dropZoneElement.addEventListener("drop", (e) => {
                 e.preventDefault();

                 if (e.dataTransfer.files.length) {
                     inputElement.files = e.dataTransfer.files;
                     updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                 }

                 dropZoneElement.classList.remove("drop-zone--over");
             });
         });

         /**
          * Updates the thumbnail on a drop zone element.
          *
          * @param {HTMLElement} dropZoneElement
          * @param {File} file
          */
         function updateThumbnail(dropZoneElement, file) {
             let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

             // First time - remove the prompt
             if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                 dropZoneElement.querySelector(".drop-zone__prompt").remove();
             }

             // First time - there is no thumbnail element, so lets create it
             if (!thumbnailElement) {
                 thumbnailElement = document.createElement("div");
                 thumbnailElement.classList.add("drop-zone__thumb");
                 dropZoneElement.appendChild(thumbnailElement);
             }

             thumbnailElement.dataset.label = file.name;

             // Show thumbnail for image files
             if (file.type.startsWith("image/")) {
                 const reader = new FileReader();

                 reader.readAsDataURL(file);
                 reader.onload = () => {
                     thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                 };
             } else {
                 thumbnailElement.style.backgroundImage = null;
             }
         }
     </script>
     <script>
         function documentclick(id) {
             // var image = jQuery("#dftCity").val();
             var fileInput = jQuery("#myFile")[0];
             console.log(fileInput);
             var formData = new FormData();

             formData.append("_token", "{{ csrf_token() }}");
             formData.append("myFile", fileInput.files[0]);

             jQuery.ajax({
                 url: "{{ route('submit.course.document') }}",
                 type: 'POST',
                 data: formData,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                 success: function(response) {
                     if (response.response == "0") {
                         location.reload();
                     } else {
                         alert("Error while saving course defaults.");
                     }
                 },
                 error: function(xhr, status, error) {
                     console.error(xhr.responseText);
                 }
             });
         }

         function uploadDocument() {
             var fileInput = jQuery("#infoPakFile")[0];
             var fileInput = jQuery("#documentName").val();
             console.log(fileInput);
             var formData = new FormData();
             formData.append("_token", "{{ csrf_token() }}");
             formData.append("myFile", fileInput.files[0]);
             formData.append("myFile", fileInput.files[0]);
             jQuery.ajax({
                 url: "{{ route('submit.course.document.email') }}",
                 type: 'POST',
                 data: formData,
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                 success: function(response) {
                     if (response.response == "0") {
                         location.reload();
                     } else {
                         alert("Error while saving course defaults.");
                     }
                 },
                 error: function(xhr, status, error) {
                     console.error(xhr.responseText);
                 }
             });
         }
     </script>
 @endsection
@stop
