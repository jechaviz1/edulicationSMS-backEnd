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

        .icon-point
        {
            cursor: pointer;
        }

        .icon-size-15
        {
            font-size: 15px;
        }

        .icon-rotate:before {
            /* Add initial state to support older browsers */
            transform: rotate(0deg);
            will-change: transform;
            animation: rotateanimation 2s infinite linear;
        }

        @keyframes rotateanimation {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(359deg);
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
                                    <button type="submit" class="btn btn-danger ms-3">Delete</button>
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
                                <button class="nav-link" id="schooling-tab" data-bs-toggle="tab"
                                    data-bs-target="#schooling" type="button" role="tab" aria-controls="schooling"
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
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row" id="details">
                                    <div class="col-sm-6">
                                        <h6 class="mt-3">Basic Information</h6>
                                        @if ($student->title != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Title</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->title }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->entryDate != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Entry Date</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->entryDate }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->entryDate != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Name</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->first_name }} {{ $student->middle_name }}
                                                        {{ $student->last_name }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->entryDate != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Date of Birth</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->birth }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->entryDate != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Gender</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->gender }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->entryDate != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Employee Number</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->employeeNumber }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->entryDate != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Employee Number</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->employeeNumber }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-sm-6">
                                        <h6>Contact Information</h6>
                                        @if ($student->entryDate != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Mobile</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->contact_no }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->businessNumber != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Business Phone</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->businessNumber }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->homeNumber != null)
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
                                        @if ($student->fax != null)
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
                                        @if ($student->email != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Email 1</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->email }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->email != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Email 2</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->studentEmail2 }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->studentEmail3 != null)
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
                                        @if ($student->buildingName != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Building / Property Name</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->buildingName }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->fax != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Flat / Unit Details</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->fax }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->streetNumber != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Street Number</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->streetNumber }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->streetName != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Street Name</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->streetName }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->postalCode_postal != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Post Code</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->postalCode_postal }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->suburb != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Suburb</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->suburb }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->country != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Country </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->country }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->state != null)
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
                                        @if ($student->isLearner != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Is Learner</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->isLearner }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->isContact != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Is Contact</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->isContact }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        @if ($student->unitDetails != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Unique ID</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->unitDetails }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->isLearner != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Overseas Client?</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->isLearner }}</p>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($student->isLearner != null)
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

                                        @if ($student->uniqueStudentIdentifier != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="">Unique Student Identifier:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <p>{{ $student->uniqueStudentIdentifier }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="float-left">Name Type For USI Validation</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <select name="showNameType"
                                                        id="showNameType" class="input_text1 form-control">
                                                        <option value="1"
                                                            @if ($student->nameType === 1) selected @endif>Use
                                                            First Name &amp; Last Name</option>
                                                        <option value="2"
                                                            @if ($student->nameType === 2) selected @endif>Use
                                                            Single Name (Last Name)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm-4">
                                                    <label for="">USI Validaty:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <i title="USI Status" id="chkUSIStatus"></i>
                                                    <i class="@if($student->nameType === 2) d-none @endif" title="First Name" id="chkUSIFirstName"></i>
                                                    <i title="Last Name" id="chkUSILastName"></i>
                                                    <i title="Date of Birth" id="chkUSIBirth"></i>
                                                    <i class="bi bi-arrow-clockwise icon-point" title="Refresh" id="btnUSIRefresh"></i>
                                                </div>
                                            </div>
                                        @endif
                                   </div>
                                    <div class="col-sm-6">
                                        <h6>Postal Address</h6>
                                        @if ($student->isLearner != null)
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
                                                                @if ($student->country == 'Cambodia') selected @endif>
                                                                Cambodia
                                                            </option>
                                                            <option value="Cameroon"
                                                                @if ($student->country == 'Cameroon') selected @endif>
                                                                Cameroon
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
                                                                @if ($student->country == 'Colombia') selected @endif>
                                                                Colombia
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
                                        @foreach ($document as $doc)
                                        <tr>
                                            <td>{{$doc->document_name}}</td>
                                            <td><a href="{{ asset($doc->path) }}" target="_blank">{{$doc->file_name}}</a></td>
                                            <td>{{$doc->upload_by}} {{ $doc->created_at }}</td>
                                            <td>
                                                <a href="{{ route('delete.student.enrolment',$doc->id) }}" onclick="return confirm('Are you sure?')"><i title="Delete Document"  class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i></a>
                                                <a href="{{ asset($doc->path) }}" class="ms-3" target="_blank"><i title="Download Document" class="fa fa-download fa-2x text-success" aria-hidden="true"></i></a>
                                                <i title="Email Document" class="fa fa-envelope fa-2x text-primary" onclick="openEmailDialog({{ $doc }})" aria-hidden="true"></i>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <form action="{{ route('student.enrolment.document')}}" method="post" enctype="multipart/form-data" >
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
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="student_id" value="{{$studentID}}">
                                                    <tbody id="dataTable">
                                                        <tr>
                                                            <td>Upload File (Max size of 20MB)<input type="hidden"
                                                                    name="MAX_FILE_SIZE" value="20971520"></td>
                                                            <td>
                                                                <input class="form-control" type="file" name="document_file[]"
                                                                    id="formFileMultiple" multiple>
                                                            </td>
                                                            <td nowrap="">Give the document a name</td>
                                                            <td>
                                                                <input type="text" class="form-control"
                                                                    name="ducment_name[]" id="documentName[]"
                                                                    maxlength="50"
                                                                    style="width:200px;border:#666666 1px solid; vertical-align:middle;"
                                                                    fdprocessedid="2fsg38">
                                                            </td>
                                                            <td align="center">

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <button id="addRowBtn" type="button" class="btn btn-primary ms-2">Add more files</button>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-12">
                                            <button name="create" id="" type="submit"
                                            class="btn btn-primary ms-2">Upload</button>
                                        </div>
                                    </div>
                            </form>
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
                                                    <label for="exampleFormControlInput1" class="form-label">Document
                                                        Name

                                                    </label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
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
                                           @if($student->birthCountry == null ) No selection @else {{ $student->Birthcountry->name }}  @endif  </div>
                                        <div style="clear:both;"></div>
                                        <div style="padding:5px;float:left;width:400px;font-weight:bold;">Do you mainly
                                            speak English at home?</div>
                                        <div style="padding:5px 5px;float:left;vertical-align:bottom">
                                            @if($student->isMainEnglish == null ) No selection @else {{ $student->isMainEnglish }}  @endif
                                        </div>
                                        <div style="clear:both;height:5px;"></div>
                                        <div style="padding:5px;float:left;font-weight:bold;width:400px;"
                                            align="left">Do you speak a language other than English at home?</div>
                                        <div style="padding:5px 5px;width:250px;float:left">

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="nospokenlanguage"
                                                    id="nospokenlanguage" onchange="change_english_level()" @if($student->nospokenlanguage == "n") checked @endif
                                                    checked="" disabled="">
                                                <label class="" for="nospokenlanguage">No, English only</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="yesspokenlanguage" id="yesspokenlanguage"
                                                    onchange="change_english_level()" @if($student->nospokenlanguage == "y") checked @endif disabled="">
                                                <label class="" for="yesspokenlanguage">
                                                    Yes, other - Please specify:
                                                </label>
                                            </div>
                                            <!-- No, English only <input style="margin-left:50px;" class="custom-checkbox" type="checkbox" name="nospokenlanguage" id="nospokenlanguage" onChange=change_english_level() checked disabled /><br>
                                                    Yes, other - Please specify:  -->
                                        </div>
                                        <div style="clear:both;height:5px;"></div>
                                        <br>
                                        <div style="padding:5px;font-weight:bold;width:380px;float:left">Indigenous Status: </div>
                                        <div style="padding:5px 20px;float:left;">
                                            <input type="radio" name="indigenousStatus" value="1" @if($student->indigenousStatus == "1") checked @endif
                                            disabled="">
                                            Yes, Aboriginal<br><input type="radio" name="indigenousStatus"
                                            value="2" disabled=""  @if($student->indigenousStatus == "2") checked @endif>
                                            Yes, Torres Strait Islander<br><input type="radio" name="indigenousStatus"
                                            value="3" disabled=""  @if($student->indigenousStatus == "3") checked @endif>
                                            Yes, Aboriginal AND Torres Strait Islander<br><input type="radio"
                                            name="indigenousStatus" value="4" disabled=""  @if($student->indigenousStatus == "4") checked @endif>
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
                                    <form name="edit_language_frm" id="edit_language_frm" method="POST" action="{{ route('edit.language.people') }}">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="student_id" value="{{ $studentID }}">
                                        <div style="float:left;padding-left:150px;">
                                            <div style="padding:5px;float:left;font-weight:bold;width:400px;"
                                                align="left">Country of Birth? </div>
                                            <div style="padding:0px 5px;float:left;vertical-align:bottom">
                                                <select class="form-control" name="birthCountry" id="birthCountry">
                                                    <option></option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" @if($country->id == $student->birthCountry) selected @endif>{{ $country->name }}</option>
                                                    @endforeach
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
                                                    <input class="form-check-input" type="radio"name="nospokenlanguage" id="nospokenlanguage" value="no" onchange="change_english_level(this.value)">
                                                    <label class="form-check-label" for="nospokenlanguage">No, English
                                                        only</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="nospokenlanguage" id="yesspokenlanguage" value="yes" onchange="change_english_level(this.value)">
                                                    <label class="form-check-label" for="yesspokenlanguage">Yes, other -
                                                        Please specify:</label>
                                                    <select class="form-control" style="width:200px;display:inline;" name="spokenLanguage" id="spokenLanguage" onchange="show_english_level(this.options[this.selectedIndex].value)">
                                                        <option>Select Languagae</option>
                                                        @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}" @if($student->spokenLanguage == $language->id) selected @endif>{{ $language->name }}</option>
                                                        @endforeach
                                                     </select>
                                                </div>
                                            </div>
                                            <div style="clear:both;height:5px;"></div>
                                            <div id="englishProfTitle"
                                            style="padding: 5px; font-weight: bold; width: 380px; float: left; display: block;">Proficiency in English: </div>
                                            <div id="englishProf" style="padding: 0px 20px; float: left; display: block;">
                                                <input type="radio" name="englishProficiency" value="1" @if($student->englishProficiency == "1") checked @endif>
                                                Very well<br><input type="radio" name="englishProficiency" @if($student->englishProficiency == "2") checked @endif
                                                value="2">
                                                Well<br><input type="radio" name="englishProficiency" @if($student->englishProficiency == "3") checked @endif
                                                value="3">
                                                Not well<br><input type="radio" name="englishProficiency" @if($student->englishProficiency == "4") checked @endif
                                                value="4">
                                                Not at all<br>
                                            </div>
                                            <div style="clear:both;height:5px;"></div>
                                            <div style="padding:5px;font-weight:bold;float:left;width:380px;">Indigenous
                                                Status: </div>
                                            <div style="padding:5px 20px;float:left;">
                                                <input type="radio" name="indigenousStatus" value="1"  @if($student->indigenousStatus == "1") checked @endif>
                                                Yes, Aboriginal<br><input type="radio" name="indigenousStatus"
                                                    value="2"  @if($student->indigenousStatus == "2") checked @endif >
                                                Yes, Torres Strait Islander<br><input type="radio"
                                                    name="indigenousStatus" value="3"  @if($student->indigenousStatus == "3") checked @endif>
                                                Yes, Aboriginal AND Torres Strait Islander<br><input type="radio"
                                                    name="indigenousStatus" value="4"  @if($student->indigenousStatus == "4") checked @endif>
                                                No, Neither Aboriginal nor Torres Strait Islander<br>
                                            </div>
                                        </div>
                                        <div style="clear:both; height:20px;"></div>
                                        <div align="center">
                                            <button type="submit" class="btn btn-primary" style="margin:0px 5px;"
                                                fdprocessedid="j210e">Save</button>
                                            <button type="button" class="btn btn-primary" style="margin:0px 5px;"
                                                onclick="unsaved=true;editLanguageAndDiversity(524977, 'view');"
                                                fdprocessedid="o9gpn" > Cancel</button>
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
                                                class="mb-5 text-center">New Enquiry for {{ $student->first_name }}
                                                {{ $student->last_name }}</span>
                                            <form name="add_opppr" id="add_opppr" method="post"
                                                enctype="multipart/form-data"
                                                action="{{ route('people.new.enquiry') }}" method="POST">
                                                @csrf()
                                                @method('POST')
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div style="padding:5px; float:left; width:150px;"
                                                            align="left">
                                                            Preferred Course</div>
                                                        <div style="padding:5px; float:left">
                                                            <select name="courseList" class="form-control"
                                                                id="courseList" size="1" style="width:200px;">
                                                                @foreach ($courses as $course)
                                                                    <option value="{{ $course->id }}">
                                                                        {{ $course->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" value="{{ $student->id }}"
                                                                name="studentId" id="studentId">
                                                        </div>
                                                        <div style="clear:both;height:10px;"></div>
                                                        <div style="padding:5px; float:left;width:150px;"
                                                            align="left">
                                                            Delivery Method(s)</div>
                                                        <div style="padding:5px; float:left">
                                                            <select name="delevery_method[]" class="form-control"
                                                                id="courseTypeList" multiple="multiple"
                                                                style="width:200px; height:50px;">
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
                                                                    <option value="{{ $city->id }}">
                                                                        {{ $city->name }}</option>
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
                                                                <option value="test">test</option>
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
                                                                <option value="Weworkbook Support">Weworkbook Support
                                                                </option>
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
                            {{-- model end  --}}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Course Code </th>
                                            <th scope="col">Location </th>
                                            <th scope="col">Method</th>
                                            <th scope="col">Assigned To </th>
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
                                                        foreach (json_decode($enqu->cityList) as $row_city) {
                                                            $city = App\Models\City::where('id', $row_city)->first();
                                                            echo $city->name . '<br>';
                                                        }
                                                    @endphp
                                                </td>
                                                <td> {{ $enqu->delevery_method }} </td>
                                                <td>{{ $enqu->referralList }}</td>
                                                <td>{{ $enqu->assignTo }}</td>
                                                <td>N</td>
                                                <td>active {{ $enqu->important }}</td>
                                                <td><i title="View Notes" style="cursor:pointer;"
                                                        class="fa fa-sticky-note fa-2x text-warning ml-2"
                                                        aria-hidden="true"
                                                        onclick="openEnquiryNotes({{ $enqu->student }},{{ $enqu }} );"></i>
                                                    <i title="Edit Enquiry" style="cursor:pointer"
                                                        class="fa fa-pencil fa-2x text-info ml-2" aria-hidden="true"
                                                        onclick="openNewEnquiry({{ $enqu->student }},{{ $enqu }});"></i>
                                                    <i title="Enrol" style="cursor:pointer"
                                                        class="fa fa-user-plus fa-2x text-success ml-2"
                                                        aria-hidden="true"
                                                        onclick="openEnrolForm(539103, 'falak', 'khan', '133730', 'BSB40820', 'new');"></i>
                                                    <i title="Email InfoPAK. *To unlock this feature, please upgrade to a Non-Free License"
                                                        style="cursor:pointer"
                                                        class="fa fa-book fa-2x text-primary ml-2"
                                                        aria-hidden="true"></i>
                                                    <i title="Send Email. *To unlock this feature, please upgrade to a Non-Free License"
                                                        style="cursor:pointer"
                                                        class="fa fa-book fa-2x text-primary ml-2"
                                                        aria-hidden="true"></i>
                                                    <i title="Cancel Enquiry" style="cursor:pointer"
                                                        class="fa fa-trash fa-2x ml-2 text-danger" aria-hidden="true"
                                                        onclick="deleteEnquiry(539103, '133730');"></i>
                                                </td>
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
                            <button type="button" class="btn btn-primary w-100 ms-2" style="height: 50px;"
                                data-bs-toggle="modal" data-bs-target="#newEnrolment">
                                New Enrolment
                            </button>
                            <button type="button" class="btn btn-primary w-100 ms-2" style="height: 50px;"
                                data-bs-toggle="modal" data-bs-target="#selectColumns">
                                Select Columns
                            </button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Course Code </th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">City Name</th>
                                    <th scope="col">Activity End Date</th>
                                    <th scope="col">Activity Start Date</th>
                                    <th scope="col">Enrolled On</th>
                                    <th scope="col">Schedule End Date</th>
                                    <th scope="col">Schedule Month</th>
                                    <th scope="col">Schedule Start Date </th>
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
                                                foreach (json_decode($enqu->cityList) as $row_city) {
                                                    $city = App\Models\City::where('id', $row_city)->first();
                                                    echo $city->name . '<br>';
                                                }
                                            @endphp
                                        </td>
                                        <td> {{ $enqu->delevery_method }} </td>
                                        <td>{{ $enqu->referralList }}</td>
                                        <td>{{ $enqu->assignTo }}</td>
                                        <td>N</td>
                                        <td>active {{ $enqu->important }}</td>
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
                                                        <input type="date" style="width:80%;" class="form-control"
                                                            name="receivedDate" id="receivedDate">
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
                        <div class="modal fade" id="selectColumns" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h2>Select Columns</h2>

                                        ` <table>
                                            <tbody>
                                                <tr style="height:10px;"></tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="unitCompetentDate_1" id="unitCompetentDate_1"
                                                                checked=""><label
                                                                for="unitCompetentDate">&nbsp;&nbsp;Activity End
                                                                Date</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="activityStartDate_1" id="activityStartDate_1"
                                                                checked=""><label
                                                                for="activityStartDate">&nbsp;&nbsp;Activity Start
                                                                Date</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="enrolTime_1" id="enrolTime_1"
                                                                checked=""><label
                                                                for="enrolTime">&nbsp;&nbsp;Enrolled On</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="endDate_1" id="endDate_1" checked=""><label
                                                                for="endDate">&nbsp;&nbsp;Schedule End
                                                                Date</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="month_1"
                                                                id="month_1" checked=""><label
                                                                for="month">&nbsp;&nbsp;Schedule Month</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="startDate_1" id="startDate_1"
                                                                checked=""><label
                                                                for="startDate">&nbsp;&nbsp;Schedule Start
                                                                Date</label></strong></td>
                                                </tr>

                                                <tr style="height:10px;"></tr>
                                                <tr style="height:30px;">
                                                    <td align="center">
                                                        <button class="btn btn-primary" style="margin:0px 2px;"
                                                            type="button" onclick="addSelectedCols();"
                                                            fdprocessedid="h78jc">Save</button>
                                                        <button class="btn btn-primary" style="margin:0px 2px;"
                                                            type="button"data-bs-dismiss="modal">Cancel</button>
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
                                            <th scope="col">Course Code </th>
                                            <th scope="col">Method</th>
                                            <th scope="col">Group</th>
                                            <th scope="col">City Name</th>
                                            <th scope="col">Activity End Date</th>
                                            <th scope="col">Activity Start Date</th>
                                            <th scope="col">Enrolled On</th>
                                            <th scope="col">Schedule End Date</th>
                                            <th scope="col">Schedule Month</th>
                                            <th scope="col">Schedule Start Date </th>
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
                                                        foreach (json_decode($enqu->cityList) as $row_city) {
                                                            $city = App\Models\City::where('id', $row_city)->first();
                                                            echo $city->name . '<br>';
                                                        }
                                                    @endphp
                                                </td>
                                                <td> {{ $enqu->delevery_method }} </td>
                                                <td>{{ $enqu->referralList }}</td>
                                                <td>{{ $enqu->assignTo }}</td>
                                                <td>N</td>
                                                <td>active {{ $enqu->important }}</td>
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
                            <a href="{{ route('person.note.export', $studentID) }}" class="btn btn-primary ms-2"
                                style="height: 50px;">Export to PDF</a>
                            {{-- // This Model // --}}
                            <div class="modal fade" id="add-notes" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content" style="height:500px;">
                                        <div class="modal-body">
                                            <h2>Add Person Notes for {{ $student->firstName }} {{ $student->lastName }}
                                            </h2>
                                            <form name="saveForm" action="{{ route('person.notes') }}" id="saveForm"
                                                method="post" target="_self" enctype="multipart/form-data">
                                                @csrf
                                                @method('post')
                                                <input type="hidden" name="student_id" value="{{ $studentID }}">
                                                <div class="form-group row">
                                                    <label for="template"
                                                        class="col-sm-2 col-form-label">Template</label>
                                                    <div class="col-sm-10">
                                                        <select id="template" onchange="ptemplatechanged()"
                                                            name="template" class="form-control">
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
                                                    <label for="note" class="col-sm-2 col-form-label">Select note
                                                        category:</label>
                                                    <div class="col-sm-10">
                                                        <select name="noteCategory" id="noteCategory"
                                                            class="form-control">
                                                            <option value="0" selected="">Select Cataegory
                                                            </option>
                                                            @foreach ($noteCtegory as $cataegoryNote)
                                                                <option value="{{ $cataegoryNote->id }}">
                                                                    {{ $cataegoryNote->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2">
                                                    <label for="upload_file" class="col-sm-2 col-form-label">Attach
                                                        File</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" name="upload_file"
                                                            id="upload_file" size="50">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2">
                                                    <label for="followUpDate2" class="col-sm-2 col-form-label">Follow-up
                                                        Date</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control hasDatepicker"
                                                            value="" name="follow_up_to_date"
                                                            id="follow_up_to_date">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2">
                                                    <label for="followUpDate2" class="col-sm-2 col-form-label"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="margin:0px 2px;" fdprocessedid="uv5hv">Save</button>
                                                        <button type="button" class="btn btn-primary"
                                                            style="margin:0px 2px;" id="closeForm"
                                                            fdprocessedid="khkvru"
                                                            data-bs-dismiss="modal">Cancel</button>
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
                                    @foreach ($noteEnrolment as $note)
                                        <tr>
                                            <th>{{ $note->note }} </th>
                                            <td>{{ $note->category->name }}</td>
                                            <td>{{ $note->follow_up_to_date }}</td>
                                            <td>{{ $note->created_at }}</td>
                                            <td>{{ $note->created_by }}</td>
                                            <td><a href="{{ route('person.note.delete', $note->id) }}"><i
                                                        title="Delete Student"
                                                        class="fa fa-trash fa-2x text-danger"></i></a></td>
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
            $("#showNameType").change(function() {
                var nameType = $(this).val();
                if(nameType == "2")
                    $("#chkUSIFirstName").hide();
                else
                    $("#chkUSIFirstName").show();
            });

            toastr.options.positionClass = 'toast-bottom-full-width';

            $("#btnUSIRefresh").click(function() {
                verifyUSI(true);
            });

            function verifyUSI(showMessage)
            {
                $("#btnUSIRefresh").addClass("icon-rotate");
                var sendData = {
                    "usi": "BNGH7C75FN",
                    "first_name": "Maryam",
                    "family_name": "Fredrick",
                    "date_of_birth": "1966-05-25"
                };
                if($('#showNameType').val() == "2")
                {
                    sendData["first_name"] = "";
                }
                $.ajax({
                    type: 'POST',
                    url: "{{ route('usi.verify') }}",
                    contentType: 'application/json; charset=utf-8',
                    dataType: 'json',
                    async: true,
                    data: JSON.stringify(sendData),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $("#btnUSIRefresh").removeClass("icon-rotate");
                        if($('#showNameType').val() == "2")
                        {
                            $('#chkUSIStatus').attr('class', response['USIStatus'] == 'Valid' ? 'bi bi-check2 icon-point' : 'bi bi-x icon-size-15' );
                            $('#chkUSILastName').attr('class', response['SingleName'] == 'Match' ? 'bi bi-check2 icon-point' : 'bi bi-x icon-size-15' );
                            $('#chkUSIBirth').attr('class', response['DateOfBirth'] == 'Match' ? 'bi bi-check2 icon-point' : 'bi bi-x icon-size-15' )
                        } else {
                            $('#chkUSIStatus').attr('class', response['USIStatus'] == 'Valid' ? 'bi bi-check2 icon-point' : 'bi bi-x icon-size-15' );
                            $('#chkUSIFirstName').attr('class', response['FirstName'] == 'Match' ? 'bi bi-check2 icon-point' : 'bi bi-x icon-size-15' );
                            $('#chkUSILastName').attr('class', response['FamilyName'] == 'Match' ? 'bi bi-check2 icon-point' : 'bi bi-x icon-size-15' );
                            $('#chkUSIBirth').attr('class', response['DateOfBirth'] == 'Match' ? 'bi bi-check2 icon-point' : 'bi bi-x icon-size-15' );
                        }
                        //console.log('Success:', response);
                        if(showMessage)  toastr["success"]("USI verfication refresh done!");
                    },
                    error: function(xhr, status, error) {
                        $("#btnUSIRefresh").removeClass("icon-rotate");
                        $('#chkUSIStatus').attr('class', 'bi bi-x icon-size-15');
                        $('#chkUSIFirstName').attr('class', 'bi bi-x icon-size-15');
                        $('#chkUSILastName').attr('class', 'bi bi-x icon-size-15');
                        $('#chkUSIBirth').attr('class', 'bi bi-x icon-size-15');
                        if(showMessage) toastr["error"]("USI Verification Error!");
                        //console.error('Error:', error);
                    }
                });
            }

            verifyUSI(false);

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
        function openEnquiryNotes(item, enquiry) {
            $('#enuiry_notes #enuiry_note').empty('show');
            $('#enuiry_notes').modal('show');
            $('#enuiry_notes #enuiry_note').append('Enquiry Notes for ' + item.first_name + ' ' + item.last_name);
            $('#courseId').val(enquiry.course.id)
            $('#enquiryId').val(enquiry.id)

            $.ajax({
                url: "{{ route('enuiry.note.list') }}", // Your server script URL
                type: 'GET',
                data: {
                    id: enquiry.id
                }, // Send data as an object
                success: function(response) {
                    // Handle success
                    console.log(response);
                    // Clear existing rows
                    $('#notesTable tbody').empty();
                    // Append new rows
                    $.each(response, function(index, note) {
                        $('#notesTable tbody').append(
                            '<tr>' +
                            '<td>' + note.id + '</td>' +
                            '<td>' + note.note + '</td>' +
                            '<td>' + note.category.name + '</td>' +
                            '</tr>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error
                    alert('An error occurred: ' + error);
                    console.log(xhr.responseText);
                }
            });
        }
        function change_english_level (newValue){
            console.log(newValue)
            $("#spokenLanguage").attr('disabled')
        }
        function openNewEnquiry(item,enquiry) {
            console.log(enquiry.delevery_method)
            $('#enuiry_notes_1 .enuiry_note').empty('show');
            $('#enuiry_notes .enuiry_note').empty('show');
            $('#enuiry_notes_1').modal('show');
            $('#enuiry_notes_1 .enuiry_note').append('Enquiry Notes for ' + item.first_name + ' ' + item.last_name);
            $('#courseList_edit').val(enquiry.course_id);
            var valuesToSelect = enquiry.delevery_method;

            var selectElement = document.getElementById('courseTypeList_1');
            for (var i = 0; i < selectElement.options.length; i++) {
            if (valuesToSelect.includes(parseInt(selectElement.options[i].value))) {
                console.log(selectElement.options[i].selected)
                selectElement.options[i].selected = true;
            }
        }
        }

        function showAddNotesBox() {
            $('#enrolment_enuiry_note').css('display', 'flex');
            $('#enrolment_enquiry_note_add_button').css('display', 'none');
        }

        function hideAddNotesBox() {
            $('#enrolment_enuiry_note').css('display', 'none');
            $('#enrolment_enquiry_note_add_button').css('display', 'flex');
        }

        function openEmailDialog(text){
            console.log(text)
            $('#enquiry_email').modal('show');
            $('#document_people').html(`<a href="/`+ text.path +`">`+ text.file_name +`</a>`)
            $('#document_path').val(text.path)
        }
    </script>

    <script>
        $(document).ready(function() {
            // Function to add a new row
            $("#addRowBtn").click(function() {
                var newRow = '<tr class="mt-2">' +
                    '<td>Upload File (Max size of 20MB)<input type="hidden" name="MAX_FILE_SIZE" value="20971520"></td>' +
                    '<td>' +
                    '<input class="form-control" type="file" name="document_file[]" id="formFileMultiple[]" multiple="">' +
                    '</td>' +
                    '<td nowrap="">Give the document a name</td>' +
                    '<td>' +
                    '<input type="text" class="form-control" name="ducment_name[]" id="documentName[]" maxlength="50">' +
                    '</td>' +
                    '</tr>';
                $("#dataTable").append(newRow);
            });
        });
    </script>
    {{-- Enuiry Modal Notes --}}
    <div class="modal fade" id="enuiry_notes" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-dialog-scrollable" style="height: 500px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="enuiry_note"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="enrolment_enquiry_note_add_button" style="display: flex;">
                        <div class="col-sm-6">
                            <button class="btn btn-primary" onclick="showAddNotesBox();">Add Notes</button>
                        </div>
                        <div class="col-sm-6 text-end">
                            <a href="#" class="btn btn-primary">
                                Export to PDF
                            </a>
                        </div>
                    </div>
                    <div id="enrolment_enuiry_note" style="display: none;">
                        <form name="" id="saveForm" method="post" target=""
                            action="{{ route('enrolment.enuiry.note.add') }}" enctype="multipart/form-data">
                            @csrf()
                            @method('POST')
                            <div class="form-group row">
                                <label for="note" class="col-sm-3 col-form-label">Select note category:</label>
                                <div class="col-sm-9">
                                    <select name="noteCat" id="noteCat" style="w" class="form-control">
                                        <option value="" selected=""></option>
                                        @foreach ($noteCtegory as $cataegoryNote)
                                            <option value="{{ $cataegoryNote->id }}">{{ $cataegoryNote->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- start wwb-1218 -->
                            <div class="form-group row">
                                <label for="note" class="col-sm-3 col-form-label">Followup Date:</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control mt-3" name="followUpDate2"
                                        value="0000-00-00">
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="note" class="col-sm-3 col-form-label">Assigned To:</label>
                                <div class="col-sm-9">
                                    <select name="assignTo" class="form-control">
                                        <option value="1523" selected="">Kabir Kiron</option>
                                        <option value="1522">Kabir H Kiron</option>
                                        <option value="1555">newtest newtest</option>
                                        <option value="1521">Weworkbook Support</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="note" class="col-sm-3 col-form-label">Chance of Success:</label>
                                <div class="col-sm-9">
                                    <select name="important" class="form-control" fdprocessedid="4vzju6">
                                        <option value="10%">10%</option>
                                        <option value="30%">30%</option>
                                        <option value="50%">50%</option>
                                        <option value="70%">70%</option>
                                        <option value="90%">90%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="note" class="col-sm-3 col-form-label">Likely Month:</label>
                                <div class="col-sm-9">
                                    <select name="likelyMonth" id="" class="form-control" fdprocessedid="xwl3ae">
                                        <option value="">Unknown</option>
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
                                        <option value="2025-05-01">May 2025</option>
                                        <option value="2025-06-01">Jun 2025</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end wwb-1218 -->
                            <div class="form-group row mt-3" id="enqtemplateselectdiv">
                                <label for="enqtemplateselect" class="col-sm-3 col-form-label">Template</label>
                                <div class="col-sm-9">
                                    <select id="enqtemplateselect" class="form-control" name="template">
                                        <option value="">None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="note" class="col-sm-3 col-form-label">Note Content:</label>
                                <textarea class="form-control" name="note" id="note" style="width: 100%; height: 70px;"></textarea>
                            </div>
                            <div class="form-group row mt-3">
                                <label for="note" class="col-sm-3 col-form-label">Attach File:</label>
                                <input type="file" name="document" class="form-control" value="">
                            </div>
                            <div class="form-group row mt-3">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary" style="margin-right:3px;"
                                        fdprocessedid="qck51">Save</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-secondary" onclick="hideAddNotesBox();"
                                        style="margin-left:3px;" fdprocessedid="j0r1b4">Cancel</button>
                                </div>
                            </div>
                            <input type="hidden" id="enquiryId" name="enquiryId" value="">
                            <input type="hidden" id="studentId" name="studentId" value="{{ $studentID }}">
                            <input type="hidden" id="courseId" name="courseId" value="">
                        </form>
                    </div>
                    <div class="table">
                        <table class="table" id="notesTable">
                            <thead>
                                <tr>
                                    <th scope="col">Posted By</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Note Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    {{-- Modal Email --}}
    <div class="modal fade" id="enquiry_email" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-dialog-scrollable" style="height: 500px;">
            <div class="modal-header">
                <h1 class="modal-title fs-5 enuiry_note">Document Email</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="{{ route('send.mail.people') }}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-2">
                      <label for="enuiry_document_email">To</label>
                    </div>
                    <div class="col-10">
                        <input type="email" name="" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="enuiry_document_email" value="{{$student->studentEmail}}" disabled>
                        <input type="hidden" name="email" class="form-control" id="" value="{{$student->studentEmail}}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                      <label for="enuiry_document_email">CC</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="email_cc" class="form-control" id="enuiry_document_email" value="{{ $student->studentEmail2 }};{{ $student->studentEmail3 }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                      <label for="enuiry_document_email">Subject</label>
                    </div>
                    <div class="col-10">
                        <input type="text" name="subject" class="form-control" id="enuiry_document_email">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                      <label for="enuiry_document_email">Note</label>
                    </div>
                    <div class="col-10">
                       <textarea name="note_email" class="form-control" id="document_email" cols="30" rows="4"></textarea>
                    </div>
                </div>
                <p id="document">
                    <span>Attached:</span> <span id="document_people"></span>
                    <input type="hidden" id="document_path" name="document_path" value="">
                </p>
                <div class="row text-center mt-3">
                    <div class="col-12">
                        <button class="btn btn-primary text-center" type="submit">Send</button>
                    </div>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>
    {{-- Enuiry Modal Notes --}}
    <div class="modal fade" id="enuiry_notes_1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-dialog-scrollable" style="height: 500px;">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 enuiry_note"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="" id="" method="post" enctype="multipart/form-data"
                        action="">
                        @csrf
                        @method('POST')
                        <div style="padding:5px; float:left; width:150px;" align="left">Preferred Course</div>
                        <div style="padding:5px; float:left">
                            <select name="courseList" class="form-control" id="courseList_edit" size="1"
                                style="width:200px;">
                                <option value=""></option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->code }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" value="539789" name="studentId" id="studentId">
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div style="padding:5px; float:left;width:150px;" align="left">Delivery Method(s)</div>
                        <div style="padding:5px; float:left">
                            <select name="delevery_method[]" class="form-control"
                                                                id="courseTypeList_1" multiple="multiple"
                                                                style="width:200px; height:50px;">
                                                                <option value="Self Paced">Self Paced</option>
                                                                <option value="Public Sessions">Public Sessions</option>
                                                                <option value="Private Sessions">Private Sessions</option>
                                                            </select>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div style="padding:5px; float:left; width:150px;" align="left">Preferred Cities</div>
                        <div style="padding:5px; float:left">
                            <select name="cityList[]" class="form-control" id="cityList" multiple="multiple"
                                style="width:200px; height:100px;" fdprocessedid="job7pa">
                                <option value="1519" selected="">new</option>
                                <option value="1501" selected="">sudny</option>
                                <option value="1502" selected="">Sydney</option>
                            </select>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div style="padding:5px; float:left; width:150px;" align="left">Referred By</div>
                        <div style="padding:5px; float:left">
                            <select name="referralList" class="form-control" id="referralList" size="1"
                                style="width:200px;" fdprocessedid="94ngi4">
                                <option value=""></option>
                                <option value="360" selected="">test</option>
                            </select>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div style="display:none">
                            <div style="padding:5px;float:left;width:150px;" align="left">Note</div>
                            <div style="padding:5px;float:left">
                                <textarea name="note" class="form-control" id="note" style="height:50px;width:195px;"
                                    onkeypress="return imposeMaxLength(event, this, 250);"></textarea>
                            </div>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div>
                            <div style="padding:5px;float:left;width:150px;" align="left">Follow-up Date</div>
                            <div style="padding:5px;float:left">
                                <input type="date" class="form-control hasDatepicker" value=""
                                    name="followUpDate" id="followUpDate" style="width:180px;">
                            </div>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div style="padding:5px;float:left;width:150px;" align="left">Assign To</div>
                        <div style="padding:5px;float:left">
                            <select name="assignTo" id="assignTo" class="form-control" size="1"
                                style="width:200px;" fdprocessedid="pudgy">
                                <option value="1523" selected="">Kabir Kiron</option>
                                <option value="1522">Kabir H Kiron</option>
                                <option value="1555">newtest newtest</option>
                                <option value="1521">Weworkbook Support</option>
                            </select>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div>
                            <div style="padding:5px;float:left;width:150px;" align="left">Chance of Success</div>
                            <div style="padding:5px;float:left">
                                <select class="form-control" name="important" id="important" size="1"
                                    style="width:200px;" fdprocessedid="ioa6mr">
                                    <option value="10%">10%</option>
                                    <option value="30%">30%</option>
                                    <option value="50%">50%</option>
                                    <option value="70%">70%</option>
                                    <option value="90%">90%</option>
                                </select>
                            </div>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div>
                            <div style="padding:5px;float:left;width:150px;" align="left">Likely Month</div>
                            <div style="padding:5px;float:left">
                                <label style="width:150px;">Sep 2024&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            </div>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div>
                            <div style="padding:5px;float:left;width:150px;" align="left">Update Likely Month to
                            </div>
                            <div style="padding:5px;float:left"><select class="form-control" id="likelyMonth"
                                    name="likelyMonth" size="1" style="width:200px;" fdprocessedid="rdyz3d">
                                    <option value=""></option>
                                    <option value="Unknown">Unknown</option>
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
                                    <option value="2025-05-01">May 2025</option>
                                    <option value="2025-06-01">Jun 2025</option>
                                </select> </div>
                        </div>
                        <div style="clear:both;height:10px;"></div>
                        <div style="display:none">
                            <div style="padding:5px; float:left; width:150px;" align="left">Set Status</div>
                            <div style="padding:5px; float:left">
                                <select name="status" id="status" size="1">
                                    <option value="active" selected="">Active</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div style="clear:both;height:20px;"></div>
                        <div align="center">
                            <button type="submit" class="btn btn-primary" fdprocessedid="zi702f">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="sendsurvey" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Survey Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form name="surveyform" style="width:100%" id="surveyform" method="post"
                        target="email_target">
                        <div class="form-group row col-sm-12 mt-2">
                            <label for="from" class="col-sm-1 col-form-label">From</label>
                            <div class="col-sm-11">
                                <select name="from" class="form-control" fdprocessedid="gz1mk">
                                    <option value="company379@weworkbook.com">company379@weworkbook.com (Weworkbook
                                        Support)</option>
                                    <option value="info@aift.com.au (del)">info@aift.com.au (del) (Kabir H Kiron)</option>
                                    <option value="info@aift.com.au">info@aift.com.au (Kabir Kiron)</option>
                                    <option value="newtest@yopmail.com">newtest@yopmail.com (newtest newtest)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-sm-12 mt-2">
                            <label for="to" class="col-sm-1 col-form-label">To</label>
                            <div class="col-sm-11">
                                <input type="email" class="form-control" name="to" id="toemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                    value="dipak@mail.com" fdprocessedid="3n4458">
                            </div>
                        </div>
                        <div class="form-group row col-sm-12 mt-2">
                            <label for="surveyname" class="col-sm-1 col-form-label">Survey</label>
                            <div class="col-sm-11">
                                <select id="studcategoryid" name="categoryid" onchange="surveychanged()"
                                    class="form-control" fdprocessedid="3hfomd3">
                                </select>
                            </div>
                        </div>
                        <div class="form-group row col-sm-12 mt-2">
                            <label for="subject" class="col-sm-1 col-form-label">Subject</label>
                            <div class="col-sm-11">
                                <input type="email" name="subject" id="subject" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                    value="" fdprocessedid="hxg5xj">
                            </div>
                        </div>
                        <div class="form-group row col-sm-12 mt-3">
                            <label for="email_Content" class="col-sm-1 col-form-label">Body</label>
                            <div class="col-sm-11">
                                <textarea name="email_Content" id="email_Content" class="form-control" rows="5" style=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row col-sm-12">
                            <div class="col-sm-1 col-form-label">
                                <input type="hidden" id="studenrolmentid" name="enrolmentid" value="0">
                                <input type="hidden" id="studstudentid" name="studentid" value="528675">
                                <input type="hidden" id="studentemail" name="studentemail" value="dipak@mail.com">
                                <input type="hidden" id="hidemployerid" name="hidemployerid" value="0">
                                <input type="hidden" id="hidcompanyName" name="hidcompanyName" value="">
                            </div>
                            <div class="col-sm-11">
                                <input type="button" value="Send Link" id="sendsurveybtn"
                                    onclick="sendsurveylink()" class="btn btn-primary" fdprocessedid="c2zpzk">
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
                        No mobile number on file for this learner <br>
                        <div class="form-group">
                            <label for="etemplateselect">Template</label>
                            <select id="stemplateselect" name="template" onchange="getsmstemplate()"
                                class="form-control" fdprocessedid="ew047c">
                                <option value="0">None</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="smsMessage" id="smsMessage" class="form-control" style="height:100px"></textarea>
                        </div>
                        <div class="forn-group">
                            <span id="countdown">800 characters remaining. The number of messages: 0/5</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="smsSendBtn"
                                fdprocessedid="76g61e">Send</button>
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