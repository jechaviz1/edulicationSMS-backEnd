<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-enrolments"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Enrolments</button>
            <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-sessions" type="button"
                role="tab" aria-controls="nav-sessions" aria-selected="true">Sessions</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-notes" type="button"
                role="tab" aria-controls="nav-profile" aria-selected="false">Notes</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-schedule" type="button"
                role="tab" aria-controls="nav-contact" aria-selected="false">Edit Schedule</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-syrvey-setting"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Survey Setting</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-opportunities"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Opportunities</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-enrolments" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="mt-3 mb-3">
                <div class="" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary ms-2">Email all learners</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">SMS all learners</button>
                    <button type="button" class="btn btn-primary ms-2">Send Survey</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#certificate_manage">Manage Certificates</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addenrolments">Add Enrolments</button>
                    <button type="button" class="btn btn-primary ms-2">Enrol Units</button>
                    <button type="button" class="btn btn-primary ms-2">Update Outcomes</button>
                    <button type="button" class="btn btn-primary ms-2">Create Invoice</button>
                </div>
            </div>
            {{-- // tables start --}}
            <table id="example4" class="display table mt-3" style="min-width: 845px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Qualification Status</th>
                        <th>Company</th>
                        <th>Invoice Number</th>
                        <th>Payer</th>
                        <th>payt. Status</th>
                        <th>Survey</th>
                        <th>Confirmation Sent</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($enrollments))
                        @foreach ($enrollments as $k => $row)
                        {{-- @dd($row) --}}
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->student->first_name }} . {{ $row->student->last_name }}</td>
                                <td>Not Completed</td>
                                <td></td>
                                <td></td>
                                <td>SELF</td>
                                <td>{{$row->paymentStatus}}</td>
                                <td><span>Send Survey</span></td>
                                <td>No</td>
                                <td>
                                    <a href="{{ route('event.enrollment.people.update',$row->id)}}" class="btn"><i title="Edit" class="fa fa-pencil fa-2x mr-2 text-info"></i></a>
                                    <a href="" class="btn "><i title="Delete Enrolment" class="fa fa-trash fa-2x mr-2 text-danger"></i></a>
                                    <a href="" class=""><i title="Delete E-Form" class="fa fa-trash fa-2x mr-2 text-danger"></i></a>
                                    <a href="" class=""><i title="Issue Document" class="fa fa-file fa-2x text-primary mr-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            {{-- // tables end --}}
            {{-- Add Enrolments  --}}
            <div class="modal fade" id="addenrolments" tabindex="-1" aria-labelledby="addenrolmentsLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                    <div class="modal-content" style="max-height: 500px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addenrolmentsLabel">Course Enrolment for {{ $course->code }} -
                                {{ $course->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    checked value="option1"
                                    onclick="document.getElementById('FindPerson').style.display = 'block',document.getElementById('AddPerson').style.display = 'none'">
                                <label class="form-check-label" for="inlineRadio1">Find Person</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2"
                                    onclick="document.getElementById('AddPerson').style.display = 'block',document.getElementById('FindPerson').style.display = 'none'">
                                <label class="form-check-label" for="inlineRadio2">Add Person</label>
                            </div>
                            <div id="FindPerson" style="display: block;">
                                <form action="{{ route('event.enrollment.issue')}}" method="post"> 
                                    @csrf()
                                    @method('post')
                                    <input type="hidden" name="studentId" id="studentId" value="">
                                    <input type="hidden" name="course_id" value="{{$course->id}}">
                                    <input type="hidden" name="event_id" value="{{$course_event->id}}">
                                            <div class="row">
                                            <div class="col-auto">Find Person By</div>
                                        <div class="col-auto">
                                        <select name="searchBy" class="form-control mr-1" id="searchByThis"
                                            onchange="document.getElementById('searchValue').value='';">
                                            <option value="first_name">First Name</option>
                                            <option value="middle_name">Middle Name</option>
                                            <option value="last_name">Last Name</option>
                                            <option value="email">Email</option>
                                            <option value="contact_no">Mobile</option>
                                            <option value="postcode">Post Code</option>
                                        </select>
                                    </div>
                                    <div class="col-auto"><input type="text" name="searchValue" id="searchValueIs"
                                            class="input_text1 form-control"></div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-primary ml-1" onclick="loadStudentList();"
                                            fdprocessedid="680bi9">Go</button>
                                    </div>
                                        </div>
                                    <div class="row py-2">
                                    <div class="col-2">
                                        <label for="">Select Person</label>
                                    </div>
                                    <div class="col-10">
                                        <select name="studentList" class="form-control" id="studentList" size="3"
                                            style="width:100%;"
                                            onchange="loadEnquiries(this.options[this.selectedIndex].value);"></select>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-auto">
                                        <label for="">Enrolment Form:</label>
                                    </div>
                                    <div class="col-auto">
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-auto">
                                        <label for="">Received Date:</label>
                                    </div>
                                    <div class="col-auto">
                                        <input class="form-control" type="date" id="formFile">
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-2">
                                        <label for="">Received By:</label>
                                    </div>
                                    <div class="col-4">
                                        <select style="width:100%" name="receivedBy" id="receivedBy"
                                            class="form-control" fdprocessedid="kuoqh">
                                            <option value="Email">Email</option>
                                            <option value="Fax">Fax</option>
                                            <option value="Post">Post</option>
                                            <option value="Verbal">Verbal</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="">Reporting State:</label>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" name="" id="">
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-3">
                                        Payment Status:
                                    </div>
                                    <div class="col-9">
                                        <select name="paymentStatus" id="paymentStatus" size="1"
                                            class="form-control" style="width:100%" fdprocessedid="9qtyqs">
                                            <option value="PAID">PAID
                                            </option>
                                            <option value="NOT PAID" selected="selected">NOT PAID
                                            </option>
                                            <option value="PAYMENT PLAN">PAYMENT PLAN
                                            </option>
                                            <option value="DEPOSIT PAID">DEPOSIT PAID
                                            </option>
                                            <option value="COMPLIMENTARY">COMPLIMENTARY
                                            </option>
                                            <option value="EXEMPT">EXEMPT
                                            </option>
                                            <option value="PURCHASE ORDER">
                                                PURCHASE ORDER
                                            </option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-4"><label for="">Discount Amount</label></div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="discountAmount">
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="">Is Trainee:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="checkbox" class="" name="isTrainee">
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="">Report this enrolment:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="checkbox" class="" name="isReported">
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="">National ID:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="RTOStudentId" id="RTOStudentId" class="form-control"
                                            style="width:100%;">
                                    </div>
                                </div>
                                <button class="btn btn-primary">Save</button>
                            </form>
                            </div>
                            <div id="AddPerson" style="display: none;">
                                <form action="{{ route('event.enrollment.add.people')}}" method="post" >
                                    @csrf()
                                    @method('post')
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Basic Info</h5>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">Title:</label>

                                            </div>
                                            <div class="col">
                                                <select name="title" class="form-control" id="title"
                                                    style="width:110px;" fdprocessedid="b4p0p">
                                                    <option></option>
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Ms">Ms</option>
                                                    <option value="Dr">Dr</option>
                                                    <option value="Rev">Rev</option>
                                                    <option value="Hon">Hon</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">First Name:</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="firstName" id="firstName"
                                                    class="input_text1 form-control" style="width:110px;" maxlength="25"
                                                    fdprocessedid="h4paj">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">Middle Name:</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="middleName" id="middleName"
                                                    class="input_text1 form-control" style="width:110px;" maxlength="25"
                                                    fdprocessedid="cf2wv9">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">Last Name:</label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="lastName" id="lastName"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Gender:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <select name="gender" id="gender" class="form-control"
                                                    style="width:110px;" fdprocessedid="cuksh">
                                                    <option></option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    DOB:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="date" name="birth" id="birth" class=""
                                                    style="width:100%;">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Company:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="clientCompany" id="clientCompany"
                                                    class="input_text1 form-control ui-autocomplete-input"
                                                    style="width:100%;height: 35px;" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Role:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="role" id="role"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="60">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Address Line 1:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="address1" id="address1"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Address Line 2:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="address2" id="address2"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="60"
                                                    fdprocessedid="0dnej">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Unique Student Identifier:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="uniqueStudentIdentifier"
                                                    id="uniqueStudentIdentifier" class="input_text1 form-control"
                                                    style="width:100%;" maxlength="10" fdprocessedid="bbarjn">
                                            </div>
                                        </div>
                                        <h5>Usual Residence</h5>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Building / Property Name:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="buildingName" id="buildingName"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="xxl0i">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Street Number:

                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="streetNumber" id="streetNumber"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="qjnlg">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Street Name:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="streetName" id="streetName"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="ydy7el">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Suburb:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="suburb" id="suburb"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="s56fhj">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    State
                                                </label>
                                            </div>
                                            <div class="col">
                                                <select class="form-control" name="" id="">
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Post Code:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="postcode" id="postcode"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="4"
                                                    fdprocessedid="ls163g">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Country:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <select name="country" id="country" class="input_text_1 form-control"
                                                    style="width:100%; height:35px;" fdprocessedid="c6kidd">
                                                    <option value=""></option> <!-- bug 4176 -->
                                                    <option value="Adelie Land (France)">Adelie Land (France)</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Africa, nfd">Africa, nfd</option>
                                                    <option value="Aland Islands">Aland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="Americas">Americas</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Argentinian Antarctic Territory">Argentinian Antarctic
                                                        Territory</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Asia, nfd">Asia, nfd</option>
                                                    <option value="At Sea">At Sea</option>
                                                    <option value="Australia" selected="">Australia</option>
                                                    <option value="Australia (includes External Territories)">Australia
                                                        (includes External Territories)</option>
                                                    <option value="Australian Antarctic Territory">Australian Antarctic
                                                        Territory</option>
                                                    <option value="Australian External Territories, nec">Australian
                                                        External Territories, nec</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia, Plurinational State of">Bolivia, Plurinational
                                                        State of</option>
                                                    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint
                                                        Eustatius and Saba</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Antarctic Territory">British Antarctic Territory
                                                    </option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burma (Republic of the Union of Myanmar)">Burma
                                                        (Republic of the Union of Myanmar)</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Caribbean">Caribbean</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic
                                                    </option>
                                                    <option value="Central America">Central America</option>
                                                    <option value="Central and West Africa">Central and West Africa
                                                    </option>
                                                    <option value="Central Asia">Central Asia</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="Chilean Antarctic Territory">Chilean Antarctic Territory
                                                    </option>
                                                    <option value="China (excludes SARs and Taiwan)">China (excludes SARs
                                                        and Taiwan)</option>
                                                    <option value="Chinese Asia (includes Mongolia)">Chinese Asia (includes
                                                        Mongolia)</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo, Democratic Republic of">Congo, Democratic
                                                        Republic of</option>
                                                    <option value="Congo, Republic of ">Congo, Republic of </option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote d'ivoire">Cote d'Ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Curacao">Curacao</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Asia, nfd">East Asia, nfd</option>
                                                    <option value="Eastern Europe">Eastern Europe</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="England">England</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Europe, nfd">Europe, nfd</option>
                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="Former USSR, nfd">Former USSR, nfd</option>
                                                    <option value="Former Yugoslav Republic of Macedonia (FYROM)">Former
                                                        Yugoslav Republic of Macedonia (FYROM)</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Gaza Strip and West Bank">Gaza Strip and West Bank
                                                    </option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Holy See">Holy See</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong (SAR of China)">Hong Kong (SAR of China)
                                                    </option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="Inadequately Described">Inadequately Described</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Japan and the Koreas">Japan and the Koreas</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Korea, Democratic People' republic'of(north)">Korea,
                                                        Democratic People's Republic of
                                                        (North)</option>
                                                    <option value="Korea, Republic of (South)">Korea, Republic of (South)
                                                    </option>
                                                    <option value="Kosovo">Kosovo</option>
                                                    <option value="Kurdistan, nfd">Kurdistan, nfd</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libya">Libya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macau (SAR of China)">Macau (SAR of China)</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Mainland South-East Asia">Mainland South-East Asia
                                                    </option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Maritime South-East Asia">Maritime South-East Asia
                                                    </option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Melanesia">Melanesia</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia</option>
                                                    <option value="Micronesia, Federated States of">Micronesia, Federated
                                                        States of</option>
                                                    <option value="Middle East">Middle East</option>
                                                    <option value="Moldova">Moldova</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="North Africa">North Africa</option>
                                                    <option value="North Africa and the Middle East">North Africa and the
                                                        Middle East</option>
                                                    <option value="North-East Asia">North-East Asia</option>
                                                    <option value="North-West Europe">North-West Europe</option>
                                                    <option value="Northern America">Northern America</option>
                                                    <option value="Northern Europe">Northern Europe</option>
                                                    <option value="Northern Ireland">Northern Ireland</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands
                                                    </option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Not Specified">Not Specified</option>
                                                    <option value="Oceania and Antarctica">Oceania and Antarctica</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Polynesia (excludes Hawaii)">Polynesia (excludes Hawaii)
                                                    </option>
                                                    <option value="Polynesia (excludes Hawaii), nec">Polynesia (excludes
                                                        Hawaii), nec</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Queen Maud Land (Norway)">Queen Maud Land (Norway)
                                                    </option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Ross Dependency (New Zealand)">Ross Dependency (New
                                                        Zealand)</option>
                                                    <option value="Russian Federation">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="Samoa, American">Samoa, American</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Scotland">Scotland</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)
                                                    </option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South America">South America</option>
                                                    <option value="South America, nec">South America, nec</option>
                                                    <option value="South Eastern Europe">South Eastern Europe</option>
                                                    <option value="South Sudan">South Sudan</option>
                                                    <option value="South-East Asia">South-East Asia</option>
                                                    <option value="Southern and Central Asia">Southern and Central Asia
                                                    </option>
                                                    <option value="Southern and East Africa">Southern and East Africa
                                                    </option>
                                                    <option value="Southern and East Africa, nec">Southern and East Africa,
                                                        nec</option>
                                                    <option value="Southern and Eastern Europe">Southern and Eastern Europe
                                                    </option>
                                                    <option value="Southern Asia">Southern Asia</option>
                                                    <option value="Southern Europe">Southern Europe</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Spanish North Africa">Spanish North Africa</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                    <option value="St Helena">St Helena</option>
                                                    <option value="St Kitts and Nevis">St Kitts and Nevis</option>
                                                    <option value="St Lucia">St Lucia</option>
                                                    <option value="St Martin (French part)">St Martin (French part)
                                                    </option>
                                                    <option value="St Pierre and Miquelon">St Pierre and Miquelon</option>
                                                    <option value="St Vincent and the Grenadines">St Vincent and the
                                                        Grenadines</option>
                                                    <option value="Sub-Saharan Africa">Sub-Saharan Africa</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syria</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor-Leste">Timor-Leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                                    </option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom, Channel Islands and Isle of Man">United
                                                        Kingdom, Channel Islands and Isle of Man</option>
                                                    <option value="United States of America">United States of America
                                                    </option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian
                                                        Republic of</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Virgin Islands, British">Virgin Islands, British
                                                    </option>
                                                    <option value="Virgin Islands, United States">Virgin Islands, United
                                                        States</option>
                                                    <option value="Wales">Wales</option>
                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                    <option value="Western Europe">Western Europe</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <h5>Contact Info</h5>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Mobile:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="contactNumber" id="contactNumber"
                                                    onkeyup="onKeyUpInput('contactNumber')"
                                                    class="input_text1 form-control" style="width:200px" maxlength="20"
                                                    fdprocessedid="dgfq8f">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Bus Ph:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="businessNumber" id="businessNumber"
                                                    onkeyup="onKeyUpInput('businessNumber')"
                                                    class="input_text1 form-control" style="width:200px" maxlength="20"
                                                    fdprocessedid="te5zde">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Home Ph:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="businessNumber" id="businessNumber"
                                                    onkeyup="onKeyUpInput('businessNumber')"
                                                    class="input_text1 form-control" style="width:200px" maxlength="20"
                                                    fdprocessedid="te5zde">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Fax:

                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="facsimileNumber" id="facsimileNumber"
                                                    class="input_text1 form-control" style="width:200px;" maxlength="20"
                                                    fdprocessedid="oynchw">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Email 1:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="studentEmail" id="studentEmail"
                                                    onkeyup="onKeyUpInput('studentEmail')"
                                                    class="input_text1 form-control" style="width:200px;"
                                                    fdprocessedid="74qx1f">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Email 2:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="studentEmail2" id="studentEmail2"
                                                    onkeyup="onKeyUpInput('studentEmail2')"
                                                    class="input_text1 form-control" style="width:200px;"
                                                    fdprocessedid="6ged7r">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Email 3:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="studentEmail3" id="studentEmail3"
                                                    onkeyup="onKeyUpInput('studentEmail3')"
                                                    class="input_text1 form-control" style="width:200px;"
                                                    fdprocessedid="aj3c6m">
                                            </div>
                                        </div>
                                        <h5>Postal Residence</h5>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Building / Property Name:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="buildingName_postal" id="buildingName_postal"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="vnu2q5">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Flat / Unit Details:

                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="unitDetails_postal" id="unitDetails_postal"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="ju3yvq">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Street Number:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="streetNumber_postal" id="streetNumber_postal"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="byu74">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Street Name:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="streetName_postal" id="streetName_postal"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="95zz2d">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Postal Delivery Box:

                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="deliveryBox_postal" id="deliveryBox_postal"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="xu4cpl">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Suburb:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="suburb_postal" id="suburb_postal"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="zs5i8m">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    State:

                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="suburb_postal" id="suburb_postal"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="30"
                                                    fdprocessedid="zs5i8m">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Post Code:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="postalCode_postal" id="postalCode_postal"
                                                    class="input_text1 form-control" style="width:100%;" maxlength="4"
                                                    fdprocessedid="uzk5yb">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <label for="">
                                                    Country:
                                                </label>
                                            </div>
                                            <div class="col">
                                                <select name="country_postal" id="country_postal"
                                                    class="input_text_1 form-control" style="width:100%; height:35px;"
                                                    fdprocessedid="37ed72">
                                                    <option value=""></option> <!-- bug 4176 -->
                                                    <option value="Adelie Land (France)">Adelie Land (France)</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Africa, nfd">Africa, nfd</option>
                                                    <option value="Aland Islands">Aland Islands</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="Americas">Americas</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Argentinian Antarctic Territory">Argentinian Antarctic
                                                        Territory</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Asia, nfd">Asia, nfd</option>
                                                    <option value="At Sea">At Sea</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Australia (includes External Territories)">Australia
                                                        (includes External Territories)</option>
                                                    <option value="Australian Antarctic Territory">Australian Antarctic
                                                        Territory</option>
                                                    <option value="Australian External Territories, nec">Australian
                                                        External Territories, nec</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia, Plurinational State of">Bolivia, Plurinational
                                                        State of</option>
                                                    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint
                                                        Eustatius and Saba</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Antarctic Territory">British Antarctic Territory
                                                    </option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burma (Republic of the Union of Myanmar)">Burma
                                                        (Republic of the Union of Myanmar)</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Caribbean">Caribbean</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African Republic
                                                    </option>
                                                    <option value="Central America">Central America</option>
                                                    <option value="Central and West Africa">Central and West Africa
                                                    </option>
                                                    <option value="Central Asia">Central Asia</option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="Chilean Antarctic Territory">Chilean Antarctic Territory
                                                    </option>
                                                    <option value="China (excludes SARs and Taiwan)">China (excludes SARs
                                                        and Taiwan)</option>
                                                    <option value="Chinese Asia (includes Mongolia)">Chinese Asia (includes
                                                        Mongolia)</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo, Democratic Republic of">Congo, Democratic
                                                        Republic of</option>
                                                    <option value="Congo, Republic of ">Congo, Republic of </option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cote d" ivoire'="">Cote d'Ivoire</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Curacao">Curacao</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Asia, nfd">East Asia, nfd</option>
                                                    <option value="Eastern Europe">Eastern Europe</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="England">England</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Europe, nfd">Europe, nfd</option>
                                                    <option value="Falkland Islands">Falkland Islands</option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="Former USSR, nfd">Former USSR, nfd</option>
                                                    <option value="Former Yugoslav Republic of Macedonia (FYROM)">Former
                                                        Yugoslav Republic of Macedonia (FYROM)</option>
                                                    <option value="France">France</option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Gaza Strip and West Bank">Gaza Strip and West Bank
                                                    </option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guernsey">Guernsey</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Holy See">Holy See</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong (SAR of China)">Hong Kong (SAR of China)
                                                    </option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="Inadequately Described">Inadequately Described</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Isle of Man">Isle of Man</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Japan and the Koreas">Japan and the Koreas</option>
                                                    <option value="Jersey">Jersey</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option
                                                        value="Korea, Democratic People's Republic of
                                                        (North)>Korea,">
                                                        Democratic People's Republic of
                                                        (North)</option>
                                                    <option value="Korea, Republic of (South)">Korea, Republic of (South)
                                                    </option>
                                                    <option value="Kosovo">Kosovo</option>
                                                    <option value="Kurdistan, nfd">Kurdistan, nfd</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libya">Libya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macau (SAR of China)">Macau (SAR of China)</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Mainland South-East Asia">Mainland South-East Asia
                                                    </option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Maritime South-East Asia">Maritime South-East Asia
                                                    </option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Melanesia">Melanesia</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia</option>
                                                    <option value="Micronesia, Federated States of">Micronesia, Federated
                                                        States of</option>
                                                    <option value="Middle East">Middle East</option>
                                                    <option value="Moldova">Moldova</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="North Africa">North Africa</option>
                                                    <option value="North Africa and the Middle East">North Africa and the
                                                        Middle East</option>
                                                    <option value="North-East Asia">North-East Asia</option>
                                                    <option value="North-West Europe">North-West Europe</option>
                                                    <option value="Northern America">Northern America</option>
                                                    <option value="Northern Europe">Northern Europe</option>
                                                    <option value="Northern Ireland">Northern Ireland</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands
                                                    </option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Not Specified">Not Specified</option>
                                                    <option value="Oceania and Antarctica">Oceania and Antarctica</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn Islands">Pitcairn Islands</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Polynesia (excludes Hawaii)">Polynesia (excludes
                                                        Hawaii)</option>
                                                    <option value="Polynesia (excludes Hawaii), nec">Polynesia (excludes
                                                        Hawaii), nec</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Queen Maud Land (Norway)">Queen Maud Land (Norway)
                                                    </option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Ross Dependency (New Zealand)">Ross Dependency (New
                                                        Zealand)</option>
                                                    <option value="Russian Federation">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="Samoa, American">Samoa, American</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Scotland">Scotland</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)
                                                    </option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South America">South America</option>
                                                    <option value="South America, nec">South America, nec</option>
                                                    <option value="South Eastern Europe">South Eastern Europe</option>
                                                    <option value="South Sudan">South Sudan</option>
                                                    <option value="South-East Asia">South-East Asia</option>
                                                    <option value="Southern and Central Asia">Southern and Central Asia
                                                    </option>
                                                    <option value="Southern and East Africa">Southern and East Africa
                                                    </option>
                                                    <option value="Southern and East Africa, nec">Southern and East
                                                        Africa, nec</option>
                                                    <option value="Southern and Eastern Europe">Southern and Eastern
                                                        Europe</option>
                                                    <option value="Southern Asia">Southern Asia</option>
                                                    <option value="Southern Europe">Southern Europe</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Spanish North Africa">Spanish North Africa</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="St Barthelemy">St Barthelemy</option>
                                                    <option value="St Helena">St Helena</option>
                                                    <option value="St Kitts and Nevis">St Kitts and Nevis</option>
                                                    <option value="St Lucia">St Lucia</option>
                                                    <option value="St Martin (French part)">St Martin (French part)
                                                    </option>
                                                    <option value="St Pierre and Miquelon">St Pierre and Miquelon</option>
                                                    <option value="St Vincent and the Grenadines">St Vincent and the
                                                        Grenadines</option>
                                                    <option value="Sub-Saharan Africa">Sub-Saharan Africa</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syria</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Timor-Leste">Timor-Leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands
                                                    </option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom, Channel Islands and Isle of Man">United
                                                        Kingdom, Channel Islands and Isle of Man</option>
                                                    <option value="United States of America">United States of America
                                                    </option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela, Bolivarian Republic of">Venezuela,
                                                        Bolivarian Republic of</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Virgin Islands, British">Virgin Islands, British
                                                    </option>
                                                    <option value="Virgin Islands, United States">Virgin Islands, United
                                                        States</option>
                                                    <option value="Wales">Wales</option>
                                                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                    <option value="Western Europe">Western Europe</option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- SMS All Learners End --}}
            {{-- SMS all Lerners  --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Send SMS</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('event.course.sendAllLearnersSMS') }}" method="post">
                                @csrf()
                                @method('POST')
                                <input type="hidden" name="course_id" value="{{ $course_event->course_name }}">
                                <input type="hidden" name="event_id" value="{{ $course_event->id }}">
                                <p>Note: Sending one SMS message will cost you $0.09 (AUD, GST Excl).</p>
                                <textarea name="sms_Content" id="sms_Content" style="width:600px;height:200px;"></textarea>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- SMS All Learners End --}}
            {{-- Manage Certificates Start  --}}
            <div class="modal fade" id="certificate_manage" tabindex="-1" aria-labelledby="certificate_manageLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="certificate_manageLabel">Manage Certificates</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Issue Certificate</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Issue History</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <h5>Issue Course Certificates</h5>
                                    <p>The following students are not enrolled in any units:</p>
                                    <p>Note: Student email will be used if Issuing via Email and sending to individuals.
                                        Please ensure a valid email address is entered before issuing.</p>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Student ID</th>
                                                <th scope="col">Student Name</th>
                                                <th scope="col">Is Paid</th>
                                                <th scope="col">Cert. Issued</th>
                                                <th scope="col">Student Email</th>
                                                <th scope="col"> <input type="checkbox" class="form-check-input"
                                                        id="exampleCheck1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Manage Certificates Start En --}}
        </div>
        <div class="tab-pane fade" id="nav-sessions" role="tabpanel" aria-labelledby="nav-sessions-tab">
            <table cellpadding="0" cellspacing="0" border="0" width="95%" align="center" class="table">
                <tbody>
                    <tr>
                        <th style="width:85px; border-bottom:1px solid gray;" align="left">Module Name</th>
                        <th style="width:100px; border-bottom:1px solid gray;" align="left">Venue Name</th>
                        <th style="width:70px; border-bottom:1px solid gray;" align="left">Room Name</th>
                        <th align="center" style="width:100px; border-bottom:1px solid gray;">Trainer(s)</th>
                        <th align="center" style="width:100px; border-bottom:1px solid gray;">Assessor(s)</th>
                        <th align="center" style="width:120px; border-bottom:1px solid gray;">Start Time</th>
                        <th align="center" style="width:120px; border-bottom:1px solid gray;">End Time</th>
                        <th align="center" style="width:50px; border-bottom:1px solid gray;">Status</th>
                        <th align="center" style="width:60px; border-bottom:1px solid gray;"></th>
                    </tr>

                    <tr style="height:30px;">
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:70px;">Test Module</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:90px;">test</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:80px;"></div>
                        </td>
                        <td align="center" style="border-bottom:1px solid gray;">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;">08 Jul 2024<br>1:00 am</td>
                        <td align="center" style="border-bottom:1px solid gray;">08 Jul 2024<br>1:00 pm</td>
                        <td align="center" style="border-bottom:1px solid gray;">Active</td>
                        <td align="right" style="border-bottom:1px solid gray;">
                            <i class="fa fa-pencil fa-2x mr-2 text-info"
                                onclick="edit_session(&quot;34643&quot;, &quot;88200&quot;,&quot;1&quot;,&quot;1&quot;);"
                                title="Edit"></i>
                            <i class="fa fa-trash fa-2x mr-2 text-danger"
                                onclick="delete_session(&quot;34643&quot;, &quot;88200&quot;);" title="Delete"></i>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:70px;">Test Module</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:90px;">AIFT Campus</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:80px;"></div>
                        </td>
                        <td align="center" style="border-bottom:1px solid gray;">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;">08 Jul 2024<br>1:00 am</td>
                        <td align="center" style="border-bottom:1px solid gray;">08 Jul 2024<br>1:00 pm</td>
                        <td align="center" style="border-bottom:1px solid gray;">Active</td>
                        <td align="right" style="border-bottom:1px solid gray;">
                            <i class="fa fa-pencil fa-2x mr-2 text-info"
                                onclick="edit_session(&quot;34643&quot;, &quot;88201&quot;,&quot;1&quot;,&quot;1&quot;);"
                                title="Edit"></i>
                            <i class="fa fa-trash fa-2x mr-2 text-danger"
                                onclick="delete_session(&quot;34643&quot;, &quot;88201&quot;);" title="Delete"></i>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:70px;">Session 1</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:90px;">AIFT Campus</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:80px;"></div>
                        </td>
                        <td align="center" style="border-bottom:1px solid gray;">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;"></td>
                        <td align="center" style="border-bottom:1px solid gray;">08 Jul 2024<br>1:00 am</td>
                        <td align="center" style="border-bottom:1px solid gray;">01 Jan 1970<br>1:00 pm</td>
                        <td align="center" style="border-bottom:1px solid gray;">Active</td>
                        <td align="right" style="border-bottom:1px solid gray;">
                            <i class="fa fa-pencil fa-2x mr-2 text-info"
                                onclick="edit_session(&quot;34643&quot;, &quot;88202&quot;,&quot;1&quot;,&quot;0&quot;);"
                                title="Edit"></i>
                            <i class="fa fa-trash fa-2x mr-2 text-danger"
                                onclick="delete_session(&quot;34643&quot;, &quot;88202&quot;);" title="Delete"></i>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:70px;">Session 2</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:90px;">AIFT Campus</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:80px;"></div>
                        </td>
                        <td align="center" style="border-bottom:1px solid gray;">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;"></td>
                        <td align="center" style="border-bottom:1px solid gray;">09 Jul 2024<br>1:00 am</td>
                        <td align="center" style="border-bottom:1px solid gray;">01 Jan 1970<br>1:00 pm</td>
                        <td align="center" style="border-bottom:1px solid gray;">Active</td>
                        <td align="right" style="border-bottom:1px solid gray;">
                            <i class="fa fa-pencil fa-2x mr-2 text-info"
                                onclick="edit_session(&quot;34643&quot;, &quot;88203&quot;,&quot;1&quot;,&quot;0&quot;);"
                                title="Edit"></i>
                            <i class="fa fa-trash fa-2x mr-2 text-danger"
                                onclick="delete_session(&quot;34643&quot;, &quot;88203&quot;);" title="Delete"></i>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:70px;">Session 3</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:90px;">AIFT Campus</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:80px;"></div>
                        </td>
                        <td align="center" style="border-bottom:1px solid gray;">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;"></td>
                        <td align="center" style="border-bottom:1px solid gray;">10 Jul 2024<br>1:00 am</td>
                        <td align="center" style="border-bottom:1px solid gray;">01 Jan 1970<br>1:00 pm</td>
                        <td align="center" style="border-bottom:1px solid gray;">Active</td>
                        <td align="right" style="border-bottom:1px solid gray;">
                            <i class="fa fa-pencil fa-2x mr-2 text-info"
                                onclick="edit_session(&quot;34643&quot;, &quot;88204&quot;,&quot;1&quot;,&quot;0&quot;);"
                                title="Edit"></i>
                            <i class="fa fa-trash fa-2x mr-2 text-danger"
                                onclick="delete_session(&quot;34643&quot;, &quot;88204&quot;);" title="Delete"></i>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:70px;">Session 4</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:90px;">AIFT Campus</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:80px;"></div>
                        </td>
                        <td align="center" style="border-bottom:1px solid rgb(164, 164, 164);">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;"></td>
                        <td align="center" style="border-bottom:1px solid gray;">11 Jul 2024<br>1:00 am</td>
                        <td align="center" style="border-bottom:1px solid gray;">01 Jan 1970<br>1:00 pm</td>
                        <td align="center" style="border-bottom:1px solid gray;">Active</td>
                        <td align="right" style="border-bottom:1px solid gray;">
                            <i class="fa fa-pencil fa-2x mr-2 text-info"
                                onclick="edit_session(&quot;34643&quot;, &quot;88205&quot;,&quot;1&quot;,&quot;0&quot;);"
                                title="Edit"></i>
                            <i class="fa fa-trash fa-2x mr-2 text-danger"
                                onclick="delete_session(&quot;34643&quot;, &quot;88205&quot;);" title="Delete"></i>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:70px;">Session 5</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:90px;">AIFT Campus</div>
                        </td>
                        <td align="left" style="border-bottom:1px solid gray;">
                            <div style="width:80px;"></div>
                        </td>
                        <td align="center" style="border-bottom:1px solid gray;">kuldip domadiya<br></td>
                        <td align="center" style="border-bottom:1px solid gray;"></td>
                        <td align="center" style="border-bottom:1px solid gray;">12 Jul 2024<br>1:00 am</td>
                        <td align="center" style="border-bottom:1px solid gray;">01 Jan 1970<br>1:00 pm</td>
                        <td align="center" style="border-bottom:1px solid gray;">Active</td>
                        <td align="right" style="border-bottom:1px solid gray;">
                            <i class="fa fa-pencil fa-2x mr-2 text-info"
                                onclick="edit_session(&quot;34643&quot;, &quot;88206&quot;,&quot;1&quot;,&quot;0&quot;);"
                                title="Edit"></i>
                            <i class="fa fa-trash fa-2x mr-2 text-danger"
                                onclick="delete_session(&quot;34643&quot;, &quot;88206&quot;);" title="Delete"></i>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <td colspan="8">
                            <div id="textlink_34643" style="line-height:25px; width:500px;  clear:both; display:block">
                                <button class="btn btn-primary" type="button"
                                    onclick="add_session(&quot;34643&quot;, &quot;#tabs-Sessions-&quot;, 0);"
                                    fdprocessedid="pzxz98">Add Session</button>
                                <button class="btn btn-primary" type="button"
                                    onclick="add_sessions(&quot;34643&quot;, &quot;#tabs-Sessions-&quot;, 0);"
                                    fdprocessedid="7uuyks">Add Multiple Sessions</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- @dd($course_event) --}}
        <div class="tab-pane fade" id="nav-notes" role="tabpanel" aria-labelledby="nav-profile-tab">
            <button type="button" class="btn btn-primary mt-4" id="tnotes">Add Notes</button>
            <div id="tNoteForm_34643" style="display: none;">
                <form method="post" enctype="multipart/form-data" action="{{ route('course.event.note') }}">
                    @csrf
                    @method('post')
                    <input type="hidden" value="{{ $course_event->course_name }}" name="couser_id">
                    <div class="row mt-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Select note
                            category:</label>
                        <div class="col-sm-10">
                            <select class="form-select">
                                <option selected>Open this select menu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <textarea name="note" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="row mt-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Attach File(s)</label>
                        <div class="col-sm-6">
                            <table border="0" cellpadding="0" cellspacing="0" id="uploadBox"
                                style="margin-top:10px;margin-left:10px">
                                <tbody>
                                    <tr class="mt-2">
                                        <td>
                                            <input class="form-control" type="file" name="upload_file[]"
                                                size="50" style="width:360px;">
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" style="margin-left: 30px;"
                                                type="submit">Add
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-4" style="width: 250px;">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table">
                <tbody>
                    <tr style="text-align:center;">
                        <th>Note</th>
                        <th>Type of note</th>
                        <th>Note Category</th>
                        <th>Module Name</th>
                        <th width="20%">Last Updated by</th>
                        <th width="20%">Last Updated on</th>
                        <th width="10%"></th>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-schedule" role="tabpanel" aria-labelledby="nav-contact-tab">
            <form class="mt-4">
                <div class="row">
                    <div class="col-2 mt-2 form-group">
                        <label>Course ID</label>
                    </div>
                    <div class="col-4 form-group">
                        <input style="padding-left:1rem;width:18vw;" name="displayCourseID" class="form-control mb-2"
                            id="displayCourseID" type="text" value="{{ $course_event->course_name }}"
                            disabled="">
                    </div>
                    <div class="col-2 mt-2 form-group">
                        <label>Schedule ID</label>
                    </div>
                    <div class="col-4 form-group">
                        <input style="padding-left:1rem;width:12vw;" type="text" name="displayScheduleID"
                            id="displayScheduleID" class="form-class" value="34643" disabled="">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2 mt-1.5 form-group form-inline">
                        <label>Course Name</label>
                    </div>
                    <div class="col-4 form-group form-inline">
                        <select name="coursename34643" class="form-control" style="width:18vw;" id="coursename34643"
                            size="1" disabled="disabled">
                            <option value="2565" selected=""></option>
                        </select>
                    </div>
                    <div class="col-2 form-group form-group">
                        <label>Group (Company if applicable)</label>
                    </div>
                    <div class="col-4 form-group form-inline">
                        <input style="width:12vw;" type="text" maxlength="15" class="form-control"
                            name="groupname34643" id="groupname34643" value="">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2 mt-2 form-group">
                        <label>Course Type</label>
                    </div>
                    <div class="col-4 form-group form-inline">
                        <select name="cboCourseType" style="width:12vw;" id="cboCourseType" class="form-control"
                            style="">
                            <option value="1" selected="">Self Paced</option>
                            <option value="2">Public Sessions</option>
                            <option value="3">Private Sessions</option>
                        </select>
                        <button class="btn btn-primary mt-2" style="width:5.75vw;" type="button"
                            title="Updates course type and reloads the settings according to the selection"
                            onclick="updateCourseType('34643','379')">UPDATE</button>
                    </div>
                    <div class="col-2 mt-2 form-group">
                        <label>Month &amp; Year</label>
                    </div>
                    <div class="col-4 form-group form-inline">
                        <select name="city34643" id="city34643" size="1" class="form-control"
                            style="width:12vw; display:block; display:none"
                            onchange="reloadLocation('location34643', this.options[this.options.selectedIndex].value);"
                            disabled="disabled">
                            <option value="1519">new</option>
                            <option value="1501">sudny</option>
                            <option value="1502" selected="">Sydney</option>
                            <option value="1500">test</option>
                        </select>

                        <select name="month34643" class="form-control" id="month34643" type="text"
                            style="display:block;width:6vw;">
                            <option value="January" selected="">January
                            </option>
                            <option value="February">February
                            </option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August
                            </option>
                            <option value="September">
                                September
                            </option>
                            <option value="October">October
                            </option>
                            <option value="November">November
                            </option>
                            <option value="December">December
                            </option>
                        </select>
                        <!---new code for year--->
                        <select name="spyear34643" type="text" id="spyear34643" class="form-control"
                            style="margin-left:16px; display:block;width:5.25vw;">
                            <option value="1941">1941</option>
                            <option value="1942">1942</option>
                            <option value="1943">1943</option>
                            <option value="1944">1944</option>
                            <option value="1945">1945</option>
                            <option value="1946">1946</option>
                            <option value="1947">1947</option>
                            <option value="1948">1948</option>
                            <option value="1949">1949</option>
                            <option value="1950">1950</option>
                            <option value="1951">1951</option>
                            <option value="1952">1952</option>
                            <option value="1953">1953</option>
                            <option value="1954">1954</option>
                            <option value="1955">1955</option>
                            <option value="1956">1956</option>
                            <option value="1957">1957</option>
                            <option value="1958">1958</option>
                            <option value="1959">1959</option>
                            <option value="1960">1960</option>
                            <option value="1961">1961</option>
                            <option value="1962">1962</option>
                            <option value="1963">1963</option>
                            <option value="1964">1964</option>
                            <option value="1965">1965</option>
                            <option value="1966">1966</option>
                            <option value="1967">1967</option>
                            <option value="1968">1968</option>
                            <option value="1969">1969</option>
                            <option value="1970">1970</option>
                            <option value="1971">1971</option>
                            <option value="1972">1972</option>
                            <option value="1973">1973</option>
                            <option value="1974">1974</option>
                            <option value="1975">1975</option>
                            <option value="1976">1976</option>
                            <option value="1977">1977</option>
                            <option value="1978">1978</option>
                            <option value="1979">1979</option>
                            <option value="1980">1980</option>
                            <option value="1981">1981</option>
                            <option value="1982">1982</option>
                            <option value="1983">1983</option>
                            <option value="1984">1984</option>
                            <option value="1985">1985</option>
                            <option value="1986">1986</option>
                            <option value="1987">1987</option>
                            <option value="1988">1988</option>
                            <option value="1989">1989</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023" selected="">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                            <option value="2031">2031</option>
                            <option value="2032">2032</option>
                            <option value="2033">2033</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="">
                    <div class="col-2 mt-2 form-group">
                        <label>Trainers</label>
                    </div>
                    <div class="col-4 form-group">
                        <div id="testtrainer" style="float:left; width:300px;">
                            <select name="trainer0" id="trainer0" size="1" style="width:18vw;"
                                class="form-control">
                                <option value="0"></option>
                            </select>


                        </div>
                        <div style="float:left; padding-left:11vw;width:6vw;padding-top:10px;padding-bottom:10px;">
                            <input type="hidden" id="num_trainers" name="num_trainers" value="1">
                            <button class="btn btn-primary" type="button"
                                onclick="AddFormField('testtrainer','select','','','div', 'trainer');">Add
                                more
                                trainers
                            </button>&nbsp;&nbsp;
                        </div>

                    </div>
                    <div class="col-2 mt-2 form-group">
                        <label>Assessors</label>
                    </div>
                    <div class="col-4 form-group">
                        <div id="testassessor" style="float:left; width:220px;">
                            <div id="divassessor0" style="display:flex">
                                <div style="flex:90%">
                                    <select name="assessor0" id="assessor0" size="1" style="width:12vw;"
                                        class="form-control">
                                        <option value="0"></option>
                                        <option value="899">trainer1 training</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="float:left; padding-left:80px;width:600px;padding-top:10px;padding-bottom:10px;">
                            <input type="hidden" id="num_assessors" name="num_assessors" value="1">
                            <button class="btn btn-primary" type="button"
                                onclick="AddFormField('testassessor','select','','','div', 'assessor');">Add
                                more
                                assessors
                            </button>&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2 mt-2 form-group">
                        <label>Course Quota (Maximum number of enrolments)</label>
                    </div>
                    <div class="col-4 form-group">
                        <input name="coursequota34643" class="form-control" id="coursequota34643" type="text"
                            value="1000" style="width:18vw;" overflow:auto;="" vertical-align:middle;"="">
                    </div>
                    <div class="col-2 mt-2 form-group">
                        <label>Status</label>
                    </div>
                    <div class="col-4 form-group form-inline">
                        <select style="width:12vw;" name="status34643" class="form-control" id="status34643"
                            size="1">
                            <option value="Open" selected="">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-2"><!--//WWB-1184-->
                    <div class="col-2 mt-1 form-group">
                        <label>Course cost (per enrolment)</label>
                    </div>
                    <div class="col-4 form-group">
                        <input name="coursecost34643" class="form-control" id="coursecost34643" type="text"
                            value="0" style="width:18vw; overflow:auto; vertical-align:middle;">
                    </div>
                    <div class="col-2 form-group">
                        <label>Reporting State</label>
                    </div>
                    <div class="col-4 form-group form-inline">
                        <select class="form-control" name="reportingState34643" id="reportingState34643"
                            style="width: 12vw">
                            <option value="8">Australian Capital Territory</option>
                            <option value="12">Fee for Service</option>
                            <option value="1">New South Wales</option>
                            <option value="7">Northern Territory</option>
                            <option value="10">Other (Overseas)</option>
                            <option value="9">Other Australian Territories or Dependencies</option>
                            <option value="3">Queensland</option>
                            <option value="4" selected="">South Australia</option>
                            <option value="6">Tasmania</option>
                            <option value="2">Victoria</option>
                            <option value="5">Western Australia</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2 mt-2 form-group">
                        <label>City</label>
                    </div>
                    <div class="col-4 form-group form-inline">
                        <select name="city134643" id="city134643" class="form-control" style="width:18vw;">
                            <option value="1519">new</option>
                            <option value="1501">sudny</option>
                            <option value="1502" selected="">Sydney</option>
                            <option value="1500">test</option>
                        </select>
                    </div>
                    <div class="col-2 mt-2 form-group">
                        <label>Location</label>
                    </div>
                    <div class="col-4 form-group form-inline">
                        <select name="city234643" id="city234643" size="1" class="form-control"
                            style="width:12vw;;">
                            <option value="2602" selected="">AIFT Campus</option>
                            <option value="2588">prismavix</option>
                            <option value="2619">test</option>
                        </select>
                        <!-- location -->
                    </div>
                </div>
                <!--//WWB-220 Start-->
                <div class="row mb-2">
                    <div class="col-2 mt-2 form-group">
                        <label>Delivery mode identifier</label>
                    </div>
                    <div class="col-10 form-group form-inline">
                        <input type="hidden" name="old_modeId34643" id="old_modeId34643" value="YNN">
                        <input type="hidden" name="old_preModeId34643" id="old_preModeId34643" value="I">
                        <select name="modeId34643" id="modeId34643" size="1" style="width:18vw;"
                            class="form-control" onchange="chkModeId(this.value, 'preModeId34643');">
                            <option value="YNN" selected="">Internal only</option>
                            <option value="NYN">External only</option>
                            <option value="NNY">Workplace-based only</option>
                            <option value="YYN">Combination of internal and external</option>
                            <option value="YNY">Combination of internal and workplace-based</option>
                            <option value="NYY">Combination of external and workplace-based</option>
                            <option value="YYY">Combination of all modes</option>
                            <option value="NNN">Not applicable (RPL or credit transfer)</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2 mt-2 form-group form-inline">
                        <label>Predominant delivery mode</label>
                    </div>
                    <div class="col-10 form-group form-inline">
                        <select name="preModeId34643" id="preModeId34643" style="width:18vw;" class="form-control">
                            <option value="E">External delivery</option>
                            <option value="I" selected="">Internal delivery</option>
                            <option value="W">Workplace-based delivery</option>
                            <option value="N">Not applicable-RPL/credit transfer</option>
                        </select>
                    </div>
                </div>
                <!--//WWB-220 End-->
                <div class="row form-group text-center">
                    <div class="col-12">
                        <button class="btn btn-primary" type="button" onclick="">Save</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade" id="nav-syrvey-setting" role="tabpanel" aria-labelledby="nav-contact-tab">

        </div>
        <div class="tab-pane fade" id="nav-opportunities" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div id="ui-tabs-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom" aria-live="polite"
                aria-labelledby="ui-id-16" role="tabpanel" aria-expanded="true" aria-hidden="false"
                style="display: block;">
                <p><strong>Note:</strong>&nbsp;These prospects have active enquiries for this course code in
                    this location.</p>
                <div>
                    <button class="btn btn-primary m-2" disabled=""
                        title="To unlock this feature, please upgrade to a Non-Free License">Email all
                        opportunities</button>
                    <button id="openModalBtn" class="btn btn-primary">SMS all opportunities</button>
                    {{-- <button type="button" class="btn btn-primary m-2" onclick="createModal()">  SMS all opportunities </button> --}}
                </div>
                <table class="table table-striped" id="scheduletable">
                    <thead>
                        <tr>
                            <th>Enquiry Date</th>
                            <th>Name</th>
                            <th>Last Action</th>
                            <th>Chance %</th>
                            <th>Likely Month</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>InfoPAK sent?</th>
                            <th></th>
                        </tr>
                    </thead>
                    <thead></thead>
                    <tbody>
                    </tbody>
                </table>
                <!-- Modal opportunities Start-->
                <div id="sms_opportunities">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <button class="close btn " style="font-size: 20px;position: absolute;right: 0;top: 0;"><span
                                style="font-size: 50px;">&times;</span></button>
                        <h5>Send SMS</h5>
                        <div style="padding:0px 0px 10px 20px;"><b>Note: </b>Sending one SMS message will cost you $0.09
                            (AUD, GST Excl).
                        </div>
                        <textarea name="sms_Content" id="sms_Content" style="width:600px;height:200px;"></textarea>
                        <button type="button" id="submit-sms" class="btn btn-primary mt-4"
                            style="width: 200px;">Send</button>
                    </div>
                </div>
                <!-- Modal opportunities End-->
            </div>
        </div>
    </div>
    <!-- Modal -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .btn {
            display: inline-block;
            font-weight: normal;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            line-height: 1.25;
            transition: all 0.2s ease-in-out;
        }
    </style>
    <script>
        function loadStudentList() {
            var searchby = $('#searchByThis').val();
            var searchvalue = $('#searchValueIs').val();
            $('#studentList').empty();
            $.ajax({
                url: "{{ route('api.people.find') }}",
                type: 'GET',
                data: {
                    'search_filled': searchby,
                    'searchvalue': searchvalue
                }, // Pass the scheduleId as a query parameter
                success: function(response) {
                    response.students.forEach(student => {
                        var field = student[searchby];
                        $('#studentList').append(new Option(field + " (id:" + student.id + ")", student
                            .id));
                    });

                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                }
            });
        }


        $(document).ready(function() {
            var modal = $("#sms_opportunities");
            // Get the button that opens the modal
            var btn = $("#openModalBtn");
            // Get the <span> element that closes the modal
            var span = modal.find(".close");
            // When the user clicks on the button, open the modal
            btn.click(function() {
                modal.css("display", "block");
            });

            // When the user clicks on <span> (x), close the modal
            span.click(function() {
                modal.css("display", "none");
            });
            $(window).click(function(event) {
                if (event.target == modal[0]) {
                    modal.css("display", "none");
                }
            });
        });

        function createUploadBox(uploadBox) {
            var oTable = document.getElementById(uploadBox);
            var row_num = oTable.rows.length;
            if (row_num < 19) {
                var oTr = oTable.insertRow(row_num);
                oTr.height = 20 + "px";
                var oTd0 = oTr.insertCell(0);
                oTd0.innerHTML =
                    "<input type='file' name='upload_file[]' size='50' style='width:360px;' class='form-control'/>";
                var oTd1 = oTr.insertCell(1);
                oTd1.innerHTML = '<button class="btn btn-warning" style="margin-left:30px;">Remove</button>';
                oTd1.align = "left";
                oTd1.firstChild.onclick = function() {
                    var oTable = this.parentNode.parentNode.parentNode;
                    this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode);
                }
            } else {
                alert("You can only upload 19 files.");
            }
        }
    </script>
    <script>
        const radios = document.querySelectorAll('input[type=radio][name="url"]');
        console.log(radios);

        function handleChange() {
            if (this.checked) {
                window.location.href = this.value;
            }
        }

        radios.forEach(radio => {
            radio.addEventListener('change', handleChange);
        });
        $(document).ready(function() {
            $('input[type=radio][name="course_type"]').change(function() {
                var value = $(this).val();
                if (value == '1') {
                    $('#resources').attr('readonly', true);
                    $('#month_1').show();
                    $('#spyear_1').show();
                    $('#selects_units_1').show();
                    $('#location_1').show();
                } else if (value == '2') {
                    $('#resources').removeAttr('readonly');
                    $('#month_1').hide();
                    $('#spyear_1').hide();
                    $('#selects_units_1').hide();
                    $('#location_1').hide();
                } else {
                    $('#resources').attr('readonly', true);
                    $('#month_1').hide();
                    $('#spyear_1').hide();
                    $('#selects_units_1').hide();
                    $('#location_1').hide();
                }
            });
            $("#tnotes").click(function() {
                $("#tNoteForm_34643").toggle(); // Toggle the display style
            });
        })
    </script>
    <script>
        // modal open bulk 
        function openCourseDialog(scheduleId) {
            if (scheduleId != "") {
                console.log(scheduleId);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('course.find') }}",
                    type: 'GET',
                    data: {
                        scheduleId: scheduleId
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        console.log(response.course.name)
                        $('#course_name_1').append(response.course.name)
                        // <span id="course_name"></span>
                        // Handle the successful response here
                        if (response.success == true) { // Check for the correct key and value
                            // $('#exampleModalToggle').modal('hide');
                            // location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
            }
        }
        $(document).ready(function() {
            $('#course').submit(function(event) {
                // Prevent the form from submitting normally
                event.preventDefault();
                // Get the CSRF token value
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                // Add the CSRF token to the FormData object
                var formData = new FormData(this);
                formData.append('_token', csrfToken);
                console.log(formData); // Add CSRF token here
                // Send the AJAX request
                $.ajax({
                    url: "{{ route('event.courses.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false, // Prevent jQuery from automatically converting the data to a query string
                    contentType: false, // Set content type to false as FormData will handle it
                    success: function(response) {
                        // Handle the successful response here
                        if (response.sucess == "true") {
                            $('#exampleModalToggle').modal('hide');
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
            });

        });
    </script>
    <script>
        function showEdit(id) {
            event.preventDefault();
            // Get the CSRF token value
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Add the CSRF token to the FormData object
            var formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('id', id);
            formData.append('id', id);
            console.log(formData);
            $.ajax({
                url: "{{ route('event.note.course.edit') }}",
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from automatically converting the data to a query string
                contentType: false, // Set content type to false as FormData will handle it
                success: function(response) {
                    // Handle the successful response here
                    if (response.sucess == "true") {
                        $('#exampleModalToggle').modal('hide');
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                }
            });
        }


        function deleteNote(id) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Add the CSRF token to the FormData object
            var formData = new FormData();
            formData.append('_token', csrfToken);
            formData.append('id', id);
            console.log(formData);
            $.ajax({
                url: "{{ route('event.note.course.delete') }}",
                type: 'post',
                data: formData,
                processData: false, // Prevent jQuery from automatically converting the data to a query string
                contentType: false, // Set content type to false as FormData will handle it
                success: function(response) {
                    // Handle the successful response here
                    if (response.sucess == "true") {
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                }
            });

        }
    </script>
    <style>
        .fa-2x {
            font-size: 1.5em !important;
            cursor: pointer;
        }
    </style>
@stop
