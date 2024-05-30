<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <style>
        @media (min-width: 1200px) {
            .modal-xxl {
                --bs-modal-width: 1502px;
            }
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
                <div class="row">
                    <div class="col-sm-4 d-flex align-items-center justify-content-center">
                        <div>
                            <h4 class="card-title">People List</h4>
                        </div>
                    </div>
                    <div class="col-sm-8 d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#selectColumn"> Select Columns </button>
                        {{-- <button type="button" class="btn btn-primary">Select Columns</button> --}}
                        <button type="button" class="btn btn-primary ms-3">Bulk Email</button>
                        <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#sms_bulk">
                            Bulk SMS
                          </button>
                        <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal" data-bs-target="#add_student">
                            Add Person
                        </button>
                    </div>
                </div>
                {{-- @dd($courseCategory) --}}
                <div class="card-block">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /tab-content -->
            <div class="tab-content " id="myTabContent-3">
                <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table id="example4" class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Preferred Contact</th>
                                        <th>Email(s)</th>
                                        <th>Country - Postal</th>
                                        <th>Country of Birth?</th>
                                        <th>Date of Birth</th>
                                        <th>Do you mainly speak English at home?</th>
                                        <th>Email 1</th>
                                        <th>Email 2</th>
                                        <th>Email 3</th>
                                        <th>Actions</th>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($rows))
                                    @foreach ($rows as $k=> $row)
                                    <tr>
                                        <td>
                                            <a href="{{ route('people.profile',$row->id)}}">{{$row->firstName}} {{ $row->lastName }}</a>
                                        </td>
                                        <td>
                                         {{ $row->preferred_contact }}                                           
                                        </td>
                                        <td>{{$row->studentEmail}}</td>
                                        <td>
                                            {{ $row->country_postal }}
                                        </td>
                                        <td>{{$row->birthCountry}}</td>
                                        <td>{{$row->dob }}</td>
                                        <td>
                                            {{ $row->isMainEnglish}}
                                         </td>
                                        <td>
                                            {{ $row->studentEmail1}}
                                        </td>
                                        <td>
                                            {{ $row->studentEmail2}}
                                        </td>
                                        <td>
                                            {{ $row->studentEmail3}}
                                        </td>
                                        
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('edit-course',$row->id) }}" class="btn btn-primary light shadow btn-xs sharp me-1"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('people.delete',$row->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                @if($row->status == '1')
                                                  <a href="{{ route('change-course-status',[$row->id,$row->status=0]) }}" onclick="return confirm('Are you sure you want to deactive this course?')" class=""><i title="Deactivate Course" class="fa fa-toggle-on fa-2x text-success" aria-hidden="true"></i></a>
                                                @else
                                                 <a href="{{ route('change-course-status',[$row->id,$row->status=1]) }}" onclick="return confirm('Are you sure you want to active this course?')" class=""><i title="Activate Course" class="fa fa-toggle-off fa-2x text-success" aria-hidden="true"></i></a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
    
                                    @endforeach
                                    @endif
    
                                </tbody>
                            </table>
                            {{-- {!! $rows->render() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /tab-content -->
        </div>
    </div>
    </div>
    </div>
        {{-- Modal select column start --}}
            <!-- Modal -->
            <div class="modal fade" id="selectColumn" tabindex="-1" aria-labelledby="selectColumnLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content" style="height: 500px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Select Columns</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tbody>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="buildingName" id="buildingName" checked=""><label
                                                    for="buildingName">&nbsp;&nbsp;Building / Property Name</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="buildingName_postal" id="buildingName_postal"><label
                                                    for="buildingName_postal">&nbsp;&nbsp;Building / Property Name -
                                                    Postal</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="businessNumber" id="businessNumber"><label
                                                    for="businessNumber">&nbsp;&nbsp;Business Phone</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="certificateName" id="certificateName"
                                                    checked=""><label for="certificateName">&nbsp;&nbsp;Certificate
                                                    Name</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="companyName" id="companyName" checked=""><label
                                                    for="companyName">&nbsp;&nbsp;Company</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="priorEdAchievement" id="priorEdAchievement"
                                                    checked=""><label for="priorEdAchievement">&nbsp;&nbsp;Completed any of
                                                    the following qualifications?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="contactNumber" id="contactNumber"
                                                    checked=""><label for="contactNumber">&nbsp;&nbsp;Contact
                                                    Number</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="colStatusSurveyResponse"
                                                    id="colStatusSurveyResponse"><label
                                                    for="colStatusSurveyResponse">&nbsp;&nbsp;Count of surveys responded in
                                                    Status</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="colStatusSurvey" id="colStatusSurvey"><label
                                                    for="colStatusSurvey">&nbsp;&nbsp;Count of surveys sent in
                                                    Status</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="country" id="country"><label
                                                    for="country">&nbsp;&nbsp;Country</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="country_postal" id="country_postal"><label
                                                    for="country_postal">&nbsp;&nbsp;Country - Postal</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="birthCountry" id="birthCountry"><label
                                                    for="birthCountry">&nbsp;&nbsp;Country of Birth?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="dob" id="dob"><label
                                                    for="dob">&nbsp;&nbsp;Date of Birth</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="isMainEnglish" id="isMainEnglish"><label
                                                    for="isMainEnglish">&nbsp;&nbsp;Do you mainly speak English at
                                                    home?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="studentEmail" id="studentEmail" checked=""><label
                                                    for="studentEmail">&nbsp;&nbsp;Email 1</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="studentEmail2" id="studentEmail2"><label
                                                    for="studentEmail2">&nbsp;&nbsp;Email 2</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="studentEmail3" id="studentEmail3"><label
                                                    for="studentEmail3">&nbsp;&nbsp;Email 3</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="employeeNumber" id="employeeNumber"><label
                                                    for="employeeNumber">&nbsp;&nbsp;Employee Number</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="Employer_Info_Consent"
                                                    id="Employer_Info_Consent"><label
                                                    for="Employer_Info_Consent">&nbsp;&nbsp;Employer Update
                                                    Consent</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="labourStatus" id="labourStatus"><label
                                                    for="labourStatus">&nbsp;&nbsp;Employment</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="entryDate" id="entryDate"><label
                                                    for="entryDate">&nbsp;&nbsp;Entry Date</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="facsimileNumber" id="facsimileNumber"><label
                                                    for="facsimileNumber">&nbsp;&nbsp;Fax</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="firstName" id="firstName"><label
                                                    for="firstName">&nbsp;&nbsp;First Name</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="unitDetails" id="unitDetails"><label
                                                    for="unitDetails">&nbsp;&nbsp;Flat / Unit Details</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="unitDetails_postal" id="unitDetails_postal"><label
                                                    for="unitDetails_postal">&nbsp;&nbsp;Flat / Unit Details -
                                                    Postal</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="gender" id="gender"><label
                                                    for="gender">&nbsp;&nbsp;Gender</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="isDisabled" id="isDisabled"><label
                                                    for="isDisabled">&nbsp;&nbsp;Has a disability, impairment or long-term
                                                    condition?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="highestLevelCompleted"
                                                    id="highestLevelCompleted"><label
                                                    for="highestLevelCompleted">&nbsp;&nbsp;Highest school level
                                                    completed?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="homeNumber" id="homeNumber"><label
                                                    for="homeNumber">&nbsp;&nbsp;Home Phone</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="indigenousStatus" id="indigenousStatus"><label
                                                    for="indigenousStatus">&nbsp;&nbsp;Indigenous Status</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="isContact" id="isContact"><label
                                                    for="isContact">&nbsp;&nbsp;Is Contact?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="isLearner" id="isLearner"><label
                                                    for="isLearner">&nbsp;&nbsp;Is Learner?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="lastName" id="lastName"><label
                                                    for="lastName">&nbsp;&nbsp;Last Name</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="middleName" id="middleName"><label
                                                    for="middleName">&nbsp;&nbsp;Middle Name</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="RTOStudentId" id="RTOStudentId"><label
                                                    for="RTOStudentId">&nbsp;&nbsp;National ID</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="isInternational" id="isInternational"><label
                                                    for="isInternational">&nbsp;&nbsp;Overseas Client?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="postCode" id="postCode"><label
                                                    for="postCode">&nbsp;&nbsp;Post Code</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="postalCode_postal" id="postalCode_postal"><label
                                                    for="postalCode_postal">&nbsp;&nbsp;Post Code - Postal</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="deliveryBox_postal" id="deliveryBox_postal"><label
                                                    for="deliveryBox_postal">&nbsp;&nbsp;Postal Delivery Box -
                                                    Postal</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="preferredName" id="preferredName"><label
                                                    for="preferredName">&nbsp;&nbsp;Preferred Name</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="role" id="role"><label
                                                    for="role">&nbsp;&nbsp;Role</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="state" id="state"><label
                                                    for="state">&nbsp;&nbsp;State</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="state_postal" id="state_postal"><label
                                                    for="state_postal">&nbsp;&nbsp;State - Postal</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="colStatus" id="colStatus"><label
                                                    for="colStatus">&nbsp;&nbsp;Status</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="stillAtSchool" id="stillAtSchool"><label
                                                    for="stillAtSchool">&nbsp;&nbsp;Still at school?</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="addressLine2" id="addressLine2"><label
                                                    for="addressLine2">&nbsp;&nbsp;Street Name</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="streetName_postal" id="streetName_postal"><label
                                                    for="streetName_postal">&nbsp;&nbsp;Street Name - Postal</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="addressLine1" id="addressLine1"><label
                                                    for="addressLine1">&nbsp;&nbsp;Street Number</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="streetNumber_postal" id="streetNumber_postal"><label
                                                    for="streetNumber_postal">&nbsp;&nbsp;Street Number - Postal</label></strong>
                                        </td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="suburb" id="suburb"><label
                                                    for="suburb">&nbsp;&nbsp;Suburb</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="suburb_postal" id="suburb_postal"><label
                                                    for="suburb_postal">&nbsp;&nbsp;Suburb - Postal</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="surveyStat" id="surveyStat"><label
                                                    for="surveyStat">&nbsp;&nbsp;Survey contact status</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="title" id="title"><label
                                                    for="title">&nbsp;&nbsp;Title</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="uniqueStudentIdentifier"
                                                    id="uniqueStudentIdentifier"><label
                                                    for="uniqueStudentIdentifier">&nbsp;&nbsp;Unique Student
                                                    Identifier</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="vsn" id="vsn"><label
                                                    for="vsn">&nbsp;&nbsp;Victorian Student Number</label></strong></td>
                                    </tr>
                                    <tr style="height:30px;">
                                        <td style="width:600px"><strong><input align="middle" class="selColsCheckBox"
                                                    type="checkbox" name="yearSchoolCompleted" id="yearSchoolCompleted"><label
                                                    for="yearSchoolCompleted">&nbsp;&nbsp;Year school level was
                                                    completed</label></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn_save">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Modal select column end --}}
            <!-- Modal Start-->
            <div class="modal fade" id="add_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                            <div class="modal-body">
                                <form class="row g-3 needs-validation" action="{{ route('people.store') }}" id="new_student" method="POST" novalidate>
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Full Name" required>
                                        <div class="invalid-feedback">
                                            Please select a valid Full Name.
                                          </div>
                                      </div>
                                      <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                                        <div class="invalid-feedback">
                                            Please select a valid Last Name.
                                          </div>
                                      </div>
                                      <div class="mb-3">
                                        <label for="contact" class="form-label">Contact</label>
                                        <select class="form-select" name="contactType" aria-label="Default select example" required>
                                            <option value="email " selected>Email</option>
                                            <option value="home">Home</option>
                                            <option value="mobile">Mobile</option>
                                            <option value="office">Office</option>
                                          </select>
                                          <div class="invalid-feedback">
                                            Please select a valid Email.
                                          </div>
                                      </div>
                                      <div class="mb-3">
                                        <label for="contact_info" class="form-label">Contact Info</label>
                                        <input type="text" class="form-control" name="contactInfo" id="contact_info" placeholder="Contact Info" required>
                                        <div class="invalid-feedback">
                                            Please select a valid Info.
                                          </div> 
                                    </div>
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </form>
                            </div>
                </div>
                </div>
            </div>
            <!-- Modal End-->
            <!-- Modal -->
        <div class="modal fade" id="sms_bulk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6>Filter Learners</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Limit list of recipients to,
                    <form id="bulk_sms_filter_form" action="" method="post">
                        @csrf()
                        @method('POST')
                        <input type="checkbox" name="filter[]" value="1">&nbsp;Current Enquiry <br>
                        <input type="checkbox" name="filter[]" value="2">&nbsp;Current Enrolment <br>
                        <input type="checkbox" name="filter[]" value="3">&nbsp;Past Enrolment <br>
                        <input type="checkbox" name="filter[]" value="4">&nbsp;Completed Qualification <br><br>
                        <input type="hidden" id="filter_next" name="filter_next">
                        <input type="submit" class="btn btn-primary" value="Next" fdprocessedid="vcxnr">
                    </form>
                </div>
            </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
         $(document).ready(function() {
(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
    })()
    $('#btn_save').click(function() {
             var checkedValues = [];
            $('.selColsCheckBox:checked').each(function() {
                checkedValues.push($(this).attr('name'));
            });
            var tokens  = $('meta[name="csrf-token"]').attr('content')
        $.ajax({
                    url: "{{ route('people.column')}}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        columns: checkedValues,
                        token:tokens
                    },
                    success: function(response) {
                        console.log('Columns updated successfully');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
   
    <style>
        span.custom_inactive {
            background: #f44236;
            color: #fff;
            padding: 3px 10px;
            border-radius: 6px;
        }

        span.custom_active {
            background: #1de9b6;
            color: #fff;
            padding: 3px 10px;
            border-radius: 6px;
        }

        .events .card-header {
            border-color: #000000;
            position: relative;
            background: transparent;
            padding: 11px 20px;
            display: block;
            justify-content: space-between;
            align-items: center;
        }

        .modal-backdrop {
            display: none;
        }

        .leading-5 svg {
            width: 20px !important;
        }

        #uploadBox tr {
            margin: 10px 0;
        }

        #sms_opportunities {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        #sms_opportunities .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 35%;
            /* Could be more or less, depending on screen size */
        }

        .close {
            width: 40px;
            height: 40px;
            padding: 0;
        }
    </style>
@stop
