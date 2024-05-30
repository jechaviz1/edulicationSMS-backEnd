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
                <h4 class="card-title">Enrolment Search</h4>

            </div>
            <div class="row p-3">
                <div class="col-sm-12 d-flex align-iems-center">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Course Schedule Date Range
                        </label>
                    </div>
                    <div class="form-check ms-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Learner Activity Date Range
                        </label>
                    </div>

                    <div class="form-check ms-2">
                        <input type="date" class="form-control" id="from" placeholder="">
                    </div>
                    <div class="form-check ms-2">
                        <input type="date" class="form-control" id="from" placeholder="">
                    </div>
                    <div class="mt-2">

                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-primary ms-2">Search</button>
                        <button type="button" class="btn btn-primary ms-2">Clear</button>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filter">
                            Filter
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#select-columns">
                            Select Columns
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="filter" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Applied Filters </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="select-columns" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Select Columns</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <tbody>
                                                <tr style="height:10px;"></tr>
                                                <tr style="height:30px;">
                                                    <td align="center">
                                                        <button class="btn btn-primary" style="margin:0px 2px;"
                                                            type="button">Save</button>
                                                        <button class="btn btn-primary" style="margin:0px 2px;"
                                                            type="button">Cancel</button>
                                                    </td>
                                                </tr>
                                                <tr style="height:10px;"></tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="agent"
                                                                id="agent"><label
                                                                for="agent">&nbsp;&nbsp;Agent</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="courseCompletionDate" id="courseCompletionDate"
                                                                checked=""><label
                                                                for="courseCompletionDate">&nbsp;&nbsp;Anticipated Course
                                                                Completion</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="buildingName" id="buildingName"><label
                                                                for="buildingName">&nbsp;&nbsp;Building / Property
                                                                Name</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="buildingName_postal" id="buildingName_postal"
                                                                checked=""><label
                                                                for="buildingName_postal">&nbsp;&nbsp;Building / Property
                                                                Name - Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="businessNumber" id="businessNumber"><label
                                                                for="businessNumber">&nbsp;&nbsp;Business
                                                                Phone</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="certIssueDate" id="certIssueDate"
                                                                checked=""><label
                                                                for="certIssueDate">&nbsp;&nbsp;Certificate Issue
                                                                Date</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="certIssued"
                                                                id="certIssued" checked=""><label
                                                                for="certIssued">&nbsp;&nbsp;Certificate
                                                                Issued</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="certificateName" id="certificateName"><label
                                                                for="certificateName">&nbsp;&nbsp;Certificate
                                                                Name</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="certNum"
                                                                id="certNum" checked=""><label
                                                                for="certNum">&nbsp;&nbsp;Certificate
                                                                Number</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="CoE"
                                                                id="CoE"><label for="CoE">&nbsp;&nbsp;CoE
                                                            </label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="clientCompany" id="clientCompany"><label
                                                                for="clientCompany">&nbsp;&nbsp;Company</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="priorEdAchievement" id="priorEdAchievement"><label
                                                                for="priorEdAchievement">&nbsp;&nbsp;Completed any of the
                                                                following qualifications?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="contactNumber" id="contactNumber"><label
                                                                for="contactNumber">&nbsp;&nbsp;Contact
                                                                Number</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="country"
                                                                id="country"><label
                                                                for="country">&nbsp;&nbsp;Country</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="country_postal" id="country_postal"><label
                                                                for="country_postal">&nbsp;&nbsp;Country -
                                                                Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="birthCountry" id="birthCountry"><label
                                                                for="birthCountry">&nbsp;&nbsp;Country of
                                                                Birth?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="courseAttendance" id="courseAttendance"><label
                                                                for="courseAttendance">&nbsp;&nbsp;Course
                                                                Attendance</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="startDate"
                                                                id="startDate"><label for="startDate">&nbsp;&nbsp;Course
                                                                commencement date</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="courseProgress" id="courseProgress"><label
                                                                for="courseProgress">&nbsp;&nbsp;Course
                                                                Progress</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="dob"
                                                                id="dob"><label for="dob">&nbsp;&nbsp;Date of
                                                                Birth</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="isMainEnglish" id="isMainEnglish"><label
                                                                for="isMainEnglish">&nbsp;&nbsp;Do you mainly speak English
                                                                at home?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="studentEmail" id="studentEmail"><label
                                                                for="studentEmail">&nbsp;&nbsp;Email 1</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="studentEmail2" id="studentEmail2"><label
                                                                for="studentEmail2">&nbsp;&nbsp;Email 2</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="studentEmail3" id="studentEmail3"><label
                                                                for="studentEmail3">&nbsp;&nbsp;Email 3</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="labourStatus" id="labourStatus"><label
                                                                for="labourStatus">&nbsp;&nbsp;Employment</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="entryDate"
                                                                id="entryDate" checked=""><label
                                                                for="entryDate">&nbsp;&nbsp;End Date</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="enrolmentId" id="enrolmentId"><label
                                                                for="enrolmentId">&nbsp;&nbsp;Enrolment ID</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="facsimileNumber" id="facsimileNumber"><label
                                                                for="facsimileNumber">&nbsp;&nbsp;Fax</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="firstName"
                                                                id="firstName"><label for="firstName">&nbsp;&nbsp;First
                                                                Name</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="unitDetails" id="unitDetails"><label
                                                                for="unitDetails">&nbsp;&nbsp;Flat / Unit
                                                                Details</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="unitDetails_postal" id="unitDetails_postal"><label
                                                                for="unitDetails_postal">&nbsp;&nbsp;Flat / Unit Details -
                                                                Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="gender"
                                                                id="gender"><label
                                                                for="gender">&nbsp;&nbsp;Gender</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="isDisabled"
                                                                id="isDisabled"><label for="isDisabled">&nbsp;&nbsp;Has a
                                                                disability, impairment or long-term
                                                                condition?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="highestLevelCompleted"
                                                                id="highestLevelCompleted"><label
                                                                for="highestLevelCompleted">&nbsp;&nbsp;Highest school
                                                                level completed?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="homeNumber"
                                                                id="homeNumber"><label for="homeNumber">&nbsp;&nbsp;Home
                                                                Phone</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="indigenousStatus" id="indigenousStatus"><label
                                                                for="indigenousStatus">&nbsp;&nbsp;Indigenous
                                                                Status</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="isContact"
                                                                id="isContact"><label for="isContact">&nbsp;&nbsp;Is
                                                                Contact?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="isLearner"
                                                                id="isLearner"><label for="isLearner">&nbsp;&nbsp;Is
                                                                Learner?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="isReported"
                                                                id="isReported"><label for="isReported">&nbsp;&nbsp;Is
                                                                Reported</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="lastName"
                                                                id="lastName"><label for="lastName">&nbsp;&nbsp;Last
                                                                Name</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="cityName"
                                                                id="cityName" checked=""><label
                                                                for="cityName">&nbsp;&nbsp;Location</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="middleName"
                                                                id="middleName"><label for="middleName">&nbsp;&nbsp;Middle
                                                                Name</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="RTOStudentId" id="RTOStudentId"><label
                                                                for="RTOStudentId">&nbsp;&nbsp;National ID</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="isInternational" id="isInternational"><label
                                                                for="isInternational">&nbsp;&nbsp;Overseas
                                                                Client?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="paymentStatus" id="paymentStatus"><label
                                                                for="paymentStatus">&nbsp;&nbsp;Payment
                                                                status</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="summary"
                                                                id="summary"><label for="summary">&nbsp;&nbsp;Positive
                                                                Outcome Summary</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="postCode"
                                                                id="postCode"><label for="postCode">&nbsp;&nbsp;Post
                                                                Code</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="postalCode_postal" id="postalCode_postal"><label
                                                                for="postalCode_postal">&nbsp;&nbsp;Post Code -
                                                                Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="deliveryBox_postal" id="deliveryBox_postal"><label
                                                                for="deliveryBox_postal">&nbsp;&nbsp;Postal Delivery Box -
                                                                Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="preferredName" id="preferredName"><label
                                                                for="preferredName">&nbsp;&nbsp;Preferred
                                                                Name</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="regionName"
                                                                id="regionName" checked=""><label
                                                                for="regionName">&nbsp;&nbsp;Region</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="student"
                                                                id="student"><label
                                                                for="student">&nbsp;&nbsp;Role</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="activityStartDate" id="activityStartDate"
                                                                checked=""><label
                                                                for="activityStartDate">&nbsp;&nbsp;Start
                                                                Date</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="state"
                                                                id="state"><label
                                                                for="state">&nbsp;&nbsp;State</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="state_postal" id="state_postal"><label
                                                                for="state_postal">&nbsp;&nbsp;State -
                                                                Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="stillAtSchool" id="stillAtSchool"><label
                                                                for="stillAtSchool">&nbsp;&nbsp;Still at
                                                                school?</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="streetName"
                                                                id="streetName"><label for="streetName">&nbsp;&nbsp;Street
                                                                Name</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="streetName_postal" id="streetName_postal"><label
                                                                for="streetName_postal">&nbsp;&nbsp;Street Name -
                                                                Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="streetNumber" id="streetNumber"><label
                                                                for="streetNumber">&nbsp;&nbsp;Street
                                                                Number</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="streetNumber_postal" id="streetNumber_postal"><label
                                                                for="streetNumber_postal">&nbsp;&nbsp;Street Number -
                                                                Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="studentPortal" id="studentPortal"
                                                                checked=""><label
                                                                for="studentPortal">&nbsp;&nbsp;Student
                                                                Portal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="suburb"
                                                                id="suburb"><label
                                                                for="suburb">&nbsp;&nbsp;Suburb</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="suburb_postal" id="suburb_postal"><label
                                                                for="suburb_postal">&nbsp;&nbsp;Suburb -
                                                                Postal</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="surveyStat"
                                                                id="surveyStat"><label for="surveyStat">&nbsp;&nbsp;Survey
                                                                contact status</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="title"
                                                                id="title"><label
                                                                for="title">&nbsp;&nbsp;Title</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="uniqueStudentIdentifier"
                                                                id="uniqueStudentIdentifier" checked=""><label
                                                                for="uniqueStudentIdentifier">&nbsp;&nbsp;USI</label></strong>
                                                    </td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox" name="vsn"
                                                                id="vsn"><label for="vsn">&nbsp;&nbsp;Victorian
                                                                Student Number</label></strong></td>
                                                </tr>
                                                <tr style="height:30px;">
                                                    <td style="width:600px"><strong><input align="middle"
                                                                class="selColsCheckBox" type="checkbox"
                                                                name="yearSchoolCompleted" id="yearSchoolCompleted"><label
                                                                for="yearSchoolCompleted">&nbsp;&nbsp;Year school level was
                                                                completed</label></strong></td>
                                                </tr>
                                                <tr style="height:10px;"></tr>
                                                <tr style="height:30px;">
                                                    <td align="center">
                                                        <button class="btn btn-primary" style="margin:0px 2px;"
                                                            type="button">Save</button>
                                                        <button class="btn btn-primary" style="margin:0px 2px;"
                                                            type="button" data-bs-dismiss="modal">Cancel</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-backdrop {
            display: none;
        }
    </style>
@stop