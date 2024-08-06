<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
<style>
    #search-list{
        padding: 10px;
        border: 1px solid #a1a1a1;
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
                <h4 class="card-title">Bulk Enrolment
                </h4>
            </div>
            <div class="row p-3">
                <div class="col-sm-7">
                    <h6>Details of the scheduled course</h6>
                    <div class="row mt-3">
                        <div class="col-2">Course:</div>
                        <div class="col-2" style="float:left;">
                            <input type="hidden" name="studentList" id="studentList" value="">
                            <select style="padding: 9px 4px;height:35px;width:100%" name="courseList" id="courseList"
                                class="form-control schedule" size="1">
                                <option value="">No Set</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1" style="float:left;">
                        </div>
                        <div class="col-1">City:</div>
                        <div class="col-2" style="float:left;">
                            <select name="cityList" id="cityList" class="form-control schedule" size="1"
                                style="height:35px;width:100%; padding: 9px 4px; margin-top:0px;">
                                <option value="">Not Set</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1" style="float:left;">
                            <button type="button" class="btn btn-info" id="resetButton">Reset</button>
                        </div>
                        <div class="col-3" id="referralsource">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class=""></div>
                        <div class="col-2">Schedule:</div>
                        <div style="float:left" class="col-10">
                            <select name="scheduleList" id="scheduleList" size="6" style="width:100%;">
                            </select>
                        </div>
                    </div>
                    <div id="enrolmentFormDiv" class="mt-3">
                        <div class="row">
                            <div class="col-2">Enrolment Form: </div>
                            <div style="float:left;" class="col-3">
                                <input type="file" name="enrolForm" style="width:100%;" id="enrolForm">
                            </div>
                            <div class="col-1">Received Date:</div>

                            <div class="col-2"><input type="date" style="" name="receivedDate" id="receivedDate"
                                    readonly="readonly" class="form-control"></div>

                            <div class="col-1">Received By:</div>
                            <div class="col-3"><select class="form-control" style="width:100%;" name="receivedBy"
                                    id="receivedBy" fdprocessedid="zspwp8">
                                    <option value="Email">Email</option>
                                    <option value="Fax">Fax</option>
                                    <option value="Post">Post</option>
                                    <option value="Verbal">Verbal</option>
                                    <option value="Other">Other</option>
                                </select></div>

                        </div>
                        <div class="row">
                            <div class="col-12">&nbsp;</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Payment Status:</label>
                        <div class="col-4">
                            <select class="form-control" name="paymentStatus" id="paymentStatus" size="1"
                                fdprocessedid="5sihsi">
                                <option value="PAID">PAID</option>
                                <option value="NOT PAID" selected="">NOT PAID</option v>
                                <option value="PAYMENT PLAN">PAYMENT PLAN</option>
                                <option value="DEPOSIT PAID">DEPOSIT PAID</option>
                                <option value="COMPLIMENTARY">COMPLIMENTARY</option>
                                <option value="EXEMPT">EXEMPT</option>
                                <option value="PURCHASE ORDER">PURCHASE ORDER</option>
                            </select>
                        </div>
                        <label for="reportingState" class="col-1 form-label">Reporting State: </label>
                        <div class="col-4">
                            <select style="width:100%" name="reportingState" id="reportingState" class="form-control">
                                <option value="8">Australian Capital Territory</option>
                                <option value="12">Fee for Service</option>
                                <option value="1">New South Wales</option>
                                <option value="7">Northern Territory</option>
                                <option value="10">Other (Overseas)</option>
                                <option value="9">Other Australian Territories or Dependencies</option>
                                <option value="3">Queensland</option>
                                <option value="4">South Australia</option>
                                <option value="6">Tasmania</option>
                                <option value="2">Victoria</option>
                                <option value="5">Western Australia</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" style="float:left">Is Trainee: </div>
                        <div class="col-2" style="float:left">
                            <input style="padding: 9px 4px; margin-top: 10px; margin-left: 10px;" type="checkbox"
                                name="isTrainee" id="isTrainee">
                        </div>

                        <div id="reportEnrolment" class="col-5"></div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <h6>Search or add People to enrol</h6>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="searchValueNameBulk" id="searchValueNameBulk" valign="middle"
                                placeholder="Search people" class="form-control form-control-sm ui-autocomplete-input"
                                style="height:35px" autocomplete="off">
                            <div class="suggesstion-box"></div>
                            <input type="hidden" name="searchValueNameBulk" id="value_search" value="">
                            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible">2 results are
                                available, use up and down arrow keys to
                                navigate.</span>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3">
                            <button type="button" class="btn btn-primary ms-3" data-bs-toggle="modal"
                                data-bs-target="#add_student">
                                New Student
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table id="dtStudents" class="table" cellpadding="0" width="100%"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Start-->
    <div class="modal fade" id="add_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" action="{{ route('people.store') }}" id="new_student"
                        method="POST" novalidate>
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                placeholder="Full Name" required>
                            <div class="invalid-feedback">
                                Please select a valid Full Name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                placeholder="Last Name" required>
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
                            <input type="text" class="form-control" name="contactInfo" id="contact_info"
                                placeholder="Contact Info" required>
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
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
    <script>
        function resetFilter() {
            document.getElementById("courseList").disabled = false;
            document.getElementById("courseList").selectedIndex = 0;
            document.getElementById("cityList").selectedIndex = 0;
            jQuery("#scheduleList").html("");
        }
    </script>
@section('customjs')
    <script>
        $(document).ready(function() {
            $('#resetButton').click(function() {
                console.log("hello");
                $('#courseList').prop('selectedIndex', 0);
                $('#cityList').prop('selectedIndex', 0);
                $('#scheduleList').empty();
            });


            $(".schedule").change(function() {
                var course_id = $('#courseList').val();
                var city_id = $('#cityList').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('bulk.enrolment.serch') }}",
                    data: {
                        _token: $('input[name=_token]').val(),
                        course_id: course_id,
                        city_id: city_id
                    },
                    success: function(response) {
                        $('#scheduleList').empty(); // Clear existing options
                        console.log(response.schedule)
                        if (response.schedule && response.schedule.length > 0) {
                            $.each(response.schedule, function(index, schedule) {
                                $('#scheduleList').append(
                                    $('<option/>', {
                                        value: schedule.id,
                                        text: schedule.city.name
                                    })
                                );
                            });
                        }
                    }
                });

            });
            $('#new_student').submit(function(event) {
                event.preventDefault();
                const newProfile = {
                    name: $('#name').val(),
                    age: $('#age').val(),
                    profession: $('#profession').val(),
                    bio: $('#bio').val()
                };

                $.ajax({
                    url: "{{ route('api.people.store') }}", // Replace with your API endpoint
                    method: 'POST',
                    contentType: 'application/json',
                    "_token": "{{ csrf_token() }}",
                    data: JSON.stringify(newProfile),
                    success: function(data) {
                        $('#profileForm')[0].reset(); // Reset the form
                        fetchProfiles(); // Refresh the profiles list
                    },
                    error: function(error) {
                        alert('An error occurred while submitting the form.');
                    }
                });
            });

                
            $("#searchValueNameBulk").keyup(function() {
                var searchTerm = $(this).val();
                console.log(searchTerm)
                $.ajax({
                    type: 'POST',
                    url: "{{ route('people.profile.student') }}",
                    data: {
                        _token: $('input[name=_token]').val(),
                        data: searchTerm
                    },
                    success: function(response) {
                        $('.suggesstion-box').empty(); // Clear existing options
                        console.log(response)
                        var html_data = "";
                         html_data = `<ul id="search-list">`;
                            $.each(response, function(index, schedule) {
                                html_data += `<li><a href="#" onclick="selectStudent('${schedule.id}','${schedule.first_name}', '${schedule.last_name}')">` + schedule.first_name + " " + schedule.last_name + `</a></li>`;
                            });
                            html_data +=`</ul>`;
                        $('.suggesstion-box').html(html_data);
                    }
                });

            });
           
        });
        function selectStudent(id,firstName, lastName) {
            $('#searchValueNameBulk').val(firstName + " " +lastName);
            $('#value_search').val(id);
            $(".suggesstion-box").empty();
        }
                
    </script>
@endsection
@stop
