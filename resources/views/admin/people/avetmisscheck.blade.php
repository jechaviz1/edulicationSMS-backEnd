<!-- Extends template page-->
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-primary alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
    </button>
    <strong>Success!</strong> {{ $message }}
</div>
@endif
<div class="col-xl-12 events">
    <div class="card dz-card" id="accordion-four">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 d-flex align-items-center justify-content-start">
                    <div>
                        <h4 class="card-title">Events - AVETMISS Check</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- /tab-content -->
        <div class="tab-content " id="myTabContent-3">
            <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                <div class="card-body pt-0">
                    <div class="table-responsive"> 
                        <form action="">
                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Check Type</label>
                                <div class="col-sm-10">
                                  <select class="form-select" name="checkType" id="checkType">
                                    <option value="">Select a type</option>
                                    <option value="address">Address Checker</option>
                                    <option value="gender">Gender &amp; Title inconsistency</option>
                                    <option value="odate">Anticipated Completion Date inconsistent with Outcomes</option>
                                    <option value="nameissue">Names not starting with CAPS</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Report Year</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="year" id="year">
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
                                        <option value="2024">2024</option>
                                      </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" type="submit">Refresh</button>
                                </div>
                              </div>
                        </form>
                        <p>This tool will allow you to identify and fix any errors with genders and title inconsistencies. For example, a student recorded as female with a title of Mr would be flagged as an error. You can click the current gender/title populated and update the field immediately from this report.</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Unique Id</th>
                                    <th scope="col">Student Name	</th>
                                    <th scope="col">Course Code	</th>
                                    <th scope="col">Course Name	</th>
                                    <th scope="col">Course Completion Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                           
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
@stop