<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
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
                <h4 class="card-title">Course - {{ $enrollment->course->code }}</h4>
            </div>
            <div class="row p-3">
                <div class="col-sm-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Notes</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Invoices</button>
                        </li>
                        
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-enrolment" type="button" role="tab" aria-controls="pills-enrolment" aria-selected="false">Enrolled Units</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-outcomes" type="button" role="tab" aria-controls="pills-outcomes" aria-selected="false">Outcomes</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-avetmiss-tab" data-bs-toggle="pill" data-bs-target="#pills-avetmiss" type="button" role="tab" aria-controls="pills-avetmiss" aria-selected="false">Avetmiss</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-funding-tab" data-bs-toggle="pill" data-bs-target="#pills-funding" type="button" role="tab" aria-controls="pills-funding" aria-selected="false">Funding/Delivery</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-confirm-email-tab" data-bs-toggle="pill" data-bs-target="#pills-confirm-email" type="button" role="tab" aria-controls="pills-confirm-email" aria-selected="false">Confirmation Email
                            </button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-cert-issue-tab" data-bs-toggle="pill" data-bs-target="#pills-cert-issue" type="button" role="tab" aria-controls="pills-cert-issue" aria-selected="false">Cert Issue</button>
                          </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                       
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
                                    <input type="hidden" name="course_id" value="{{$enrollment->course->id}}">
                                    <input type="hidden" name="event_id" value="{{$enrollment->event->id}}">
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
                                        <select name="studentList" class="form-control" id="studentList" size="3" style="width:100%;">
                                            <option value="{{$enrollment->student->first_name}}">{{$enrollment->student->first_name}}</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-auto">
                                        <label for="">Enrolment Form:</label>
                                    </div>
                                    <div class="col-auto">
                                      
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-auto">
                                        <label for="">Received Date:</label>
                                    </div>
                                    <div class="col-auto">
                                        {{$enrollment->created_at}}
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-2">
                                        <label for="">Received By:</label>
                                    </div>
                                    <div class="col-4">
                                        <select style="width:100%" name="receivedBy" id="receivedBy"
                                            class="form-control" fdprocessedid="kuoqh">
                                            <option value="Email" @if($enrollment->receivedBy == "Email") seleted @endif>Email</option>
                                            <option value="Fax" @if($enrollment->receivedBy == "Fax") seleted @endif>Fax</option>
                                            <option value="Post" @if($enrollment->receivedBy == "Post") seleted @endif>Post</option>
                                            <option value="Verbal" @if($enrollment->receivedBy == "Verbal") seleted @endif>Verbal</option>
                                            <option value="Other" @if($enrollment->receivedBy == "Other") seleted @endif>Other</option>
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
                                            <option value="PAID" @if($enrollment->paymentStatus == "PAID") selected @endif>PAID
                                            </option>
                                            <option value="NOT PAID" @if($enrollment->paymentStatus == "NOT PAID") selected @endif>NOT PAID
                                            </option>
                                            <option value="PAYMENT PLAN" @if($enrollment->paymentStatus == "PAYMENT PLAN") selected @endif>PAYMENT PLAN
                                            </option>
                                            <option value="DEPOSIT PAID" @if($enrollment->paymentStatus == "DEPOSIT PAID") selected @endif>DEPOSIT PAID
                                            </option>
                                            <option value="COMPLIMENTARY" @if($enrollment->paymentStatus == "COMPLIMENTARY") selected @endif>COMPLIMENTARY
                                            </option>
                                            <option value="EXEMPT" @if($enrollment->paymentStatus == "EXEMPT") selected @endif>EXEMPT
                                            </option>
                                            <option value="PURCHASE ORDER" @if($enrollment->paymentStatus == "PURCHASE ORDER") selected @endif>
                                                PURCHASE ORDER
                                            </option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-4"><label for="">Discount Amount</label></div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" value="{{$enrollment->discountAmount}}" name="discountAmount">
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="">Is Trainee:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="checkbox" class="" @if($enrollment->isTrainee == "on") checked @endif name="isTrainee">
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="">Report this enrolment:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="checkbox" class="" @if($enrollment->isReported == "on") checked @endif name="isReported">
                                    </div>
                                    </div>
                                    <div class="row mt-3">
                                    <div class="col-4">
                                        <label for="">National ID:</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" name="RTOStudentId" id="RTOStudentId" class="form-control" value="{{$enrollment->RTOStudentId}}"
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
                            <div class="col-4 mt-3">
                                <h6 class="border mb-3 p-2">Payment Schedule Overview</h6>
                    <p class="mb-1">Standard Course Tuition Cost: <i class="fa fa-question-circle" aria-hidden="true" data-toggle="tooltip" data-html="true" data-placement="top" title="" data-original-title="This is added in the <br><strong>Courses We Run</strong> page"></i><span class="float-right course-cost">$0.00</span></p>
                    <p class="mb-1">Discount Applied: <span class="float-right course-cost">(${{$enrollment->discountAmount}}.00)</span></p>
                    <p class="mb-1">Course Tuition Cost to Learner: <span class="float-right">$-{{$enrollment->discountAmount}}</span></p>
                    <p class="mb-1">Non-tuition (other) Costs to Learner: <span class="float-right">$0.00</span></p>
                    <hr>
                    <p class="mb-1">Amounts Invoiced to Date (Tuition &amp; Other): <span class="float-right">$0.00</span></p>
                    <p class="mb-1">Scheduled Amounts Yet to Invoice: <span class="float-right">$0.00</span></p>
                    <p class="mb-1">Amount Paid to Date (Tuition &amp; Other): <span class="float-right">$0.00</span></p>
                    <hr>
                    <p class="mb-1">Scheduled Fees Due but not Invoiced: <span class="float-right ">$0.00</span></p>
                    <p class="mb-1">Invoiced Fees Overdue: <span class="float-right ">$0.00</span></p>
                </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div id="taable_note" style="display: block;">
                                <form action="{{route('enrolment.notes.pdf') }}" method="post">
                                    @csrf()
                                    @method('post')
                                    <input type="hidden" name="student_id" value="{{$enrollment->student->id}}">
                                    <input type="hidden" name="course_id" value="{{$enrollment->course->id}}">
                                    <button class="btn btn-primary" type="submit">Export to PDF</button>
                                </form>
                                <table class="table" id="taable_note" style="display:block;">
                                    <thead>
                                      <tr>
                                        <th scope="col">Note</th>
                                        <th scope="col">Note Category</th>
                                        <th scope="col">Added By</th>
                                        <th scope="col">Added On</th>
                                        <th scope="col">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enrolmentnote as $enrol)
                                        <tr>
                                            <th scope="row">
                                               <div>{{ $enrol->note }}</div>
                                               <div> 
                                            @if ($enrol->attachment != null)
                                            Attachment : <a href="{{ asset($enrol->upload)}}"  target="_blank" >{{$enrol->attachment}}</a>
                                            @endif
                                               </div>
                                            </th>
                                            <td>{{ $enrol->category->name }}</td>
                                            <td>{{ $enrol->created_by }}</td>
                                            <td>{{ $enrol->created_at }}</td>
                                            <td>
                                                <i title="Edit" class="fa fa-pencil fa-2x mr-2 text-info" aria-hidden="true" onclick="editEnrolmentNote({{$enrol->id}},{{$enrol->note_category}});"></i>
                                           <a href="{{ route('note.enrolment.delete',$enrol->id)}}"><i class="fa fa-trash fa-2x mr-2 text-danger" aria-hidden="true"></i></a>
                                            </td>
                                          </tr>
                                        @endforeach
                                       
                                    </tbody>
                                  </table>
                                  <button type="button" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Add Note
                                  </button>
                            </div>
                              <div id="block_element" style="display:none;">
                                <form action="{{ route('event.course.enrolment.student.note.update')}}" method="post"  enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="student_id" value="{{$enrollment->student->id}}">
                                    <input type="hidden" name="course_id" value="{{$enrollment->course->id}}">
                                    <input type="hidden" name="note_id" id="note_id" value="">
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label">Select note category:</label>
                                        <div class="col-sm-8">
                                        <select class="form-select" aria-label="Default select example" name="note_category" id="note_category_update">
                                            <option value="" selected>Open this select Note Category</option>
                                            @foreach($note_student as $note)
                                                <option value="{{$note->id}}" >{{ $note->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Template</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" aria-label="Default select example" name="template" id="template_update">
                                                <option selected>Open this select Template</option>
                                              </select>
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                                        <div class="col-sm-10">
                                         <textarea name="note" id="note_update" cols="30" rows="10" class="form-controls" ></textarea>
                                        </div>
                                      </div>
                                      <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Upload</label>
                                        <div class="col-sm-10">
                                          <input type="file" name="upload" class="form-control" id="upload">
                                        </div>
                                      </div>
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-primary" type="button" onclick="closeelement();">Close</button>
                                </form>
                        </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Add Note</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('event.course.enrolment.student.note')}}" method="post"  enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <input type="hidden" name="student_id" value="{{$enrollment->student->id}}">
                                                <input type="hidden" name="course_id" value="{{$enrollment->course->id}}">
                                                <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-3 col-form-label">Select note category:</label>
                                                    <div class="col-sm-8">
                                                    <select class="form-select" aria-label="Default select example" name="note_category" >
                                                        <option value="" selected>Open this select Note Category</option>
                                                        @foreach($note_student as $note)
                                                            <option value="{{$note->id}}">{{ $note->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div>
                                                  </div>
                                                  <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Template</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-select" aria-label="Default select example" name="template" >
                                                            <option selected>Open this select Template</option>
                                                          </select>
                                                    </div>
                                                  </div>
                                                  <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
                                                    <div class="col-sm-10">
                                                     <textarea name="note" id="" cols="30" rows="10" class="form-controls"></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="mb-3 row">
                                                    <label for="inputPassword" class="col-sm-2 col-form-label">Upload</label>
                                                    <div class="col-sm-10">
                                                      <input type="file" name="upload" class="form-control" id="upload">
                                                    </div>
                                                  </div>
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                        <div class="tab-pane fade" id="pills-enrolment" role="tabpanel" aria-labelledby="pills-enrolment-tab">...</div>
                        <div class="tab-pane fade" id="pills-outcomes" role="tabpanel" aria-labelledby="pills-outcomes-tab">...</div>
                        <div class="tab-pane fade" id="pills-avetmiss" role="tabpanel" aria-labelledby="pills-avetmiss-tab">...</div>
                        <div class="tab-pane fade" id="pills-funding" role="tabpanel" aria-labelledby="pills-funding-tab">...</div>
                        <div class="tab-pane fade" id="pills-confirm-email" role="tabpanel" aria-labelledby="pills-confirm-email">...</div>
                        <div class="tab-pane fade" id="pills-cert-issue" role="tabpanel" aria-labelledby="pills-cert-issue">...</div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-backdrop{
            display: none;
        }
    </style>
    <script>
      function  editEnrolmentNote(id,category){
        var element = document.getElementById('block_element');
        var block = document.getElementById('taable_note');
        element.style.display = 'block';
        block.style.display = 'none';
        document.getElementById('note_id').value = id;
        document.getElementById('note_category_update').value = category;
        $.ajax({
                url: "{{ route('api.note.find') }}",
                type: 'GET',
                data: {
                    'id': id,
                }, // Pass the scheduleId as a query parameter
                success: function(response) {
                    console.log(response.note)
                    document.getElementById('note_update').value = response.note.note;

                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                }
            });

    }
       function closeelement(){
        var element = document.getElementById('block_element');
        var block = document.getElementById('taable_note');
        element.style.display = 'none';
        block.style.display = 'block';
       }
    </script>
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
    </script>
@stop