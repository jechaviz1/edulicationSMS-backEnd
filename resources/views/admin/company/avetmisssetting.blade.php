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
                <h4 class="card-title">AVETMISS</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <form action="{{ route('company.saveAvetmiss') }}" method="POST" enctype="multipart/form-data">
                            @csrf()
                            @method('POST')
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Contact User</label>
                                </div>
                                <div class="col-auto">
                                    <select name="contact" id="contact" class="form-control input_text_1"
                                        style="height:40px; width:230px;" fdprocessedid="hnxqgh">
                                        <option value="0">Not Set</option>
                                       @foreach ($users as $user)
                                        <option value="{{ $user->id}}">{{$user->first_name }} {{ $user->last_name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Email Address</label>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">National Company Identifier </label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" name="companyIdentifier" id="companyIdentifier" value=""
                                        class="fom-control" maxlength="10" fdprocessedid="qvoevq">
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Training Organisation Type </label>
                                </div>
                                <div class="col-auto">
                                    <select name="companyType" id="companyType" class="form-control input_text_1"
                                        style="height:40px; width:400px;" fdprocessedid="94ye1c">
                                        <option value="21">School - Government</option>
                                        <option value="25">School - Catholic</option>
                                        <option value="27">School - Independent</option>
                                        <option value="31" selected="">Technical and Further Education Institute, or
                                            similar public institution</option>
                                        <option value="41">University - Government</option>
                                        <option value="43">University - Non-Government Catholic</option>
                                        <option value="45">University - Non-Government Independent</option>
                                        <option value="51">Enterprise - Government</option>
                                        <option value="53">Enterprise - Non-Government</option>
                                        <option value="61">Community-based adult education provider</option>
                                        <option value="91">Private Education/training business or centre</option>
                                        <option value="93">Professional association</option>
                                        <option value="95">Industry association</option>
                                        <option value="97">Equipment and/or product manufacturer or supplier</option>
                                        <option value="99">Other training provider - not elsewhere classified</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Do you have a formal agreement with
                                        the Avetmiss Collection Managing Agent to submit your data directly?</label>
                                </div>
                                <div class="col-auto">
                                    <div style="float:left;vertical-align:middle">
                                        <input type="radio" name="isManagingAgent" value="1"
                                            onclick="jQuery('#trainingAuthority').slideDown();"> Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="isManagingAgent" value="0" checked="checked"
                                            onclick="jQuery('#trainingAuthority').slideUp();"> No
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">State Codes</label>
                                </div>
                            </div>
                            <div id="trainingAuthority" style="display: none;">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Training Authority Identifier
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="authorityIdentifier" id="authorityIdentifier"
                                                    maxlength="3" value="907" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Training Authority Name*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="authorityName" id="authorityName"
                                                    value="" class="form-control" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Address First Line*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="address1" id="address1" value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Address Second Line:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="address2" id="address2" value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Suburb
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="suburb" id="suburb" value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                State
                                            </div>
                                            <div class="col-sm-4">
                                                <select name="state" id="state" class="form-control"
                                                    style="height:40px; width:250px;" fdprocessedid="nwdqv9">
                                                    <option value="0" selected="">All</option>
                                                    <option value="1">New South Wales</option>
                                                    <option value="2">Victoria</option>
                                                    <option value="3">Queensland</option>
                                                    <option value="4">South Australia</option>
                                                    <option value="5">Western Australia</option>
                                                    <option value="6">Tasmania</option>
                                                    <option value="7">Northern Territory</option>
                                                    <option value="8">Australian Capital Territory</option>
                                                    <option value="9">Other Australian Territories or Dependencies
                                                    </option>
                                                    <option value="10">Other (Overseas)</option>
                                                    <option value="12">Fee for Service</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Post Code:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="pcode" id="pcode" maxlength="4" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Contact First Name*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="tcontactf" id="tcontactf" value="" class="form-control"  maxlength="20">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Contact Last Name*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="suburb" id="suburb" value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Email Address*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="temail" id="temail" maxlength="80" value="" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Phone Number*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="tphone" id="tphone" value="" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Fax Number*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="tfax" id="tfax" value="" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    Reporting State
                                </div>
                                <div class="col-sm-3">
                                    Funding Source - National
                                </div>
                                <div class="col-sm-3">
                                    Funding Source - State
                                </div>
                                <div class="col-sm-3">
                                    State Company Identifier
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_1" value="1"
                                        checked="" onclick="chkRptStClick(this);">
                                    New South Wales
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_1"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_1" id="fundingSourceState_1"
                                        name="fundingSourceState[]" fdprocessedid="hlu29"></select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_1"
                                        value="" class="form-control cls_1" maxlength="10" fdprocessedid="tabp7">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_2" value="2"
                                        checked="" onclick="chkRptStClick(this);">
                                    Victoria
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_2"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_2" id="fundingSourceState_2"
                                        name="fundingSourceState[]" fdprocessedid="k9vql">
                                        <option value="ACE">ACFE Board funded pre-accredited local programs </option>
                                        <option value="AC2">ACFE Board funded pre-accreditied local programs -2023-24
                                            Budget Additional Digital and Employability Places Inistiative</option>
                                        <option value="ASE">Asylum Seeker Language and Literacy Program</option>
                                        <option value="ASV">Asylum Seeker VET Learning Plan</option>
                                        <option value="ASL">Asylum Seeker VET Program - Apprenticeship/Traineeship
                                        </option>
                                        <option value="ASP">Asylum Seeker VET Program - Non Apprenticeship/ Traineeship
                                        </option>
                                        <option value="00P">Enrolment Type Exceptions</option>
                                        <option value="Z75">NSW Registered Apprentices at Victorian TAFE Institutes
                                        </option>
                                        <option value="RSL">Regional and Specialist Training Fund
                                            -Apprenticeship/Traineeship</option>
                                        <option value="RSP">Regional and Specialist Training Fund - Non
                                            Apprenticeship/Traineeship</option>
                                        <option value="L">Skills First mainstream funding (AQF Qualifications)
                                            -Apprenticeship/Traineeship</option>
                                        <option value="P">Skills First mainstream funding (AQF Qualifications) -
                                            NonApprenticeship/ Traineeship</option>
                                        <option value="GSP">Skills First mainstream funding (Skill Sets)</option>
                                        <option value="SPL">Specific Purpose - Apprenticeship/Traineeship</option>
                                        <option value="SPP">Specific Purpose - Non Apprenticeship/ Traineeship</option>
                                        <option value="ZP">VET in custodial settings - privately operated prisons
                                        </option>
                                        <option value="ZC">VET in custodial settings - Victorian Government
                                            operatedfacility</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_2"
                                        value="" class="form-control cls_1" maxlength="10" fdprocessedid="tabp7">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_3" value="3"
                                        checked="" onclick="chkRptStClick(this);">
                                    Queensland
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_3"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_3" id="fundingSourceState_3"
                                        name="fundingSourceState[]" fdprocessedid="vji6n">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_3"
                                        value="" class="form-control cls_1" maxlength="10" fdprocessedid="tabp7">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_4" value="4"
                                        checked="" onclick="chkRptStClick(this);">
                                    South Australia
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_4"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_4" id="fundingSourceState_4"
                                        name="fundingSourceState[]" fdprocessedid="vji6n">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_4"
                                        value="" class="form-control cls_4" maxlength="10" fdprocessedid="tabp7">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_5" value="5"
                                        checked="" onclick="chkRptStClick(this);">
                                    Western Australia
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_5"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_5" id="fundingSourceState_5"
                                        name="fundingSourceState[]" fdprocessedid="vji6n">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_5"
                                        value="" class="form-control cls_5" maxlength="10" fdprocessedid="tabp7">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_6" value="6"
                                        checked="" onclick="chkRptStClick(this);">
                                    Tasmania
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_6"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_6" id="fundingSourceState_6"
                                        name="fundingSourceState[]">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_6"
                                        value="" class="form-control cls_6" maxlength="10">
                                </div>
                            </div>



                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_7" value="7"
                                        checked="" onclick="chkRptStClick(this);">
                                    Northern Territory
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_7"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_7" id="fundingSourceState_7"
                                        name="fundingSourceState[]" fdprocessedid="vji6n">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_7"
                                        value="" class="form-control cls_7" maxlength="10">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_8" value="8"
                                        checked="" onclick="chkRptStClick(this);">
                                    Australian Capital Territory
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_8"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_7" id="fundingSourceState_8"
                                        name="fundingSourceState[]" fdprocessedid="vji6n">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_8"
                                        value="" class="form-control cls_7" maxlength="10">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_9" value="9"
                                        checked="" onclick="chkRptStClick(this);">
                                    Other Australian Territories or Dependencies
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_9"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_7" id="fundingSourceState_9"
                                        name="fundingSourceState[]" fdprocessedid="vji6n">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_9"
                                        value="" class="form-control cls_7" maxlength="10">
                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_10" value="10"
                                        checked="" onclick="chkRptStClick(this);">
                                    Other (Overseas)
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_9"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_10" id="fundingSourceState_10"
                                        name="fundingSourceState[]" fdprocessedid="vji6n">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_10"
                                        value="" class="form-control cls_10" maxlength="10">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="chkRptState[]" id="chkRptState_11" value="11"
                                        checked="" onclick="chkRptStClick(this);">
                                    Fee for Service
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="fundingSourceDescription[]"
                                        id="fundingSourceDescription_11"
                                        onchange="getFundingStateOptions(this.options[this.selectedIndex].value, 2)"
                                        fdprocessedid="g3sh6">
                                        <option value="11">Commonwealth and state general purpose recurrent (11)
                                        </option>
                                        <option value="13">Commonwealth specific funding program (13)</option>
                                        <option value="15">State specific funding program (15)</option>
                                        <option value="20" selected="">Domestic client - other revenue (20)
                                        </option>
                                        <option value="31">International onshore client - other revenue (31)</option>
                                        <option value="32">International offshore client - other revenue (32)</option>
                                        <option value="80">Revenue earned from another training organisation (80)
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_11" id="fundingSourceState_11"
                                        name="fundingSourceState[]" fdprocessedid="vji6n">
                                        <option value=""> </option>
                                        <option value="CSQ"> (CSQ) Construction Skills Queensland</option>
                                        <option value="03">(03) FEE FOR SERVICE (COMMERCIAL)</option>
                                        <option value="20">(20) Domestic full fee-paying student</option>
                                        <option value="BCS">(BCS) Brokerage Construction Skills</option>
                                        <option value="BMI">(BMI) Queensland Mining Industry Training Advisory Body Inc
                                            Broker</option>
                                        <option value="BRU">(BRU) Queensland Rural Industry Training Council Inc
                                        </option>
                                        <option value="CCF">(CCF) FFS CONSTRUCTION QLD SKILLS RPL ASSESSMENT</option>
                                        <option value="CCP">(CCP) Civil Construction Broker Pilot</option>
                                        <option value="ETF">(ETF) ETRF STRATEGY - NON GOVERNMENT FUNDED</option>
                                        <option value="FH1">(FH1) FEE - HELP VET</option>
                                        <option value="FH2">(FH2) FEE - HELP HIGHER EDUCATION</option>
                                        <option value="IRL">(IRL) INDUSTRIAL RELATIONS LICENCING</option>
                                        <option value="IRR">(IRR) Course as a Workplace Health and Safety Representative
                                        </option>
                                        <option value="IRW">(IRW) Course as a Workplace Health and Safety Officer
                                        </option>
                                        <option value="IWR">(IWR) Recertification as a Workplace Health and Safety
                                            Officer</option>
                                        <option value="LV3">(LV3) Price Leveraging - Fee For Service</option>
                                        <option value="OSF">(OSF) Overseas Skilled Migrant Scholarship Program</option>
                                        <option value="OSR">(OSR) OVERSEAS SKILLED MIGRANT SCHOLARSHIP PROGRAM</option>
                                        <option value="SPP">(SPP) SCHOOLS-PRIVATE PROVIDER</option>
                                        <option value="SSR">(SSR) SKILLING SOLUTIONS - RPL FEE-FOR-SEVICE</option>
                                        <option value="SVR">(SVR) RPL FAST TRACK FEE-FOR-SERVICE</option>
                                        <option value="TSF">(TSF) TAFE STAFF DEVELOPMENT UNDER FFS</option>
                                        <option value="WE1">(WE1) COMMONWEALTH FUNDED</option>
                                        <option value="WE8">(WE8) NATIONAL PROFESSIONAL DEVT-TEACHERS</option>
                                        <option value="WES">(WES) WORKPLACE LITERACY</option>
                                        <option value="WEX">(WEX) ADULT MIGRANT EDUCATION PROGRAM</option>
                                        <option value="WGA">(WGA) ADULT AND COMMUNITY EDUCATION</option>
                                        <option value="WGB">(WGB) PUBLIC SERVICE TRAINING PACKAGES</option>
                                        <option value="WSB">(WSB) FEE FOR SERVICE - SCHOOL BASED</option>
                                        <option value="WTA">(WTA) FFS RECEIVED FROM - INDIVIDUAL</option>
                                        <option value="WTB">(WTB) FFS RECEIVED FROM ENTERPRISE</option>
                                        <option value="WTC">(WTC) FFS RECEIVED FROM CORPORATION</option>
                                        <option value="WTD">(WTD) FFS RECEIVED FROM LOCAL GOVERNMENT</option>
                                        <option value="WTE">(WTE) FFS RECEIVED FROM STATE GOVERNMENT</option>
                                        <option value="WTF">(WTF) FFS RECEIVED FROM FEDERAL GOVERNMENT</option>
                                        <option value="WTI">(WTI) FFS INTERSTATE APPRENTICES AND TRAINEEES</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="statecompanyIdentifier[]" id="statecompanyIdentifier_11"
                                        value="" class="form-control cls_11" maxlength="10">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-1">
                                    *Please note:
                                </div>
                                <div class="col-sm-4">
                                    While every effort is made to ensure compliance of data format with reporting
                                    requirements, DNA Progression Pty Ltd makes no representation in this or any other
                                    respect. It
                                    is a condition of Weworkbook that DNA Progression Pty Ltd accepts no responsibility and
                                    disclaims all liability for any expenses, losses, damages, costs or liabilities you may
                                    incur,
                                    or claims that may be made on you, whether direct or indirect, as a result of reliance
                                    on the
                                    reporting within Weworkbook. It is each user's responsibility to ensure data is entered
                                    accurately and completely, that it is entered as required by that user's reporting
                                    jurisdiction
                                    and that it meets all validation and other applicable requirements.
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        function chkRptStClick(cb) {
            var sRptState = cb.id.split("_")[1];
            if (cb.checked) {

                $("#fundingSourceDescription_" + sRptState).prop("disabled", false);
                $("#fundingSourceState_" + sRptState).prop("disabled", false);
                $("#statecompanyIdentifier_" + sRptState).prop("disabled", false);
            } else {
                $("#fundingSourceDescription_" + sRptState).prop("disabled", true);
                $("#fundingSourceState_" + sRptState).prop("disabled", true);
                $("#statecompanyIdentifier_" + sRptState).prop("disabled", true);
            }
        }
    </script>
@stop
@push('scripts')
@endpush
