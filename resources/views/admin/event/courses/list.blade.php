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
                            <h4 class="card-title">Event - Courses List</h4>
                        </div>
                    </div>
                    <div class="col-sm-4 d-flex align-items-center justify-content-center">
                        <div class="d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="url"
                                    value="{{ route('event.courses') }}" id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Courses
                                </label>
                            </div>
                            <div class="form-check ms-3">
                                <input class="form-check-input" type="radio" name="url"
                                    value="{{ route('event.session.index') }}" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Sessions
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 d-flex align-items-center justify-content-center">
                        <ul class="nav nav-tabs dzm-tabs" id="myTab-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                {{-- <a href="{{ URL::route('add-course') }}" class="btn btn-primary light">Create Courses</a> --}}
                                <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle"
                                    role="button">Create</a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- @dd($courseCategory) --}}
                <div class="card-block">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <form class="form-inline">
                                <div class="d-flex py-3">
                                    <h6 class="py-2"> Filter</h6>
                                    <select class="form-select ms-2" aria-label="Default select example" id="category-filter">
                                        <option selected>Category</option>
                                        @foreach ($courseCategory as $category)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-select ms-2 course-filter" aria-label="Default select example" >
                                        <option selected>Course</option>
                                        @foreach ($courses as $course)
                                            <option  value="{{ $course->id }}" @if($course_value != null) @if($course_value == $course->id) selected @endif @endif>{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-select ms-2 delivery_method_value" aria-label="Default select example">
                                        <option selected value="">Delivery Method</option>
                                        <option value="1">SP</option>
                                        <option value="2">PUB</option>
                                        <option value="3">PRI</option>
                                    </select>
                                    <select class="form-select ms-2" aria-label="Default select example">
                                        <option selected>City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" style="color:#666">{{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <select class="form-select ms-2" aria-label="Default select example">
                                        <option selected>All Status</option>
                                        <option value="All">All Status</option>
                                        <option value="Open">Status Open</option>
                                    </select>
                                    <select class="form-select ms-2" aria-label="Default select example">
                                        <option selected>Trainers</option>
                                        <option value="trainer1 training">trainer1 training</option>
                                    </select>
                                    <select class="form-select ms-2" aria-label="Default select example">
                                        <option selected>Assessors</option>
                                        <option value="trainer1 training">trainer1 training</option>
                                    </select>
                                    <select class="form-select ms-2" aria-label="Default select example">
                                        <option selected>Rooms</option>
                                    </select>
                                </div>
                                <div class="">

                                </div>
                            </form>
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
                                        <th>Course</th>
                                        <th>Method</th>
                                        <th>City</th>
                                        <th>Trainer</th>
                                        <th>Assessor</th>
                                        <th>Group</th>
                                        <th>Resource?</th>
                                        <th>Date</th>
                                        <th>Enrol / Confirmed / Quota</th>
                                        <th>Actions</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($rows))
                                        @foreach ($rows as $k => $row)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('event.course.update', $row->id) }}"
                                                        style="width: 26px;height: 20px;line-height: 2px;width: 20px;text-align: center;padding: 0;">
                                                        +
                                                    </a>
                                                    @foreach ($courses as $course)
                                                        @if ($course->id == $row->course_name)
                                                            {{ $course->name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @if ($row->course_type == '1')
                                                        Self Paced
                                                    @elseif($row->course_type == '2')
                                                        Public Sessions
                                                    @else
                                                        Private Sessions
                                                    @endif
                                                </td>
                                                <td>
                                                    @foreach ($cities as $city)
                                                        @if ($city->id == $row->city)
                                                            {{ $city->name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{ $row->trainers }}
                                                </td>
                                                <td>
                                                    {{ $row->assessors }}
                                                </td>
                                                <td>
                                                    {{ $row->group }}
                                                </td>
                                                <td>
                                                    {{ $row->resources }}
                                                </td>
                                                <td>
                                                    {{ $row->month }} {{ $row->year }}
                                                </td>
                                                <td>

                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('event.courses.destroy', $row->id) }}"
                                                            onclick="return confirm('Are you sure?')"
                                                            class="btn btn-danger shadow btn-xs sharp me-1"><i
                                                                class="fa fa-trash"></i></a>
                                                        <a href="{{ route('event.courses.archive', ['id' => $row->id, 'archive' => ($row->archive = 1)]) }}"
                                                            class="btn btn-primary light shadow btn-xs sharp me-1"><i
                                                                class="fa fa-archive"></i></a>
                                                        @if ($row->status == '1')
                                                            <a href="{{ route('event-courses-status', ['id' => $row->id, 'status' => ($row->status = 0)]) }}"
                                                                onclick="return confirm('Are you sure you want to deactive this course?')"
                                                                class=""><i title="Deactivate Course"
                                                                    class="fa fa-toggle-on fa-2x text-success"
                                                                    aria-hidden="true"></i></a>
                                                        @else
                                                            <a href="{{ route('event-courses-status', ['id' => $row->id, 'status' => ($row->status = 1)]) }}"
                                                                onclick="return confirm('Are you sure you want to active this course?')"
                                                                class=""><i title="Activate Course"
                                                                    class="fa fa-toggle-off fa-2x text-success"
                                                                    aria-hidden="true"></i></a>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    {{-- @dd($row) --}}
                                                    @if ($row->status == '1')
                                                        Y
                                                    @else
                                                        N
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="my-4">
                                {!! $rows->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /tab-content -->
        </div>
    </div>
    {{-- //Modal Create Start --}}
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" style="min-height: 458px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Create Event - Course(<span
                            id="courses"></span>)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <form class="needs-validation" action="{}" method="POST" id="course" novalidate>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="course_type" id="selfpaced"
                                        value="1" checked>
                                    <label class="form-check-label" for="selfpaced">Self Paced</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="course_type"
                                        id="public_section" value="2">
                                    <label class="form-check-label" for="public_section">Public Sessions</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="course_type"
                                        id="private_sessions" value="3 ">
                                    <label class="form-check-label" for="private_sessions">Private Sessions</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mt-2" id="reporting_state">
                                <label class="form-check-label" for="reporting_state">Reporting State</label>
                                <select class="form-select" name="reporting_state" aria-label="Default select example"
                                    id="reporting_state" required>
                                    <option value="" selected>Select State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mt-2" id="course_name">
                                <label class="form-check-label" for="course_name">Course Name</label>
                                <select class="form-select" name="course_name" aria-label="Default select example"
                                    id="course_names" required>
                                    <option value="" selected>Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 mt-2" id="group">
                                <label class="form-check-label" for="group">Group</label>
                                <input class="form-control" type="text" name="group" id="group"
                                    value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-6 mt-2" id="trainers">
                                <label class="form-check-label" for="trainers">Trainers</label>
                                <select class="form-select" name="trainers" aria-label="Default select example"
                                    id="trainers_info" required>
                                    <option value="">Selected Trainer</option>
                                </select>
                            </div>
                            <div class="col-6 mt-2" id="assessors">
                                <label class="form-check-label" for="assessors">Assessors</label>
                                <select class="form-select" name="assessors_info" aria-label="Default select example"
                                    id="assessors_info">
                                    <option value="">Selected Accessor</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-2" id="month_1">
                                <label class="form-check-label" for="month">Month</label>
                                <select name="month" type="text" id="month" class="form-control" required>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                            <div class="col-6 mt-2" id="spyear_1">
                                <label class="form-check-label" for="spyear">Year</label>
                                <select name="spyear" id="spyear" class="form-control" required>
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
                                    <option value="2023">2023</option>
                                    <option value="2024" selected="">2024</option>
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
                        <div class="row">
                            <div class="col-6 mt-2" id="course_quota_1">
                                <label class="form-check-label" for="course_quota">Course Quota (Maximum number of
                                    enrolments)</label>
                                <input type="number" class="form-control" name="course_quota" id="course_quota"
                                    value="1" placeholder="Title" required>
                            </div>
                            <div class="col-6 mt-2" id="course_cost_1">
                                <label class="form-check-label" for="course_cost">Course cost (per enrolment)</label>
                                <input type="number" class="form-control" name="course_cost" id="course_cost"
                                    value="0" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mt-2" id="city_1">
                                <label class="form-check-label" for="city">City</label>
                                {{-- <input type="text" class="form-control" name="city" id="city" value="1"
                                    placeholder="Title" required> --}}
                                <select class="form-select" name="city" aria-label="Default select example"
                                    id="city">
                                    <option value="">Selected City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 mt-2" id="location_1">
                                <label class="form-check-label" for="location">Location</label>
                                <input type="text" class="form-control" name="location" id="location"
                                    value="0" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2" id="resources_1">
                                <label class="form-check-label" for="city">Resources (Maximum characters:
                                    1000)</label>
                                <textarea name="requirement" class="form-control" id="resources" cols="100" rows="3" readonly></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6" id="selects_units_1">
                                <label class="form-check-label" for="selects_units">Select Units
                                </label>
                                <select name="selects_units" id="selects_units" class="form-control">
                                    <option value="" selected>Select Units</option>
                                </select>
                            </div>
                            <div class="col-6" id="delevery_mode_1">
                                <label class="form-check-label" for="delevery_mode">Delivery Mode Identifier</label>
                                <select name="modeId" id="delevery_mode" class="form-control">
                                    <option value="YNN" selected>Internal only</option>
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
                        <div class="row">
                            <div class="col-6" id="preModeId_1">
                                <label class="form-check-label" for="preModeId">Predominant delivery mode</label>
                                <select name="preModeId" id="preModeId" class="form-control">
                                    <option value="E" selected>External delivery</option>
                                    <option value="I" selected="">Internal delivery</option>
                                    <option value="W">Workplace-based delivery</option>
                                    <option value="N">Not applicable-RPL/credit transfer</option>
                                </select>
                            </div>
                        </div>
                        <div id="connect_public">

                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary mb-3">Save</button>
                            </div>
                            <div class="col-4">

                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-primary mb-3"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    {{-- //Modal Create End --}}
    {{-- Modal Edit Start --}}
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="course_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog float-end me-5 modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Course - <span id="course_name_1"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="width:1500px;">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-enrolments" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Enrolments</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-notes" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Notes</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-schedule" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Edit Schedule</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-syrvey-setting" type="button" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Survey Setting</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-opportunities" type="button" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Opportunities</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-enrolments" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="mt-3">
                                <div class="" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary ms-2">Email all learners</button>
                                    <button type="button" class="btn btn-primary ms-2">SMS all learners</button>
                                    <button type="button" class="btn btn-primary ms-2">Send Survey</button>
                                    <button type="button" class="btn btn-primary ms-2">Manage Certificates</button>
                                    <button type="button" class="btn btn-primary ms-2">Add Enrolments</button>
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
                                    @if (!empty($rows))
                                        @foreach ($rows as $k => $row)
                                            <tr>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{-- // tables end --}}
                        </div>
                        <div class="tab-pane fade" id="nav-notes" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <button type="button" class="btn btn-primary mt-4" id="tnotes">Add Notes</button>
                            <div id="tNoteForm_34643" style="display: none;">
                                <form name="frm_othernotes_add_34643" id="frm_othernotes_add_34643" method="post"
                                    enctype="multipart/form-data" action="">
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
                                        <textarea name="" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Attach File(s)</label>
                                        <div class="col-sm-6">
                                            <table border="0" cellpadding="0" cellspacing="0" id="uploadBox"
                                                style="margin-top:10px;margin-left:10px">
                                                <tbody>
                                                    <tr class="mt-2">
                                                        <td>
                                                            <input class="form-control" type="file"
                                                                name="upload_file[]" size="50" style="width:360px;">
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-primary" style="margin-left: 30px;"
                                                                type="button" onclick="createUploadBox('uploadBox');">Add
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary mt-4"
                                                style="width: 250px;">Save</button>
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
                                    <tr style="text-align: center; background: rgb(255, 255, 255);"
                                        onmouseover="this.style.backgroundColor=&quot;#F1F1F1&quot;"
                                        onmouseout="this.style.backgroundColor=&quot;#FFF&quot;">
                                        <td style="padding-left:10px; border-bottom:1px solid gray;" align="left">The
                                            course was activated by Kabir Kiron on 2024-04-30 08:43:14</td>
                                        <td style="border-bottom:1px solid gray;text-align:left">schedule</td>
                                        <td style="border-bottom:1px solid gray;text-align:left"></td>
                                        <td style="border-bottom:1px solid gray;"></td>
                                        <td style="border-bottom:1px solid gray;" align="left">Kabir Kiron</td>
                                        <td style="border-bottom:1px solid gray;" align="left">30 Apr 2024 08:43</td>
                                        <td style="border-bottom:1px solid gray;text-align:right" align="left">
                                            <i class="fa fa-pencil fa-2x mr-2 text-info" title="Edit"
                                                onclick="showEdit(34643, 120106, &quot;othernotes&quot;)"></i>

                                            <i class="fa fa-trash fa-2x mr-2 text-danger" title="Delete"
                                                onclick="deleteNote(34643, 120106, &quot;othernotes&quot;)"></i>
                                        </td>
                                    </tr>
                                    <tr style="text-align: center; background: rgb(255, 255, 255);"
                                        onmouseover="this.style.backgroundColor=&quot;#F1F1F1&quot;"
                                        onmouseout="this.style.backgroundColor=&quot;#FFF&quot;">
                                        <td style="padding-left:10px; border-bottom:1px solid gray;" align="left">The
                                            course was archived by Kabir Kiron on 2024-04-30 08:43:00</td>
                                        <td style="border-bottom:1px solid gray;text-align:left">schedule</td>
                                        <td style="border-bottom:1px solid gray;text-align:left"></td>
                                        <td style="border-bottom:1px solid gray;"></td>
                                        <td style="border-bottom:1px solid gray;" align="left">Kabir Kiron</td>
                                        <td style="border-bottom:1px solid gray;" align="left">30 Apr 2024 08:43</td>
                                        <td style="border-bottom:1px solid gray;text-align:right" align="left">
                                            <i class="fa fa-pencil fa-2x mr-2 text-info" title="Edit"
                                                onclick="showEdit(34643, 120105, &quot;othernotes&quot;)"></i>

                                            <i class="fa fa-trash fa-2x mr-2 text-danger" title="Delete"
                                                onclick="deleteNote(34643, 120105, &quot;othernotes&quot;)"></i>
                                        </td>
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
                                        <input style="padding-left:1rem;width:18vw;" name="displayCourseID"
                                            class="form-class" id="displayCourseID" type="text" value="2565"
                                            disabled="">
                                    </div>
                                    <div class="col-2 mt-2 form-group">
                                        <label>Schedule ID</label>
                                    </div>
                                    <div class="col-4 form-group">
                                        <input style="padding-left:1rem;width:12vw;" type="text"
                                            name="displayScheduleID" id="displayScheduleID" class="form-class"
                                            value="34643" disabled="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2 mt-1.5 form-group form-inline">
                                        <label>Course Name</label>
                                    </div>
                                    <div class="col-4 form-group form-inline">
                                        <select name="coursename34643" class="form-control" style="width:18vw;"
                                            id="coursename34643" size="1" disabled="disabled">
                                            <option value="2565" selected="">Certificate IV in marketing and
                                                communication</option>
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
                                <div class="row">
                                    <div class="col-2 mt-2 form-group">
                                        <label>Course Type</label>
                                    </div>
                                    <div class="col-4 form-group form-inline">
                                        <select name="cboCourseType" id="cboCourseType" class="form-control"
                                            style="width:12vw;">
                                            <option value="1" selected="">Self Paced</option>
                                            <option value="2">Public Sessions</option>
                                            <option value="3">Private Sessions</option>
                                        </select>
                                        &nbsp;<button class="btn btn-primary" style="width:5.75vw;" type="button"
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
                                            <select name="trainer0" id="trainer0" size="1" style="width:18vw;" class="form-control">
                                                <option value="0"></option>
                                            </select>
                                        </div>
                                        <div
                                            style="float:left; padding-left:11vw;width:6vw;padding-top:10px;padding-bottom:10px;">
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
                                                    <select name="assessor0" id="assessor0" size="1"
                                                        style="width:12vw;" class="form-control">
                                                        <option value="0"></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="float:left; padding-left:80px;width:600px;padding-top:10px;padding-bottom:10px;">
                                            <input type="hidden" id="num_assessors" name="num_assessors"
                                                value="1">
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
                                        <input name="coursequota34643" class="form-control" id="coursequota34643"
                                            type="text" value="1000" style="width:18vw;" overflow:auto;="">
                                    </div>
                                    <div class="col-2 mt-2 form-group">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-4 form-group form-inline">
                                        <select style="width:12vw;" name="status34643" class="form-control"
                                            id="status34643" size="1">
                                            <option value="Open" selected="">Open</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row"><!--//WWB-1184-->
                                    <div class="col-2 mt-1 form-group">
                                        <label>Course cost (per enrolment)</label>
                                    </div>
                                    <div class="col-4 form-group">
                                        <input name="coursecost34643" class="form-control" id="coursecost34643"
                                            type="text" value="0"
                                            style="width:18vw; overflow:auto; vertical-align:middle;">
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
                                <div class="row">
                                    <div class="col-2 mt-2 form-group">
                                        <label>City</label>
                                    </div>
                                    <div class="col-4 form-group form-inline">
                                        <select name="city134643" id="city134643" class="form-control"
                                            style="width:18vw;">
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
                                <div class="row">
                                    <div class="col-2 mt-2 form-group">
                                        <label>Delivery mode identifier</label>
                                    </div>
                                    <div class="col-10 form-group form-inline">
                                        <input type="hidden" name="old_modeId34643" id="old_modeId34643"
                                            value="YNN">
                                        <input type="hidden" name="old_preModeId34643" id="old_preModeId34643"
                                            value="I">
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
                                <div class="row">
                                    <div class="col-2 mt-2 form-group form-inline">
                                        <label>Predominant delivery mode</label>
                                    </div>
                                    <div class="col-10 form-group form-inline">
                                        <select name="preModeId34643" id="preModeId34643" style="width:18vw;"
                                            class="form-control">
                                            <option value="E">External delivery</option>
                                            <option value="I" selected="">Internal delivery</option>
                                            <option value="W">Workplace-based delivery</option>
                                            <option value="N">Not applicable-RPL/credit transfer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group text-center">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="button" onclick="">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-syrvey-setting" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                        </div>
                        <div class="tab-pane fade" id="nav-opportunities" role="tabpanel"
                            aria-labelledby="nav-contact-tab">
                            <div id="ui-tabs-4" class="ui-tabs-panel ui-widget-content ui-corner-bottom"
                                aria-live="polite" aria-labelledby="ui-id-16" role="tabpanel" aria-expanded="true"
                                aria-hidden="false" style="display: block;">
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
                                        <button class="close btn "
                                            style="font-size: 20px;position: absolute;right: 0;top: 0;"><span
                                                style="font-size: 50px;">&times;</span></button>
                                        <h5>Send SMS</h5>
                                        <div style="padding:0px 0px 10px 20px;"><b>Note: </b>Sending one SMS message will
                                            cost you $0.09 (AUD, GST Excl).
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
                </div>

            </div>
        </div>
    </div>
    {{-- Modal Edit End --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[name=course_type]').on('change', function() {
                $("#course_names").empty();
                $('#connect_public').empty();
                var method = $(this).val();
                if ($(this).val() == 1) {
                    var type = "Self Paced";
                } else if ($(this).val() == 2) {
                    var type = "Public Sessions";
                } else {
                    var type = "Private Sessions";
                }
                $("#course_names").append($("<option>Selected Courses</option>"));
                $.ajax({
                    url: "{{ route('api.course.sessions.list') }}",
                    type: 'GET',
                    data: {
                        scheduleId: type
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        $.each(response.courses, function(index, option) {
                            // Create new option element
                            var newOption = $("<option></option>").val(option.id).text(
                                option.name);
                            // Append the new option to the select box
                            $("#course_names").append(newOption);
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
                   
                if (method == 2 || method == 3) {
                    console.log(2)
                    var html = "";
                    html += `<div class="form-group form-inline mb-4" id="choice">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="level1" id="session1" value="1" checked="" onclick="sessionAdd(1);">
                                <label class="form-check-label" for="inlineRadio1">Add single session</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="level1" id="session2" value="2" onclick="sessionAdd(2);">
                                <label class="form-check-label" for="inlineRadio2">Add multiple sessions</label>
                            </div>
                        </div>`;
                    html += `<div class="form-group form-inline mb-4" id="level2" style="display: none;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level2" id="numberSessions" value="1" checked="" onclick="toggle(1);">
                                    <label class="form-check-label" for="inlineRadio1">User start date and number of sessions</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="level2" id="startEndDate" value="2" onclick="toggle(2);">
                                    <label class="form-check-label" for="inlineRadio2">Use start and end dates</label>
                                </div>
                            </div>`;
                        html += `<div class="form-inline mb-4" style="font-weight: bold; display: flex;" id="single">
                            <label>Frequency:</label>
                            <select name="courseFre" class="form-control mx-2" id="courseFre" fdprocessedid="oa5sd6">
                                <option value="Daily">Daily</option>
                                <option value="Weekly">Weekly</option><option value="Fortnightly">Fortnightly</option>
                                <option value="Monthly">Monthly</option>
                            </select>
                            <button class="btn btn-primary" type="button" style="cursor:pointer;" onclick="addSession();" fdprocessedid="898nt">Add Session</button>
                        </div>`;
                        html += `<div class="mb-4 row" style="font-weight: bold; display: none;" id="multi">
                            <div class="col-4">
                                <label>Start Date:</label>
                                <input type="date" class="form-control my-1  wwb-datepicker" id="mDate">
                                <label id="lSessions" style="display: inline-block;">Number of Sessions:</label>
                                <input type="number" class="form-control my-1" id="mSessions" style="display: block;">
                                <label style="display: none;" id="lEndDate">End Date:</label>
                                <input type="text" class="form-control my-1 wwb-datepicker" id="mEndDate" style="display: none;">
                                <label>Session Frequency:</label>
                                <select id="mFrequency" class="form-control my-1">
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Weekly</option><option value="Fortnightly">Fortnightly</option>
                                    <option value="Monthly">Monthly</option>
                                </select>
                                <label>Session Length:</label>
                                <select id="mLength" class="form-control my-1">
                                    <option value="1">1 Day</option>
                                    <option value="2">2 Days</option>
                                    <option value="3">3 Days</option>
                                    <option value="4">4 Days</option>
                                    <option value="5">5 Days</option>
                                </select>
                                <div class="form-group form-inline mb-4">
                                    <input type="checkbox" class="mr-2" id="weekends" onclick="incWeekends();">
                                    <label>Include Weekends</label>
                                </div>
                                <button class="btn btn-primary mt-1" type="button" onclick="addSessions();">Add Sessions</button>
                            </div>
                            <div class="col-4">
                                <label>Trainer:</label>
                                <select id="mTrainer" class="form-control my-1">
                                </select> 
                                <label>Location:</label>
                                <select id="mLocation" class="form-control my-1" onchange="reloadRoom(this.value, 0);">
                                </select> 
                                <label>Room:</label>
                                <select id="mRoom" class="form-control my-1">
                                </select>
                                <div class="row"> 
                                    <div class="col">
                                        <label>Start Time:</label>
                                        <div style="float:left; width:150px">
                                            <select id="mStartHour" style="width:45px;padding:0 !important;display:inline-block;" class="form-control">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
											</select>
                                            <select id="mStartMinute" style="width:45px;padding:0 !important;display:inline-block;" class="form-control">
                    <option value="00">00</option>
                    <option value="05">05</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                                                </select> 
											<select name="mstartampm" id="mstartampm" style="width:45px;padding:0 !important;display:inline-block;" class="form-control">
														<option value="am">am</option>
														<option value="pm">pm</option>
												</select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>End Time:</label>
                                        <div style="float:left; width:150px">
                                            <select id="mEndHour" style="width:45px;padding:0 !important;display:inline-block;" class="form-control">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                
                                                </select>
                                            <select id="mEndMinute" style="width:45px;padding:0 !important;display:inline-block;" class="form-control">
                                                
                    <option value="00">00</option>
                    <option value="05">05</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                    
                                                </select>
											<select name="mendampm" id="mendampm" style="width:45px;padding:0 !important;display:inline-block;" class="form-control">
														<option value="am">am</option>
														<option value="pm">pm</option>
												</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<div class="col-4">
                                <label>Assessor:</label>
                                <select id="mAssessor" class="form-control my-1">
                                <option value="921">kuldip domadiya</option><option value="923">rahul patyel</option><option value="899">trainer1 training</option>
                                </select> 
							</div>
                        </div>`;
                        html += `<div id="table_sessions" style="display: block">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Session Name</th>
                                    <th scope="col">Trainer</th>
                                    <th scope="col">Assessor</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">End Time</th>
                                  </tr>
                                </thead>
                                <tbody id="course_table_sessions">
                                  <tr>
                                    <th scope="row"><input type="text" class="form-control" name="sessions[0]['moduleName']" id="moduleName0" value="" style="width:100px;height: 35px;" ></th>
                                    <td><select class="form-control trainers_sessions_multiple" name="sessions[0]['trainer']" id="trainer0" style="width:150px">
                               <option value="">Select Trainer</option>
                                </select></td>
                                    <td><select class="form-control assessor_sessions_multiple" name="sessions[0]['assessor']" id="assessor0" style="width:150px">
                                          <option value="">Select Assessor</option>
                                </select></td>
                                    <td><select class="form-control" name="sessions[0]['location']" id="location0" style="width:120px;" onchange="reloadRoom(this.value, 0);">
                                        <option value="">Select Location</option></select></td>
                                  <td><select class="form-control" name="sessions[0]['room']" id="room0" style="width:130px;" fdprocessedid="j60kt1">
                                    <option value="">Select Rooms</option>
                                    </select></td>
                                  <td><input class="form-control" type="date" name="sessions[0]['startDate']" id="startDate0" style="width:110px;height: 35px;"></td> 
                                  <td><div style="float:left; width:150px">
                                    <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[0]['starthour']" id="starthour0">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                                    </select> <span>:</span> 
                                    <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[0]['startminute']" id="startminute0">
                    <option value="00">00</option>
                    <option value="05">05</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                
                                    </select>
                                    <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[0]['startampm']" id="startampm0" fdprocessedid="ck8d4">
                                        
                        <option value="am">am</option>
                        <option value="pm">pm</option>
                
                                    </select>
                                </div></td> 
                                  <td><input class="form-control wwb-datepicker hasDatepicker" type="date" name="sessions[0]['endDate']" id="endDate0" style="width:110px;height: 35px;" fdprocessedid="efjro"></td> 
                                  <td><div style="float:left; width:150px">
                                    <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[0]['endhour']" id="endhour0" fdprocessedid="f5fm8a">
                                        
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                
                                    </select> <span>:</span> 
                                    <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[0]['endminute']" id="endminute0" fdprocessedid="3kqlu">
                                    
                    <option value="00">00</option>
                    <option value="05">05</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="35">35</option>
                    <option value="40">40</option>
                    <option value="45">45</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                                    </select>
                                    <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[0]['endampm']" id="endampm0">
                        <option value="am">am</option>
                        <option value="pm">pm</option>
                
                                    </select>
                                </div></td> 
                                <td></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>`;
                    $('#connect_public').append(html);
                }
            });
            $('#course_names').on('change', function() {
               var course_type = $('[name=course_type]:checked').val();
                var course_id = $('#course_names').val();
                $("#trainers_info").empty();
                $("#assessors_info").empty();
                //course sessions
                if(course_type == 2 || course_type == 3){
                    $.ajax({
                    url: "{{ route('api.course.get') }}",
                    type: 'GET',
                    data: {
                        course_id: course_id
                    }, // Pass the scheduleId as a query parameter
                    success: function(response){
                        console.log(response.courses.public_sessions)
                       if(course_type == 2 || course_type == 3){
                                if(response.courses.public_sessions == "Single Session" && response.courses.public_sessions != null){
                                    $('#connect_public #choice').css('display','none');
                                    $('#connect_public #single').css('display','none');   
                                    $('#connect_public #level2').css('display','none');   
                                }
                                if(response.courses.public_sessions == "Multiple Sessions" && response.courses.public_sessions != null){
                                    $('#connect_public #choice').css('display','block');
                                    $('#connect_public #single').css('display','block');   
                                    // $('#connect_public #level2').css('display','block');   
                                }
                       }
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
                }
               
                //Trainer Get
                $.ajax({
                    url: "{{ route('api.course.trainer.get') }}",
                    type: 'GET',
                    data: {
                        course_id: course_id
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        console.log(response)
                        $.each(response.courses, function(index, option) {
                            // Create new option element
                            var newOption = $("<option></option>").val(option.id).text(
                                option.first_name + " " + option.last_name);
                            $("#trainers_info").append(newOption);
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
                //Assessors Start Get
                $.ajax({
                    url: "{{ route('api.course.assessor.get') }}",
                    type: 'GET',
                    data: {
                        course_id: course_id
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        console.log(response)
                        $("#assessors_info").append($("<option>Selected Assessor</option>"));
                        $.each(response.courses, function(index, option) {
                            // Create new option element
                            var newOption = $("<option></option>").val(option.id).text(
                                option.first_name + " " + option.last_name);
                            // Append the new option to the select box
                            $("#assessors_info").append(newOption);
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });
                //Assessors End Get
            });
        });

        function addSessions(){
            var html = `<tr id="row${number}">
        <th scope="row"><input type="text" class="form-control" name="sessions[${number}]['moduleName']" id="moduleName${number}" value="" style="width:100px;height: 35px;"></th>
        <td><select class="form-control trainers_sessions_multiple" name="sessions[${number}]['trainer']" id="trainer${number}" style="width:150px">
            <option value="">Select Trainer</option>
            </select></td>
        <td><select class="form-control assessor_sessions_multiple" name="sessions[${number}]['assessor']" id="assessor${number}" style="width:150px" fdprocessedid="po86js">
            <option value="">Select Assessor</option>
            </select></td>
        <td><select class="form-control" name="sessions[${number}]['location']" id="location${number}" style="width:120px;" onchange="reloadRoom(this.value, ${number});" >
             <option value="">Select Location</option>
             </select></td>
        <td><select class="form-control" name="sessions[${number}]['room']" id="room${number}" style="width:130px;">
               <option value="">Select Room</option>
            </select></td>
        <td><input class="form-control wwb-datepicker hasDatepicker" type="date" name="sessions[${number}]['startDate']" id="startDate${number}" style="width:110px;height: 35px;" ></td> 
        <td><div style="float:left; width:150px">
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['starthour']" id="starthour${number}">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select> <span>:</span> 
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['startminute']" id="startminute${number}">
                <option value="00">00</option>
                <option value="05">05</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
                <option value="55">55</option>
            </select>
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['startampm']" id="startampm${number}">
                <option value="am">am</option>
                <option value="pm">pm</option>
            </select>
        </div></td> 
        <td><input class="form-control wwb-datepicker hasDatepicker" type="date" name="sessions[${number}]['endDate']" id="endDate${number}" style="width:110px;height: 35px;"></td> 
        <td><div style="float:left; width:150px">
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['endhour']" id="endhour${number}">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select> <span>:</span> 
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['endminute']" id="endminute${number}">
                <option value="00">00</option>
                <option value="05">05</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
                <option value="55">55</option>
            </select>
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['endampm']" id="endampm${number}">
                <option value="am">am</option>
                <option value="pm">pm</option>
            </select>
        </div></td> 
                <td><button type="button" class="btn btn-danger" onclick="deleteRow(${number})">Delete</button></td>

    </tr>`;
    number++; // Increment number after appending the new session
    $('#course_table_sessions').append(html);
    $('.trainers_sessions_multiple').empty();
    // $('.assessor_sessions_multiple').empty();
                //Assessors Start Get
                $.ajax({
                    url: "{{ route('api.course.trainer.list') }}",
                    type: 'GET',
                    data: {
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        console.log(response.trainer)
                        $(".trainers_sessions_multiple").append($("<option>Selected Trainer</option>"));
                        $.each(response.trainer, function(index, option) {
                            // Create new option element
                            var newOption = $("<option></option>").val(option.id).text(
                                option.first_name + " " + option.last_name);
                            // Append the new option to the select box
                            $(".trainers_sessions_multiple").append(newOption);
                        });
                        $.each(response.trainer, function(index, option) {
                            // Create new option element
                            var newOption = $("<option></option>").val(option.id).text(
                                option.first_name + " " + option.last_name);
                            // Append the new option to the select box
                            $(".assessor_sessions_multiple").append(newOption);
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });

        }

        function sessionAdd(id){
        
           if(id == 2){
            $('#level2').css('display', 'flex');
            $("#single").css('display','none');
            $("#table_sessions").css('display','blovk');
            $("#multi").css('display','flex');
           }else{
            $('#level2').css('display', 'none');
            $("#single").css('display','flex');
            $("#table_sessions").css('display','block');
            $("#multi").css('display','none');
           }
        }
        var number = 1; // Declare number outside the function
    function addSession() {
      var number_section =  $('#mSessions').val();
      console.log(number_section);
    var html = `<tr id="row${number}">
        <th scope="row"><input type="text" class="form-control" name="sessions[${number}]['moduleName']" id="moduleName${number}" value="" style="width:100px;height: 35px;"></th>
        <td><select class="form-control trainers_sessions_multiple" name="sessions[${number}]['trainer']" id="trainer${number}" style="width:150px">
            <option value="">Select Trainer</option>
            </select></td>
        <td><select class="form-control assessor_sessions_multiple" name="sessions[${number}]['assessor']" id="assessor${number}" style="width:150px" fdprocessedid="po86js">
            <option value="">Select Assessor</option>
            </select></td>
        <td><select class="form-control" name="sessions[${number}]['location']" id="location${number}" style="width:120px;" onchange="reloadRoom(this.value, ${number});" >
             <option value="">Select Location</option>
             </select></td>
        <td><select class="form-control" name="sessions[${number}]['room']" id="room${number}" style="width:130px;">
               <option value="">Select Room</option>
            </select></td>
        <td><input class="form-control wwb-datepicker hasDatepicker" type="date" name="sessions[${number}]['startDate']" id="startDate${number}" style="width:110px;height: 35px;" ></td> 
        <td><div style="float:left; width:150px">
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['starthour']" id="starthour${number}">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select> <span>:</span> 
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['startminute']" id="startminute${number}">
                <option value="00">00</option>
                <option value="05">05</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
                <option value="55">55</option>
            </select>
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['startampm']" id="startampm${number}">
                <option value="am">am</option>
                <option value="pm">pm</option>
            </select>
        </div></td> 
        <td><input class="form-control wwb-datepicker hasDatepicker" type="date" name="sessions[${number}]['endDate']" id="endDate${number}" style="width:110px;height: 35px;"></td> 
        <td><div style="float:left; width:150px">
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['endhour']" id="endhour${number}">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select> <span>:</span> 
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['endminute']" id="endminute${number}">
                <option value="00">00</option>
                <option value="05">05</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
                <option value="55">55</option>
            </select>
            <select style="width:45px;padding:0 !important;display:inline-block;" class="form-control" name="sessions[${number}]['endampm']" id="endampm${number}">
                <option value="am">am</option>
                <option value="pm">pm</option>
            </select>
        </div></td> 
                <td><button type="button" class="btn btn-danger" onclick="deleteRow(${number})">Delete</button></td>

    </tr>`;
    number++; // Increment number after appending the new session
    $('#course_table_sessions').append(html);
    $('.trainers_sessions_multiple').empty();
    // $('.assessor_sessions_multiple').empty();
                //Assessors Start Get
                $.ajax({
                    url: "{{ route('api.course.trainer.list') }}",
                    type: 'GET',
                    data: {
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        console.log(response.trainer)
                        $(".trainers_sessions_multiple").append($("<option>Selected Trainer</option>"));
                        $.each(response.trainer, function(index, option) {
                            // Create new option element
                            var newOption = $("<option></option>").val(option.id).text(
                                option.first_name + " " + option.last_name);
                            // Append the new option to the select box
                            $(".trainers_sessions_multiple").append(newOption);
                        });
                        $.each(response.trainer, function(index, option) {
                            // Create new option element
                            var newOption = $("<option></option>").val(option.id).text(
                                option.first_name + " " + option.last_name);
                            // Append the new option to the select box
                            $(".assessor_sessions_multiple").append(newOption);
                        });
                    },
                    error: function(xhr, status, error) {
                        // Handle errors here
                        console.error(error);
                    }
                });

}
function deleteRow(rowNumber) {
    $('#row' + rowNumber).remove(); // Remove the row with the given ID
}
    </script>
    <script>
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
                });
        })();
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
    <style>
        .modal-dialog-scrollable .modal-content {
            max-height: 76%;
            overflow: hidden;
        }

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

        /* Modal Styling */
        #sms_opportunities {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
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
            // course end filter
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

                        if (response.success == true) { // Check for the correct key and value

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
                // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
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
                            // location.reload();
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
         $(document).ready(function() {
            $('.course-filter').change(function() {
            var courseCode = $(this).val();
            var deliveryMethod = $('.delivery_method_value').val(); // Get the current value of the delivery method dropdown
            var url = new URL(window.location.href);
            url.searchParams.set('courseCode', courseCode);
            console.log(deliveryMethod != "",deliveryMethod)
            if(deliveryMethod != ''){
                url.searchParams.set('delivery_method', deliveryMethod);
            }
            // window.location.href = url;
        });

        $('.delivery_method_value').change(function() {
            var deliveryMethod = $(this).val();
            var courseCode = $('.course-filter').val(); // Get the current value of the course filter dropdown
            var url = new URL(window.location.href);
            url.searchParams.set('delivery_method', deliveryMethod);
            url.searchParams.set('courseCode', courseCode);
            window.location.href = url;
        });
        });
    </script>
@stop
