<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
<style>
    .modal-backdrop{
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
                    {{-- <button type="button" class="btn btn-primary ms-2">Email all learners</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">SMS all learners</button>
                    <button type="button" class="btn btn-primary ms-2">Send Survey</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#certificate_manage">Manage Certificates</button>
                    <button type="button" class="btn btn-primary ms-2">Add Enrolments</button>
                    <button type="button" class="btn btn-primary ms-2">Enrol Units</button>
                    <button type="button" class="btn btn-primary ms-2">Update Outcomes</button>
                    <button type="button" class="btn btn-primary ms-2">Create Invoice</button> --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addenrolments">
                    Add Enrolments
                      </button>
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
            {{-- Add Enrolments  --}}
            <div class="modal fade" id="addenrolments" tabindex="-1" aria-labelledby="addenrolmentsLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addenrolmentsLabel">Course Enrolment for {{ $course->code}} - {{ $course->name }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" checked value="option1" onclick="document.getElementById('FindPerson').style.display = 'block',document.getElementById('AddPerson').style.display = 'none'">
                            <label class="form-check-label" for="inlineRadio1">Find Person</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" onclick="document.getElementById('AddPerson').style.display = 'block',document.getElementById('FindPerson').style.display = 'none'">
                            <label class="form-check-label" for="inlineRadio2">Add Person</label>
                          </div>
                                <div id="FindPerson" style="display: block;">
                                        <div class="row">
                                            <div class="col-auto">Find Person By</div>
                                            <div class="col-auto">
                                                <select name="searchBy" class="form-control mr-1" id="searchByThis" onchange="document.getElementById('searchValue').value='';">
                                                <option value="first_name">First Name</option>
                                                <option value="middle_name">Middle Name</option>
                                                <option value="last_name">Last Name</option>
                                                <option value="email">Email</option>
                                                <option value="contact_no">Mobile</option>
                                                <option value="postcode">Post Code</option>
                                            </select>
                                        </div>
                                            <div class="col-auto"><input type="text" name="searchValue" id="searchValueIs" class="input_text1 form-control"></div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-primary ml-1" onclick="loadStudentList();" fdprocessedid="680bi9">Go</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <label for="">Select Person</label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <select name="studentList" class="form-control" id="studentList" size="3" style="width:100%;" onchange="loadEnquiries(this.options[this.selectedIndex].value);"></select>
                                        </div>
                                </div>
                                <div id="AddPerson" style="display: none;">

                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              {{-- SMS All Learners End --}}
            {{-- SMS all Lerners  --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Send SMS</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('event.course.sendAllLearnersSMS')}}" method="post">
                            @csrf()
                            @method('POST')
                            <input type="hidden" name="course_id" value="{{$course_event->course_name}}">
                            <input type="hidden" name="event_id" value="{{$course_event->id}}">
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
            <div class="modal fade" id="certificate_manage" tabindex="-1" aria-labelledby="certificate_manageLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="certificate_manageLabel">Manage Certificates</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Issue Certificate</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Issue History</button>
                            </li>
                          </ul>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <h5>Issue Course Certificates</h5>
                                <p>The following students are not enrolled in any units:</p>
                                <p>Note: Student email will be used if Issuing via Email and sending to individuals. Please ensure a valid email address is entered before issuing.</p>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Student ID</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Is Paid</th>
                                        <th scope="col">Cert. Issued</th>
                                        <th scope="col">Student Email</th>
                                        <th scope="col"> <input type="checkbox" class="form-check-input" id="exampleCheck1"></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th></th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                
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
                            <i class="fa fa-trash fa-2x mr-2 text-danger" onclick="delete_session(&quot;34643&quot;, &quot;88204&quot;);" title="Delete"></i>
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
                                            <button class="btn btn-primary" style="margin-left: 30px;" type="submit">Add
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
                            id="displayCourseID" type="text" value="{{ $course_event->course_name  }}" disabled="">
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
            function loadStudentList (){
               var searchby = $('#searchByThis').val();
               var searchvalue = $('#searchValueIs').val();
               $('#studentList').empty();
                $.ajax({
                    url: "{{ route('api.people.find') }}",
                    type: 'GET',
                    data: {
                        'search_filled' : searchby,
                        'searchvalue' : searchvalue
                    }, // Pass the scheduleId as a query parameter
                    success: function(response) {
                        response.students.forEach(student => {
                            console.log(student)
                            $('#studentList').append(new Option(student.searchby, student.id));
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
