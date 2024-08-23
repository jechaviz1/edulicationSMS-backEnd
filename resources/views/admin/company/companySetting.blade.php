@php
    use Carbon\Carbon;

@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <style>
        @media (min-width: 1200px) {
            .modal-xxl {
                --bs-modal-width: 1502px;
            }
        }
        .modal-backdrop{
            display: none;
        }
    </style>
    @if ($message = Session::get('success'))
        <div class="alert alert-primary alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i
                        class="fa-solid fa-xmark"></i></span>
            </button>
            <strong>Success!</strong> {{ $message }}
        </div>
    @endif
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title"> Company Settings </h4>
            </div>
            <div class="card-block p-3">
                {{-- ///////////////////////////////////////////////////////////////////////// --}}
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-course-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-course" type="button" role="tab" aria-controls="pills-course"
                            aria-selected="true">Courses</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-student-record-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-student-record" type="button" role="tab"
                            aria-controls="pills-student-record" aria-selected="false">Student Records</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-reporting-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-reporting" type="button" role="tab" aria-controls="pills-reporting"
                            aria-selected="false">Reporting</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-integrations-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-integrations" type="button" role="tab"
                            aria-controls="pills-integrations" aria-selected="false">Integrations</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-company-details-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-company-details" type="button" role="tab"
                            aria-controls="pills-company-details" aria-selected="false">Company Details </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-others-tab" data-bs-toggle="pill" data-bs-target="#pills-others"
                            type="button" role="tab" aria-controls="pills-others" aria-selected="false">Others</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-course" role="tabpanel"
                        aria-labelledby="pills-course-tab">
                        <form action="{{ route('company.setting.course.store') }}" method="post">
                            @csrf()
                            @method('POST')
                            <div class="row">
                                <div class="col-lg-12 my-4 fw-bolder">Delivery Method(s) Settings<i
                                        class="fa fa-info-circle ml-2"
                                        title="Create delivery method(s) below. You can select from the below delivery method(s) when scheduling a new course."></i>
                                </div>
                                <p>You may use these setting to determine one or more types of course structures that you
                                    offer. For
                                    example, you may conduct “self-paced” online training, or perhaps specific types of
                                    private or
                                    public
                                    types of events.
                                    This is not the place to set the Courses you Run, such as “first aid training” or
                                    “TAE90110”. Nor do
                                    you
                                    need to define the various underlying units of competency. Those things are handled in a
                                    separate
                                    area
                                    of Weworkbook.
                                    Here you select the different types of courses that you have (the tick boxes), and the
                                    shortened
                                    name
                                    versions of those types of courses. You will see these settings when scheduling a new
                                    course, or
                                    viewing
                                    certain screens and reports in Weworkbook.
                                </p>
                                <div class="row mb-2 ">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-2">Rename</div>
                                    <div class="col-lg-1">Initials</div>
                                    <div class="col-lg-1">Single Session</div>
                                    <div class="col-lg-2">Multiple Session</div>
                                </div>
                                {{-- @foreach ($course_delivery_method as $method )
                                    @dd($method)
                                @endforeach --}}
                                <div class="row mb-2 align-items-center">
                                    <div class="col-lg-2">
                                        <input type="hidden" value="1" name="delivery_method[id][]">
                                        <input type="checkbox" id="sel" class="CourseTypeSettings" checked=""  disabled=""> Self Paced</div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control CourseTypeSettings" name="delivery_method[rename][]" id="sel_rename" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "1") {{ $method->rename }} @else  @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control CourseTypeSettings" name="delivery_method[init][]" name="sel_init" id="sel_init" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "1") @if($method->init != null) {{ $method->init }} @else SP @endif @endif @endforeach">
                                    </div>
                                    <input type="hidden" value="1" name="delivery_method[single][]">
                                    <input type="hidden" value="1" name="delivery_method[multiple][]">
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub" value="2" class="CourseTypeSettings" name="delivery_method[id][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "2") checked @else  @endif @endforeach> Public Sessions</div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_rename" maxlength="20" name="delivery_method[rename][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "2") {{ $method->rename }} @else  @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control CourseTypeSettings" value="{{$course_setting['pub_init']}}" id="pub_init" name="delivery_method[init][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "2") @if($method->init != null) {{ $method->init }} @else PRI @endif @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1"><input type="checkbox" value="1" id="pub_single" name="delivery_method[single][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "2") @if($method->single != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub_multiple" value="1" name="delivery_method[multiple][]" class="CourseTypeSettings" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "2") @if($method->multiple != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub" value="3" class="CourseTypeSettings" name="delivery_method[id][]"  @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "3") checked @else  @endif @endforeach>  Private Sessions
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_rename"  maxlength="20" name="delivery_method[rename][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "3") {{ $method->rename }} @else  @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_init" name="delivery_method[init][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "3") @if($method->init != null) {{ $method->init }} @else PUB @endif @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1"><input type="checkbox" value="1" id="pub_single" name="delivery_method[single][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "3") @if($method->single != "1") checked @else @endif @endif @endforeach> 
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub_multiple" value="1" name="delivery_method[multiple][]" class="CourseTypeSettings" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "3") @if($method->multiple != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub" value="4" class="CourseTypeSettings" name="delivery_method[id][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "4") checked @else  @endif @endforeach>   Public Sessions 2
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_rename" value="Private Sessions" maxlength="20" name="delivery_method[rename][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "4") {{ $method->rename }} @else  @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_init" name="delivery_method[init][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "4") @if($method->init != null) {{ $method->init }} @else PUB @endif @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1"><input type="checkbox" value="1" id="pub_single" name="delivery_method[single][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "4") @if($method->single != "1") checked @else @endif @endif @endforeach> 
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub_multiple" value="1" name="delivery_method[multiple][]" class="CourseTypeSettings" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "4") @if($method->multiple != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub" value="5" class="CourseTypeSettings" name="delivery_method[id][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "5") checked @else  @endif @endforeach>   Public Sessions 3
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_rename" value="Private Sessions" maxlength="20" name="delivery_method[rename][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "5") {{ $method->rename }} @else  @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_init" name="delivery_method[init][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "5") @if($method->init != null) {{ $method->init }} @else PUB @endif @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1"><input type="checkbox" value="1" id="pub_single" name="delivery_method[single][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "5") @if($method->single != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub_multiple" value="1" name="delivery_method[multiple][]" class="CourseTypeSettings" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "5") @if($method->multiple != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub" value="6" class="CourseTypeSettings" name="delivery_method[id][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "6") checked @else  @endif @endforeach>   Public Sessions 4
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_rename" value="Private Sessions" maxlength="20" name="delivery_method[rename][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "6") {{ $method->rename }} @else  @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_init" name="delivery_method[init][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "6") @if($method->init != null) {{ $method->init }} @else PUB @endif @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1"><input type="checkbox" value="1" id="pub_single" name="delivery_method[single][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "6") @if($method->single != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub_multiple" value="1" name="delivery_method[multiple][]" class="CourseTypeSettings" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "6") @if($method->multiple != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub" value="7" class="CourseTypeSettings" name="delivery_method[id][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "7") checked @else  @endif @endforeach> Public Sessions 5
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_rename" value="Private Sessions" maxlength="20" name="delivery_method[rename][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "7") {{ $method->rename }} @else  @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_init" name="delivery_method[init][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "7") @if($method->init != null) {{ $method->init }} @else PUB @endif @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1"><input type="checkbox" value="1" id="pub_single" name="delivery_method[single][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "7") @if($method->single != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub_multiple" value="1" name="delivery_method[multiple][]" class="CourseTypeSettings" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "7") @if($method->multiple != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                </div>
                                <div class="row mb-2 align-items-center">
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub" value="8" class="CourseTypeSettings" name="delivery_method[id][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "8") checked @else  @endif @endforeach>  Public Sessions 6
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_rename" value="Private Sessions" maxlength="20" name="delivery_method[rename][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "8") {{ $method->rename }} @else  @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1">
                                        <input type="text" class="form-control CourseTypeSettings" id="pub_init" name="delivery_method[init][]" value="@foreach($course_delivery_method as $method) @if($method->delivery_method_id == "8") @if($method->init != null) {{ $method->init }} @else PUB @endif @endif @endforeach">
                                    </div>
                                    <div class="col-lg-1"><input type="checkbox" value="1" id="pub_single" name="delivery_method[single][]" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "8") @if($method->single != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="checkbox" id="pub_multiple" value="1" name="delivery_method[multiple][]" class="CourseTypeSettings" @foreach($course_delivery_method as $method) @if($method->delivery_method_id == "8") @if($method->multiple != "1") checked @else @endif @endif @endforeach>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 my-4 fw-bolder">Course Booking Settings
                                        <i class="fa fa-info-circle ml-2"
                                            title="Create delivery method(s) below. You can select from the below delivery method(s) when scheduling a new course."></i>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" id="trainers_book" name="trainers_book"> Allow trainers to be double booked
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" id="rooms_book" name="rooms_book"> Allow room to be double booked
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" id="trainers_competency" name="trainers_competency">
                                            Enforce trainer competencies when assigning trainers to a course. This will
                                            limit the trainers you see when scheduling a new course, based on the Trainer
                                            Competencies that are stored in Weworbook.
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-4 fw-bolder">Courses Page Default View</div>
                                    <div class="col-lg-3">
                                        <select name="eventStatusDefault" id="eventStatusDefault"
                                            class="form-control mt-3 col-2" fdprocessedid="dq4ppi">
                                            <option value="All" @if($course_setting['eventStatusDefault'] == 'All') selected @endif>Show All Courses</option>
                                            <option value="Open" @if($course_setting['eventStatusDefault'] == 'Open') selected @endif>Show Open Courses</option>
                                            <option value="Closed" @if($course_setting['eventStatusDefault'] == 'Closed') selected @endif>Show Closed Courses</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 my-4 fw-bolder">Course Archive Notification</div>
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="radio" id="emailSettingsOption_No" name="emailSettingsOption" 
                                                value="No"  @if($course_setting['emailSettingsOption'] == 'No') checked @endif
                                                onclick="document.getElementById('showEmailSettings').style.display = 'none'">
                                            No, do not email my company email address when a course schedule is archived
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="emailSettingsOption_Yes" name="emailSettingsOption"
                                                value="Yes" @if($course_setting['emailSettingsOption'] == 'Yes') checked @endif
                                                onclick="document.getElementById('showEmailSettings').style.display = 'block'">
                                            Yes, email my company email address when a course schedule is archived
                                        </div>
                                        <div id="showEmailSettings" style="display:none;">
                                            Enter email address: <input type="text" id="emailAddress" name="emailAddress"
                                                name="emailAddress" value="{{ $course_setting['emailAddress']}}" style="width:200px;" maxlength="50">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-4 font-weight-bold">Attendance List</div>
                                    <div class="col-lg-12">
                                        <label for="">Confirm all students as attended when session dates
                                            lapse?</label>
                                        <div class="form-check">
                                            <input type="radio" id="attendanceList_Yes" name="setattendanceListOption"  @if($course_setting['setattendanceListOption'] == '1') checked @endif
                                                value="1"> Yes, mark student as attended automatically
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="attendanceList_No" name="setattendanceListOption"  @if($course_setting['setattendanceListOption'] == '0') checked @endif
                                                value="0" checked=""> No, my company will manage attendance by
                                            ourselves
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-4 font-weight-bold">Show InfoPak details?</div>
                                    <div class="col-lg-12">
                                        Ability to set InfoPak at 'Admin-&gt;Courses we Run' page and automatically send it
                                        to student upon receiving enquiry mails.<br><br>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="radio" id="showInfoPakChk_No" name="showInfoPakChk"   @if($course_setting['showInfoPakChk'] == '0') checked @endif
                                                value="0"> No
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="showInfoPakChk_Yes" name="showInfoPakChk"   @if($course_setting['showInfoPakChk'] == '1') checked @endif
                                                value="1" checked=""> Yes
                                        </div>
                                    </div>
                                    <div class="col-lg-12 my-4">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-student-record" role="tabpanel" aria-labelledby="pills-student-record-tab">
                       <form action="{{ route('company.settings.student.store') }}" method="post"> 
                        @csrf()
                        @method('post')
                        <div class="col-lg-12 my-4 font-weight-bold">Custom field settings<i class="fa fa-info-circle ml-2"
                                title="Fields enables here will display on all student pages in your profile. This will allow you to capture information which may be unique to your training organisation."></i>
                        </div>
                        <div class="col-lg-12">Fields enabled here will display on all student pages in your profile. This
                            will allow you to capture information which may be unique to your training organisation.<br><br>
                        </div>
                       
                        <div class="col-lg-6 mt-2">
                                <input type="checkbox" id="cfield1">
                                <input type="text" class="form-control ms-4" id="custom_field1" value="{{$student_setting['custom_field1']}}" name="custom_field1"
                                    maxlength="20">
                        </div>
                        <div class="col-lg-6 mt-2">
                                <input type="checkbox" id="cfield2">
                                <input type="text" class="form-control ms-4" id="custom_field2" value="{{$student_setting['custom_field2']}}" name="custom_field2"
                                    maxlength="20">
                        </div>
                        <div class="col-lg-6 mt-2">
                                <input type="checkbox" id="cfield3">
                                <input type="text" class="form-control ms-4" id="custom_field3" value="{{$student_setting['custom_field3']}}" name="custom_field3"
                                    maxlength="20">
                        </div>
                        <div class="col-lg-6 mt-2">
                                <input type="checkbox" id="cfield4">
                                <input type="text" class="form-control ms-4" id="custom_field4" value="{{$student_setting['custom_field4']}}" name="custom_field4"
                                    maxlength="20">
                        </div>
                        <div class="col-lg-6 mt-2">
                                <input type="checkbox" id="cfield5">
                                <input type="text" class="form-control ms-4" id="custom_field5" value="{{$student_setting['custom_field5']}}" name="custom_field5"
                                    maxlength="20">
                        </div>
                        <div class="col-lg-6 mt-2">
                            
                                <input type="checkbox" id="cfield6">
                                <input type="text" class="form-control ms-4" id="custom_field6" value="{{$student_setting['custom_field6']}}" name="custom_field6"
                                    maxlength="20">
                         
                        </div>
                        <div class="col-lg-6 my-4 fw-bold">National ID Settings<i class="fa fa-info-circle ml-2"
                                title="It is recommended you use the Weworkbook unique ID unless we have migrated data from another provider."></i>
                        </div>
                        <div class="col-lg-12">
                            It is recommended you use the Weworkbook unique ID unless we have migrated data from another
                            provider.<br><br>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check">
                                <input type="radio" id="option1" name="NationalID" value="0" @if($student_setting['NationalID'] == "0")  checked  @endif
                                    onclick="document.getElementById('leading').style.display = 'none'"> Using Weworkbook
                                unique ID
                            </div>
                            <div class="form-check">
                                <input type="radio" id="option2" name="NationalID" value="1" @if($student_setting['NationalID'] == "1")  checked  @endif
                                    onclick="document.getElementById('leading').style.display = 'block'"> Use my own
                                National Id
                            </div>
                            <!-- hidden table -->
                            <div id="leading" style="display:none;">
                                <table cellpadding="0" cellspacing="3" class="table">
                                    <tbody>
                                        <tr>
                                        <td colspan="3" style="padding-right:5px;"><strong>National ID</strong> -
                                                [leadingText][number][trailingText]</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-right:5px;">Number: </td>
                                            <td colspan="2"><input type="text" name="number" id="number"
                                                    value="{{$student_setting['number']}}"> (if set the National Id will start here and increase by
                                                one for each student)</td>
                                        </tr>
                                        <tr>
                                            <td>Leading Text: </td>
                                            <td colspan="2"><input type="text" name="leadingtext" id="leadingtext"
                                                value="{{$student_setting['leadingtext']}}"></td>
                                        </tr>
                                        <tr>
                                            <td>Trailing Text: </td>
                                            <td colspan="2"><input type="text" name="trailingtext"
                                                    id="trailingtext"value="{{$student_setting['trailingtext']}}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 my-4 fw-bold">Is Date of Birth a Mandatory Field For Student Records?
                            </div>
                            <div class="col-lg-12">
                                Should the date of birth be set as a mandatory field, you will not be able to create a new
                                person in Weworkbook unless the date has been captured. It is not recommended if you use
                                Weworkbook for managing new learner enquiries.<br><br>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="radio" id="setDOBSettings_No" name="DOBSettingsOption" value="0"  @if($student_setting['DOBSettingsOption'] == "0")  checked  @endif
                                     > No (Default)
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="setDOBSettings_Yes" name="DOBSettingsOption"  @if($student_setting['DOBSettingsOption'] == "1")  checked  @endif
                                        value="1"> Yes
                                </div>
                            </div>
                            <div class="col-lg-12 my-4 fw-bold">Send confirmation email to learners automatically
                                and immediately after a new enrolment?
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check">
                                <input type="radio" id="sendConfirmationEmail_Yes" name="sendConfirmationEmailOption" @if(isset($student_setting['sendConfirmationEmail_No']) == "1")  checked  @endif
                                    value="1"> Yes
                            </div>
                            <div class="form-check">
                                <input type="radio" id="sendConfirmationEmail_No" name="sendConfirmationEmailOption" @if(isset($student_setting['sendConfirmationEmail_No']) == "0")  checked  @endif
                                    value="0" checked=""> No
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <br>
                                <span>
                                    <b title="">Note categories</b>
                                </span>
                                <span>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <i title="Add Note Category" class="fa fa-plus-square fa-lg"
                                        aria-hidden="true"></i>
                                      </button>
                                </span>
                                <!-- Modal -->
                              
                            </div>
                        </div>
                        <div class="col-lg-12">
                            Create note categories below to organise student, enrolment and enquiry notes saved through the
                            system. Common note categories include ‘phone call’, ‘Student interaction’, ‘job complete’
                            etc.<br><br>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check col-md-4">
                                <table id="dataTablesCategoriesList" class="display" cellpadding="1" width="100%;">
                                    <tbody>
                                        @foreach ($note as $n)
                                        <tr>
                                            <td style="font-size:0.8125rem;">{{ $n->name }}</td>
                                            <td><i title="Edit Note Category" class="fa fa-pencil fa-lg m-2 text-info"
                                                    onclick="editCategory({{$n->id}},'{{ $n->name}}')"></i>
                                                    <a href="{{ route('company.setting.student.delete',$n->id)}}">
                                                        <i
                                                        title="Delete Note Category" class="fa fa-trash fa-lg text-danger"
                                                        ></i>
                                                    </a>
                                                   </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-12 my-4 fw-bold">Enable Victorian Student Number</div>
                        <div class="col-lg-12">
                            <div class="form-check">
                                <input type="radio" id="enableVSN_Yes" name="enableVSN" value="1"   @if($student_setting['enableVSN'] == "0")  checked  @endif> Yes
                            </div>
                            <div class="form-check">
                                <input type="radio" id="enableVSN_No" name="enableVSN" value="0"  @if($student_setting['enableVSN'] == "0")  checked  @endif>
                                No
                            </div>
                        </div>
                        <div class="col-lg-12 my-4 fw-bold">When updating unit outcomes and dates, prompt the user to apply
                            the update to all units in that enrolment</div>
                        <div class="col-lg-12">
                            <div class="form-check">
                                <input type="radio" id="enableApplyAll_Yes" name="enableApplyAll" value="1" @if($student_setting['enableApplyAll'] == "0")  checked  @endif
                                    checked=""> Yes
                            </div>
                            <div class="form-check">
                                <input type="radio" id="enableApplyAll_No" name="enableApplyAll" value="0" @if($student_setting['enableApplyAll'] == "0")  checked  @endif> No 
                            </div>
                        </div>
                        <div class="col-lg-12 my-4 fw-bold">Allow a student to enrol more than once in a course</div>
                        <div class="col-lg-12">
                            <div class="form-check">
                                <input type="radio" id="allowMultipleEnrol_Yes" name="allowMultipleEnrol" @if($student_setting['allowMultipleEnrol'] == "0")  checked  @endif
                                    value="1"> Yes
                            </div>
                            <div class="form-check">
                                <input type="radio" id="allowMultipleEnrol_No" name="allowMultipleEnrol" @if($student_setting['allowMultipleEnrol'] == "0")  checked  @endif
                                    value="0" checked=""> No
                            </div>
                        </div>
                        <div class="col-lg-12 my-4">
                            <button class="btn btn-primary" type="submit"
                               >Save</button>
                        </div>
                    </form>
                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">New Note Cataegory</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('company.setting.student.store')}}" method="post">
                                @csrf()
                                @method('POST')
                                <input type="text" id="name" class="form-control" name="name" placeholder="Category Name"  required>
                                <button class="btn btn-primary mt-2" type="submit">Save</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    {{-- // edit note start// --}}
                    <!-- Modal -->
                        <div class="modal fade" id="staticBackdropnote" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Note Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="editCategoryForm" action="{{ route('company.setting.student.store')}}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" id="categoryId" name="id">
                                            <input type="text" id="categoryName" class="form-control" name="name" placeholder="Category Name" required>
                                            <button class="btn btn-primary mt-2" type="submit">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- // edit note emd// --}}
                    <div class="tab-pane fade" id="pills-reporting" role="tabpanel"
                        aria-labelledby="pills-reporting-tab">
                        <form action="" mwthod="">
                            @csrf()
                            @method('POST')
                            <div class="col-lg-12 my-4 fw-bold">Which date would you like to recognise student outcomes as
                                completed?</div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="radio" id="setOutcomeDateSettings_OutcomeDate"
                                        name="outcomeDateSettingsOption" value="0" checked=""> Use the unit
                                    competent date (recommended)
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="setOutcomeDateSettings_AnticipatedCourseCompletionDate"
                                        name="outcomeDateSettingsOption" value="1"> Use the course session completion
                                    date
                                </div>
                            </div>
                            <div class="col-lg-12 my-4 fw-bold">Student Possible Match Criteria<i
                                    class="fa fa-info-circle ml-2"
                                    title="Which criteria should Weworkbook use the flag possible duplicate student profile?"></i>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="radio" id="email" name="mergecond" value="email"> Surname and
                                    Email
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="dob" name="mergecond" value="dob"
                                        checked=""> Surname and DOB
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="mobile" name="mergecond" value="mobile"> Surname and
                                    Mobile
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="usi" name="mergecond" value="usi"> Surname and
                                    USI
                                </div>
                            </div>
                            <div class="col-lg-12 my-4 font-weight-bold">Certificate Number<i
                                    class="fa fa-info-circle ml-2"
                                    title="Would you like to all certificates to run off the same numbering system?"></i>
                            </div>
                            <div class="col-lg-12">
                                Would you like to all certificates to run off the same numbering system?<br><br>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="certificateNumbering_Company" name="setCertificateNumbering"
                                    value="1" checked=""> Yes, all my certificate run off the same numbering
                                system (set starting number here)
                            </div>
                            <div id="numbering">
                                <label for="">Starting Number</label>
                                <input type="text" class="form-control mb-2 w-25 d-block" name="startNumber"
                                    id="startNumber" value="1">
                            </div>
                            <div class="form-check">
                                <input type="radio" id="certificateNumbering_Template" name="setCertificateNumbering"
                                    value="0"> No, each of my certificates run off a different numbering system. (set
                                starting number against each certificate under ‘Console | Company Certificates’
                            </div>
                            <div>
                                <label for="">Maximum number of certificates required for an enrolment</label>
                                <input type="text" class="form-control mb-2 w-25 d-block" name="maxCertificates"
                                    id="maxCertificates" value="1">
                            </div>
                            <div class="col-lg-12 my-4 font-weight-bold">Does your training organisation require CRICOS
                                reporting?</div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="radio" id="cricosReporting_Yes" name="setcricosReportingOption"
                                        value="1"> Yes
                                </div>
                                <div class="form-check">
                                    <input type="radio" id="cricosReporting_No" name="setcricosReportingOption"
                                        value="0" checked=""> No
                                </div>
                                <div id="provider" style="display:block">
                                    <label for="">CRICOS Provider Number</label>
                                    <input type="text" class="form-control w-25 d-block mb-2" name="providerNumber"
                                        id="providerNumber" value="">
                                </div>
                            </div>
                            <div class="col-lg-12 my-4">
                                <button class="btn btn-primary" onclick="saveCourseType();">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-integrations" role="tabpanel" aria-labelledby="pills-integrations-tab">
                        <div id="tabs-t5" aria-labelledby="ui-id-16"
                            class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" aria-expanded="true"
                            aria-hidden="false" style="display: block;">
                            <div id="loading-se" style="display:none;">
                                <p><img src="../images/ajax-loader.gif"></p>
                            </div>
                            <div class="col-lg-12 my-4 fw-bold">Enable 2-way SMS?<i class="fa fa-info-circle ml-2"
                                    title="This allows students to reply to SMS that you send them."></i></div>
                            <div class="col-lg-12">This allows students to reply to SMS that you send them.<br><br></div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="radio" id="twoWaySMS_Yes" name="setTwoWaySMSOption" value="1"
                                        checked=""> Yes
                                </div> 
                                <div class="form-check">
                                    <input type="radio" id="twoWaySMS_No" name="setTwoWaySMSOption" value="0"> No
                                </div>
                            </div>

                            <div class="col-lg-12 my-4">
                                <button class="btn btn-primary" onclick="saveCourseType();">Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-company-details" role="tabpanel"
                        aria-labelledby="pills-company-details-tab">
                        <div class="row mt-3">
                            <div class="col-lg-3 font-weight-bold">Name</div>
                            <div class="col-lg-3">
                                
                                <input type="text" value=""
                                    name="companyName" id="companyName" onfocus="onfocusInput('companyName');"
                                    onblur="onblurInput('companyName')" class="input_text form-control" maxlength="100"
                                    style="width:280px;">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 font-weight-bold">Address</div>
                            <div class="col-lg-3">
                                <input type="text" value="16/55 Alice Street South" name="companyAddress"
                                    id="companyAddress" onfocus="onfocusInput('companyAddress');"
                                    onblur="onblurInput('companyAddress')" class="input_text form-control" maxlength="50"
                                    style="width:280px;">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 font-weight-bold">Address Line 2</div>
                            <div class="col-lg-3">
                                <input type="text" value="" name="companyAddressLine2" id="companyAddressLine2"
                                    onfocus="onfocusInput('companyAddressLine2');"
                                    onblur="onblurInput('companyAddressLine2')" class="input_text form-control"
                                    maxlength="50" style="width:280px;">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 font-weight-bold">Suburb</div>
                            <div class="col-lg-3">
                                <input type="text" value="Wiley Park" name="companyTown" id="companyTown"
                                    onfocus="onfocusInput('companyTown');" onblur="onblurInput('companyTown')"
                                    class="input_text form-control" maxlength="30" style="width:280px;">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-3 font-weight-bold">State</div>
                            <div class="col-lg-3">
                                <select name="companyStateSelect" id="companyStateSelect"
                                    class="input_text_register1 form-control" style="width:280px;">
                                    <option value="All">All</option>
                                    <option value="New South Wales" selected="">New South Wales</option>
                                    <option value="Victoria">Victoria</option>
                                    <option value="Queensland">Queensland</option>
                                    <option value="South Australia">South Australia</option>
                                    <option value="Western Australia">Western Australia</option>
                                    <option value="Tasmania">Tasmania</option>
                                    <option value="Northern Territory">Northern Territory</option>
                                    <option value="Australian Capital Territory">Australian Capital Territory</option>
                                    <option value="Other Australian Territories or Dependencies">Other Australian
                                        Territories or Dependencies</option>
                                    <option value="Fee for Service">Fee for Service</option>
                                </select>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Postcode</div>
                                <div class="col-lg-3">
                                    <input type="text" value="2195" name="postcode" id="postcode"
                                        onfocus="onfocusInput('postcode');" onblur="onblurInput('postcode')"
                                        class="input_text form-control" maxlength="10" style="width:280px;">
                                    <!--onkeyup="onKeyUpInput('postcode')" -->
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Phone</div>
                                <div class="col-lg-3">
                                    <input type="text" value="+61410611173" name="companyPhone" id="companyPhone"
                                        onfocus="onfocusInput('companyPhone');" onblur="onblurInput('companyPhone')"
                                        class="input_text form-control" maxlength="20" style="width:280px;">
                                    <!--onkeyup="onKeyUpInput('companyPhone')" -->
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Email</div>
                                <div class="col-lg-3">
                                    <input type="text" value="aift.edu@gmail.com" name="companyEmail"
                                        id="companyEmail" onfocus="onfocusInput('companyEmail');"
                                        onblur="onblurInput('companyEmail')" class="input_text form-control"
                                        style="width:280px;">
                                    <!--onkeyup="onKeyUpInput('companyPhone')" -->
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Facsimile</div>
                                <div class="col-lg-3">
                                    <input type="text" value="" name="companyFax" id="companyFax"
                                        onfocus="onfocusInput('companyFax');" onblur="onblurInput('companyFax')"
                                        class="input_text form-control" maxlength="20" style="width:280px;">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Provider Number</div>
                                <div class="col-lg-3">
                                    <input type="text" value="" name="provider" id="provider"
                                        onfocus="onfocusInput('provider');" onblur="onblurInput('provider')"
                                        class="input_text form-control" maxlength="20" style="width:280px;">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Website</div>
                                <div class="col-lg-3">
                                    <input type="text" value="http://www.aift.edu.au" name="website" id="website"
                                        onfocus="onfocusInput('website');" onblur="onblurInput('website')"
                                        class="input_text form-control" maxlength="50" style="width:280px;"><br>
                                    <input type="hidden" name="requireAVETMISS" id="requireAVETMISS" value="1">
                                    <input type="hidden" name="country" id="country" value="Australia">

                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Workspace ABN</div>
                                <div class="col-lg-3">
                                    <input class="form-control" type="text" name="wabn" id="wabn"
                                        value="91615420338" maxlength="11" style="width:280px;color:rgb(153, 153, 153)">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Organisation Code</div>
                                <div class="col-lg-3">
                                    <input type="text" name="orgCode" id="orgCode" value="45665" maxlength="11"
                                        style="width:280px;color:rgb(153, 153, 153)" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">SSID</div>
                                <div class="col-lg-3">0000003799 </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">Default Font</div>
                                <div class="col-lg-3">
                                    <select class="form-control" name="defaultfont" id="defaultfont"
                                        style="width:280px;">
                                        <option value="Default" selected="">Default</option>
                                        <option value="Arial">Arial</option>
                                        <option value="Courier">Courier</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Tahoma">Tahoma</option>
                                        <option value="Times New Roman">Times New Roman</option>
                                        <option value="Verdana">Verdana</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3 font-weight-bold">
                                    <button type="button" class="btn btn-primary" onclick="submitClick();">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-others" role="tabpanel" aria-labelledby="pills-others-tab">

                        <form name="frm_uplod_logo" id="form_uplod_logo" method="POST" enctype="multipart/form-data" action="{{ route('people.profile.photo.update') }}">
                            @csrf
                            @method('POST')
                            <div id="upload_process" style="display: none; text-align: center; height: 100px;">
                                <br><br><img src="../home/images/ajax-loader.gif" border="0">&nbsp;uploading...
                            </div>
                            <div style="text-align: left; margin: auto; display: block;" id="upload_frm">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr style="height:30px;">
                                            <td valign="top" width="120">Upload Logo</td>
                                            <td width="300" valign="bottom">
                                                <input type="file" id="logoImg" name="logoImg" size="45"
                                                    style="width:300px;">
                                                <input type="hidden" name="companyId" value="{{ Auth::user()->id }}">
                                                <p style="font-size:10px">(Image Dimensions: 158 x 50 px; Image Format: jpg
                                                    |
                                                    gif | png)</p>
                                            </td>
                                            <td align="center" valign="top" width="150">

                                                <button type="submit" class="btn btn-primary"
                                                    fdprocessedid="wsnmje">Upload
                                                </button>
                                            </td>
                                        </tr>
                                </table>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-12">
                                @if(Auth::user()->profile_image != null)
                                <img class="img-avatar" style="max-width:158px;max-height:150px;" src="{{ asset(Auth::user()->profile_image_path) }}">
                                <form action="{{ route('people.profile.photo.delete',Auth::user()->id)}}">
                                   <button class="btn">
                                    <i title="Delete Logo" class="fa fa-trash fa-lg text-danger"></i>
                                </button> 
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /////////////////////////////////////////////////////////////// --}}
            </div>
        </div>
    </div>
    <script>
        function editCategory(id,name) {
            console.log(id,name)
            // Set the form action to the specific category's update route
            // You may need to modify this based on your actual update route
            var form = document.getElementById('editCategoryForm');
            form.action = "{{ route('company.note.category.student.store') }}/";
            
            // Set the hidden input value and the text input value
            document.getElementById('categoryId').value = id;
            document.getElementById('categoryName').value = name;
            
            // Show the modal
            var modal = new bootstrap.Modal(document.getElementById('staticBackdropnote'), {
                keyboard: false
            });
            modal.show();
        }
    </script>
        @stop
@push('scripts')

@endpush
