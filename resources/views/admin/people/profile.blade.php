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

        .profile-pic {
            color: transparent;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            transition: all 0.3s ease;
        }

        .profile-pic input {
            display: none;
        }

        .profile-pic img {
            position: absolute;
            object-fit: cover;
            width: 165px;
            height: 165px;
            box-shadow: 0 0 10px 0 rgba(255, 255, 255, .35);
            border-radius: 100px;
            z-index: 0;
            border: 2px solid #000;
            padding: 15px;
        }

        .profile-pic .-label {
            cursor: pointer;
            height: 165px;
            width: 165px;
        }

        .profile-pic:hover .-label {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, .8);
            z-index: 10000;
            color: #fafafa;
            transition: background-color 0.2s ease-in-out;
            border-radius: 100px;
            margin-bottom: 0;
        }

        .profile-pic span {
            display: inline-flex;
            padding: 0.2em;
            height: 2em;
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
    {{-- @dd($student) --}}
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 d-flex align-items-center justify-content-center">
                        <div>
                            <h4 class="card-title">People List</h4>
                        </div>
                    </div>
                </div>
                <div class="profile">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="profile-pic">
                                <label class="-label" for="file">
                                    <span class="glyphicon glyphicon-camera"></span>
                                    <span>Change Image</span>
                                </label>
                                <input id="file" type="file" onchange="loadFile(event)" />
                                @if ($student->image != null)
                                    <img src="{{ asset($student->image) }}" id="output" width="200" />
                                @else
                                    <img src="{{ asset('admin/images/avatar/person.png') }}" id="output"
                                        width="200" />
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-2 d-flex align-items-center">
                            <span style="font-size: 20px;font-weight: 700;">{{ $student->firstName }}
                                {{ $student->lastName }}</span>
                        </div>
                        <div class="col-sm-10">

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <span style="font-size:25px;font-weight:700; ">Contact Information</span>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group d-flex justify-content-end" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#sendsurvey">
                                    Send Survey
                                </button>  
                                {{-- <button type="button" class="btn btn-primary ms-3"></button> --}}
                                <button type="button" class="btn btn-primary ms-3">Send Email</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#sendsms">
                                    Send SMS
                                </button>
                                <form action="{{ route('people.destroy', $student->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ms-3" >Delete</button>
                                </form>
                                {{-- <button type="button" class="btn btn-danger ms-3">Delete</button> --}}
                            </div>
                        </div>
                    </div>
                    <style>
                        .visible {
                            display: block;
                        }

                        .hidden {
                            display: none;
                        }
                    </style>
                    <div class="row mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Personal
                                    Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile"
                                    aria-selected="false">Documents</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="language-tab" data-bs-toggle="tab" data-bs-target="#language"
                                    type="button" role="tab" aria-controls="language" aria-selected="false">Language
                                    and Diversity</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="disability-tab" data-bs-toggle="tab"
                                    data-bs-target="#disability" type="button" role="tab" aria-controls="disability"
                                    aria-selected="false">Disability
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="schooling-tab" data-bs-toggle="tab" data-bs-target="#schooling"
                                    type="button" role="tab" aria-controls="schooling"
                                    aria-selected="false">Schooling</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="qualifications-tab" data-bs-toggle="tab"
                                    data-bs-target="#qualifications" type="button" role="tab"
                                    aria-controls="qualifications" aria-selected="false">Qualifications</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="employment-tab" data-bs-toggle="tab"
                                    data-bs-target="#employment" type="button" role="tab"
                                    aria-controls="employment" aria-selected="false">Employment</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row" id="details">
                                    <div class="col-sm-6">
                                        <h6 class="mt-3">Basic Information</h6>
                                        @if($student->title != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Title</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->title}}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->entryDate != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Entry Date</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->entryDate}}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->entryDate != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Name</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->first_name}} {{$student->middle_name }} {{ $student->last_name }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->entryDate != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Date of Birth</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->birth}}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->entryDate != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Gender</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->gender}}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->entryDate != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Employee Number</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->employeeNumber}}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->entryDate != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Employee Number</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->employeeNumber}}</p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                  
                                    <div class="col-sm-6">
                                        <h6>Contact Information</h6>
                                        @if($student->entryDate != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Mobile</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->contact_no}}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->businessNumber != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Business Phone</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->businessNumber }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->homeNumber != null)
                                        <h6>More Information</h6>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Home Phone</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->homeNumber }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->fax != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Fax
                                                </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->fax }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->email != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Email 1</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->email }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->email != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Email 2</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->studentEmail2 }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->studentEmail3 != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Email 3</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->studentEmail3 }}</p>
                                            </div>
                                        </div>
                                        @endif
                                    
                                </div>
                                <div class="col-sm-6">
                                    <h6>Usual Residence</h6>
                                    @if($student->buildingName != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Building / Property Name</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->buildingName }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->fax != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Flat / Unit Details</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->fax }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->streetNumber != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Street Number</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->streetNumber }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->streetName != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Street Name</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->streetName }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->postalCode_postal != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Post Code</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->postalCode_postal }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->suburb != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Suburb</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->suburb }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->country != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">Country </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->country }}</p>
                                            </div>
                                        </div>
                                        @endif
                                        @if($student->state != null)
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="">State</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <p>{{ $student->state }}</p>
                                            </div>
                                        </div>
                                        @endif
                                </div>
                                <div class="col-sm-6">
                                    <h6>More Information</h6>
                                    @if($student->isLearner != null)
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Is Learner</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>{{ $student->isLearner }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($student->isContact != null)
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Is Contact</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>{{ $student->isContact }}</p>
                                        </div>
                                    </div>
                                    @endif

                                    @if($student->unitDetails != null)
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Unique ID</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>{{ $student->unitDetails }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($student->isLearner != null)
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Overseas Client?</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>{{ $student->isLearner }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    @if($student->isLearner != null)
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">National ID</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>{{ $student->nationalID }}</p>
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Survey contact status:</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>Available for survey use
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h6>Postal Address</h6>
                                    @if($student->isLearner != null)
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="">Building / Property Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <p>{{ $student->nationalID }}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <button id="toggleButton" class="btn btn-primary">Edit</button>
                                </div>
                                <div class="col-sm-4"></div>
                                </div>
                            
                                {{-- <div class="col-sm-4"></div> --}}
                            </div>
                                <div class="hidden" id="details-edit">
                                    <form action="{{ route('people.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="row">
                                            <div class="col-sm-6 mt-4">
                                                <h4>Basic Information</h4>
                                                <div class="form-group form-inline row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Entry Date</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="date" value="{{ $student->entryDate }}"
                                                            name="entryDate" id="entryDate"
                                                            class="input_text1 form-control wwb-datepicker hasDatepicker"
                                                            fdprocessedid="lnsu8">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Title</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12 mt-2">
                                                        <select name="title" id="title" class="form-control"
                                                            style="" onchange="changeGender(this.value)"
                                                            fdprocessedid="s4rhmq">
                                                            <option></option>
                                                            <option value="Mr"
                                                                @if ($student->title == 'Mr') selected @endif>
                                                                Mr
                                                            </option>
                                                            <option value="Mrs"
                                                                @if ($student->title == 'Mrs') selected @endif>
                                                                Mrs
                                                            </option>
                                                            <option value="Miss"
                                                                @if ($student->title == 'Miss') selected @endif>
                                                                Miss
                                                            </option>
                                                            <option value="Ms"
                                                                @if ($student->title == 'Ms') selected @endif>
                                                                Ms
                                                            </option>
                                                            <option value="Dr"
                                                                @if ($student->title == 'Dr') selected @endif>
                                                                Dr
                                                            </option>
                                                            <option value="Rev"
                                                                @if ($student->title == 'Rev') selected @endif>
                                                                Rev
                                                            </option>
                                                            <option value="Hon"
                                                                @if ($student->title == 'Hon') selected @endif>
                                                                Hon
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">First Name</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->firstName }}"
                                                            name="first" id="first"
                                                            class="input_text1 form-control" fdprocessedid="k9isym">
                                                    </div>
                                                </div>

                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Middle Name</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->middleName }}"
                                                            name="middle" id="middle"
                                                            class="input_text1 form-control" fdprocessedid="dnrtgh">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Last Name</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->lastName }}"
                                                            name="last" id="last"
                                                            class="input_text1 form-control" maxlength="100"
                                                            fdprocessedid="3u34ur">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Preferred Name</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->preferred_contact }}"
                                                            name="preferredName" id="preferredName"
                                                            class="input_text1 form-control" maxlength="100"
                                                            fdprocessedid="vdf3uv">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Certificate Name</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="dipak sharma" name="certificateName"
                                                            id="certificateName" class="input_text1 form-control"
                                                            maxlength="100" fdprocessedid="ga225p">
                                                    </div>
                                                </div>

                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Gender</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <select name="gender" id="gender" class="form-control"
                                                            fdprocessedid="w2skl8">

                                                            <option value="M"
                                                                @if ($student->gender == 'M') selected @endif>Male
                                                            </option>
                                                            <option value="F"
                                                                @if ($student->gender == 'F') selected @endif>Female
                                                            </option>
                                                            <option value="X"
                                                                @if ($student->gender == 'X') selected @endif>Other
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Date of Birth</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="date" value="{{ $student->dob }}"
                                                            name="birthDate" id="birthDate"
                                                            class="input_text1 form-control wwb-datepicker hasDatepicker"
                                                            fdprocessedid="bxugt">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Employee Number</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="number" name="employeeNumber" id="employeeNumber"
                                                            class="input_text1 form-control"
                                                            value="{{ $student->employeeNumber }}" fdprocessedid="v9wr">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Employer Group</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" name="clientCompany" id="clientCompany"
                                                            class="input_text1 form-control ui-autocomplete-input"
                                                            value="{{ $student->companyName }}" autocomplete="off"
                                                            fdprocessedid="f65ymd"><span role="status"
                                                            aria-live="polite" class="ui-helper-hidden-accessible"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">

                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12 form-inline">
                                                        <input style="width:20px !important" type="checkbox"
                                                            name="Employer_Info_Consent" id="Employer_Info_Consent"
                                                            value="1">&nbsp;<label
                                                            for="Employer_Info_Consent">Learner consents to training
                                                            activity updates being provided to the employer.</label>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Role</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->role }}"
                                                            name="role" id="role"
                                                            class="input_text1 form-control" maxlength="60"
                                                            fdprocessedid="y50jzg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-4">
                                                <h4>Contact Information</h4>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                        <label class="float-left">Mobile</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                                        <input type="number" style="margin-right:5px;"
                                                            value="{{ $student->contactNumber }}" name="mobile"
                                                            id="mobile" onkeyup="onKeyUpInput('mobile')"
                                                            class="input_text1 form-control" maxlength="20"
                                                            fdprocessedid="5priao">
                                                        {{-- <input type="radio" name="preferred" value="M" alt="Preferred Number" class="form-control" style="visibility: hidden;"> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                        <label class="float-left">Business Phone</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                                        <input type="number" style="margin-right:5px;"
                                                            value="{{ $student->businessNumber }}" name="business"
                                                            id="business" onkeyup="onKeyUpInput('business')"
                                                            class="input_text1 form-control" maxlength="20"
                                                            fdprocessedid="7rnebb">
                                                        {{-- <input type="radio" name="preferred" value="B" alt="Preferred Number" class="form-control" style="visibility: hidden;"> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                        <label class="float-left">Home Phone</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                                        <input type="number" style="margin-right:5px;"
                                                            value="{{ $student->homeNumber }}" name="home"
                                                            id="home" onkeyup="onKeyUpInput('home')"
                                                            class="input_text1 form-control" maxlength="20"
                                                            fdprocessedid="swot5">
                                                        {{-- <input type="radio" name="preferred" value="H" alt="Preferred Number" class="form-control" style="visibility: hidden;"> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                        <label class="float-left">Fax</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->fax }}"
                                                            name="faxNumber" id="faxNumber"
                                                            class="input_text1 form-control" maxlength="20"
                                                            fdprocessedid="yhv7iu">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row" id="preferredEmailTxt"
                                                    style="visibility: visible;">
                                                    <div class="col-10">
                                                        <label class="float-right"></label>
                                                    </div>
                                                    <div class="col-2">
                                                        <label class="float-left">Preferred Email</label>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row">
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                        <label class="float-left">Email 1</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->studentEmail }}"
                                                            name="Email" id="Email" onkeyup="onKeyUpInput('Email')"
                                                            class="input_text1 form-control"
                                                            fdprocessedid="r0y4cc">&nbsp;&nbsp;&nbsp;
                                                        {{-- <input type="radio" name="preferredEmail" value="1" alt="Preferred Email" class="form-control" checked="" style="visibility: visible;"> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row">
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                        <label class="float-left">Email 2</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->studentEmail2 }}"
                                                            name="Email2" id="Email2"
                                                            onkeyup="onKeyUpInput('Email2')"
                                                            class="input_text1 form-control"
                                                            fdprocessedid="iitbdk">&nbsp;&nbsp;&nbsp;
                                                        {{-- <input type="radio" name="preferredEmail" value="2" alt="Preferred Email" class="form-control" style="visibility: hidden;"> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row">
                                                    <div class="col-lg-2 col-md-2 col-sm-12 col-12">
                                                        <label class="float-left">Email 3</label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->studentEmail3 }}"
                                                            name="Email3" id="Email3"
                                                            onkeyup="onKeyUpInput('Email3')"
                                                            class="input_text1 form-control"
                                                            fdprocessedid="xz7pf4">&nbsp;&nbsp;&nbsp;
                                                        {{-- <input type="radio" name="preferredEmail" value="3" alt="Preferred Email" class="form-control" style="visibility: hidden;"> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-4">
                                                <h4>More Information</h4>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Is Learner?</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <select name="isLearner" style="" id="isLearner"
                                                            class="input_text1 form-control" fdprocessedid="5s28a">
                                                            <option value="1"
                                                                @if ($student->isLearner == '1') selected @endif>Yes
                                                            </option>
                                                            <option value="0"
                                                                @if ($student->isLearner == '0') selected @endif>No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Is Company Contact?</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <select name="isContact" style="" id="isContact"
                                                            class="input_text1 form-control" fdprocessedid="06lu2b">
                                                            <option value="1"
                                                                @if ($student->isContact == '1') selected @endif>Yes
                                                            </option>
                                                            <option value="0"
                                                                @if ($student->isContact == '0') selected @endif>No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Unique Student Identifier (case
                                                            sensitive) <i class="fa fa-info-circle ml-2"
                                                                aria-hidden="true" id="avetUniqueStudentIdentifier"
                                                                title="An alpha-numeric code unique to each new and continuing student undertaking nationally recognised VET courses."></i></label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text"
                                                            value="{{ $student->uniqueStudentIdentifier }}"
                                                            name="uniqueStudentIdentifier" id="uniqueStudentIdentifier"
                                                            class="input_text1 form-control" maxlength="10"
                                                            fdprocessedid="zk5gvl">
                                                        {{-- <a href="../usi/createUSI.php" target="_blank"><i title="Create USI" class="fa fa-plus-circle fa-2x mr-2 text-info" aria-hidden="true"></i></a>                     --}}

                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Name Type For USI Validation</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <select name="nameType"
                                                            value="{{ $student->uniqueStudentIdentifier }}"
                                                            id="nameType" class="input_text1 form-control"
                                                            fdprocessedid="dceobl">
                                                            <option value="1"
                                                                @if ($student->nameType) selected @endif>Use
                                                                First Name &amp; Last Name</option>
                                                            <option value="2"
                                                                @if ($student->nameType) selected @endif>Use
                                                                Single Name (Last Name)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Overseas Client?</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <select name="isInternational" id="isInternational"
                                                            class="input_text1 form-control" fdprocessedid="7ex0wuh">
                                                            <option value="Y"
                                                                @if ($student->isInternational == 'Y') selected @endif>
                                                                Yes
                                                            </option>
                                                            <option value="N"
                                                                @if ($student->isInternational == 'N') selected @endif>
                                                                No
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">National ID</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->nationalID }}"
                                                            name="nationalID" id="nationalID"
                                                            class="input_text1 form-control" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Survey contact status: </label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <select name="surveyStat" id="surveyStat" style=";"
                                                            class="form-control" fdprocessedid="vx9cj">
                                                            <option
                                                                value="A"@if ($student->surveyStat == 'A') selected @endif>
                                                                Available for survey use</option>
                                                            <option
                                                                value="C"@if ($student->surveyStat == 'C') selected @endif>
                                                                Correctional facility(addressor enrolment)</option>
                                                            <option
                                                                value="D"@if ($student->surveyStat == 'D') selected @endif>
                                                                Deceased student</option>
                                                            <option
                                                                value="E"@if ($student->surveyStat == 'E') selected @endif>
                                                                Excluded</option>
                                                            <option
                                                                value="I"@if ($student->surveyStat == 'I') selected @endif>
                                                                Invalid address/itinerant student</option>
                                                            <option
                                                                value="M"@if ($student->surveyStat == 'M') selected @endif>
                                                                Minor-under age of 15</option>
                                                            <option
                                                                value="O"@if ($student->surveyStat == 'O') selected @endif>
                                                                Overseas</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6 mt-4">
                                                <h4>Usual Residence</h4>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Building / Property Name</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->buildingName }}"
                                                            name="buildingName" id="buildingName"
                                                            class="input_text1 form-control" maxlength="30"
                                                            fdprocessedid="5hr75">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Flat / Unit Details</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->unitDetails }}"
                                                            name="unitDetails" id="unitDetails"
                                                            class="input_text1 form-control" maxlength="30"
                                                            fdprocessedid="l497mo">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Street Number</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->streetNumber }}"
                                                            name="streetNumber" id="streetNumber"
                                                            class="input_text1 form-control" maxlength="30"
                                                            fdprocessedid="mc9bgb">
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Street Name</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{$student->buildingName_postal}}" name="streetName" id="streetName" class="input_text1 form-control" maxlength="30" fdprocessedid="rz68j9">
                                                    </div>
                                                </div> --}}
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Suburb</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->suburb }}"
                                                            name="suburb" id="suburb"
                                                            class="input_text1 form-control" maxlength="30"
                                                            fdprocessedid="ubjtm">
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Country</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <select name="country" id="country"
                                                            class="input_text_1 form-control" fdprocessedid="triy5d">
                                                            <option value="xx"></option> <!-- bug 4176 -->
                                                            <option value="Adelie Land (France)"
                                                                @if ($student->country == 'Adelie Land (France)') selected @endif>Adelie
                                                                Land (France)</option>
                                                            <option value="Afghanistan"
                                                                @if ($student->country == 'Afghanistan') selected @endif>
                                                                Afghanistan</option>
                                                            <option value="Africa, nfd"
                                                                @if ($student->country == 'Africa, nfd') selected @endif>Africa,
                                                                nfd</option>
                                                            <option value="Aland Islands"
                                                                @if ($student->country == 'Aland Islands') selected @endif>Aland
                                                                Islands</option>
                                                            <option value="Albania"
                                                                @if ($student->country == 'Albania') selected @endif>Albania
                                                            </option>
                                                            <option value="Algeria"
                                                                @if ($student->country == 'Algeria') selected @endif>Algeria
                                                            </option>
                                                            <option value="Americas"
                                                                @if ($student->country == 'Americas') selected @endif>Americas
                                                            </option>
                                                            <option value="Andorra"
                                                                @if ($student->country == 'Andorra') selected @endif>Andorra
                                                            </option>
                                                            <option value="Angola"
                                                                @if ($student->country == 'Angola') selected @endif>Angola
                                                            </option>
                                                            <option value="Anguilla"
                                                                @if ($student->country == 'Anguilla') selected @endif>Anguilla
                                                            </option>
                                                            <option value="Antarctica"
                                                                @if ($student->country == 'Antarctica') selected @endif>
                                                                Antarctica</option>
                                                            <option value="Antigua and Barbuda"
                                                                @if ($student->country == 'Antigua and Barbuda') selected @endif>Antigua
                                                                and Barbuda</option>
                                                            <option value="Argentina"
                                                                @if ($student->country == 'Argentina') selected @endif>
                                                                Argentina</option>
                                                            <option value="Argentinian Antarctic Territory"
                                                                @if ($student->country == 'Argentinian Antarctic Territory') selected @endif>
                                                                Argentinian Antarctic Territory</option>
                                                            <option value="Armenia"
                                                                @if ($student->country == 'Armenia') selected @endif>Armenia
                                                            </option>
                                                            <option value="Aruba"
                                                                @if ($student->country == 'Aruba') selected @endif>Aruba
                                                            </option>
                                                            <option value="Asia, nfd"
                                                                @if ($student->country == 'Asia, nfd') selected @endif>Asia,
                                                                nfd</option>
                                                            <option value="At Sea"
                                                                @if ($student->country == 'Australia') selected @endif> Sea
                                                            </option>
                                                            <option value="Australia"
                                                                @if ($student->country == '') selected @endif>
                                                                Australia</option>
                                                            <option value="Australia (includes External Territories)"
                                                                @if ($student->country == 'Australia (includes External Territories)') selected @endif>
                                                                Australia (includes External Territories)</option>
                                                            <option value="Australian Antarctic Territory"
                                                                @if ($student->country == 'Australian Antarctic Territory') selected @endif>
                                                                Australian Antarctic Territory</option>
                                                            <option value="Australian External Territories, nec"
                                                                @if ($student->country == 'Australian External Territories, nec') selected @endif>
                                                                Australian External Territories, nec</option>
                                                            <option value="Austria"
                                                                @if ($student->country == 'Austria') selected @endif>Austria
                                                            </option>
                                                            <option value="Azerbaijan"
                                                                @if ($student->country == 'Azerbaijan') selected @endif>
                                                                Azerbaijan</option>
                                                            <option value="Bahamas"
                                                                @if ($student->country == 'Bahamas') selected @endif>Bahamas
                                                            </option>
                                                            <option value="Bahrain"
                                                                @if ($student->country == 'Bahrain') selected @endif>Bahrain
                                                            </option>
                                                            <option value="Bangladesh"
                                                                @if ($student->country == 'Bangladesh') selected @endif>
                                                                Bangladesh</option>
                                                            <option value="Barbados"
                                                                @if ($student->country == 'Barbados') selected @endif>Barbados
                                                            </option>
                                                            <option value="Belarus"
                                                                @if ($student->country == 'Belarus') selected @endif>Belarus
                                                            </option>
                                                            <option value="Belgium"
                                                                @if ($student->country == 'Belgium') selected @endif>Belgium
                                                            </option>
                                                            <option value="Belize"
                                                                @if ($student->country == 'Belize') selected @endif>Belize
                                                            </option>
                                                            <option value="Benin"
                                                                @if ($student->country == 'Benin') selected @endif>Benin
                                                            </option>
                                                            <option value="Bermuda"
                                                                @if ($student->country == 'Bermuda') selected @endif>Bermuda
                                                            </option>
                                                            <option value="Bhutan"
                                                                @if ($student->country == 'Bhutan') selected @endif>Bhutan
                                                            </option>
                                                            <option value="Bolivia, Plurinational State of"
                                                                @if ($student->country == 'Bolivia, Plurinational State of') selected @endif>Bolivia,
                                                                Plurinational State of</option>
                                                            <option value="Bonaire, Sint Eustatius and Saba"
                                                                @if ($student->country == 'Bonaire, Sint Eustatius and Saba') selected @endif>Bonaire,
                                                                Sint Eustatius and Saba</option>
                                                            <option value="Bosnia and Herzegovina"
                                                                @if ($student->country == 'Bosnia and Herzegovina') selected @endif>Bosnia
                                                                and Herzegovina</option>
                                                            <option value="Botswana"
                                                                @if ($student->country == 'Botswana') selected @endif>Botswana
                                                            </option>
                                                            <option value="Brazil"
                                                                @if ($student->country == 'Brazil') selected @endif>Brazil
                                                            </option>
                                                            <option value="British Antarctic Territory"
                                                                @if ($student->country == 'British Antarctic Territory') selected @endif>British
                                                                Antarctic Territory</option>
                                                            <option value="Brunei Darussalam"
                                                                @if ($student->country == 'Brunei Darussalam') selected @endif>Brunei
                                                                Darussalam</option>
                                                            <option value="Bulgaria"
                                                                @if ($student->country == 'Bulgaria') selected @endif>Bulgaria
                                                            </option>
                                                            <option value="Burkina Faso"
                                                                @if ($student->country == 'Burkina Faso') selected @endif>Burkina
                                                                Faso</option>
                                                            <option value="Burma (Republic of the Union of Myanmar)"
                                                                @if ($student->country == 'Burma (Republic of the Union of Myanmar)') selected @endif>Burma
                                                                (Republic of the Union of Myanmar)</option>
                                                            <option value="Burundi"
                                                                @if ($student->country == 'Burundi') selected @endif>Burundi
                                                            </option>
                                                            <option value="Cambodia"
                                                                @if ($student->country == 'Cambodia') selected @endif>Cambodia
                                                            </option>
                                                            <option value="Cameroon"
                                                                @if ($student->country == 'Cameroon') selected @endif>Cameroon
                                                            </option>
                                                            <option value="Canada"
                                                                @if ($student->country == 'Canada') selected @endif>Canada
                                                            </option>
                                                            <option value="Cape Verde"
                                                                @if ($student->country == 'Cape Verde') selected @endif>Cape
                                                                Verde</option>
                                                            <option value="Caribbean"
                                                                @if ($student->country == 'Caribbean') selected @endif>
                                                                Caribbean</option>
                                                            <option value="Cayman Islands"
                                                                @if ($student->country == 'Cayman Islands') selected @endif>Cayman
                                                                Islands</option>
                                                            <option value="Central African Republic"
                                                                @if ($student->country == 'Central African Republic') selected @endif>Central
                                                                African Republic</option>
                                                            <option value="Central America"
                                                                @if ($student->country == 'Central America') selected @endif>Central
                                                                America</option>
                                                            <option value="Central and West Africa"
                                                                @if ($student->country == 'Central and West Africa') selected @endif>Central
                                                                and West Africa</option>
                                                            <option value="Central Asia"
                                                                @if ($student->country == 'Central Asia') selected @endif>Central
                                                                Asia</option>
                                                            <option value="Chad"
                                                                @if ($student->country == 'Chad') selected @endif>Chad
                                                            </option>
                                                            <option value="Chile"
                                                                @if ($student->country == 'Chile') selected @endif>Chile
                                                            </option>
                                                            <option value="Chilean Antarctic Territory"
                                                                @if ($student->country == 'Chilean Antarctic Territory') selected @endif>Chilean
                                                                Antarctic Territory</option>
                                                            <option value="China (excludes SARs and Taiwan)"
                                                                @if ($student->country == 'China (excludes SARs and Taiwan)') selected @endif>China
                                                                (excludes SARs and Taiwan)</option>
                                                            <option value="Chinese Asia (includes Mongolia)"
                                                                @if ($student->country == 'Chinese Asia (includes Mongolia)') selected @endif>Chinese
                                                                Asia (includes Mongolia)</option>
                                                            <option value="Colombia"
                                                                @if ($student->country == 'Colombia') selected @endif>Colombia
                                                            </option>
                                                            <option value="Comoros"
                                                                @if ($student->country == 'Comoros') selected @endif>Comoros
                                                            </option>
                                                            <option value="Congo, Democratic Republic of"
                                                                @if ($student->country == 'Congo, Democratic Republic of') selected @endif>Congo,
                                                                Democratic Republic of</option>
                                                            <option value="Congo, Republic of "
                                                                @if ($student->country == 'Congo, Republic of ') selected @endif>Congo,
                                                                Republic of </option>
                                                            <option value="Cook Islands"
                                                                @if ($student->country == '') selected @endif>Cook
                                                                Islands</option>
                                                            <option value="Costa Rica"
                                                                @if ($student->country == '') selected @endif>Costa
                                                                Rica</option>
                                                            <option value="Cote d'ivoire"
                                                                @if ($student->country == "Cote d'ivoire") selected @endif>Cote
                                                                d'Ivoire</option>
                                                            <option
                                                                value="Croatia"@if ($student->country == 'Croatia') selected @endif>
                                                                Croatia</option>
                                                            <option
                                                                value="Cuba"@if ($student->country == 'Cuba') selected @endif>
                                                                Cuba</option>
                                                            <option
                                                                value="Curacao"@if ($student->country == 'Curacao') selected @endif>
                                                                Curacao</option>
                                                            <option
                                                                value="Cyprus"@if ($student->country == 'Cyprus') selected @endif>
                                                                Cyprus</option>
                                                            <option
                                                                value="Czech Republic"@if ($student->country == 'Czech Republic') selected @endif>
                                                                Czech Republic</option>
                                                            <option
                                                                value="Denmark"@if ($student->country == 'Denmark') selected @endif>
                                                                Denmark</option>
                                                            <option
                                                                value="Djibouti"@if ($student->country == 'Djibouti') selected @endif>
                                                                Djibouti</option>
                                                            <option
                                                                value="Dominica"@if ($student->country == 'Dominica') selected @endif>
                                                                Dominica</option>
                                                            <option
                                                                value="Dominican Republic"@if ($student->country == 'East Asia, nfd') selected @endif>
                                                                Dominican Republic</option>
                                                            <option
                                                                value="East Asia, nfd"@if ($student->country == '') selected @endif>
                                                                East Asia, nfd</option>
                                                            <option
                                                                value="Eastern Europe"@if ($student->country == 'Eastern Europe') selected @endif>
                                                                Eastern Europe</option>
                                                            <option
                                                                value="Ecuador"@if ($student->country == 'Ecuador') selected @endif>
                                                                Ecuador</option>
                                                            <option
                                                                value="Egypt"@if ($student->country == 'Egypt') selected @endif>
                                                                Egypt</option>
                                                            <option
                                                                value="El Salvador"@if ($student->country == 'El Salvador') selected @endif>
                                                                El Salvador</option>
                                                            <option
                                                                value="England"@if ($student->country == 'England') selected @endif>
                                                                England</option>
                                                            <option
                                                                value="Equatorial Guinea"@if ($student->country == 'Equatorial Guinea') selected @endif>
                                                                Equatorial Guinea</option>
                                                            <option
                                                                value="Eritrea"@if ($student->country == 'Eritrea') selected @endif>
                                                                Eritrea</option>
                                                            <option
                                                                value="Estonia"@if ($student->country == 'Estonia') selected @endif>
                                                                Estonia</option>
                                                            <option
                                                                value="Ethiopia"@if ($student->country == 'Ethiopia') selected @endif>
                                                                Ethiopia</option>
                                                            <option
                                                                value="Europe, nfd"@if ($student->country == 'Europe, nfd') selected @endif>
                                                                Europe, nfd</option>
                                                            <option
                                                                value="Falkland Islands"@if ($student->country == 'Falkland Islands') selected @endif>
                                                                Falkland Islands</option>
                                                            <option
                                                                value="Faroe Islands"@if ($student->country == 'Faroe Islands') selected @endif>
                                                                Faroe Islands</option>
                                                            <option
                                                                value="Fiji"@if ($student->country == 'Fiji') selected @endif>
                                                                Fiji</option>
                                                            <option
                                                                value="Finland"@if ($student->country == 'Finland') selected @endif>
                                                                Finland</option>
                                                            <option
                                                                value="Former USSR, nfd"@if ($student->country == 'Former USSR, nfd') selected @endif>
                                                                Former USSR, nfd</option>
                                                            <option value="Former Yugoslav Republic of Macedonia (FYROM)"
                                                                @if ($student->country == 'Former Yugoslav Republic of Macedonia (FYROM)') selected @endif>Former
                                                                Yugoslav Republic of Macedonia (FYROM)</option>
                                                            <option value="France"
                                                                @if ($student->country == 'France') selected @endif>France
                                                            </option>
                                                            <option value="French Guiana"
                                                                @if ($student->country == 'French Guiana') selected @endif>French
                                                                Guiana</option>
                                                            <option value="French Polynesia"
                                                                @if ($student->country == 'French Polynesia') selected @endif>French
                                                                Polynesia</option>
                                                            <option value="Gabon"
                                                                @if ($student->country == 'Gabon') selected @endif>Gabon
                                                            </option>
                                                            <option value="Gambia"
                                                                @if ($student->country == 'Gambia') selected @endif>Gambia
                                                            </option>
                                                            <option value="Gaza Strip and West Bank"
                                                                @if ($student->country == 'Gaza Strip and West Bank') selected @endif>Gaza
                                                                Strip and West Bank</option>
                                                            <option value="Georgia"
                                                                @if ($student->country == 'Georgia') selected @endif>
                                                                Georgia</option>
                                                            <option value="Germany"
                                                                @if ($student->country == 'Germany') selected @endif>
                                                                Germany</option>
                                                            <option value="Ghana"
                                                                @if ($student->country == 'Ghana') selected @endif>Ghana
                                                            </option>
                                                            <option value="Gibraltar"
                                                                @if ($student->country == 'Gibraltar') selected @endif>
                                                                Gibraltar</option>
                                                            <option value="Greece"
                                                                @if ($student->country == 'Greece') selected @endif>Greece
                                                            </option>
                                                            <option value="Greenland"
                                                                @if ($student->country == 'Greenland') selected @endif>
                                                                Greenland</option>
                                                            <option value="Grenada"
                                                                @if ($student->country == 'Grenada') selected @endif>
                                                                Grenada</option>
                                                            <option value="Guadeloupe"
                                                                @if ($student->country == 'Guadeloupe') selected @endif>
                                                                Guadeloupe</option>
                                                            <option value="Guam"
                                                                @if ($student->country == 'Guam') selected @endif>Guam
                                                            </option>
                                                            <option value="Guatemala"
                                                                @if ($student->country == 'Guatemala') selected @endif>
                                                                Guatemala</option>
                                                            <option value="Guernsey"
                                                                @if ($student->country == 'Guernsey') selected @endif>
                                                                Guernsey</option>
                                                            <option value="Guinea"
                                                                @if ($student->country == 'Guinea') selected @endif>Guinea
                                                            </option>
                                                            <option value="Guinea-Bissau"
                                                                @if ($student->country == 'Guinea-Bissau') selected @endif>
                                                                Guinea-Bissau</option>
                                                            <option value="Guyana"
                                                                @if ($student->country == 'Guyana') selected @endif>Guyana
                                                            </option>
                                                            <option value="Haiti"
                                                                @if ($student->country == 'Haiti') selected @endif>Haiti
                                                            </option>
                                                            <option value="Holy See"
                                                                @if ($student->country == 'Holy See') selected @endif>Holy
                                                                See</option>
                                                            <option value="Honduras"
                                                                @if ($student->country == 'Honduras') selected @endif>
                                                                Honduras</option>
                                                            <option value="Hong Kong (SAR of China)"
                                                                @if ($student->country == 'Hong Kong (SAR of China)') selected @endif>Hong
                                                                Kong (SAR of China)</option>
                                                            <option value="Hungary"
                                                                @if ($student->country == 'Hungary') selected @endif>
                                                                Hungary</option>
                                                            <option value="Iceland"
                                                                @if ($student->country == 'Iceland') selected @endif>
                                                                Iceland</option>
                                                            <option value="Inadequately Described"
                                                                @if ($student->country == 'Inadequately Described') selected @endif>
                                                                Inadequately Described</option>
                                                            <option value="India"
                                                                @if ($student->country == 'India') selected @endif>India
                                                            </option>
                                                            <option value="Indonesia"
                                                                @if ($student->country == 'Indonesia') selected @endif>
                                                                Indonesia</option>
                                                            <option value="Iran"
                                                                @if ($student->country == 'Iran') selected @endif>Iran
                                                            </option>
                                                            <option value="Iraq"
                                                                @if ($student->country == 'Iraq') selected @endif>Iraq
                                                            </option>
                                                            <option value="Ireland"
                                                                @if ($student->country == 'Ireland') selected @endif>
                                                                Ireland</option>
                                                            <option value="Isle of Man"
                                                                @if ($student->country == 'Isle of Man') selected @endif>Isle
                                                                of Man</option>
                                                            <option value="Israel"
                                                                @if ($student->country == 'Israel') selected @endif>Israel
                                                            </option>
                                                            <option value="Italy"
                                                                @if ($student->country == 'Italy') selected @endif>Italy
                                                            </option>
                                                            <option value="Jamaica"
                                                                @if ($student->country == 'Jamaica') selected @endif>
                                                                Jamaica</option>
                                                            <option value="Japan"
                                                                @if ($student->country == 'Japan') selected @endif>Japan
                                                            </option>
                                                            <option value="Japan and the Koreas"
                                                                @if ($student->country == 'Japan and the Koreas') selected @endif>Japan
                                                                and the Koreas</option>
                                                            <option value="Jersey"
                                                                @if ($student->country == 'Jersey') selected @endif>Jersey
                                                            </option>
                                                            <option value="Jordan"
                                                                @if ($student->country == 'Jordan') selected @endif>Jordan
                                                            </option>
                                                            <option value="Kazakhstan"
                                                                @if ($student->country == 'Kazakhstan') selected @endif>
                                                                Kazakhstan</option>
                                                            <option value="Kenya"
                                                                @if ($student->country == 'Kenya') selected @endif>Kenya
                                                            </option>
                                                            <option value="Kiribati"
                                                                @if ($student->country == 'Kiribati') selected @endif>
                                                                Kiribati</option>
                                                            <option value="Korea, Democratic People"
                                                                @if ($student->country == 'Korea, Democratic People') selected @endif>Korea,
                                                                Democratic People's Republic of (North)</option>
                                                            <option value="Korea, Republic of (South)"
                                                                @if ($student->country == 'Korea, Republic of (South)') selected @endif>Korea,
                                                                Republic of (South)</option>
                                                            <option value="Kosovo"
                                                                @if ($student->country == 'Kosovo') selected @endif>Kosovo
                                                            </option>
                                                            <option value="Kurdistan, nfd"
                                                                @if ($student->country == 'Kurdistan, nfd') selected @endif>
                                                                Kurdistan, nfd</option>
                                                            <option value="Kuwait"
                                                                @if ($student->country == 'Kuwait') selected @endif>Kuwait
                                                            </option>
                                                            <option value="Kyrgyzstan"
                                                                @if ($student->country == 'Kyrgyzstan') selected @endif>
                                                                Kyrgyzstan</option>
                                                            <option value="Laos"
                                                                @if ($student->country == 'Laos') selected @endif>Laos
                                                            </option>
                                                            <option value="Latvia"
                                                                @if ($student->country == 'Latvia') selected @endif>Latvia
                                                            </option>
                                                            <option value="Lebanon"
                                                                @if ($student->country == 'Lebanon') selected @endif>
                                                                Lebanon</option>
                                                            <option value="Lesotho"
                                                                @if ($student->country == 'Lesotho') selected @endif>
                                                                Lesotho</option>
                                                            <option value="Liberia"
                                                                @if ($student->country == 'Liberia') selected @endif>
                                                                Liberia</option>
                                                            <option value="Libya"
                                                                @if ($student->country == 'Libya') selected @endif>Libya
                                                            </option>
                                                            <option value="Liechtenstein"
                                                                @if ($student->country == 'Liechtenstein') selected @endif>
                                                                Liechtenstein</option>
                                                            <option value="Lithuania"
                                                                @if ($student->country == 'Lithuania') selected @endif>
                                                                Lithuania</option>
                                                            <option value="Luxembourg"
                                                                @if ($student->country == 'Luxembourg') selected @endif>
                                                                Luxembourg</option>
                                                            <option value="Macau (SAR of China)"
                                                                @if ($student->country == 'Macau (SAR of China)') selected @endif>Macau
                                                                (SAR of China)</option>
                                                            <option value="Madagascar"
                                                                @if ($student->country == 'Madagascar') selected @endif>
                                                                Madagascar</option>
                                                            <option value="Mainland South-East Asia"
                                                                @if ($student->country == 'Mainland South-East Asia') selected @endif>
                                                                Mainland South-East Asia</option>
                                                            <option value="Malawi"
                                                                @if ($student->country == 'Malawi') selected @endif>Malawi
                                                            </option>
                                                            <option value="Malaysia"
                                                                @if ($student->country == 'Malaysia') selected @endif>
                                                                Malaysia</option>
                                                            <option value="Maldives"
                                                                @if ($student->country == 'Maldives') selected @endif>
                                                                Maldives</option>
                                                            <option value="Mali"
                                                                @if ($student->country == 'Mali') selected @endif>Mali
                                                            </option>
                                                            <option value="Malta"
                                                                @if ($student->country == 'Malta') selected @endif>Malta
                                                            </option>
                                                            <option value="Maritime South-East Asia"
                                                                @if ($student->country == 'Maritime South-East Asia')  @endif>Maritime
                                                                South-East Asia</option>
                                                            <option value="Marshall Islands"
                                                                @if ($student->country == 'Marshall Islands')  @endif>Marshall
                                                                Islands</option>
                                                            <option value="Martinique"
                                                                @if ($student->country == 'Martinique')  @endif>Martinique
                                                            </option>
                                                            <option value="Mauritania"
                                                                @if ($student->country == 'Mauritania')  @endif>Mauritania
                                                            </option>
                                                            <option value="Mauritius"
                                                                @if ($student->country == 'Mauritius')  @endif>Mauritius
                                                            </option>
                                                            <option value="Mayotte"
                                                                @if ($student->country == 'Mayotte')  @endif>Mayotte
                                                            </option>
                                                            <option value="Melanesia"
                                                                @if ($student->country == 'Melanesia')  @endif>Melanesia
                                                            </option>
                                                            <option value="Mexico"
                                                                @if ($student->country == 'Mexico')  @endif>Mexico
                                                            </option>
                                                            <option value="Micronesia"
                                                                @if ($student->country == 'Micronesia')  @endif>Micronesia
                                                            </option>
                                                            <option value="Micronesia, Federated States of"
                                                                @if ($student->country == 'Micronesia, Federated States of')  @endif>Micronesia,
                                                                Federated States of</option>
                                                            <option value="Middle East"
                                                                @if ($student->country == 'Middle East')  @endif>Middle East
                                                            </option>
                                                            <option value="Moldova"
                                                                @if ($student->country == 'Moldova')  @endif>Moldova
                                                            </option>
                                                            <option value="Monaco"
                                                                @if ($student->country == 'Monaco')  @endif>Monaco
                                                            </option>
                                                            <option value="Mongolia"
                                                                @if ($student->country == 'Mongolia')  @endif>Mongolia
                                                            </option>
                                                            <option value="Montenegro"
                                                                @if ($student->country == 'Montenegro')  @endif>Montenegro
                                                            </option>
                                                            <option value="Montserrat"
                                                                @if ($student->country == 'Montserrat')  @endif>Montserrat
                                                            </option>
                                                            <option value="Morocco"
                                                                @if ($student->country == 'Morocco')  @endif>Morocco
                                                            </option>
                                                            <option value="Mozambique"
                                                                @if ($student->country == 'Mozambique')  @endif>Mozambique
                                                            </option>
                                                            <option value="Namibia"
                                                                @if ($student->country == 'Namibia')  @endif>Namibia
                                                            </option>
                                                            <option value="Nauru"
                                                                @if ($student->country == 'Nauru')  @endif>Nauru</option>
                                                            <option value="Nepal"
                                                                @if ($student->country == 'Nepal')  @endif>Nepal</option>
                                                            <option value="Netherlands"
                                                                @if ($student->country == 'Netherlands')  @endif>Netherlands
                                                            </option>
                                                            <option value="Netherlands Antilles"
                                                                @if ($student->country == 'Netherlands Antilles')  @endif>Netherlands
                                                                Antilles</option>
                                                            <option value="New Caledonia"
                                                                @if ($student->country == 'New Caledonia')  @endif>New Caledonia
                                                            </option>
                                                            <option value="New Zealand"
                                                                @if ($student->country == 'New Zealand')  @endif>New Zealand
                                                            </option>
                                                            <option value="Nicaragua"
                                                                @if ($student->country == 'Nicaragua')  @endif>Nicaragua
                                                            </option>
                                                            <option value="Niger"
                                                                @if ($student->country == 'Niger')  @endif>Niger</option>
                                                            <option value="Nigeria"
                                                                @if ($student->country == 'Nigeria')  @endif>Nigeria
                                                            </option>
                                                            <option value="Niue"
                                                                @if ($student->country == 'Niue')  @endif>Niue</option>
                                                            <option value="Norfolk Island"
                                                                @if ($student->country == 'Norfolk Island')  @endif>Norfolk Island
                                                            </option>
                                                            <option value="North Africa"
                                                                @if ($student->country == 'North Africa')  @endif>North Africa
                                                            </option>
                                                            <option value="North Africa and the Middle East"
                                                                @if ($student->country == 'North Africa and the Middle East')  @endif>North Africa
                                                                and the Middle East</option>
                                                            <option value="North-East Asia"
                                                                @if ($student->country == 'North-East Asia')  @endif>North-East
                                                                Asia</option>
                                                            <option value="North-West Europe"
                                                                @if ($student->country == 'North-West Europe')  @endif>North-West
                                                                Europe</option>
                                                            <option value="Northern America"
                                                                @if ($student->country == 'Northern America')  @endif>Northern
                                                                America</option>
                                                            <option value="Northern Europe"
                                                                @if ($student->country == 'Northern Europe')  @endif>Northern
                                                                Europe</option>
                                                            <option value="Northern Ireland"
                                                                @if ($student->country == 'Northern Ireland')  @endif>Northern
                                                                Ireland</option>
                                                            <option value="Northern Mariana Islands"
                                                                @if ($student->country == 'Northern Mariana Islands')  @endif>Northern
                                                                Mariana Islands</option>
                                                            <option value="Norway"
                                                                @if ($student->country == 'Norway')  @endif>Norway
                                                            </option>
                                                            <option value="Not Specified"
                                                                @if ($student->country == 'Not Specified')  @endif>Not Specified
                                                            </option>
                                                            <option value="Oceania and Antarctica"
                                                                @if ($student->country == 'Oceania and Antarctica')  @endif>Oceania and
                                                                Antarctica</option>
                                                            <option value="Oman"
                                                                @if ($student->country == 'Oman') selected @endif>Oman
                                                            </option>
                                                            <option value="Pakistan"
                                                                @if ($student->country == 'Pakistan') selected @endif>
                                                                Pakistan</option>
                                                            <option value="Palau"
                                                                @if ($student->country == 'Palau') selected @endif>Palau
                                                            </option>
                                                            <option value="Panama"
                                                                @if ($student->country == 'Panama') selected @endif>Panama
                                                            </option>
                                                            <option value="Papua New Guinea"
                                                                @if ($student->country == 'Papua New Guinea') selected @endif>Papua
                                                                New Guinea</option>
                                                            <option value="Paraguay"
                                                                @if ($student->country == 'Paraguay') selected @endif>
                                                                Paraguay</option>
                                                            <option value="Peru"
                                                                @if ($student->country == 'Peru') selected @endif>Peru
                                                            </option>
                                                            <option value="Philippines"
                                                                @if ($student->country == '') selected @endif>
                                                                Philippines</option>
                                                            <option value="Pitcairn Islands"
                                                                @if ($student->country == '') selected @endif>
                                                                Pitcairn Islands</option>
                                                            <option value="Poland"
                                                                @if ($student->country == '') selected @endif>Poland
                                                            </option>
                                                            <option value="Polynesia (excludes Hawaii)"
                                                                @if ($student->country == '') selected @endif>
                                                                Polynesia (excludes Hawaii)</option>
                                                            <option value="Polynesia (excludes Hawaii), nec"
                                                                @if ($student->country == '') selected @endif>
                                                                Polynesia (excludes Hawaii), nec</option>
                                                            <option value="Portugal"
                                                                @if ($student->country == 'Portugal') selected @endif>
                                                                Portugal</option>
                                                            <option value="Puerto Rico"
                                                                @if ($student->country == 'Puerto Rico') selected @endif>Puerto
                                                                Rico</option>
                                                            <option value="Qatar"
                                                                @if ($student->country == 'Qatar') selected @endif>Qatar
                                                            </option>
                                                            <option value="Queen Maud Land (Norway)"
                                                                @if ($student->country == 'Queen Maud Land (Norway)') selected @endif>Queen
                                                                Maud Land (Norway)</option>
                                                            <option value="Reunion"
                                                                @if ($student->country == 'Reunion') selected @endif>
                                                                Reunion</option>
                                                            <option value="Romania"
                                                                @if ($student->country == 'Romania') selected @endif>
                                                                Romania</option>
                                                            <option value="Ross Dependency (New Zealand)"
                                                                @if ($student->country == 'Ross Dependency (New Zealand)') selected @endif>Ross
                                                                Dependency (New Zealand)</option>
                                                            <option value="Russian Federation"
                                                                @if ($student->country == 'Russian Federation') selected @endif>
                                                                Russian Federation</option>
                                                            <option value="Rwanda"
                                                                @if ($student->country == 'Rwanda') selected @endif>Rwanda
                                                            </option>
                                                            <option value="Samoa"
                                                                @if ($student->country == 'Samoa') selected @endif>Samoa
                                                            </option>
                                                            <option value="Samoa, American"
                                                                @if ($student->country == 'Samoa, American') selected @endif>Samoa,
                                                                American</option>
                                                            <option value="San Marino"
                                                                @if ($student->country == 'San Marino') selected @endif>San
                                                                Marino</option>
                                                            <option value="Sao Tome and Principe"
                                                                @if ($student->country == 'Sao Tome and Principe') selected @endif>Sao
                                                                Tome and Principe</option>
                                                            <option value="Saudi Arabia"
                                                                @if ($student->country == 'Saudi Arabia') selected @endif>Saudi
                                                                Arabia</option>
                                                            <option value="Scotland"
                                                                @if ($student->country == 'Scotland') selected @endif>
                                                                Scotland</option>
                                                            <option value="Senegal"
                                                                @if ($student->country == 'Senegal') selected @endif>
                                                                Senegal</option>
                                                            <option value="Serbia"
                                                                @if ($student->country == 'Serbia') selected @endif>Serbia
                                                            </option>
                                                            <option value="Seychelles"
                                                                @if ($student->country == 'Seychelles') selected @endif>
                                                                Seychelles</option>
                                                            <option value="Sierra Leone"
                                                                @if ($student->country == 'Sierra Leone') selected @endif>Sierra
                                                                Leone</option>
                                                            <option value="Singapore"
                                                                @if ($student->country == 'Singapore')  @endif>Singapore
                                                            </option>
                                                            <option value="Sint Maarten (Dutch part)"
                                                                @if ($student->country == 'Sint Maarten (Dutch part)')  @endif>Sint Maarten
                                                                (Dutch part)</option>
                                                            <option value="Slovakia"
                                                                @if ($student->country == 'Slovakia')  @endif>Slovakia
                                                            </option>
                                                            <option value="Slovenia"
                                                                @if ($student->country == 'Slovenia')  @endif>Slovenia
                                                            </option>
                                                            <option value="Solomon Islands"
                                                                @if ($student->country == 'Solomon Islands')  @endif>Solomon
                                                                Islands</option>
                                                            <option value="Somalia"
                                                                @if ($student->country == 'Somalia')  @endif>Somalia
                                                            </option>
                                                            <option value="South Africa"
                                                                @if ($student->country == 'South Africa')  @endif>South Africa
                                                            </option>
                                                            <option value="South America"
                                                                @if ($student->country == 'South America')  @endif>South America
                                                            </option>
                                                            <option value="South America, nec"
                                                                @if ($student->country == 'South America, nec')  @endif>South America,
                                                                nec</option>
                                                            <option value="South Eastern Europe"
                                                                @if ($student->country == 'South Eastern Europe')  @endif>South Eastern
                                                                Europe</option>
                                                            <option value="South Sudan"
                                                                @if ($student->country == 'South Sudan')  @endif>South Sudan
                                                            </option>
                                                            <option value="South-East Asia"
                                                                @if ($student->country == 'South-East Asia')  @endif>South-East
                                                                Asia</option>
                                                            <option value="Southern and Central Asia"
                                                                @if ($student->country == 'Southern and Central Asia')  @endif>Southern and
                                                                Central Asia</option>
                                                            <option value="Southern and East Africa"
                                                                @if ($student->country == 'Southern and East Africa')  @endif>Southern and
                                                                East Africa</option>
                                                            <option value="Southern and East Africa, nec"
                                                                @if ($student->country == 'Southern and East Africa, nec')  @endif>Southern and
                                                                East Africa, nec</option>
                                                            <option value="Southern and Eastern Europe"
                                                                @if ($student->country == 'Southern and Eastern Europe')  @endif>Southern and
                                                                Eastern Europe</option>
                                                            <option value="Southern Asia"
                                                                @if ($student->country == 'Southern Asia')  @endif>Southern Asia
                                                            </option>
                                                            <option value="Southern Europe"
                                                                @if ($student->country == 'Southern Europe')  @endif>Southern
                                                                Europe</option>
                                                            <option value="Spain"
                                                                @if ($student->country == 'Spain')  @endif>Spain</option>
                                                            <option value="Spanish North Africa"
                                                                @if ($student->country == 'Spanish North Africa')  @endif>Spanish North
                                                                Africa</option>
                                                            <option value="Sri Lanka"
                                                                @if ($student->country == 'Sri Lanka')  @endif>Sri Lanka
                                                            </option>
                                                            <option value="St Barthelemy"
                                                                @if ($student->country == 'St Barthelemy')  @endif>St Barthelemy
                                                            </option>
                                                            <option value="St Helena"
                                                                @if ($student->country == 'St Helena') selected @endif>St
                                                                Helena</option>
                                                            <option value="St Kitts and Nevis"
                                                                @if ($student->country == 'St Kitts and Nevis') selected @endif>St
                                                                Kitts and Nevis</option>
                                                            <option value="St Lucia"
                                                                @if ($student->country == 'St Lucia') selected @endif>St
                                                                Lucia</option>
                                                            <option value="St Martin (French part)"
                                                                @if ($student->country == 'St Martin (French part)') selected @endif>St
                                                                Martin (French part)</option>
                                                            <option value="St Pierre and Miquelon"
                                                                @if ($student->country == 'St Pierre and Miquelon') selected @endif>St
                                                                Pierre and Miquelon</option>
                                                            <option value="St Vincent and the Grenadines"
                                                                @if ($student->country == 'St Vincent and the Grenadines') selected @endif>St
                                                                Vincent and the Grenadines</option>
                                                            <option value="Sub-Saharan Africa"
                                                                @if ($student->country == 'Sub-Saharan Africa') selected @endif>
                                                                Sub-Saharan Africa</option>
                                                            <option value="Sudan"
                                                                @if ($student->country == 'Sudan') selected @endif>Sudan
                                                            </option>
                                                            <option value="Suriname"
                                                                @if ($student->country == 'Suriname') selected @endif>
                                                                Suriname</option>
                                                            <option value="Swaziland"
                                                                @if ($student->country == 'Swaziland') selected @endif>
                                                                Swaziland</option>
                                                            <option value="Sweden"
                                                                @if ($student->country == 'Sweden') selected @endif>Sweden
                                                            </option>
                                                            <option value="Switzerland"
                                                                @if ($student->country == 'Switzerland') selected @endif>
                                                                Switzerland</option>
                                                            <option value="Syria"
                                                                @if ($student->country == 'Syria') selected @endif>Syria
                                                            </option>
                                                            <option value="Taiwan"
                                                                @if ($student->country == 'Taiwan') selected @endif>Taiwan
                                                            </option>
                                                            <option value="Tajikistan"
                                                                @if ($student->country == 'Tajikistan') selected @endif>
                                                                Tajikistan</option>
                                                            <option value="Tanzania"
                                                                @if ($student->country == 'Tanzania') selected @endif>
                                                                Tanzania</option>
                                                            <option value="Thailand"
                                                                @if ($student->country == 'Thailand') selected @endif>
                                                                Thailand</option>
                                                            <option value="Timor-Leste"
                                                                @if ($student->country == 'Timor-Leste') selected @endif>
                                                                Timor-Leste</option>
                                                            <option value="Togo"
                                                                @if ($student->country == 'Togo') selected @endif>Togo
                                                            </option>
                                                            <option value="Tokelau"
                                                                @if ($student->country == 'Tokelau') selected @endif>
                                                                Tokelau</option>
                                                            <option value="Tonga"
                                                                @if ($student->country == 'Tonga') selected @endif>Tonga
                                                            </option>
                                                            <option value="Trinidad and Tobago"
                                                                @if ($student->country == 'Trinidad and Tobago') selected @endif>
                                                                Trinidad and Tobago</option>
                                                            <option value="Tunisia"
                                                                @if ($student->country == 'Tunisia') selected @endif>
                                                                Tunisia</option>
                                                            <option value="Turkey"
                                                                @if ($student->country == 'Turkey') selected @endif>Turkey
                                                            </option>
                                                            <option value="Turkmenistan"
                                                                @if ($student->country == 'Turkmenistan') selected @endif>
                                                                Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands"
                                                                @if ($student->country == 'Turks and Caicos Islands') selected @endif>Turks
                                                                and Caicos Islands</option>
                                                            <option value="Tuvalu"
                                                                @if ($student->country == 'Tuvalu') selected @endif>Tuvalu
                                                            </option>
                                                            <option value="Uganda"
                                                                @if ($student->country == 'Uganda') selected @endif>Uganda
                                                            </option>
                                                            <option value="Ukraine"
                                                                @if ($student->country == 'Ukraine') selected @endif>
                                                                Ukraine</option>
                                                            <option value="United Arab Emirates"
                                                                @if ($student->country == 'United Arab Emirates') selected @endif>United
                                                                Arab Emirates</option>
                                                            <option value="United Kingdom, Channel Islands and Isle of Man"
                                                                @if ($student->country == 'United Kingdom, Channel Islands and Isle of Man') selected @endif>United
                                                                Kingdom, Channel Islands and Isle of Man</option>
                                                            <option value="United States of America"
                                                                @if ($student->country == 'United States of America') selected @endif>United
                                                                States of America</option>
                                                            <option value="Uruguay"
                                                                @if ($student->country == 'Uruguay') selected @endif>
                                                                Uruguay</option>
                                                            <option value="Uzbekistan"
                                                                @if ($student->country == 'Uzbekistan') selected @endif>
                                                                Uzbekistan</option>
                                                            <option value="Vanuatu"
                                                                @if ($student->country == 'Vanuatu') selected @endif>
                                                                Vanuatu</option>
                                                            <option value="Venezuela, Bolivarian Republic of"
                                                                @if ($student->country == 'Venezuela, Bolivarian Republic of') selected @endif>
                                                                Venezuela, Bolivarian Republic of</option>
                                                            <option value="Vietnam"
                                                                @if ($student->country == 'Vietnam') selected @endif>
                                                                Vietnam</option>
                                                            <option value="Virgin Islands, British"
                                                                @if ($student->country == 'Virgin Islands, British') selected @endif>Virgin
                                                                Islands, British</option>
                                                            <option value="Virgin Islands, United States"
                                                                @if ($student->country == 'Virgin Islands, United States') selected @endif>Virgin
                                                                Islands, United States</option>
                                                            <option value="Wales"
                                                                @if ($student->country == 'Wales') selected @endif>Wales
                                                            </option>
                                                            <option value="Wallis and Futuna"
                                                                @if ($student->country == 'Wallis and Futuna') selected @endif>Wallis
                                                                and Futuna</option>
                                                            <option value="Western Europe"
                                                                @if ($student->country == 'Western Europe') selected @endif>
                                                                Western Europe</option>
                                                            <option value="Western Sahara"
                                                                @if ($student->country == 'Western Sahara') selected @endif>
                                                                Western Sahara</option>
                                                            <option value="Yemen"
                                                                @if ($student->country == 'Yemen') selected @endif>Yemen
                                                            </option>
                                                            <option value="Zambia"
                                                                @if ($student->country == 'Zambia') selected @endif>Zambia
                                                            </option>
                                                            <option value="Zimbabwe"
                                                                @if ($student->country == 'Zimbabwe') selected @endif>
                                                                Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">State</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <select name="state" style="" id="state"
                                                            class="input_text1 form-control" fdprocessedid="ke4bqf">
                                                            <option value=""></option> <!-- bug 4176 -->
                                                            <option value="All">All</option>
                                                            <option value="New South Wales"
                                                                @if ($student->state == 'New South Wales') selected @endif>New
                                                                South Wales</option>
                                                            <option value="Victoria"
                                                                @if ($student->state == 'Victoria') selected @endif>
                                                                Victoria</option>
                                                            <option value="Queensland"
                                                                @if ($student->state == 'Queensland') selected @endif>
                                                                Queensland</option>
                                                            <option value="South Australia"
                                                                @if ($student->state == 'South Australia') selected @endif>South
                                                                Australia</option>
                                                            <option value="Western Australia"
                                                                @if ($student->state == 'Western Australia') selected @endif>
                                                                Western Australia</option>
                                                            <option value="Tasmania"
                                                                @if ($student->state == 'Tasmania') selected @endif>
                                                                Tasmania</option>
                                                            <option value="Northern Territory"
                                                                @if ($student->state == 'Northern Territory') selected @endif>
                                                                Northern Territory</option>
                                                            <option value="Australian Capital Territory"
                                                                @if ($student->state == 'Australian Capital Territory') selected @endif>
                                                                Australian Capital Territory</option>
                                                            <option value="Other Australian Territories or Dependencies"
                                                                @if ($student->state == 'Other Australian Territories or Dependencies') selected @endif>Other
                                                                Australian Territories or Dependencies</option>
                                                            <option value="Other (Overseas)"
                                                                @if ($student->state == 'Other (Overseas)') selected @endif>Other
                                                                (Overseas)</option>
                                                            <option value="Fee for Service"
                                                                @if ($student->state == 'Fee for Service') selected @endif>Fee
                                                                for Service</option>
                                                        </select>
                                                        <div style="height:5px"></div>
                                                        {{-- <input name="state" style="width: 171px; display: none;" id="state" class="input_text1 form-control" value="{{ $student->state}}"> --}}
                                                    </div>
                                                </div>
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <label class="float-left">Post Code<i
                                                                class="fa fa-info-circle ml-2" aria-hidden="true"
                                                                title="If not an Australian Postcode use 'OSPC' for AVETMISS purposes."></i></label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                                        <input type="text" value="{{ $student->postCode }}"
                                                            name="postcode" id="postcode"
                                                            class="input_text1 form-control" maxlength="4"
                                                            fdprocessedid="ychk09">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-4">
                                                <div class="form-group form-inline row mt-2">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <button class="btn btn-primary w-100" type="submit">Save</button>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <div class="form-group text-center col">
                                                            <button class="btn btn-secondary w-100" type="button"
                                                                id="toggleButton1">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary float-end mb-2"
                                            data-bs-toggle="modal" data-bs-target="#document" style="height: 45px;">
                                            Create Document </button>
                                    </div>
                                </div>
                                <table class="table table-secondary table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Document Name </th>
                                            <th scope="col">File Name </th>
                                            <th scope="col">Uploaded By </th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="15" cellspacing="15">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="height:15px;"></td>
                                        </tr>
                                        <tr>
                                            <!---Upload attachments with post -->
                                            <td colspan="2" align="left"
                                                style=" padding-left:5px; line-height:20px;" valign="middle">
                                                <table style="border-collapse: collapse; width:100%;color:#666666;"
                                                    border="0" id="1" cellpadding="2" cellspacing="2">
                                                    <tbody id="dataTable">
                                                        <tr>
                                                            <td>Upload File (Max size of 20MB)<input type="hidden"
                                                                    name="MAX_FILE_SIZE" value="20971520"></td>
                                                            <td>
                                                                <input class="form-control" type="file"
                                                                    id="formFileMultiple" multiple>
                                                                <input type="hidden" id="student_ID" name="student_ID"
                                                                    value="524977">
                                                            </td>
                                                            <td nowrap="">Give the document a name</td>
                                                            <td>
                                                                <input type="text" class="form-control"
                                                                    name="documentName[]" id="documentName[]"
                                                                    maxlength="50"
                                                                    style="width:200px;border:#666666 1px solid; vertical-align:middle;"
                                                                    fdprocessedid="2fsg38">
                                                            </td>
                                                            <td align="center">
                                                                <button name="create" id="" type="submit"
                                                                    class="btn btn-primary ms-2"
                                                                    fdprocessedid="7kfe7">Upload</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <button id="addRowBtn" type="submit"
                                                                class="btn btn-primary ms-2">Add more files</button>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                {{-- /////////////////////// create new enrollment ///////////////////////// --}}
                                <!-- Modal -->
                                <div class="modal fade" id="document" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h5> Create Enrollment for {{ $student->firstName }}
                                                    {{ $student->lastName }} </h5>

                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Template
                                                    </label>
                                                    <select class="form-select" aria-label="Default select example">

                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1" class="form-label">Document Name

                                                    </label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="exampleFormControlInput1"
                                                        class="form-label">Content</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <button class="btn btn-primary">Issue as PDF</button>
                                                    <button class="btn btn-primary">Issue as Word</button>
                                                    <button type="button" class="btn btn-primary"
                                                        data-bs-dismiss="modal">Close</button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- /////////////////////// create new enrollment ///////////////////////// --}}
                            </div>
                            <div class="tab-pane fade" id="language" role="tabpanel"
                                aria-labelledby="language-tab">
                                <div class="" id="language-details">
                                    <div style="float:left;padding-left:150px;">
                                        <div style="padding:5px;float:left;font-weight:bold;width:400px;"
                                            align="left">Country of Birth? </div>
                                        <div style="padding:5px 5px;float:left;vertical-align:bottom">
                                            No selection </div>
                                        <div style="clear:both;"></div>
                                        <div style="padding:5px;float:left;width:400px;font-weight:bold;">Do you mainly
                                            speak English at home?</div>
                                        <div style="padding:5px 5px;float:left;vertical-align:bottom">
                                            No selection
                                        </div>
                                        <div style="clear:both;height:5px;"></div>
                                        <div style="padding:5px;float:left;font-weight:bold;width:400px;"
                                            align="left">Do you speak a language other than English at home?</div>
                                        <div style="padding:5px 5px;width:250px;float:left">

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="nospokenlanguage"
                                                    id="nospokenlanguage" onchange="change_english_level()"
                                                    checked="" disabled="">
                                                <label class="" for="nospokenlanguage">No, English only</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="yesspokenlanguage" id="yesspokenlanguage"
                                                    onchange="change_english_level()" disabled="">
                                                <label class="" for="yesspokenlanguage">
                                                    Yes, other - Please specify:
                                                </label>
                                            </div>
                                            <!-- No, English only <input style="margin-left:50px;" class="custom-checkbox" type="checkbox" name="nospokenlanguage" id="nospokenlanguage" onChange=change_english_level() checked disabled /><br>
                                                Yes, other - Please specify:  -->
                                        </div>
                                        <div style="clear:both;height:5px;"></div>
                                        <br>
                                        <div style="padding:5px;font-weight:bold;width:380px;float:left">Indigenous
                                            Status: </div>
                                        <div style="padding:5px 20px;float:left;">
                                            <input type="radio" name="indigenousStatus" value="1"
                                                disabled="">
                                            Yes, Aboriginal<br><input type="radio" name="indigenousStatus"
                                                value="2" disabled="">
                                            Yes, Torres Strait Islander<br><input type="radio" name="indigenousStatus"
                                                value="3" disabled="">
                                            Yes, Aboriginal AND Torres Strait Islander<br><input type="radio"
                                                name="indigenousStatus" value="4" disabled="">
                                            No, Neither Aboriginal nor Torres Strait Islander<br>
                                        </div>
                                    </div>
                                    <div style="clear:both;height:20px;"></div>
                                    <div style="clear:both;text-align:center">
                                        <button type="button" class="btn btn-primary"
                                            id="edit-language">Edit</button>
                                    </div>
                                </div>

                                <div class="hidden" id="edit-form">
                                    <form name="edit_language_frm" id="edit_language_frm" method="post"
                                        action="" onsubmit="unsaved=true;">
                                        <div style="float:left;padding-left:150px;">
                                            <div style="padding:5px;float:left;font-weight:bold;width:400px;"
                                                align="left">Country of Birth? </div>
                                            <div style="padding:0px 5px;float:left;vertical-align:bottom">
                                                <select class="form-control" name="birthCountry" id="birthCountry"
                                                    fdprocessedid="v7rc46">
                                                    <option></option>
                                                    <option value="1601">Adelie Land (France)</option>
                                                    <option value="7201">Afghanistan</option>
                                                    <option value="0918">Africa, nfd</option>
                                                    <option value="2408">Aland Islands</option>
                                                    <option value="3201">Albania</option>
                                                    <option value="4101">Algeria</option>
                                                    <option value="8000">Americas</option>
                                                    <option value="3101">Andorra</option>
                                                    <option value="9201">Angola</option>
                                                    <option value="8401">Anguilla</option>
                                                    <option value="1600">Antarctica</option>
                                                    <option value="8402">Antigua and Barbuda</option>
                                                    <option value="8201">Argentina</option>
                                                    <option value="1602">Argentinian Antarctic Territory</option>
                                                    <option value="7202">Armenia</option>
                                                    <option value="8403">Aruba</option>
                                                    <option value="0917">Asia, nfd</option>
                                                    <option value="0001">At Sea</option>
                                                    <option value="1101">Australia</option>
                                                    <option value="1100">Australia (includes External Territories)
                                                    </option>
                                                    <option value="1603">Australian Antarctic Territory</option>
                                                    <option value="1199">Australian External Territories, nec</option>
                                                    <option value="2301">Austria</option>
                                                    <option value="7203">Azerbaijan</option>
                                                    <option value="8404">Bahamas</option>
                                                    <option value="4201">Bahrain</option>
                                                    <option value="7101">Bangladesh</option>
                                                    <option value="8405">Barbados</option>
                                                    <option value="3301">Belarus</option>
                                                    <option value="2302">Belgium</option>
                                                    <option value="8301">Belize</option>
                                                    <option value="9101">Benin</option>
                                                    <option value="8101">Bermuda</option>
                                                    <option value="7102">Bhutan</option>
                                                    <option value="8202">Bolivia, Plurinational State of</option>
                                                    <option value="8433">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="3202">Bosnia and Herzegovina</option>
                                                    <option value="9202">Botswana</option>
                                                    <option value="8203">Brazil</option>
                                                    <option value="1604">British Antarctic Territory</option>
                                                    <option value="5201">Brunei Darussalam</option>
                                                    <option value="3203">Bulgaria</option>
                                                    <option value="9102">Burkina Faso</option>
                                                    <option value="5101">Burma (Republic of the Union of Myanmar)
                                                    </option>
                                                    <option value="9203">Burundi</option>
                                                    <option value="5102">Cambodia</option>
                                                    <option value="9103">Cameroon</option>
                                                    <option value="8102">Canada</option>
                                                    <option value="9104">Cape Verde</option>
                                                    <option value="8400">Caribbean</option>
                                                    <option value="8406">Cayman Islands</option>
                                                    <option value="9105">Central African Republic</option>
                                                    <option value="8300">Central America</option>
                                                    <option value="9100">Central and West Africa</option>
                                                    <option value="7200">Central Asia</option>
                                                    <option value="9106">Chad</option>
                                                    <option value="8204">Chile</option>
                                                    <option value="1605">Chilean Antarctic Territory</option>
                                                    <option value="6101">China (excludes SARs and Taiwan)</option>
                                                    <option value="6100">Chinese Asia (includes Mongolia)</option>
                                                    <option value="8205">Colombia</option>
                                                    <option value="9204">Comoros</option>
                                                    <option value="9108">Congo, Democratic Republic of</option>
                                                    <option value="9107">Congo, Republic of </option>
                                                    <option value="1501">Cook Islands</option>
                                                    <option value="8302">Costa Rica</option>
                                                    <option value="9111">Cote d'Ivoire</option>
                                                    <option value="3204">Croatia</option>
                                                    <option value="8407">Cuba</option>
                                                    <option value="8434">Curacao</option>
                                                    <option value="3205">Cyprus</option>
                                                    <option value="3302">Czech Republic</option>
                                                    <option value="2401">Denmark</option>
                                                    <option value="9205">Djibouti</option>
                                                    <option value="8408">Dominica</option>
                                                    <option value="8411">Dominican Republic</option>
                                                    <option value="0916">East Asia, nfd</option>
                                                    <option value="3300">Eastern Europe</option>
                                                    <option value="8206">Ecuador</option>
                                                    <option value="4102">Egypt</option>
                                                    <option value="8303">El Salvador</option>
                                                    <option value="2102">England</option>
                                                    <option value="9112">Equatorial Guinea</option>
                                                    <option value="9206">Eritrea</option>
                                                    <option value="3303">Estonia</option>
                                                    <option value="9207">Ethiopia</option>
                                                    <option value="0911">Europe, nfd</option>
                                                    <option value="8207">Falkland Islands</option>
                                                    <option value="2402">Faroe Islands</option>
                                                    <option value="1502">Fiji</option>
                                                    <option value="2403">Finland</option>
                                                    <option value="0912">Former USSR, nfd</option>
                                                    <option value="3206">Former Yugoslav Republic of Macedonia (FYROM)
                                                    </option>
                                                    <option value="2303">France</option>
                                                    <option value="8208">French Guiana</option>
                                                    <option value="1503">French Polynesia</option>
                                                    <option value="9113">Gabon</option>
                                                    <option value="9114">Gambia</option>
                                                    <option value="4202">Gaza Strip and West Bank</option>
                                                    <option value="7204">Georgia</option>
                                                    <option value="2304">Germany</option>
                                                    <option value="9115">Ghana</option>
                                                    <option value="3102">Gibraltar</option>
                                                    <option value="3207">Greece</option>
                                                    <option value="2404">Greenland</option>
                                                    <option value="8412">Grenada</option>
                                                    <option value="8413">Guadeloupe</option>
                                                    <option value="1401">Guam</option>
                                                    <option value="8304">Guatemala</option>
                                                    <option value="2107">Guernsey</option>
                                                    <option value="9116">Guinea</option>
                                                    <option value="9117">Guinea-Bissau</option>
                                                    <option value="8211">Guyana</option>
                                                    <option value="8414">Haiti</option>
                                                    <option value="3103">Holy See</option>
                                                    <option value="8305">Honduras</option>
                                                    <option value="6102">Hong Kong (SAR of China)</option>
                                                    <option value="3304">Hungary</option>
                                                    <option value="2405">Iceland</option>
                                                    <option value="0000">Inadequately Described</option>
                                                    <option value="7103">India</option>
                                                    <option value="5202">Indonesia</option>
                                                    <option value="4203">Iran</option>
                                                    <option value="4204">Iraq</option>
                                                    <option value="2201">Ireland</option>
                                                    <option value="2103">Isle of Man</option>
                                                    <option value="4205">Israel</option>
                                                    <option value="3104">Italy</option>
                                                    <option value="8415">Jamaica</option>
                                                    <option value="6201">Japan</option>
                                                    <option value="6200">Japan and the Koreas</option>
                                                    <option value="2108">Jersey</option>
                                                    <option value="4206">Jordan</option>
                                                    <option value="7205">Kazakhstan</option>
                                                    <option value="9208">Kenya</option>
                                                    <option value="1402">Kiribati</option>
                                                    <option value="6202">Korea, Democratic People's Republic of (North)
                                                    </option>
                                                    <option value="6203">Korea, Republic of (South)</option>
                                                    <option value="3216">Kosovo</option>
                                                    <option value="0915">Kurdistan, nfd</option>
                                                    <option value="4207">Kuwait</option>
                                                    <option value="7206">Kyrgyzstan</option>
                                                    <option value="5103">Laos</option>
                                                    <option value="3305">Latvia</option>
                                                    <option value="4208">Lebanon</option>
                                                    <option value="9211">Lesotho</option>
                                                    <option value="9118">Liberia</option>
                                                    <option value="4103">Libya</option>
                                                    <option value="2305">Liechtenstein</option>
                                                    <option value="3306">Lithuania</option>
                                                    <option value="2306">Luxembourg</option>
                                                    <option value="6103">Macau (SAR of China)</option>
                                                    <option value="9212">Madagascar</option>
                                                    <option value="5100">Mainland South-East Asia</option>
                                                    <option value="9213">Malawi</option>
                                                    <option value="5203">Malaysia</option>
                                                    <option value="7104">Maldives</option>
                                                    <option value="9121">Mali</option>
                                                    <option value="3105">Malta</option>
                                                    <option value="5200">Maritime South-East Asia</option>
                                                    <option value="1403">Marshall Islands</option>
                                                    <option value="8416">Martinique</option>
                                                    <option value="9122">Mauritania</option>
                                                    <option value="9214">Mauritius</option>
                                                    <option value="9215">Mayotte</option>
                                                    <option value="1300">Melanesia</option>
                                                    <option value="8306">Mexico</option>
                                                    <option value="1400">Micronesia</option>
                                                    <option value="1404">Micronesia, Federated States of</option>
                                                    <option value="4200">Middle East</option>
                                                    <option value="3208">Moldova</option>
                                                    <option value="2307">Monaco</option>
                                                    <option value="6104">Mongolia</option>
                                                    <option value="3214">Montenegro</option>
                                                    <option value="8417">Montserrat</option>
                                                    <option value="4104">Morocco</option>
                                                    <option value="9216">Mozambique</option>
                                                    <option value="9217">Namibia</option>
                                                    <option value="1405">Nauru</option>
                                                    <option value="7105">Nepal</option>
                                                    <option value="2308">Netherlands</option>
                                                    <option value="8418">Netherlands Antilles</option>
                                                    <option value="1301">New Caledonia</option>
                                                    <option value="1201">New Zealand</option>
                                                    <option value="8307">Nicaragua</option>
                                                    <option value="9123">Niger</option>
                                                    <option value="9124">Nigeria</option>
                                                    <option value="1504">Niue</option>
                                                    <option value="1102">Norfolk Island</option>
                                                    <option value="4100">North Africa</option>
                                                    <option value="4000">North Africa and the Middle East</option>
                                                    <option value="6000">North-East Asia</option>
                                                    <option value="2000">North-West Europe</option>
                                                    <option value="8100">Northern America</option>
                                                    <option value="2400">Northern Europe</option>
                                                    <option value="2104">Northern Ireland</option>
                                                    <option value="1406">Northern Mariana Islands</option>
                                                    <option value="2406">Norway</option>
                                                    <option value="@@@@">Not
                                                        Specified</option>
                                                    <option value="1000">Oceania and Antarctica</option>
                                                    <option value="4211">Oman</option>
                                                    <option value="7106">Pakistan</option>
                                                    <option value="1407">Palau</option>
                                                    <option value="8308">Panama</option>
                                                    <option value="1302">Papua New Guinea</option>
                                                    <option value="8212">Paraguay</option>
                                                    <option value="8213">Peru</option>
                                                    <option value="5204">Philippines</option>
                                                    <option value="1513">Pitcairn Islands</option>
                                                    <option value="3307">Poland</option>
                                                    <option value="1500">Polynesia (excludes Hawaii)</option>
                                                    <option value="1599">Polynesia (excludes Hawaii), nec</option>
                                                    <option value="3106">Portugal</option>
                                                    <option value="8421">Puerto Rico</option>
                                                    <option value="4212">Qatar</option>
                                                    <option value="1606">Queen Maud Land (Norway)</option>
                                                    <option value="9218">Reunion</option>
                                                    <option value="3211">Romania</option>
                                                    <option value="1607">Ross Dependency (New Zealand)</option>
                                                    <option value="3308">Russian Federation</option>
                                                    <option value="9221">Rwanda</option>
                                                    <option value="1505">Samoa</option>
                                                    <option value="1506">Samoa, American</option>
                                                    <option value="3107">San Marino</option>
                                                    <option value="9125">Sao Tome and Principe</option>
                                                    <option value="4213">Saudi Arabia</option>
                                                    <option value="2105">Scotland</option>
                                                    <option value="9126">Senegal</option>
                                                    <option value="3215">Serbia</option>
                                                    <option value="9223">Seychelles</option>
                                                    <option value="9127">Sierra Leone</option>
                                                    <option value="5205">Singapore</option>
                                                    <option value="8435">Sint Maarten (Dutch part)</option>
                                                    <option value="3311">Slovakia</option>
                                                    <option value="3212">Slovenia</option>
                                                    <option value="1303">Solomon Islands</option>
                                                    <option value="9224">Somalia</option>
                                                    <option value="9225">South Africa</option>
                                                    <option value="8200">South America</option>
                                                    <option value="8299">South America, nec</option>
                                                    <option value="3200">South Eastern Europe</option>
                                                    <option value="4111">South Sudan</option>
                                                    <option value="5000">South-East Asia</option>
                                                    <option value="7000">Southern and Central Asia</option>
                                                    <option value="9200">Southern and East Africa</option>
                                                    <option value="9299">Southern and East Africa, nec</option>
                                                    <option value="3000">Southern and Eastern Europe</option>
                                                    <option value="7100">Southern Asia</option>
                                                    <option value="3100">Southern Europe</option>
                                                    <option value="3108">Spain</option>
                                                    <option value="4108">Spanish North Africa</option>
                                                    <option value="7107">Sri Lanka</option>
                                                    <option value="8431">St Barthelemy</option>
                                                    <option value="9222">St Helena</option>
                                                    <option value="8422">St Kitts and Nevis</option>
                                                    <option value="8423">St Lucia</option>
                                                    <option value="8432">St Martin (French part)</option>
                                                    <option value="8103">St Pierre and Miquelon</option>
                                                    <option value="8424">St Vincent and the Grenadines</option>
                                                    <option value="9000">Sub-Saharan Africa</option>
                                                    <option value="4105">Sudan</option>
                                                    <option value="8214">Suriname</option>
                                                    <option value="9226">Swaziland</option>
                                                    <option value="2407">Sweden</option>
                                                    <option value="2311">Switzerland</option>
                                                    <option value="4214">Syria</option>
                                                    <option value="6105">Taiwan</option>
                                                    <option value="7207">Tajikistan</option>
                                                    <option value="9227">Tanzania</option>
                                                    <option value="5104">Thailand</option>
                                                    <option value="5206">Timor-Leste</option>
                                                    <option value="9128">Togo</option>
                                                    <option value="1507">Tokelau</option>
                                                    <option value="1508">Tonga</option>
                                                    <option value="8425">Trinidad and Tobago</option>
                                                    <option value="4106">Tunisia</option>
                                                    <option value="4215">Turkey</option>
                                                    <option value="7208">Turkmenistan</option>
                                                    <option value="8426">Turks and Caicos Islands</option>
                                                    <option value="1511">Tuvalu</option>
                                                    <option value="9228">Uganda</option>
                                                    <option value="3312">Ukraine</option>
                                                    <option value="4216">United Arab Emirates</option>
                                                    <option value="2100">United Kingdom, Channel Islands and Isle of Man
                                                    </option>
                                                    <option value="8104">United States of America</option>
                                                    <option value="8215">Uruguay</option>
                                                    <option value="7211">Uzbekistan</option>
                                                    <option value="1304">Vanuatu</option>
                                                    <option value="8216">Venezuela, Bolivarian Republic of</option>
                                                    <option value="5105">Vietnam</option>
                                                    <option value="8427">Virgin Islands, British</option>
                                                    <option value="8428">Virgin Islands, United States</option>
                                                    <option value="2106">Wales</option>
                                                    <option value="1512">Wallis and Futuna</option>
                                                    <option value="2300">Western Europe</option>
                                                    <option value="4107">Western Sahara</option>
                                                    <option value="4217">Yemen</option>
                                                    <option value="9231">Zambia</option>
                                                    <option value="9232">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <div style="clear:both;height:5px;"></div>
                                            <div style="padding:5px; float:left;width:400px;font-weight:bold;">Do you
                                                mainly speak English at home?</div>
                                            <div style="padding:0px 5px; float:left;vertical-align:bottom">
                                                <select class="form-control" name="isMainEnglish" id="isMainEnglish"
                                                    fdprocessedid="ymiml">
                                                    <option value="Y">Yes</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                            <div style="clear:both;height:10px;"></div>
                                            <div style="padding:5px;font-weight:bold;width:400px;float:left;"
                                                align="left">Do you speak a language other than English at home?</div>
                                            <div style="padding:5px 5px; width:400px; float:left">

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="nospokenlanguage" id="nospokenlanguage" value="on"
                                                        onchange="change_english_level()" checked="">
                                                    <label class="form-check-label" for="nospokenlanguage">No, English
                                                        only</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="nospokenlanguage" id="yesspokenlanguage" value="off"
                                                        onchange="change_english_level()">
                                                    <label class="form-check-label" for="yesspokenlanguage">Yes, other -
                                                        Please specify:</label>
                                                    <select class="form-control" style="width:200px;display:inline;"
                                                        name="spokenLanguage" id="spokenLanguage"
                                                        onchange="show_english_level(this.options[this.selectedIndex].value)"
                                                        fdprocessedid="5e3bmv">
                                                        <option></option>
                                                        <option value="8998">Aboriginal English, so described</option>
                                                        <option value="6513">Acehnese</option>
                                                        <option value="9201">Acholi</option>
                                                        <option value="8901">Adnymathanha</option>
                                                        <option value="9200">African Languages</option>
                                                        <option value="9299">African Languages, nec</option>
                                                        <option value="1403">Afrikaans</option>
                                                        <option value="9203">Akan</option>
                                                        <option value="8121">Alawa</option>
                                                        <option value="3901">Albanian</option>
                                                        <option value="8315">Alngith</option>
                                                        <option value="8603">Alyawarr</option>
                                                        <option value="9101">American Languages</option>
                                                        <option value="9214">Amharic</option>
                                                        <option value="8156">Amurdak</option>
                                                        <option value="8101">Anindilyakwa</option>
                                                        <option value="8610">Anmatyerr</option>
                                                        <option value="8619">Anmatyerr, nec</option>
                                                        <option value="8607">Antekerrepenh</option>
                                                        <option value="8703">Antikarinya</option>
                                                        <option value="9241">Anuak</option>
                                                        <option value="8902">Arabana</option>
                                                        <option value="4202">Arabic</option>
                                                        <option value="8600">Arandic</option>
                                                        <option value="8699">Arandic, nec</option>
                                                        <option value="4901">Armenian</option>
                                                        <option value="8100">Arnhem Land and Daly River Region Languages
                                                        </option>
                                                        <option value="8199">Arnhem Land and Daly River Region
                                                            Languages, nec</option>
                                                        <option value="3903">Aromunian (Macedo-Romanian)</option>
                                                        <option value="8620">Arrernte</option>
                                                        <option value="8629">Arrernte, nec</option>
                                                        <option value="5213">Assamese</option>
                                                        <option value="4206">Assyrian Neo-Aramaic</option>
                                                        <option value="9701">Auslan</option>
                                                        <option value="8000">AUSTRALIAN INDIGENOUS LANGUAGES</option>
                                                        <option value="4302">Azeri</option>
                                                        <option value="8946">Baanbay</option>
                                                        <option value="8947">Badimaya</option>
                                                        <option value="6514">Balinese</option>
                                                        <option value="4104">Balochi</option>
                                                        <option value="3100">Baltic</option>
                                                        <option value="8903">Bandjalang</option>
                                                        <option value="8904">Banyjima</option>
                                                        <option value="8948">Barababaraba</option>
                                                        <option value="8801">Bardi</option>
                                                        <option value="9242">Bari</option>
                                                        <option value="2901">Basque</option>
                                                        <option value="9243">Bassa</option>
                                                        <option value="8905">Batjala</option>
                                                        <option value="3401">Belorussian</option>
                                                        <option value="9215">Bemba</option>
                                                        <option value="5201">Bengali</option>
                                                        <option value="8906">Bidjara</option>
                                                        <option value="6515">Bikol</option>
                                                        <option value="8504">Bilinarra</option>
                                                        <option value="6501">Bisaya</option>
                                                        <option value="9402">Bislama</option>
                                                        <option value="3501">Bosnian</option>
                                                        <option value="3502">Bulgarian</option>
                                                        <option value="8802">Bunuba</option>
                                                        <option value="8181">Burarra</option>
                                                        <option value="8180">Burarran</option>
                                                        <option value="8189">Burarran, nec</option>
                                                        <option value="6101">Burmese</option>
                                                        <option value="6100">Burmese and Related Languages</option>
                                                        <option value="6199">Burmese and Related Languages, nec</option>
                                                        <option value="7101">Cantonese</option>
                                                        <option value="8300">Cape York Peninsula Languages</option>
                                                        <option value="8399">Cape York Peninsula Languages, nec</option>
                                                        <option value="2301">Catalan</option>
                                                        <option value="6502">Cebuano</option>
                                                        <option value="1100">Celtic</option>
                                                        <option value="1199">Celtic, nec</option>
                                                        <option value="8611">Central Anmatyerr</option>
                                                        <option value="4207">Chaldean Neo-Aramaic</option>
                                                        <option value="7100">Chinese</option>
                                                        <option value="7199">Chinese, nec</option>
                                                        <option value="0005">Creole</option>
                                                        <option value="3503">Croatian</option>
                                                        <option value="0004">Cypriot, so decribed</option>
                                                        <option value="3601">Czech</option>
                                                        <option value="3604">Czechoslovakian, so described</option>
                                                        <option value="8233">Daatiwuy</option>
                                                        <option value="8951">Dadi Dadi</option>
                                                        <option value="8122">Dalabon</option>
                                                        <option value="9244">Dan (Gio-Dan)</option>
                                                        <option value="1501">Danish</option>
                                                        <option value="4105">Dari</option>
                                                        <option value="8221">Dhalwangu</option>
                                                        <option value="8907">Dhanggatti</option>
                                                        <option value="8210">Dhangu</option>
                                                        <option value="8219">Dhangu, nec</option>
                                                        <option value="8952">Dharawal</option>
                                                        <option value="8220">Dhay yi</option>
                                                        <option value="8229">Dhay yi, nec</option>
                                                        <option value="5214">Dhivehi</option>
                                                        <option value="8230">Dhuwal</option>
                                                        <option value="8239">Dhuwal, nec</option>
                                                        <option value="8240">Dhuwala</option>
                                                        <option value="8249">Dhuwala, nec</option>
                                                        <option value="8291">Dhuwaya</option>
                                                        <option value="9216">Dinka</option>
                                                        <option value="8908">Diyari</option>
                                                        <option value="8305">Djabugay</option>
                                                        <option value="8953">Djabwurrung</option>
                                                        <option value="8231">Djambarrpuyngu</option>
                                                        <option value="8292">Djangu</option>
                                                        <option value="8232">Djapu</option>
                                                        <option value="8222">Djarrwark</option>
                                                        <option value="8250">Djinang</option>
                                                        <option value="8259">Djinang, nec</option>
                                                        <option value="8262">Djinba</option>
                                                        <option value="8269">Djinba, nec</option>
                                                        <option value="5100">Dravidian</option>
                                                        <option value="5199">Dravidian, nec</option>
                                                        <option value="1401">Dutch</option>
                                                        <option value="1400">Dutch and Related Languages</option>
                                                        <option value="8306">Dyirbal</option>
                                                        <option value="3400">East Slavic</option>
                                                        <option value="8612">Eastern Anmatyerr</option>
                                                        <option value="8621">Eastern Arrernte</option>
                                                        <option value="7000">EASTERN ASIAN LANGUAGES</option>
                                                        <option value="3000">EASTERN EUROPEAN LANGUAGES</option>
                                                        <option value="1201">English</option>
                                                        <option value="1601">Estonian</option>
                                                        <option value="9217">Ewe</option>
                                                        <option value="9301">Fijian</option>
                                                        <option value="5217">Fijian Hindustani</option>
                                                        <option value="6512">Filipino</option>
                                                        <option value="1602">Finnish</option>
                                                        <option value="1600">Finnish and Related Languages</option>
                                                        <option value="1699">Finnish and Related Languages, nec</option>
                                                        <option value="2101">French</option>
                                                        <option value="0006">French Creole</option>
                                                        <option value="1402">Frisian</option>
                                                        <option value="9245">Fulfulde</option>
                                                        <option value="9218">Ga</option>
                                                        <option value="1101">Gaelic (Scotland)</option>
                                                        <option value="8211">Galpu</option>
                                                        <option value="8813">Gambera</option>
                                                        <option value="8911">Gamilaraay</option>
                                                        <option value="8261">Ganalbingu</option>
                                                        <option value="8157">Garrwa</option>
                                                        <option value="8913">Garuwali</option>
                                                        <option value="4902">Georgian</option>
                                                        <option value="1301">German</option>
                                                        <option value="1300">German and Related Languages</option>
                                                        <option value="9302">Gilbertese</option>
                                                        <option value="8307">Girramay</option>
                                                        <option value="8914">Githabul</option>
                                                        <option value="8212">Golumala</option>
                                                        <option value="8803">Gooniyandi</option>
                                                        <option value="2201">Greek</option>
                                                        <option value="8123">Gudanji</option>
                                                        <option value="8954">Gudjal</option>
                                                        <option value="5202">Gujarati</option>
                                                        <option value="8242">Gumatj</option>
                                                        <option value="8915">Gumbaynggir</option>
                                                        <option value="8182">Gun-nartpa</option>
                                                        <option value="8171">Gundjeihmi</option>
                                                        <option value="8243">Gupapuyngu</option>
                                                        <option value="8505">Gurindji</option>
                                                        <option value="8506">Gurindji Kriol</option>
                                                        <option value="8183">Gurr-goni</option>
                                                        <option value="8302">Guugu Yimidhirr</option>
                                                        <option value="8244">Guyamirrilili</option>
                                                        <option value="6102">Haka</option>
                                                        <option value="7102">Hakka</option>
                                                        <option value="9221">Harari</option>
                                                        <option value="9222">Hausa</option>
                                                        <option value="9403">Hawaiian English</option>
                                                        <option value="4107">Hazaraghi</option>
                                                        <option value="4204">Hebrew</option>
                                                        <option value="5203">Hindi</option>
                                                        <option value="6201">Hmong</option>
                                                        <option value="6200">Hmong-Mien</option>
                                                        <option value="6299">Hmong-Mien, nec</option>
                                                        <option value="3301">Hungarian</option>
                                                        <option value="6516">Iban</option>
                                                        <option value="2300">Iberian Romance</option>
                                                        <option value="2399">Iberian Romance, nec</option>
                                                        <option value="1502">Icelandic</option>
                                                        <option value="9223">Igbo</option>
                                                        <option value="6503">IIokano</option>
                                                        <option value="6517">Ilonggo (Hiligaynon)</option>
                                                        <option value="5200">Indo-Aryan</option>
                                                        <option value="5299">Indo-Aryan, nec</option>
                                                        <option value="6504">Indonesian</option>
                                                        <option value="9601">Invented Languages</option>
                                                        <option value="4100">Iranic</option>
                                                        <option value="4199">Iranic, nec</option>
                                                        <option value="1102">Irish</option>
                                                        <option value="2401">Italian</option>
                                                        <option value="8127">Iwaidja</option>
                                                        <option value="8128">Jaminjung</option>
                                                        <option value="7201">Japanese</option>
                                                        <option value="8507">Jaru</option>
                                                        <option value="6518">Javanese</option>
                                                        <option value="8814">Jawi</option>
                                                        <option value="8131">Jawoyn</option>
                                                        <option value="8132">Jingulu</option>
                                                        <option value="8401">Kalaw Kawaw Ya/Kalaw Lagaw Ya</option>
                                                        <option value="8916">Kanai</option>
                                                        <option value="5101">Kannada</option>
                                                        <option value="8917">Karajarri</option>
                                                        <option value="6103">Karen</option>
                                                        <option value="8918">Kariyarra</option>
                                                        <option value="8704">Kartujarra</option>
                                                        <option value="5215">Kashmiri</option>
                                                        <option value="8921">Kaurna</option>
                                                        <option value="8922">Kayardild</option>
                                                        <option value="8606">Kaytetye</option>
                                                        <option value="8955">Keerray-Woorroong</option>
                                                        <option value="6301">Khmer</option>
                                                        <option value="8815">Kija</option>
                                                        <option value="9224">Kikuyu</option>
                                                        <option value="8800">Kimberley Area Languages</option>
                                                        <option value="8899">Kimberley Area Languages, nec</option>
                                                        <option value="9246">Kinyarwanda (Rwanda)</option>
                                                        <option value="9247">Kirundi (Rundi)</option>
                                                        <option value="9502">Kiwai</option>
                                                        <option value="8308">Koko-Bera</option>
                                                        <option value="5204">Konkani</option>
                                                        <option value="7301">Korean</option>
                                                        <option value="9248">Kpelle</option>
                                                        <option value="9251">Krahn</option>
                                                        <option value="9225">Krio</option>
                                                        <option value="8924">Kriol</option>
                                                        <option value="8316">Kugu Muminh</option>
                                                        <option value="8705">Kukatha</option>
                                                        <option value="8706">Kukatja</option>
                                                        <option value="8301">Kuku Yalanji</option>
                                                        <option value="8133">Kunbarlang</option>
                                                        <option value="8172">Kune</option>
                                                        <option value="8173">Kuninjku</option>
                                                        <option value="8174">Kunwinjku</option>
                                                        <option value="8170">Kunwinjkuan</option>
                                                        <option value="8179">Kunwinjkuan, nec</option>
                                                        <option value="4101">Kurdish</option>
                                                        <option value="8311">Kuuk Thayorre</option>
                                                        <option value="8303">Kuuku-Ya u</option>
                                                        <option value="8158">Kuwema</option>
                                                        <option value="8956">Ladji Ladji</option>
                                                        <option value="8312">Lamalama</option>
                                                        <option value="6401">Lao</option>
                                                        <option value="8925">Lardil</option>
                                                        <option value="8136">Larrakiya</option>
                                                        <option value="2902">Latin</option>
                                                        <option value="3101">Latvian</option>
                                                        <option value="1302">Letzeburgish</option>
                                                        <option value="9252">Liberian (Liberian English)</option>
                                                        <option value="8508">Light Warlpiri</option>
                                                        <option value="9262">Lingala</option>
                                                        <option value="3102">Lithuanian</option>
                                                        <option value="8235">Liyagalawumirr</option>
                                                        <option value="8236">Liyagawumirr</option>
                                                        <option value="9253">Loma (Lorma)</option>
                                                        <option value="9226">Luganda</option>
                                                        <option value="9254">Lumun (Kuku Lumun)</option>
                                                        <option value="9227">Luo</option>
                                                        <option value="8707">Luritja</option>
                                                        <option value="3504">Macedonian</option>
                                                        <option value="8293">Madarrpa</option>
                                                        <option value="9255">Madi</option>
                                                        <option value="9702">Makaton</option>
                                                        <option value="8137">Malak Malak</option>
                                                        <option value="6505">Malay</option>
                                                        <option value="5102">Malayalam</option>
                                                        <option value="8511">Malngin</option>
                                                        <option value="2501">Maltese</option>
                                                        <option value="4208">Mandaean (Mandaic)</option>
                                                        <option value="7104">Mandarin</option>
                                                        <option value="9256">Mandinka</option>
                                                        <option value="8926">Mangala</option>
                                                        <option value="8138">Mangarrayi</option>
                                                        <option value="8246">Manggalili</option>
                                                        <option value="9257">Mann</option>
                                                        <option value="8263">Manyjalpingu</option>
                                                        <option value="8708">Manyjilyjarra</option>
                                                        <option value="9303">Maori (Cook Island)</option>
                                                        <option value="9304">Maori (New Zealand)</option>
                                                        <option value="5205">Marathi</option>
                                                        <option value="8141">Maringarr</option>
                                                        <option value="8142">Marra</option>
                                                        <option value="8161">Marramaninyshi</option>
                                                        <option value="8234">Marrangu</option>
                                                        <option value="8166">Marridan (Maridan)</option>
                                                        <option value="8143">Marrithiyel</option>
                                                        <option value="8711">Martu Wangka</option>
                                                        <option value="8144">Matngala</option>
                                                        <option value="8111">Maung</option>
                                                        <option value="9205">Mauritian Creole</option>
                                                        <option value="8175">Mayali</option>
                                                        <option value="8402">Meriam Mir</option>
                                                        <option value="4200">Middle Eastern Semitic Languages</option>
                                                        <option value="4299">Middle Eastern Semitic Languages, nec
                                                        </option>
                                                        <option value="7107">Min Nan</option>
                                                        <option value="8804">Miriwoong</option>
                                                        <option value="8957">Mirning</option>
                                                        <option value="6303">Mon</option>
                                                        <option value="6300">Mon-Khmer</option>
                                                        <option value="6399">Mon-Khmer, nec</option>
                                                        <option value="7902">Mongolian</option>
                                                        <option value="9258">Moro (Nuba Moro)</option>
                                                        <option value="8317">Morrobalama</option>
                                                        <option value="9503">Motu (HiriMotu)</option>
                                                        <option value="8512">Mudburra</option>
                                                        <option value="8146">Murrinh Patha</option>
                                                        <option value="8927">Muruwari</option>
                                                        <option value="8147">Na-kara</option>
                                                        <option value="8928">Narungga</option>
                                                        <option value="9306">Nauruan</option>
                                                        <option value="9228">Ndebele</option>
                                                        <option value="8148">Ndjébbana (Gunavidji)</option>
                                                        <option value="5206">Nepali</option>
                                                        <option value="8712">Ngaanyatjarra</option>
                                                        <option value="8151">Ngalakgan</option>
                                                        <option value="8152">Ngaliwurru</option>
                                                        <option value="8113">Ngan gikurunggurr</option>
                                                        <option value="8162">Ngandi</option>
                                                        <option value="8514">Ngardi</option>
                                                        <option value="8805">Ngarinyin</option>
                                                        <option value="8515">Ngarinyman</option>
                                                        <option value="8931">Ngarluma</option>
                                                        <option value="8932">Ngarrindjeri</option>
                                                        <option value="8958">Ngatjumaya</option>
                                                        <option value="8281">Nhangu</option>
                                                        <option value="8289">Nhangu, nec</option>
                                                        <option value="9307">Niue</option>
                                                        <option value="0001">Non Verbal</option>
                                                        <option value="8500">Northern Desert Fringe Area Languages
                                                        </option>
                                                        <option value="8599">Northern Desert Fringe Area Languages, nec
                                                        </option>
                                                        <option value="1000">NORTHERN EUROPEAN LANGUAGES</option>
                                                        <option value="1503">Norwegian</option>
                                                        <option
                                                            value="@@@@">Not
                                                            Stated</option>
                                                        <option value="9231">Nuer</option>
                                                        <option value="8153">Nungali</option>
                                                        <option value="8114">Nunggubuyu</option>
                                                        <option value="8933">Nyamal</option>
                                                        <option value="8934">Nyangumarta</option>
                                                        <option value="9232">Nyanja (Chichewa)</option>
                                                        <option value="8806">Nyikina</option>
                                                        <option value="8935">Nyungar</option>
                                                        <option value="9400">Oceanian Pidgins and Creoles</option>
                                                        <option value="9499">Oceanian Pidgins and Creoles, nec</option>
                                                        <option value="5216">Oriya</option>
                                                        <option value="9206">Oromo</option>
                                                        <option value="8900">Other Australian Indigenous Languages
                                                        </option>
                                                        <option value="8999">Other Australian Indigenous Languages, nec
                                                        </option>
                                                        <option value="7900">Other Eastern Asian Languages</option>
                                                        <option value="7999">Other Eastern Asian Languages, nec</option>
                                                        <option value="3900">Other Eastern European Languages</option>
                                                        <option value="3999">Other Eastern European Languages, nec
                                                        </option>
                                                        <option value="9000">OTHER LANGUAGES</option>
                                                        <option value="6999">Other Southeast Asian Languages</option>
                                                        <option value="5999">Other Southern Asian Languages</option>
                                                        <option value="2900">Other Southern European Languages</option>
                                                        <option value="2999">Other Southern European Languages, nec
                                                        </option>
                                                        <option value="4900">Other Southwest and Central Asian Languages
                                                        </option>
                                                        <option value="4999">Other Southwest and Central Asian
                                                            Languages, nec</option>
                                                        <option value="8290">Other Yolngu Matha</option>
                                                        <option value="8299">Other Yolngu Matha</option>
                                                        <option value="8936">Paakantyi</option>
                                                        <option value="9300">Pacific Austronesian Languages</option>
                                                        <option value="9399">Pacific Austronesian Languages, nec
                                                        </option>
                                                        <option value="8937">Palyku/Nyiyaparli</option>
                                                        <option value="6521">Pampangan</option>
                                                        <option value="9500">Papua New Guinea Papuan Languages</option>
                                                        <option value="9599">Papua New Guinea Papuan Languages, nec
                                                        </option>
                                                        <option value="4102">Pashto</option>
                                                        <option value="4106">Persian (excluding Dari)</option>
                                                        <option value="0009">Pidgin</option>
                                                        <option value="8713">Pintupi</option>
                                                        <option value="9404">Pitcairnese</option>
                                                        <option value="8714">Pitjantjatjara</option>
                                                        <option value="3602">Polish</option>
                                                        <option value="2302">Portuguese</option>
                                                        <option value="0008">Portuguese Creole</option>
                                                        <option value="5207">Punjabi</option>
                                                        <option value="8115">Rembarrnga</option>
                                                        <option value="8295">Rirratjingu</option>
                                                        <option value="8271">Ritharrngu</option>
                                                        <option value="6104">Rohingya</option>
                                                        <option value="3904">Romanian</option>
                                                        <option value="3905">Romany</option>
                                                        <option value="9312">Rotuman</option>
                                                        <option value="3402">Russian</option>
                                                        <option value="9308">Samoan</option>
                                                        <option value="1500">Scandinavian</option>
                                                        <option value="1599">Scandinavian, nec</option>
                                                        <option value="3505">Serbian</option>
                                                        <option value="3507">Serbo-Croatian/Yugoslavian, so described
                                                        </option>
                                                        <option value="9238">Seychelles Creole</option>
                                                        <option value="9233">Shilluk</option>
                                                        <option value="9207">Shona</option>
                                                        <option value="9700">Sign Languages</option>
                                                        <option value="9799">Sign Languages, nec</option>
                                                        <option value="5208">Sindhi</option>
                                                        <option value="5211">Sinhalese</option>
                                                        <option value="3603">Slovak</option>
                                                        <option value="3506">Slovene</option>
                                                        <option value="9405">Solomon Islands Pijin</option>
                                                        <option value="9208">Somali</option>
                                                        <option value="3500">South Slavic</option>
                                                        <option value="6500">Southeast Asian Austronesian Languages
                                                        </option>
                                                        <option value="6599">Southeast Asian Austronesian Languages, nec
                                                        </option>
                                                        <option value="6000">SOUTHEAST ASIAN LANGUAGES</option>
                                                        <option value="5000">SOUTHERN ASIAN LANGUAGES</option>
                                                        <option value="2000">SOUTHERN EUROPEAN LANGUAGES</option>
                                                        <option value="4000">SOUTHWEST AND CENTRAL ASIAN LANGUAGES
                                                        </option>
                                                        <option value="2303">Spanish</option>
                                                        <option value="0007">Spanish Creole</option>
                                                        <option value="9211">Swahili</option>
                                                        <option value="1504">Swedish</option>
                                                        <option value="0003">Swiss, so described</option>
                                                        <option value="6511">Tagalog</option>
                                                        <option value="6400">Tai</option>
                                                        <option value="6499">Tai, nec</option>
                                                        <option value="5103">Tamil</option>
                                                        <option value="4303">Tatar</option>
                                                        <option value="5104">Telugu</option>
                                                        <option value="6507">Tetum</option>
                                                        <option value="6402">Thai</option>
                                                        <option value="8318">Thaynakwith</option>
                                                        <option value="9261">Themne</option>
                                                        <option value="7901">Tibetan</option>
                                                        <option value="9234">Tigré</option>
                                                        <option value="9235">Tigrinya</option>
                                                        <option value="6508">Timorese</option>
                                                        <option value="8117">Tiwi</option>
                                                        <option value="8322">Tjungundji</option>
                                                        <option value="8722">Tjupany</option>
                                                        <option value="9504">Tok Pisin (Neomelanesian)</option>
                                                        <option value="9313">Tokelauan</option>
                                                        <option value="9311">Tongan</option>
                                                        <option value="8403">Torres Strait Creole</option>
                                                        <option value="8400">Torres Strait Island Languages</option>
                                                        <option value="9236">Tswana</option>
                                                        <option value="5105">Tulu</option>
                                                        <option value="4300">Turkic</option>
                                                        <option value="4399">Turkic, nec</option>
                                                        <option value="4301">Turkish</option>
                                                        <option value="4304">Turkmen</option>
                                                        <option value="9314">Tuvaluan</option>
                                                        <option value="3403">Ukrainian</option>
                                                        <option value="0000">Unknown</option>
                                                        <option value="5212">Urdu</option>
                                                        <option value="4305">Uygur</option>
                                                        <option value="4306">Uzbek</option>
                                                        <option value="6302">Vietnamese</option>
                                                        <option value="8163">Waanyi</option>
                                                        <option value="8272">Wagilak</option>
                                                        <option value="8164">Wagiman</option>
                                                        <option value="8938">Wajarri</option>
                                                        <option value="8516">Walmajarri</option>
                                                        <option value="8961">Waluwarra</option>
                                                        <option value="8154">Wambaya</option>
                                                        <option value="8715">Wangkajunga</option>
                                                        <option value="8962">Wangkangurru</option>
                                                        <option value="8716">Wangkatha</option>
                                                        <option value="8213">Wangurri</option>
                                                        <option value="8517">Wanyjirra</option>
                                                        <option value="8155">Wardaman</option>
                                                        <option value="8963">Wargamay</option>
                                                        <option value="8518">Warlmanpa</option>
                                                        <option value="8521">Warlpiri</option>
                                                        <option value="8717">Warnman</option>
                                                        <option value="8294">Warramiri</option>
                                                        <option value="8522">Warumungu</option>
                                                        <option value="1103">Welsh</option>
                                                        <option value="8964">Wergaia</option>
                                                        <option value="3600">West Slavic</option>
                                                        <option value="8622">Western Arrarnta</option>
                                                        <option value="8700">Western Desert Language</option>
                                                        <option value="8799">Western Desert Language, nec</option>
                                                        <option value="8304">Wik Mungkan</option>
                                                        <option value="8314">Wik Ngathan</option>
                                                        <option value="8941">Wiradjuri</option>
                                                        <option value="8807">Worla</option>
                                                        <option value="8808">Worrorra</option>
                                                        <option value="7106">Wu</option>
                                                        <option value="8247">Wubulkarra</option>
                                                        <option value="8811">Wunambal</option>
                                                        <option value="8251">Wurlaki</option>
                                                        <option value="9237">Xhosa</option>
                                                        <option value="8270">Yakuy</option>
                                                        <option value="8279">Yakuy, nec</option>
                                                        <option value="8282">Yan-Nhangu</option>
                                                        <option value="8718">Yankunytjatjara</option>
                                                        <option value="8165">Yanyuwa</option>
                                                        <option value="9315">Yapese</option>
                                                        <option value="8812">Yawuru</option>
                                                        <option value="1303">Yiddish</option>
                                                        <option value="8313">Yidiny</option>
                                                        <option value="8943">Yindjibarndi</option>
                                                        <option value="8944">Yinhawangka</option>
                                                        <option value="8200">Yolngu Matha</option>
                                                        <option value="8945">Yorta Yorta</option>
                                                        <option value="9212">Yoruba</option>
                                                        <option value="8965">Yugambeh</option>
                                                        <option value="8721">Yulparija</option>
                                                        <option value="8321">Yupangathi</option>
                                                        <option value="6105">Zomi</option>
                                                        <option value="9213">Zulu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="clear:both;height:5px;"></div>
                                            <div id="englishProfTitle"
                                                style="padding: 5px; font-weight: bold; width: 380px; float: left; display: block;" "="">Proficiency in English: </div>
                                                 <div id="englishProf" style="padding: 0px 20px; float: left; display: block;" "="">
                                                <input type="radio" name="englishProficiency" value="1">
                                                Very well<br><input type="radio" name="englishProficiency"
                                                    value="2">
                                                Well<br><input type="radio" name="englishProficiency"
                                                    value="3">
                                                Not well<br><input type="radio" name="englishProficiency"
                                                    value="4">
                                                Not at all<br>
                                            </div>
                                            <div style="clear:both;height:5px;"></div>
                                            <div style="padding:5px;font-weight:bold;float:left;width:380px;">Indigenous
                                                Status: </div>
                                            <div style="padding:5px 20px;float:left;">
                                                <input type="radio" name="indigenousStatus" value="1">
                                                Yes, Aboriginal<br><input type="radio" name="indigenousStatus"
                                                    value="2">
                                                Yes, Torres Strait Islander<br><input type="radio"
                                                    name="indigenousStatus" value="3">
                                                Yes, Aboriginal AND Torres Strait Islander<br><input type="radio"
                                                    name="indigenousStatus" value="4">
                                                No, Neither Aboriginal nor Torres Strait Islander<br>
                                            </div>
                                        </div>
                                        <div style="clear:both; height:20px;"></div>
                                        <div align="center">
                                            <button type="submit" class="btn btn-primary" style="margin:0px 5px;"
                                                fdprocessedid="j210e">Save</button>
                                            <button type="button" class="btn btn-primary" style="margin:0px 5px;"
                                                onclick="unsaved=true;editLanguageAndDiversity(524977, 'view');"
                                                fdprocessedid="o9gpn">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="disability" role="tabpanel"
                                aria-labelledby="disability-tab">
                                <div class="" id="disability-details">
                                    <div style="float:left;padding-left:50px;">
                                        <div style="padding:5px;float:left;width:500px;font-weight:bold;">Has a
                                            disability, impairment or long-term condition?</div>
                                        <div style="padding:5px 5px;float:left;vertical-align:bottom">
                                            Not Provided </div>
                                        <div style="clear:both;height:5px;"></div>
                                        <div style="padding:5px;font-weight:bold;width:480px;float:left;">If Yes, please
                                            indicate the areas of disability, impairment or long-term condition: </div>
                                        <div style="padding:5px 20px;line-height:20px;float:left;">
                                            <input style="margin-right:4px;" type="checkbox" class="custom-checkbox"
                                                name="avetdisabilitytypeid[]" value="11"
                                                disabled="disabled">Hearing/Deaf<br><input style="margin-right:4px;"
                                                type="checkbox" class="custom-checkbox" name="avetdisabilitytypeid[]"
                                                value="12" disabled="disabled">Physical<br><input
                                                style="margin-right:4px;" type="checkbox" class="custom-checkbox"
                                                name="avetdisabilitytypeid[]" value="13"
                                                disabled="disabled">Intellectual<br><input style="margin-right:4px;"
                                                type="checkbox" class="custom-checkbox" name="avetdisabilitytypeid[]"
                                                value="14" disabled="disabled">Learning<br><input
                                                style="margin-right:4px;" type="checkbox" class="custom-checkbox"
                                                name="avetdisabilitytypeid[]" value="15"
                                                disabled="disabled">Mental Illness<br><input style="margin-right:4px;"
                                                type="checkbox" class="custom-checkbox" name="avetdisabilitytypeid[]"
                                                value="16" disabled="disabled">Acquired Brain Impairment<br><input
                                                style="margin-right:4px;" type="checkbox" class="custom-checkbox"
                                                name="avetdisabilitytypeid[]" value="17"
                                                disabled="disabled">Vision<br><input style="margin-right:4px;"
                                                type="checkbox" class="custom-checkbox" name="avetdisabilitytypeid[]"
                                                value="18" disabled="disabled">Medical Condition<br><input
                                                style="margin-right:4px;" type="checkbox" class="custom-checkbox"
                                                name="avetdisabilitytypeid[]" value="19"
                                                disabled="disabled">Other<br>
                                        </div>
                                    </div>
                                    <div style="clear:both;height:5px;"></div>

                                    <div style="clear:both; text-align:center">
                                        <button type="button" class="btn btn-primary"
                                            id="edit-disability">Edit</button>
                                    </div>
                                </div>
                                <div id="form-disibility" class="hidden">
                                    <form name="edit_disability_frm" id="edit_disability_frm" method="post"
                                        action="" onsubmit="unsaved=true;">
                                        <div style="float:left;padding-left:50px;">
                                            <div style="padding:5px;float:left;width:500px; font-weight:bold;">Has a
                                                disability, impairment or long-term condition?</div>
                                            <div style="padding:0px 5px; float:left; vertical-align:bottom">
                                                <select class="form-control" name="isDisabled" id="isDisabled"
                                                    onchange="disableMedicalNotes();" fdprocessedid="pmz5kp">
                                                    <option value="Y">Yes</option>
                                                    <option value="N">No</option>
                                                    <option value="NP" selected="">Not Provided</option>
                                                </select>
                                            </div>
                                            <div style="clear:both;height:10px;"></div>
                                            <div style="padding:5px;font-weight:bold;width:480px;float:left;">If Yes,
                                                please indicate the areas of disability, impairment or long-term condition:
                                            </div>
                                            <div style="padding:5px 20px;line-height:20px;float:left;">
                                                <input type="checkbox" class="custom-checkbox"
                                                    style="margin-right:5px;" name="avetdisabilitytypeid[]"
                                                    value="11" onchange="toggleNotes();"
                                                    disabled="disabled">Hearing/Deaf<br><input type="checkbox"
                                                    class="custom-checkbox" style="margin-right:5px;"
                                                    name="avetdisabilitytypeid[]" value="12"
                                                    onchange="toggleNotes();" disabled="disabled">Physical<br><input
                                                    type="checkbox" class="custom-checkbox" style="margin-right:5px;"
                                                    name="avetdisabilitytypeid[]" value="13"
                                                    onchange="toggleNotes();" disabled="disabled">Intellectual<br><input
                                                    type="checkbox" class="custom-checkbox" style="margin-right:5px;"
                                                    name="avetdisabilitytypeid[]" value="14"
                                                    onchange="toggleNotes();" disabled="disabled">Learning<br><input
                                                    type="checkbox" class="custom-checkbox" style="margin-right:5px;"
                                                    name="avetdisabilitytypeid[]" value="15"
                                                    onchange="toggleNotes();" disabled="disabled">Mental
                                                Illness<br><input type="checkbox" class="custom-checkbox"
                                                    style="margin-right:5px;" name="avetdisabilitytypeid[]"
                                                    value="16" onchange="toggleNotes();"
                                                    disabled="disabled">Acquired Brain Impairment<br><input
                                                    type="checkbox" class="custom-checkbox" style="margin-right:5px;"
                                                    name="avetdisabilitytypeid[]" value="17"
                                                    onchange="toggleNotes();" disabled="disabled">Vision<br><input
                                                    type="checkbox" class="custom-checkbox" style="margin-right:5px;"
                                                    name="avetdisabilitytypeid[]" value="18"
                                                    onchange="toggleNotes();" disabled="disabled">Medical
                                                Condition<br><input type="checkbox" class="custom-checkbox"
                                                    style="margin-right:5px;" name="avetdisabilitytypeid[]"
                                                    value="19" onchange="toggleNotes();"
                                                    disabled="disabled">Other<br>
                                            </div>
                                        </div>
                                        <div style="clear:both;height:10px;"></div>
                                        <div id="medicalnote" style="display:none;padding:0px 20px;">
                                            <div style="padding:5px; float:left; width:100px;" align="left">Medical
                                                Note: </div>
                                            <textarea name="notecontent" id="notecontent" style="width:200px; height:100px;"></textarea>
                                        </div>
                                        <div style="clear:both;height:30px;"></div>
                                        <div align="center">
                                            <button type="submit" class="btn btn-primary" style="margin:0px 5px;"
                                                fdprocessedid="bqv2x">Save</button>
                                            <button type="button" class="btn btn-primary" style="margin:0px 5px;"
                                                onclick="unsaved=true;editDisability(524977, 'view');"
                                                fdprocessedid="685wvg">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="schooling" role="tabpanel"
                                aria-labelledby="schooling-tab">
                                <div class="" id="details-schooling">
                                    <div style="float:left;padding-left:150px;">
                                        <!--new requirement-->
                                        <div style="padding:5px;width:400px;font-weight:bold;float:left">Still at school?
                                        </div>
                                        <div style="padding:5px 20px; float:left">
                                            No </div>
                                        <br>
                                        <!--new requirement-->
                                        <div style="padding:5px;width:400px;font-weight:bold;float:left;">Highest school
                                            level completed?</div>
                                        <div style="padding:0px 20px;float:left;">
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="02" disabled="">Did not
                                                go to school
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="08" disabled="">Year 8
                                                or below
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="09" disabled="">Year 9
                                                or equivalent
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="10"
                                                    disabled="">Completed Year 10
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="11"
                                                    disabled="">Completed Year 11
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="12"
                                                    disabled="">Completed Year 12
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="@@"
                                                    disabled="">Not specified
                                            </div>
                                        </div>
                                        <br>
                                        <div style="padding:5px;width:400px;font-weight:bold;float:left;">Year school
                                            level was completed: </div>
                                        <div style="padding:0px 20px;float:left;">
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="isSchoolYearCompletedEntered"
                                                    id="isSchoolYearCompletedEntered" value="1" disabled="">
                                                Yes, please state year:
                                                <input type="text" maxlength="4" name="yearSchoolCompleted"
                                                    id="yearSchoolCompleted" value="" disabled=""
                                                    fdprocessedid="cmro7">
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="isSchoolYearCompletedEntered"
                                                    id="isSchoolYearCompletedEntered" value="0" disabled="">
                                                Not stated
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div style="clear:both; height:20px;"></div>
                                    <div style="clear:both; text-align:center">
                                        <button type="button" class="btn btn-primary"
                                            id="edit-scholling">Edit</button>
                                    </div>
                                </div>
                                <div class="hidden" id="form-schooling">
                                    <form name="edit_schooling_frm" id="edit_schooling_frm" method="post"
                                        action="../function/saveSchooling.php?studentId=524977">
                                        <div style="float:left;padding-left:150px;">
                                            <!--new requirement-->
                                            <div style="padding:5px; width:400px;font-weight:bold;float:left">Still at
                                                school?</div>
                                            <div style="padding:0px 20px;float:left">
                                                <select class="form-control" name="stillAtSchool" id="stillAtSchool"
                                                    fdprocessedid="15v41d">
                                                    <option value="Y">Yes</option>
                                                    <option value="N" selected="">No</option>
                                                </select>
                                            </div>
                                            <div style="height:20px;clear:both;"></div>
                                            <!--new requirement-->
                                            <div style="padding:5px;width:400px;font-weight:bold;float:left;">Highest
                                                school level completed?</div>
                                            <div style="padding:0px 20px;float:left;">
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        class="custom-checkbox" name="highestLevelCompleted"
                                                        value="02">Did not go to school
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        class="custom-checkbox" name="highestLevelCompleted"
                                                        value="08">Year 8 or below
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        class="custom-checkbox" name="highestLevelCompleted"
                                                        value="09">Year 9 or equivalent
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        class="custom-checkbox" name="highestLevelCompleted"
                                                        value="10">Completed Year 10
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        class="custom-checkbox" name="highestLevelCompleted"
                                                        value="11">Completed Year 11
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        class="custom-checkbox" name="highestLevelCompleted"
                                                        value="12">Completed Year 12
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        class="custom-checkbox" name="highestLevelCompleted"
                                                        value="@@">Not specified
                                                </div>
                                            </div>
                                            <div style="height:20px;clear:both;"></div>
                                            <div style="padding:5px;width:400px;font-weight:bold;float:left;">Year school
                                                level was completed</div>
                                            <div style="padding:0px 20px;float:left;">
                                                <div style="padding:2px 0px;">
                                                    <input class="custom-checkbox" style="margin-right:4px;"
                                                        type="radio" name="isSchoolYearCompletedEntered"
                                                        id="isSchoolYearCompletedEntered_0" value="1"
                                                        onclick="disableTextBox(1);">
                                                    Yes, please state year:
                                                    <input type="text" class="form-control" maxlength="4"
                                                        name="yearSchoolCompleted" id="yearSchoolCompleted"
                                                        value=""
                                                        onfocus="setRadioButton('isSchoolYearCompletedEntered_0');"
                                                        fdprocessedid="kxfjkk">
                                                </div>
                                                <!--fix for bug id: 9068-->
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" class="custom-checkbox"
                                                        style="margin-right:4px;" name="isSchoolYearCompletedEntered"
                                                        id="isSchoolYearCompletedEntered_1" value="0"
                                                        onclick="disableTextBox(0);">
                                                    Not stated
                                                </div>
                                                <!--fix for bug id: 9068-->
                                            </div>
                                        </div>
                                        <div style="clear:both; height:20px;"></div>
                                        <div align="center">
                                            <button type="submit" class="btn btn-primary" style="margin:0px 5px;"
                                                fdprocessedid="77unl4">Save</button>
                                            <button type="button" class="btn btn-primary" style="margin:0px 5px;"
                                                onclick="unsaved=true;editSchooling(524977, 'view');"
                                                fdprocessedid="ujdjk5">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="qualifications" role="tabpanel"
                                aria-labelledby="qualifications-tab">
                                <div class="" id="details-qualifications">
                                    <div style="float:left;padding-left:150px;">
                                        <!--new requirement-->
                                        <div style="padding:5px;width:400px;font-weight:bold;float:left">Still at school?
                                        </div>
                                        <div style="padding:5px 20px; float:left">
                                            No </div>
                                        <br>
                                        <!--new requirement-->
                                        <div style="padding:5px;width:400px;font-weight:bold;float:left;">Highest school
                                            level completed?</div>
                                        <div style="padding:0px 20px;float:left;">
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="02" disabled="">Did not
                                                go to school
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="08" disabled="">Year 8
                                                or below
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="09" disabled="">Year 9
                                                or equivalent
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="10"
                                                    disabled="">Completed Year 10
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="11"
                                                    disabled="">Completed Year 11
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="12"
                                                    disabled="">Completed Year 12
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="highestLevelCompleted" value="@@"
                                                    disabled="">Not specified
                                            </div>
                                        </div>
                                        <br>
                                        <div style="padding:5px;width:400px;font-weight:bold;float:left;">Year school
                                            level was completed: </div>
                                        <div style="padding:0px 20px;float:left;">
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="isSchoolYearCompletedEntered"
                                                    id="isSchoolYearCompletedEntered" value="1" disabled="">
                                                Yes, please state year:
                                                <input type="text" maxlength="4" name="yearSchoolCompleted"
                                                    id="yearSchoolCompleted" value="" disabled=""
                                                    fdprocessedid="xqqcb">
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;"
                                                    name="isSchoolYearCompletedEntered"
                                                    id="isSchoolYearCompletedEntered" value="0" disabled="">
                                                Not stated
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div style="clear:both; height:20px;"></div>
                                    <div style="clear:both; text-align:center">
                                        <button type="button" class="btn btn-primary"
                                            id="edit-qualifications">Edit</button>
                                    </div>
                                </div>
                                <div class="hidden" id="form-qualifications">
                                    <form name="edit_qualification_frm" id="edit_qualification_frm" method="post"
                                        action="">
                                        <div style="float:left;padding-left:150px;">
                                            <div style="padding:5px;width:400px;font-weight:bold;float:left">Completed any
                                                of the following qualifications?</div>
                                            <div style="padding:0px 20px; float:left">
                                                <select class="form-control" name="priorEdAchievement"
                                                    id="priorEdAchievement" fdprocessedid="qtfkwb">
                                                    <option value="Y">Yes</option>
                                                    <option value="N">No</option>
                                                    <option value="NP" selected="">Not Provided</option>
                                                </select>
                                            </div>
                                            <div style="clear:both;height:20px;"></div>

                                            <div style="padding:5px;font-weight:bold;width:400px;float:left;">Highest
                                                level of qualification you hold? </div>
                                            <div style="padding:5px 20px;line-height:20px;float:left;">
                                                <input class="custom-checkbox" style="margin-right:4px;"
                                                    type="checkbox" name="avetprioreducationid[]" value="008"
                                                    disabled="disabled">
                                                Bachelor Degree or Higher Degree level<br><input class="custom-checkbox"
                                                    style="margin-right:4px;" type="checkbox"
                                                    name="avetprioreducationid[]" value="410" disabled="disabled">
                                                Advanced Diploma or Associate Degree Level<br><input
                                                    class="custom-checkbox" style="margin-right:4px;" type="checkbox"
                                                    name="avetprioreducationid[]" value="420" disabled="disabled">
                                                Diploma (or Associate Diploma) Level<br><input class="custom-checkbox"
                                                    style="margin-right:4px;" type="checkbox"
                                                    name="avetprioreducationid[]" value="511" disabled="disabled">
                                                Certificate IV (or advanced certificate/technician<br><input
                                                    class="custom-checkbox" style="margin-right:4px;" type="checkbox"
                                                    name="avetprioreducationid[]" value="514" disabled="disabled">
                                                Certificate III (or trade certificate)<br><input class="custom-checkbox"
                                                    style="margin-right:4px;" type="checkbox"
                                                    name="avetprioreducationid[]" value="521" disabled="disabled">
                                                Certificate II<br><input class="custom-checkbox"
                                                    style="margin-right:4px;" type="checkbox"
                                                    name="avetprioreducationid[]" value="990" disabled="disabled">
                                                Certificates other than the above<br><input class="custom-checkbox"
                                                    style="margin-right:4px;" type="checkbox"
                                                    name="avetprioreducationid[]" value="524" disabled="disabled">
                                                Certificate I<br>
                                            </div>
                                        </div>
                                        <div style="clear:both; height:20px;"></div>
                                        <div align="center">
                                            <button type="submit" class="btn btn-primary"
                                                style="margin:0px 5px;">Save</button>
                                            <button type="button" class="btn btn-primary"
                                                style="margin:0px 5px;">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="employment" role="tabpanel"
                                aria-labelledby="employment-tab">
                                <div id="details-employment">
                                    <div style="float:left;padding-left:150px;">
                                        <div style="padding:5px;width:320px;font-weight:bold;float:left;">Employment</div>
                                        <div style="padding:0px 20px;float:left;">
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;" name="labourStatus"
                                                    value="01" disabled="">Full-time employee
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;" name="labourStatus"
                                                    value="02" disabled="">Part-time employee
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;" name="labourStatus"
                                                    value="03" disabled="">Self-employed - not employing others
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;" name="labourStatus"
                                                    value="04" disabled="">Employer
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;" name="labourStatus"
                                                    value="05" disabled="">Employed - unpaid worker in family
                                                business
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;" name="labourStatus"
                                                    value="06" disabled="">Unemployed - seeking full-time work
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;" name="labourStatus"
                                                    value="07" disabled="">Unemployed seeking part-time work
                                            </div>
                                            <div style="padding:2px 0px;">
                                                <input type="radio" style="margin-right:4px;" name="labourStatus"
                                                    value="08" disabled="">Not employed - not seeking employment
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                                    <div style="clear:both; height:20px;"></div>
                                    <div style="float:left;padding-left:150px;">
                                        <div style="padding:5px;width:320px;font-weight:bold;float:left;">Industry of
                                            Employment</div>
                                        <div style="padding:0px 20px;float:left;">
                                            <select class="form-control" name="industryofemploymentid"
                                                id="industryofemploymentid" disabled="" style="width:320px;"
                                                fdprocessedid="iwq5i">
                                                <option value=""></option>
                                                <option value="A">Agriculture, Forestry and Fishing</option>
                                                <option value="B">Mining</option>
                                                <option value="C">Manufacturing</option>
                                                <option value="D">Electricity, Gas, Water and Waste Services</option>
                                                <option value="E">Construction</option>
                                                <option value="F">Wholesale Trade</option>
                                                <option value="G">Retail Trade</option>
                                                <option value="H">Accommodation and Food Services</option>
                                                <option value="I">Transport, Postal and Warehousing</option>
                                                <option value="J">Information Media and Telecommunications</option>
                                                <option value="K">Financial and Insurance Services</option>
                                                <option value="L">Rental, Hiring and Real Estate Services</option>
                                                <option value="M">Professional, Scientific and Technical Services
                                                </option>
                                                <option value="N">Administrative and Support Services</option>
                                                <option value="O">Public Administration and Safety</option>
                                                <option value="P">Education and Training</option>
                                                <option value="Q">Health Care and Social Assistance</option>
                                                <option value="R">Arts and Recreation Services</option>
                                                <option value="S">Other Services</option>
                                            </select>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                                    <div style="clear:both; height:20px;"></div>
                                    <div style="float:left;padding-left:150px;">
                                        <div style="padding:5px;width:320px;font-weight:bold;float:left;">Occupation
                                            Identifier</div>
                                        <div style="padding:0px 20px;float:left;">
                                            <select class="form-control" name="occupationidentifierid"
                                                id="occupationidentifierid" disabled="" style="width:320px;"
                                                fdprocessedid="lk5w1u">
                                                <option value="0"></option>
                                                <option value="1">Manager</option>
                                                <option value="2">Professionals</option>
                                                <option value="3">Technicians and Trades Workers</option>
                                                <option value="4">Community and Personal Service Workers</option>
                                                <option value="5">Clerical and Administrative Workers</option>
                                                <option value="6">Sales Workers</option>
                                                <option value="7">Machinery Operators and Drivers</option>
                                                <option value="8">Labourer’s</option>
                                                <option value="9">Other</option>
                                            </select>
                                        </div>
                                        <div style="clear:both;"></div>
                                    </div>
                                    <div style="clear:both; height:20px;"></div>
                                    <div style="clear:both; text-align:center">
                                        <button type="button" class="btn btn-primary"
                                            id="edit-employment">Edit</button>
                                    </div>
                                </div>
                                <div class="hidden" id="form-employment">
                                    <form name="edit_employment_frm" id="edit_employment_frm" method="post"
                                        action="">
                                        <div style="float:left;padding-left:150px;">
                                            <div style="padding:5px;width:320px;font-weight:bold;float:left;">Employment
                                            </div>
                                            <div style="padding:0px 20px;float:left;">
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        name="labourStatus" value="01">Full-time employee
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        name="labourStatus" value="02">Part-time employee
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        name="labourStatus" value="03">Self-employed - not employing
                                                    others
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        name="labourStatus" value="04">Employer
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        name="labourStatus" value="05">Employed - unpaid worker in
                                                    family business
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        name="labourStatus" value="06">Unemployed - seeking
                                                    full-time work
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        name="labourStatus" value="07">Unemployed seeking part-time
                                                    work
                                                </div>
                                                <div style="padding:2px 0px;">
                                                    <input type="radio" style="margin-right:4px;"
                                                        name="labourStatus" value="08">Not employed - not seeking
                                                    employment
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div style="clear:both; height:20px;"></div>
                                        <div style="float:left;padding-left:150px;">
                                            <div style="padding:5px;width:320px;font-weight:bold;float:left;">Industry of
                                                Employment</div>
                                            <div style="padding:0px 20px;float:left;">
                                                <select class="form-control" name="industryofemploymentid"
                                                    id="industryofemploymentid" style="width:320px;"
                                                    fdprocessedid="62j47y">
                                                    <option value=""></option>
                                                    <option value="A">Agriculture, Forestry and Fishing</option>
                                                    <option value="B">Mining</option>
                                                    <option value="C">Manufacturing</option>
                                                    <option value="D">Electricity, Gas, Water and Waste Services
                                                    </option>
                                                    <option value="E">Construction</option>
                                                    <option value="F">Wholesale Trade</option>
                                                    <option value="G">Retail Trade</option>
                                                    <option value="H">Accommodation and Food Services</option>
                                                    <option value="I">Transport, Postal and Warehousing</option>
                                                    <option value="J">Information Media and Telecommunications
                                                    </option>
                                                    <option value="K">Financial and Insurance Services</option>
                                                    <option value="L">Rental, Hiring and Real Estate Services
                                                    </option>
                                                    <option value="M">Professional, Scientific and Technical Services
                                                    </option>
                                                    <option value="N">Administrative and Support Services</option>
                                                    <option value="O">Public Administration and Safety</option>
                                                    <option value="P">Education and Training</option>
                                                    <option value="Q">Health Care and Social Assistance</option>
                                                    <option value="R">Arts and Recreation Services</option>
                                                    <option value="S">Other Services</option>
                                                </select>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div style="clear:both; height:20px;"></div>
                                        <div style="float:left;padding-left:150px;">
                                            <div style="padding:5px;width:320px;font-weight:bold;float:left;">Occupation
                                                Identifier</div>
                                            <div style="padding:0px 20px;float:left;">
                                                <select class="form-control" name="occupationidentifierid"
                                                    id="occupationidentifierid" style="width:320px;"
                                                    fdprocessedid="zzeqh">
                                                    <option value="0"></option>
                                                    <option value="1">Manager</option>
                                                    <option value="2">Professionals</option>
                                                    <option value="3">Technicians and Trades Workers</option>
                                                    <option value="4">Community and Personal Service Workers</option>
                                                    <option value="5">Clerical and Administrative Workers</option>
                                                    <option value="6">Sales Workers</option>
                                                    <option value="7">Machinery Operators and Drivers</option>
                                                    <option value="8">Labourer’s</option>
                                                    <option value="9">Other</option>
                                                </select>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <div style="clear:both; height:20px;"></div>
                                        <div align="center">
                                            <button type="submit" class="btn btn-primary" style="margin:0px 5px;"
                                                fdprocessedid="rym2bo">Save</button>
                                            <button type="button" class="btn btn-primary" style="margin:0px 5px;"
                                            data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <----------------------------------- Enquiry Details ----------------------------------------------------> --}}
                    <hr>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="card-header1">
                                <span style="font-size: 21px;">Enquiry Details</span>
                                <p>There are no enquiry records for this person
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                data-bs-target="#note-example">
                                New Enquiry
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="note-example" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <span style="font-size: 20px;margin-bottom: 20px;"
                                                class="mb-5 text-center">New Enquiry for {{ $student->first_name }} {{ $student->last_name }}</span>
                                            <form name="add_opppr" id="add_opppr" method="post"
                                                enctype="multipart/form-data" action="{{ route('people.new.enquiry') }}" method="POST">
                                                @csrf()
                                                @method('POST')
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div style="padding:5px; float:left; width:150px;"
                                                            align="left">
                                                            Preferred Course</div>
                                                        <div style="padding:5px; float:left">
                                                            <select name="courseList" class="form-control" id="courseList" size="1" style="width:200px;">
                                                               @foreach ($courses as $course)
                                                                   <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                               @endforeach
                                                            </select>
                                                            <input type="hidden" value="{{  $student->id }}" name="studentId" id="studentId">
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div style="padding:5px; float:left;width:150px;"
                                                            align="left">
                                                            Delivery Method(s)</div>
                                                        <div style="padding:5px; float:left">
                                                            <select name="delevery_method[]" class="form-control" id="courseTypeList" multiple="multiple" style="width:200px; height:50px;" >
                                                                <option value="Self Paced">Self Paced</option>
                                                                <option value="Public Sessions">Public Sessions</option>
                                                                <option value="Private Sessions">Private Sessions</option>
                                                            </select>
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div style="padding:5px; float:left; width:150px;"
                                                            align="left">
                                                            Preferred Cities</div>
                                                        <div style="padding:5px; float:left">
                                                            <select name="cityList[]" class="form-control"
                                                                id="cityList" multiple="multiple"
                                                                style="width:200px; height:100px;"
                                                                fdprocessedid="sbd71b">
                                                                @foreach ($cities as $city)
                                                                <option value="{{ $city->id  }}">{{ $city->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div style="padding:5px; float:left; width:150px;"
                                                            align="left">Referred By</div>
                                                        <div style="padding:5px; float:left">
                                                            <select name="referralList" class="form-control"
                                                                id="referralList" size="1" style="width:200px;"
                                                                fdprocessedid="g1ck6">
                                                                <option value=""></option>
                                                                <option value="360">test</option>
                                                            </select>
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div>
                                                            <div style="padding:5px;float:left;width:150px;"
                                                                align="left">Note</div>
                                                            <div style="padding:5px;float:left">
                                                                <textarea name="note" class="form-control" id="note" style="height:50px;width:195px;"
                                                                    onkeypress="return imposeMaxLength(event, this, 250);"></textarea>
                                                            </div>
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div>
                                                            <div style="padding:5px;float:left;width:150px;"
                                                                align="left">Follow-up Date</div>
                                                            <div style="padding:5px;float:left">
                                                                <input type="date" class="form-control hasDatepicker"
                                                                    value="" name="followUpDate"
                                                                    id="followUpDate" style="width:180px;"
                                                                    fdprocessedid="1wgvc3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div style="padding:5px;float:left;width:150px;" align="left">
                                                            Assign To</div>
                                                        <div style="padding:5px;float:left">
                                                            <select name="assignTo" id="assignTo"
                                                                class="form-control" size="1"
                                                                style="width:200px;" fdprocessedid="t3awc9">
                                                                <option value="Kabir Kiron">Kabir Kiron</option>
                                                                <option value="Kabir H Kiron">Kabir H Kiron</option>
                                                                <option value="newtest newtest">newtest newtest</option>
                                                                <option value="Weworkbook Support">Weworkbook Support</option>
                                                            </select>
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div>
                                                            <div style="padding:5px;float:left;width:150px;"
                                                                align="left">Chance of Success</div>
                                                            <div style="padding:5px;float:left">
                                                                <select class="form-control" name="important"
                                                                    id="important" size="1" style="width:200px;"
                                                                    fdprocessedid="hljha">
                                                                    <option value="10%">10%</option>
                                                                    <option value="30%">30%</option>
                                                                    <option value="50%" selected="">50%</option>
                                                                    <option value="70%">70%</option>
                                                                    <option value="90%">90%</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div>
                                                            <div style="padding:5px;float:left;width:150px;"
                                                                align="left">Likely Month</div>
                                                            <div style="padding:5px;float:left">
                                                                <select class="form-control" id="likelyMonth"
                                                                    name="likelyMonth" size="1"
                                                                    style="width:200px;" fdprocessedid="2l5zxa">
                                                                    <option value="">Unknown</option>
                                                                    <option value="2024-05-01">May 2024</option>
                                                                    <option value="2024-06-01">Jun 2024</option>
                                                                    <option value="2024-07-01">Jul 2024</option>
                                                                    <option value="2024-08-01">Aug 2024</option>
                                                                    <option value="2024-09-01">Sep 2024</option>
                                                                    <option value="2024-10-01">Oct 2024</option>
                                                                    <option value="2024-11-01">Nov 2024</option>
                                                                    <option value="2024-12-01">Dec 2024</option>
                                                                    <option value="2025-01-01">Jan 2025</option>
                                                                    <option value="2025-02-01">Feb 2025</option>
                                                                    <option value="2025-03-01">Mar 2025</option>
                                                                    <option value="2025-04-01">Apr 2025</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div style="display:none">
                                                            <div style="padding:5px; float:left; width:150px;"
                                                                align="left">Set Status</div>
                                                            <div style="padding:5px; float:left">
                                                                <select name="status" id="status" size="1">
                                                                    <option value="active">Active</option>
                                                                    <option value="cancelled">Cancelled</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div style="clear:both;height:20px;"></div>
                                                    </div>
                                                </div>
                                                <div align="center">
                                                    <button type="submit" class="btn btn-primary"
                                                        fdprocessedid="mocrks">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Course Code	</th>
                                        <th scope="col">Location	</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Assigned To	</th>
                                        <th scope="col">Reference</th>
                                        <th scope="col">InfoPAK Sent?</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiry as $enqu)
                                        <tr>
                                            <th scope="row">{{ $enqu->course->code }}</th>
                                           <td>
                                            @php
                                            foreach(json_decode($enqu->cityList) as $row_city){
                                               $city =  App\Models\City::where('id',$row_city)->first(); 
                                                echo $city->name . '<br>';
                                            }
                                        @endphp
                                            </td>
                                            <td>  {{ $enqu->delevery_method }} </td>
                                            <td>{{ $enqu->referralList  }}</td>
                                            <td>{{ $enqu->assignTo  }}</td>
                                            <td>N</td>
                                            <td>active {{ $enqu->important	 }}</td>
                                            <td></td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                    {{-- <----------------------------------- Current Enrolments ----------------------------------------------------> --}}
                    <hr>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card-header1">
                                <span style="font-size: 21px;">Current Enrolments </span>
                                <p>There are no current enrolment records for this person</p>
                            </div>
                        </div>
                        <div class="col-sm-4 d-flex">
                            <button type="button" class="btn btn-primary w-100 ms-2" style="height: 50px;" data-bs-toggle="modal"
                                data-bs-target="#newEnrolment">
                                New Enrolment
                            </button>
                            <button type="button" class="btn btn-primary w-100 ms-2" style="height: 50px;" data-bs-toggle="modal"
                                data-bs-target="#selectColumns">
                                Select Columns
                            </button>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Course Code	</th>
                                <th scope="col">Method</th>
                                <th scope="col">Group</th>
                                <th scope="col">City Name</th>
                                <th scope="col">Activity End Date</th>
                                <th scope="col">Activity Start Date</th>
                                <th scope="col">Enrolled On</th>
                                <th scope="col">Schedule End Date</th>
                                <th scope="col">Schedule Month</th>
                                <th scope="col">Schedule Start Date	</th>
                                <th scope="col">Qualification Status</th>
                                <th scope="col">Certificate Issued</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($enquiry as $enqu)
                                <tr>
                                    <th scope="row">{{ $enqu->course->code }}</th>
                                   <td>
                                    @php
                                    foreach(json_decode($enqu->cityList) as $row_city){
                                       $city =  App\Models\City::where('id',$row_city)->first(); 
                                        echo $city->name . '<br>';
                                    }
                                @endphp
                                    </td>
                                    <td>  {{ $enqu->delevery_method }} </td>
                                    <td>{{ $enqu->referralList  }}</td>
                                    <td>{{ $enqu->assignTo  }}</td>
                                    <td>N</td>
                                    <td>active {{ $enqu->important	 }}</td>
                                    <td></td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        <div class="modal fade" id="newEnrolment" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h2>Course Enrolment for {{ $student->firstName }} {{ $student->lastName }}</h2>
                                        <form method="post" name="enrolmentForm" id="enrolmentForm"
                                            enctype="multipart/form-data" action="" class=""
                                            style="margin-top: 10px;">
                                            <div class="row">
                                                <div class="col-2 col-form-label">Course:</div>
                                                <div class="col-2" style="float:left;">
                                                    <input type="hidden" name="studentId" id="studentId"
                                                        value="524977">
                                                    <input type="hidden" name="linkenquiry" id="linkenquiry"
                                                        value="0">
                                                    <select style="padding: 9px 4px;height:35px;width:100%"
                                                        name="courseList" id="courseList" class="form-control"
                                                        size="1"
                                                        onchange="getReferralSource(this.value);loadScheduleList();"
                                                        fdprocessedid="ei4qmn">
                                                        <option value=""></option>
                                                        <option value="BSB40820">BSB40820</option>
                                                    </select>
                                                </div>
                                                <!-- bug 3475 starts here -->
                                                <div class="col-1" style="float:left;">
                                                    <button type="button" class="btn btn-info"
                                                        onclick="loadScheduleList();" fdprocessedid="oxry5s">Go</button>
                                                </div>
                                                <!-- bug 3475 ends here -->

                                                <div class="col-1 col-form-label">City:</div>
                                                <div class="col-2" style="float:left;">
                                                    <select name="cityList" id="cityList" class="form-control"
                                                        size="1"
                                                        style="height:35px;width:100%; padding: 9px 4px; margin-top:0px;"
                                                        onchange="loadScheduleList();" fdprocessedid="h2uhkg">
                                                        <option value=""></option>
                                                        <option value="1502">Sydney</option>
                                                    </select>
                                                </div>

                                                <div class="col-1" style="float:left;">
                                                    <button type="button" class="btn btn-info"
                                                        onclick="resetFilter();" fdprocessedid="8x8yse">Reset</button>
                                                </div>
                                                <div class="col-3" id="referralsource">Enrolment not linked to an
                                                    enquiry</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">&nbsp;</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2 col-form-label">Schedule:</div>
                                                <div style="float:left" class="col-10">
                                                    <select name="scheduleList" id="scheduleList" size="6"
                                                        style="width:90%;" onchange="resetEnrolmentReport(this.value);"
                                                        fdprocessedid="hik9xk">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">&nbsp;</div>
                                            </div>
                                            <div id="enrolmentFormDiv">
                                                <div class="row">
                                                    <div class="col-2 col-form-label">Enrolment Form: </div>
                                                    <div style="float:left;" class="col-3">
                                                        <input type="file" name="enrolForm" style="width:100%;"
                                                            id="enrolForm">
                                                    </div>
                                                    <div class="col-1 col-form-label">Received Date:</div>
                                                    <div class="col-2">
                                                        <input type="date" style="width:80%;" class="form-control"  name="receivedDate" id="receivedDate">
                                                    </div>
                                                    <div class="col-1 col-form-label">Received By:</div>
                                                    <div class="col-3"><select class="form-control"
                                                            style="width:100%;" name="receivedBy" id="receivedBy"
                                                            fdprocessedid="xbqu9h">
                                                            <option value="Email">Email</option>
                                                            <option value="Fax">Fax</option>
                                                            <option value="Post">Post</option>
                                                            <option value="Verbal">Verbal</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">&nbsp;</div>
                                                </div>
                                            </div>
                                            <div style="display:none">
                                                <div class="row">
                                                    <div class="col-2 col-form-label">Invoice Number: </div>
                                                    <div class="col-2" style="float:left">
                                                        <input style="width:100%" type="text" name="invoiceNumber"
                                                            id="invoiceNumber" class="form-control" maxlength="20">
                                                    </div>
                                                    <div class="col-2 col-form-label" style="loat:left;">Invoice Amount:
                                                    </div>
                                                    <div class="col-2" style="float:left">
                                                        $ <input style="width:100%;" type="text"
                                                            name="invoiceAmount" id="invoiceAmount">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">&nbsp;</div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-2 col-form-label">Payment Status:</label>
                                                <div class="col-3">
                                                    <select class="form-control" style="" name="paymentStatus"
                                                        id="paymentStatus" size="1" fdprocessedid="1e9p1">
                                                        <option value="PAID">PAID</option>
                                                        <option value="NOT PAID" selected="">NOT PAID</option>
                                                        <option value="PAYMENT PLAN">PAYMENT PLAN</option>
                                                        <option value="DEPOSIT PAID">DEPOSIT PAID</option>
                                                        <option value="COMPLIMENTARY">COMPLIMENTARY</option>
                                                        <option value="EXEMPT">EXEMPT</option>
                                                        <option value="PURCHASE ORDER">PURCHASE ORDER</option>
                                                    </select>
                                                </div>
                                                <label for="reportingState" class="col-1 col-form-label">Reporting
                                                    State: </label>
                                                <div class="col-2">
                                                    <select style="width:100%" name="reportingState"
                                                        id="reportingState" class="form-control"
                                                        fdprocessedid="kp505h">
                                                        <option value="8">Australian Capital Territory</option>
                                                        <option value="12">Fee for Service</option>
                                                        <option value="1">New South Wales</option>
                                                        <option value="7">Northern Territory</option>
                                                        <option value="10">Other (Overseas)</option>
                                                        <option value="9">Other Australian Territories or
                                                            Dependencies</option>
                                                        <option value="3">Queensland</option>
                                                        <option value="4">South Australia</option>
                                                        <option value="6">Tasmania</option>
                                                        <option value="2">Victoria</option>
                                                        <option value="5">Western Australia</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div style="display:none">
                                                <div class="row">
                                                    <div class="col-2 col-form-label" style="float:left;">Payer:</div>
                                                    <div class="col-2" style="float:left">
                                                        <select class="form-control" style="width:100%;"
                                                            name="payer" id="payer" size="1"
                                                            onchange="showHidePayorName(this.options[this.selectedIndex].value);">
                                                            <option value="SELF">SELF</option>
                                                            <option value="OTHER">OTHER</option>
                                                        </select>
                                                    </div>
                                                    <div id="payerDiv" style="display:none">
                                                        <div class="col-2 col-form-label" style="float:left">Payer Name:
                                                        </div>
                                                        <div class="col-2" style="float:left">
                                                            <input type="text" name="payerName" id="payerName"
                                                                size="12">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">&nbsp;</div>
                                                </div>
                                            </div>
                                            <!--fix for bug id: 6095-->
                                            <div class="row">
                                                <div class="col-2" style="float:left">Is Trainee: </div>
                                                <div class="col-2" style="float:left">
                                                    <input style="padding: 9px 4px; margin-top: 10px; margin-left: 10px;"
                                                        type="checkbox" name="isTrainee" id="isTrainee">
                                                </div>

                                                <!-- <div style="clear:both"></div> -->
                                                <!--fix for bug id: 6095-->
                                                <div id="reportEnrolment" class="col-4">
                                                    <div class="row">
                                                    </div>
                                                </div>
                                                <div id="RTOStudentIdDiv" style="float:left; display:none;">
                                                    <div class="col-2 col-form-label" style="float:left">National ID:
                                                    </div>
                                                    <div class="col-2" style="float:left">
                                                        <input type="text" name="RTOStudentId" id="RTOStudentId"
                                                            style="width:105px;">
                                                    </div>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>

                                            <div style="clear:both"></div>
                                            <div align="center" style="margin-top:10px;">
                                                <a href="#" onclick="">
                                                    <!-- <img id="submitBtn" src="../images/save_off.png" onmouseover="this.src = '../images/save_on.png'" onmouseout="this.src = '../images/save_off.png'" border="0"/> -->
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="enrolPeople('524977', document.getElementById('invoiceNumber').value, document.getElementById('invoiceAmount').value, document.getElementById('paymentStatus').value, document.getElementById('payer').value, document.getElementById('payerName').value, document.getElementById('scheduleList').value)"
                                                        fdprocessedid="h9je6m">Save and Refresh</button>
                                                </a>
                                                <div class="mt-3" style="display:none" id="spinner">
                                                    <img src="../images/ajax-loader.gif" alt="">
                                                    <p>File upload in progress, do not refresh page</p>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal fade" id="selectColumns" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h2>Select Columns</h2>
                                
                                 `    <table>   
                                    <tbody><tr style="height:10px;"></tr>
                                        <tr style="height:30px;"><td style="width:600px"><strong><input align="middle" class="selColsCheckBox" type="checkbox" name="unitCompetentDate_1" id="unitCompetentDate_1" checked=""><label for="unitCompetentDate">&nbsp;&nbsp;Activity End Date</label></strong></td></tr><tr style="height:30px;"><td style="width:600px"><strong><input align="middle" class="selColsCheckBox" type="checkbox" name="activityStartDate_1" id="activityStartDate_1" checked=""><label for="activityStartDate">&nbsp;&nbsp;Activity Start Date</label></strong></td></tr><tr style="height:30px;"><td style="width:600px"><strong><input align="middle" class="selColsCheckBox" type="checkbox" name="enrolTime_1" id="enrolTime_1" checked=""><label for="enrolTime">&nbsp;&nbsp;Enrolled On</label></strong></td></tr><tr style="height:30px;"><td style="width:600px"><strong><input align="middle" class="selColsCheckBox" type="checkbox" name="endDate_1" id="endDate_1" checked=""><label for="endDate">&nbsp;&nbsp;Schedule End Date</label></strong></td></tr><tr style="height:30px;"><td style="width:600px"><strong><input align="middle" class="selColsCheckBox" type="checkbox" name="month_1" id="month_1" checked=""><label for="month">&nbsp;&nbsp;Schedule Month</label></strong></td></tr><tr style="height:30px;"><td style="width:600px"><strong><input align="middle" class="selColsCheckBox" type="checkbox" name="startDate_1" id="startDate_1" checked=""><label for="startDate">&nbsp;&nbsp;Schedule Start Date</label></strong></td></tr>                        
                                                            
                                        <tr style="height:10px;"></tr>
                                        <tr style="height:30px;">
                                            <td align="center">
                                                <button class="btn btn-primary" style="margin:0px 2px;" type="button" onclick="addSelectedCols();" fdprocessedid="h78jc">Save</button>
                                                <button class="btn btn-primary" style="margin:0px 2px;" type="button"data-bs-dismiss="modal">Cancel</button>
                                            </td>
                                        </tr>                    
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    {{-- <----------------------------------- Past Enrolments  ----------------------------------------------------> --}}
                    <hr>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="card-header1">
                                <span style="font-size: 21px;">Past Enrolments </span>
                                <p>There are no current enrolment records for this person</p>
                            </div>
                        </div>
                        <div class="col-sm-2">

                        </div>
                        <style>
                            .scroll::-webkit-scrollbar-thumb {
            background: #666; 
            }
                        </style>
                        <div class="row">
                            <div class="col-sm-12 scroll" style="overflow: scroll;">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Course Code	</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Group</th>
                                        <th scope="col">City Name</th>
                                        <th scope="col">Activity End Date</th>
                                        <th scope="col">Activity Start Date</th>
                                        <th scope="col">Enrolled On</th>
                                        <th scope="col">Schedule End Date</th>
                                        <th scope="col">Schedule Month</th>
                                        <th scope="col">Schedule Start Date	</th>
                                        <th scope="col">Qualification Status</th>
                                        <th scope="col">Certificate Issued</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enquiry as $enqu)
                                        <tr>
                                            <th scope="row">{{ $enqu->course->code }}</th>
                                           <td>
                                            @php
                                            foreach(json_decode($enqu->cityList) as $row_city){
                                               $city =  App\Models\City::where('id',$row_city)->first(); 
                                                echo $city->name . '<br>';
                                            }
                                        @endphp
                                            </td>
                                            <td>  {{ $enqu->delevery_method }} </td>
                                            <td>{{ $enqu->referralList  }}</td>
                                            <td>{{ $enqu->assignTo  }}</td>
                                            <td>N</td>
                                            <td>active {{ $enqu->important	 }}</td>
                                            <td></td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        </div>
                    </div>
                    {{-- <----------------------------------- Qualifications Completed   ----------------------------------------------------> --}}
                    <hr>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="card-header1">
                                <span style="font-size: 21px;">Qualifications Completed </span>
                                <p>There are no current enrolment records for this person</p>
                            </div>

                        </div>
                        <div class="col-sm-2">

                        </div>
                    </div>
                    {{-- <----------------------------------- Qualifications Completed   ----------------------------------------------------> --}}
                    <hr>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card-header1">
                                <span style="font-size: 21px;">Notes </span>
                                <p>There are no current enrolment records for this person</p>
                            </div>
                        </div>
                        <div class="col-sm-4 d-flex">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#add-notes" style="height: 50px;"> Add Note </button>
                                <a href="{{ route('person.note.export',$studentID)}}" class="btn btn-primary ms-2" style="height: 50px;">Export to PDF</a>
                                {{-- // This Model // --}}
                                <div class="modal fade" id="add-notes" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content" style="height:500px;">
                                        <div class="modal-body">
                                            <h2>Add Person Notes for {{ $student->firstName }} {{ $student->lastName }}</h2>
                                            <form name="saveForm" action="{{ route('person.notes')}}" id="saveForm" method="post" target="_self" enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <input type="hidden" name="student_id" value="{{ $studentID }}">
                                                <div class="form-group row">
                                                    <label for="template" class="col-sm-2 col-form-label">Template</label>
                                                    <div class="col-sm-10">
                                                        <select id="template" onchange="ptemplatechanged()" name="template" class="form-control">
                                                            <option value="">None</option>
                                                        </select>
                                                    </div>
                                                    </div>  
                                                <div class="form-group row mt-2">
                                                    <label for="note" class="col-sm-2 col-form-label">Note</label>
                                                    <div class="col-sm-10">
                                                            <textarea class="form-control" name="note" id="" cols="30" rows="10"></textarea>
                                                          </div>
                                                </div>  
                                                            <div class="form-group row mt-2"> 
                                                    <label for="note" class="col-sm-2 col-form-label">Select note category:</label>
                                                    <div class="col-sm-10">
                                                        <select name="noteCategory" id="noteCategory"  class="form-control">
                                                            <option value="0" selected="">Select Cataegory</option>
                                                            @foreach ($noteCtegory as $cataegoryNote)
                                                            <option value="{{ $cataegoryNote->id }}">{{ $cataegoryNote->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2">
                                                    <label for="upload_file" class="col-sm-2 col-form-label">Attach File</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" name="upload_file" id="upload_file" size="50">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2">
                                                    <label for="followUpDate2" class="col-sm-2 col-form-label">Follow-up Date</label>
                                                    <div class="col-sm-10">
                                                    <input type="date" class="form-control hasDatepicker" value="" name="follow_up_to_date" id="follow_up_to_date">
                                                    </div>
                                                </div>  
                                                            <div class="form-group row mt-2">
                                                    <label for="followUpDate2" class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary" style="margin:0px 2px;" fdprocessedid="uv5hv">Save</button>
                                                            <button type="button" class="btn btn-primary" style="margin:0px 2px;" id="closeForm" fdprocessedid="khkvru" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                </div>     
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Note</th>
                                    <th scope="col">Note Category</th>
                                    <th scope="col">Follow-up Date</th>
                                    <th scope="col">Posted By</th>
                                    <th scope="col">Posted On</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($noteEnrolment as  $note)
                                    <tr>
                                        <th>{{ $note->note }}  </th>
                                        <td>{{ $note->category->name }}</td>
                                        <td>{{ $note->follow_up_to_date }}</td>
                                        <td>{{ $note->created_at }}</td>
                                        <td>{{ $note->created_by }}</td>
                                        <td><a href="{{ route('person.note.delete',$note->id)}}"><i title="Delete Student" class="fa fa-trash fa-2x text-danger"></i></a></td>
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
    {{-- Modal select column start --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#toggleButton").click(function() {
                $("#details").toggleClass("visible hidden");
                $("#details-edit").toggleClass("hidden visible");
            });
            $("#toggleButton1").click(function() {
                $("#details").toggleClass("hidden visible");
                $("#details-edit").toggleClass("visible hidden");
            });
            $("#edit-language").click(function() {
                $("#edit-form").toggleClass("hidden visible");
                $("#language-details").toggleClass("visible hidden");
            });
            $("#edit-disability").click(function() {
                $("#form-disibility").toggleClass("hidden visible");
                $("#disability-details").toggleClass("visible hidden");
            });
            $("#edit-scholling").click(function() {
                $("#form-schooling").toggleClass("hidden visible");
                $("#details-schooling").toggleClass("visible hidden");
            });
            $("#edit-qualifications").click(function() {
                $("#details-qualifications").toggleClass("visible hidden");
                $("#form-qualifications").toggleClass("hidden visible");
            });
            $("#edit-employment").click(function() {
                $("#details-employment").toggleClass("visible hidden");
                $("#form-employment").toggleClass("hidden visible");
            });
        });
        $(document).ready(function() {
            //validation
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict'
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')
                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
            })()
        });
        // prfile pic add 
        var loadFile = function(event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
            makeAjaxRequest(event.target.files[0]);
        };

        function makeAjaxRequest(data) {
            var formData = new FormData();
            var photo = $('#file').prop('files')[0];
            formData.append('photo', photo);
            $.ajax({
                type: 'POST',
                url: "{{ route('people.update', $studentID) }}",
                contentType: 'multipart/form-data',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Success:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
    <style>
        .modal-backdrop.fade.show {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Function to add a new row
            $("#addRowBtn").click(function() {
                var newRow = '<tr class="mt-2">' +
                    '<td>Upload File (Max size of 20MB)<input type="hidden" name="MAX_FILE_SIZE" value="20971520"></td>' +
                    '<td>' +
                    '<input class="form-control" type="file" id="formFileMultiple" multiple="">' +
                    '<input type="hidden" id="student_ID" name="student_ID" value="524977">' +
                    '</td>' +
                    '<td nowrap="">Give the document a name</td>' +
                    '<td>' +
                    '<input type="text" class="form-control" name="documentName[]" id="documentName[]" maxlength="50" style="width:200px;border:#666666 1px solid; vertical-align:middle;" fdprocessedid="2fsg38">' +
                    '</td>' +
                    '</tr>';
                $("#dataTable").append(newRow);
            });
        });
    </script>
    <!-- Modal -->
<div class="modal fade" id="sendsurvey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send Survey Email</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form name="surveyform" style="width:100%" id="surveyform" method="post" target="email_target">
                <div class="form-group row col-sm-12 mt-2">
                    <label for="from" class="col-sm-1 col-form-label">From</label>
                    <div class="col-sm-11">
                        <select name="from" class="form-control" fdprocessedid="gz1mk"><option value="company379@weworkbook.com">company379@weworkbook.com (Weworkbook Support)</option><option value="info@aift.com.au (del)">info@aift.com.au (del) (Kabir H Kiron)</option><option value="info@aift.com.au">info@aift.com.au (Kabir Kiron)</option><option value="newtest@yopmail.com">newtest@yopmail.com (newtest newtest)</option></select>
                    </div>
                </div>                
                <div class="form-group row col-sm-12 mt-2">
                    <label for="to" class="col-sm-1 col-form-label">To</label>
                    <div class="col-sm-11">
                    <input type="email" class="form-control" name="to" id="toemail" value="dipak@mail.com" fdprocessedid="3n4458">
                    </div>
                </div>
                <div class="form-group row col-sm-12 mt-2">
                    <label for="surveyname" class="col-sm-1 col-form-label">Survey</label>
                    <div class="col-sm-11">
                    <select id="studcategoryid" name="categoryid" onchange="surveychanged()" class="form-control" fdprocessedid="3hfomd3">
                    </select>
                    </div>
                </div>
                <div class="form-group row col-sm-12 mt-2">
                    <label for="subject" class="col-sm-1 col-form-label">Subject</label>
                    <div class="col-sm-11">
                        <input type="email" name="subject" id="subject" class="form-control" value="" fdprocessedid="hxg5xj">
                    </div>
                </div>

                <div class="form-group row col-sm-12 mt-2">
                    <label for="email_Content" class="col-sm-1 col-form-label">Body</label>
                    <div class="col-sm-11">
                    <textarea name="email_Content" id="email_Content" class="form-control"  rows="5" style=""></textarea>
                    </div>
                </div>
                <iframe id="email_target" name="email_target" src="../config.php" style="width:0;height:0;border:0px solid #fff;"></iframe>
                <div class="form-group row col-sm-12">
                    <div class="col-sm-1 col-form-label">
                        <input type="hidden" id="studenrolmentid" name="enrolmentid" value="0">
                        <input type="hidden" id="studstudentid" name="studentid" value="528675">
                        <input type="hidden" id="studentemail" name="studentemail" value="dipak@mail.com">
						<input type="hidden" id="hidemployerid" name="hidemployerid" value="0">
						<input type="hidden" id="hidcompanyName" name="hidcompanyName" value="">
                    </div>
                    <div class="col-sm-11">
                    <input type="button" value="Send Link" id="sendsurveybtn" onclick="sendsurveylink()" class="btn btn-primary" fdprocessedid="c2zpzk">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="sendsms" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Send SMS </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form name="sms_form" id="sms_form" method="post" target="_self">
                <label for="phone">To:</label>
                <input type="hidden" name="studentPhone" value="">
                <input type="hidden" name="studentName" value="dipak sharma">
                <input type="hidden" name="studentId" value="528675">
                No mobile number on file for this learner                <br><div class="form-group">
                    <label for="etemplateselect">Template</label>
                    <select id="stemplateselect" name="template" onchange="getsmstemplate()" class="form-control" fdprocessedid="ew047c"><option value="0">None</option></select>
                </div>                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="smsMessage" id="smsMessage" class="form-control" style="height:100px"></textarea>
                </div>
                <div class="forn-group">
                <span id="countdown">800 characters remaining. The number of messages: 0/5</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" id="smsSendBtn" fdprocessedid="76g61e">Send</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <style>
    .scroll::-webkit-scrollbar-thumb {
  background: #666;
}
  </style>
@stop
