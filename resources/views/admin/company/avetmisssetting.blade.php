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
    @php
        use App\Models\AvitmessFunding;
        use App\Models\FundingState;
    @endphp
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
                                        style="height:40px; width:230px;">
                                        <option value="0" @if($avetmiss->contact == "0") selected @endif>Not Set</option>
                                       @foreach ($users as $user)
                                        <option value="{{ $user->id}}" @if($user->id == $avetmiss->contact) selected @endif>{{$user->first_name }} {{ $user->last_name }}</option>
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
                                    <input type="text" name="companyIdentifier" id="companyIdentifier" value="{{ $avetmiss->companyIdentifier }}"
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
                                    <option value="21" @if($avetmiss->companyType == "21") selected @endif>School - Government</option>
                                        <option value="25" @if($avetmiss->companyType == "25") selected @endif>School - Catholic</option>
                                        <option value="27" @if($avetmiss->companyType == "27") selected @endif>School - Independent</option>
                                        <option value="31" @if($avetmiss->companyType == "31") selected @endif>Technical and Further Education Institute, or similar public institution</option>
                                        <option value="41" @if($avetmiss->companyType == "41") selected  @endif>University - Government</option>
                                        <option value="43" @if($avetmiss->companyType == "43") selected  @endif>University - Non-Government Catholic</option>
                                        <option value="45" @if($avetmiss->companyType == "45") selected  @endif>University - Non-Government Independent</option>
                                        <option value="51" @if($avetmiss->companyType == "51") selected  @endif>Enterprise - Government</option>
                                        <option value="53" @if($avetmiss->companyType == "53") selected  @endif>Enterprise - Non-Government</option>
                                        <option value="61" @if($avetmiss->companyType == "61") selected  @endif>Community-based adult education provider</option>
                                        <option value="91" @if($avetmiss->companyType == "91") selected  @endif>Private Education/training business or centre</option>
                                        <option value="93" @if($avetmiss->companyType == "93") selected  @endif>Professional association</option>
                                        <option value="95" @if($avetmiss->companyType == "95") selected  @endif>Industry association</option>
                                        <option value="97" @if($avetmiss->companyType == "97") selected  @endif>Equipment and/or product manufacturer or supplier</option>
                                        <option value="99" @if($avetmiss->companyType == "99") selected  @endif>Other training provider - not elsewhere classified</option>
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
                                        <input type="radio" name="isManagingAgent" value="1" @if($avetmiss->isManagingAgent == 1) checked @endif
                                            onclick="jQuery('#trainingAuthority').slideDown();"> Yes&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="isManagingAgent" value="0" checked="checked" @if($avetmiss->isManagingAgent == 0) checked @endif
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
                                                    maxlength="3" value="{{ $avetmiss->authorityIdentifier}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Training Authority Name*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="authorityName" id="authorityName"
                                                    value="{{ $avetmiss->authorityName}}" class="form-control" maxlength="100">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Address First Line*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="address1" id="address1" value="{{ $avetmiss->address1}}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Address Second Line:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="address2" id="address2" value="{{ $avetmiss->address2}}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Suburb
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="suburb" id="suburb" value="{{ $avetmiss->suburb}}"
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
                                                    <option value="1" @if($avetmiss->state == "1") selected @endif>New South Wales</option>
                                                    <option value="2" @if($avetmiss->state == "2") selected @endif>Victoria</option>
                                                    <option value="3" @if($avetmiss->state == "3") selected @endif>Queensland</option>
                                                    <option value="4" @if($avetmiss->state == "4") selected @endif>South Australia</option>
                                                    <option value="5" @if($avetmiss->state == "5") selected @endif>Western Australia</option>
                                                    <option value="6" @if($avetmiss->state == "6") selected @endif>Tasmania</option>
                                                    <option value="7" @if($avetmiss->state == "7") selected @endif>Northern Territory</option>
                                                    <option value="8" @if($avetmiss->state == "8") selected @endif>Australian Capital Territory</option>
                                                    <option value="9" @if($avetmiss->state == "9") selected @endif>Other Australian Territories or Dependencies  </option>
                                                    <option value="10" @if($avetmiss->state == "10") selected @endif>Other (Overseas)</option>
                                                    <option value="12" @if($avetmiss->state == "12") selected @endif>Fee for Service</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Post Code:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="pcode" id="pcode" maxlength="4" value="{{ $avetmiss->pcode }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Contact First Name*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="tcontactf" id="tcontactf" value="{{ $avetmiss->tcontactf }}" class="form-control"  maxlength="20">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Contact Last Name*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="suburb" id="suburb" value="{{ $avetmiss->suburb }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Email Address*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="temail" id="temail" maxlength="80" value="{{ $avetmiss->temail }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Phone Number*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="tphone" id="tphone" value="{{ $avetmiss->tphone }}" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-sm-2">
                                                Fax Number*:
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="tfax" id="tfax" value="{{ $avetmiss->tfax }}" class="form-control">
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
                            {{-- //  New South Wales start --}}
                            @php
                                $avitmiss_funding_state_1 = AvitmessFunding::where('avetmiss_id',$avetmiss->id)->where('state',1)->first();
                                if($avitmiss_funding_state_1 != null){
                                        $funding = FundingState::where('state',1)->where('national_id',$avitmiss_funding_state_1->international)->get();
                                }
                           @endphp
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_1" value="1" @if($avitmiss_funding_state_1->state != null) checked @endif
                                         onclick="chkRptStClick(this);">
                                         <label for="chkRptState_1" class="form-label">New South Wales</label>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]" id="fundingSourceDescription_1" onchange="getFundingStateOptions(this,1)" @if( $avitmiss_funding_state_1->state == null) disabled @endif>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}" @if($avitmiss_funding_state_1->international == $inter->id) selected @endif>{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_1" id="fundingSourceState_1" 
                                        name="funding[state_funding][]" @if( $avitmiss_funding_state_1->state == null) disabled @endif>
                                        <option value="">Select Funding State</option>
                                        @foreach ($funding as $fund)
                                             <option value="{{$fund->id}}" @if($fund->id == $avitmiss_funding_state_1->funding_state_id) selected @endif>{{ $fund->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_1"
                                        value="{{ $avitmiss_funding_state_1->description }}" class="form-control cls_1" maxlength="10" @if( $avitmiss_funding_state_1->state == null) disabled @endif>
                                </div>
                            </div>
                            {{-- //  New South Wales end --}}
                            {{-- //  Victoria start --}}
                            @php
                                    $avitmiss_funding_state_2 = AvitmessFunding::where('avetmiss_id',$avetmiss->id)->where('state',2)->first();
                                    if($avitmiss_funding_state_2 != null){
                                        $funding = FundingState::where('state',2)->where('national_id',$avitmiss_funding_state_2->international)->get();
                                    }
                            @endphp
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_2" value="2" onclick="chkRptStClick(this);" @if(isset($avitmiss_funding_state_2->state) != null) checked @endif>
                                         <label for="chkRptState_2" class="form-label">Victoria</label>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]"
                                        id="fundingSourceDescription_2" onchange="getFundingStateOptions(this,2)" @if(isset($avitmiss_funding_state_2->state) == null) disabled @endif>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}" @if($avitmiss_funding_state_2 != null) @if($avitmiss_funding_state_2->international == $inter->id) selected @endif @endif>{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_2" id="fundingSourceState_2"
                                        name="funding[state_funding][]" @if(isset($avitmiss_funding_state_2->state) == null) disabled @endif>
                                        <option value="">Select Funding State</option>
                                        @foreach ($funding as $fund)
                                             <option value="{{$fund->id}}" @if($avitmiss_funding_state_2 != null) @if($fund->id == $avitmiss_funding_state_2->funding_state_id) selected @endif @endif>{{ $fund->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_2"
                                        value="@if($avitmiss_funding_state_2 != null) {{ $avitmiss_funding_state_2->description }} @endif" class="form-control cls_1" maxlength="10" @if( $avitmiss_funding_state_2->state == null) disabled @endif>
                                </div>
                            </div>
                            {{-- //  Victoria end --}}
                            {{-- //  Queensland start --}}
                            @php
                            $avitmiss_funding_state_3 = AvitmessFunding::where('avetmiss_id',$avetmiss->id)->where('state',3)->first();
                                    if($avitmiss_funding_state_3 != null){
                                    $funding = FundingState::where('state',3)->where('national_id',$avitmiss_funding_state_3->international)->get();
                            }
                            @endphp
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_3" value="3" onclick="chkRptStClick(this);" @if(isset($avitmiss_funding_state_3->state) != null) checked @endif>
                                        <label for="chkRptState_3" class="form-label">Queensland</label>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]" id="fundingSourceDescription_3" onchange="getFundingStateOptions(this,3)" @if(isset($avitmiss_funding_state_3->state) == null) disabled @endif>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}" @if($avitmiss_funding_state_3 != null) @if($avitmiss_funding_state_3->international == $inter->id) selected @endif @endif>{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_3" id="fundingSourceState_3"  name="unding[state_funding][]" disabled>
                                        @foreach ($funding as $fund)
                                             <option value="{{$fund->id}}" @if($avitmiss_funding_state_3 != null) @if($fund->id == $avitmiss_funding_state_3->funding_state_id) selected @endif @endif>{{ $fund->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- @dd($avitmiss_funding_state_3) --}}
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_3" value="@if($avitmiss_funding_state_3 != null) {{ $avitmiss_funding_state_3->description }} @endif" class="form-control cls_1" maxlength="10" @if( $avitmiss_funding_state_3 == null) disabled @endif>
                                </div>
                            </div>
                            {{-- //  Queensland end --}}
                            {{-- //   South Australia start --}}
                            @php
                            $avitmiss_funding_state_4 = AvitmessFunding::where('avetmiss_id',$avetmiss->id)->where('state',4)->first();
                                    if($avitmiss_funding_state_4 != null){
                                    $funding = FundingState::where('state',4)->where('national_id',$avitmiss_funding_state_4->international)->get();
                            }
                            @endphp
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_4" value="4" onclick="chkRptStClick(this);">
                                    <label for="chkRptState_4" class="form-label">South Australia</label>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]" id="fundingSourceDescription_4" onchange="getFundingStateOptions(this,4)" disabled>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}">{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_4" id="fundingSourceState_4"
                                        name="funding[state_funding][]" disabled>
                                        <option value=""> </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_4"
                                        value="" class="form-control cls_4" maxlength="10" disabled>
                                </div>
                            </div>
                            {{-- //   South Australia end --}}
                            {{-- //   Western Australia start --}}

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_5" value="5" onclick="chkRptStClick(this);"> 
                                    <label for="chkRptState_5" class="form-label"> Western Australia</label> 
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]" id="fundingSourceDescription_5" onchange="getFundingStateOptions(this,5)" disabled>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}">{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_5" id="fundingSourceState_5"
                                        name="funding[state_funding][]" disabled>
                                        <option value=""> </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_5"
                                        value="" class="form-control cls_5" maxlength="10" disabled>
                                </div>
                            </div>
                            {{-- //   Western Australia end --}}
                            {{-- //   Tasmania start --}}
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_6" value="6"  onchange="getFundingStateOptions(this,6)">
                                    <label for="chkRptState_6" class="form-label">Tasmania</label> 
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]"
                                        id="fundingSourceDescription_6" disabled
                                        onchange="getFundingStateOptions()" >
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}">{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_6" id="fundingSourceState_6"
                                        name="funding[state_funding][]" disabled>
                                        <option value=""> </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_6"
                                        value="" class="form-control cls_6" maxlength="10" disabled>
                                </div>
                            </div>
                            {{-- //   Tasmania end --}}
                            {{-- //    Northern Territory start --}}

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_7" value="7" onclick="chkRptStClick(this);">
                                    <label for="chkRptState_7" class="form-label">  Northern Territory</label>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]"
                                        id="fundingSourceDescription_7" onchange="getFundingStateOptions(this,7)" disabled>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}">{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_7" id="fundingSourceState_7"
                                        name="funding[state_funding][]" disabled>
                                        <option value=""> </option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_7"
                                        value="" class="form-control cls_7" maxlength="10" disabled>
                                </div>
                            </div>
                            {{-- //    Northern Territory end --}}
                            {{-- //    Australian Capital Territory start --}}

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_8" value="8" onclick="chkRptStClick(this);">
                                    Australian Capital Territory
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]"
                                        id="fundingSourceDescription_8" onchange="getFundingStateOptions(this,8)"  disabled>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}">{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_7" id="fundingSourceState_8" name="funding[state_funding][]" disabled>
                                      
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_8" disabled
                                        value="" class="form-control cls_7" maxlength="10">
                                </div>
                            </div>
                            {{-- //  Australian Capital Territory end --}}
                            {{-- //  Other Australian Territories or Dependencies start --}}
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_9" value="9" onclick="chkRptStClick(this);">
                                    Other Australian Territories or Dependencies
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]"
                                        id="fundingSourceDescription_9" onchange="getFundingStateOptions(this,9)" disabled>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}">{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_7" id="fundingSourceState_9" name="funding[state_funding][]" disabled>
                                    
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_9" disabled
                                        value="" class="form-control cls_7" maxlength="10">
                                </div>
                            </div>
                            {{-- //  Other Australian Territories or Dependencies end --}}
                            {{-- //  Other (Overseas) start --}}

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_10" value="10" disabled
                                        onclick="chkRptStClick(this);">
                                    Other (Overseas)
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]"
                                        id="fundingSourceDescription_10" onchange="getFundingStateOptions(this,10)" disabled>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}">{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_10" id="fundingSourceState_10" name="funding[state_funding][]" disabled>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_10"
                                        value="" class="form-control cls_10" maxlength="10" disabled>
                                </div>
                            </div>
                            {{-- //  Other (Overseas) end --}}
                            {{-- //  Fee for Service start --}}

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <input type="checkbox" name="funding[state][]" id="chkRptState_11" value="11" onclick="chkRptStClick(this);">
                                    Fee for Service
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control w-100" name="funding[international][]"
                                        id="fundingSourceDescription_11" onchange="getFundingStateOptions(this,11)" disabled>
                                        @foreach ($interntional as $inter)
                                        <option value="{{ $inter->id }}">{{ $inter->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control cls_11" id="fundingSourceState_11" name="funding[state_funding][]" disabled>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="funding[description][]" id="statecompanyIdentifier_11" disabled
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function getFundingStateOptions(element,state){
       var national =  $(element).val(); // Logs the selected value of the dropdown
       var state =  state; // Logs the selected value of the dropdown
       $.ajax({
                    url: "{{ route('avitmiss.funding.find') }}",
                    type: 'GET',
                    data: {
                        national: national,
                        state: state,
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        $('#fundingSourceState_'+state).empty();
                      var fundingSourceSelect = $('#fundingSourceState_'+state);
                      fundingSourceSelect.append('<option value="">Select Funding</option>')
                      $.each(response.fundingSource, function(index, fundingSource) {
                        fundingSourceSelect.append($('<option>', {
                            value: fundingSource.id, // Set the value of the option
                            text: fundingSource.name // Set the text of the option
                        }));
                    });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
    }
</script>
@endpush
