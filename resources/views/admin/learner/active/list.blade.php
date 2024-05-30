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
    <div class="container-fluid">
        <div class="row marg_10">
            <div class="col-sm-12 col-lg-12">
                <h5>Learner Records</h5>
                <!-- Check for AusKey setup -->
                <div id="Inside_middle">
                    <form method="post" action="" id="filter_form">
                        <div class="row">
                            <div class="col-2">
                                Activity Start Date From:</div>
                            <div class="col-2"><input class="filter_box form-control hasDatepicker" type="date"
                                    name="filter_dateFrom" id="filter_dateFrom" placeholder="Activity Start Date From"
                                    style="width: 198px;height:26px" value="2023-05-20" fdprocessedid="e4axnm"></div>
                            <div class="col-2">
                                Activity Start Date To:</div>
                            <div class="col-2"><input class="filter_box form-control hasDatepicker" type="date"
                                    name="filter_dateTo" id="filter_dateTo" placeholder="Activity Start Date To"
                                    style="width: 198px;height:26px" value="2024-05-20" fdprocessedid="8wxes"></div>
                        </div>
                        <div class="row">
                            <div class="col-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-2">Competent Date From:</div>
                            <div class="col-2"><input class="filter_box form-control hasDatepicker" type="date"
                                    name="unitCompetentDateF" id="unitCompetentDateF" placeholder=""
                                    style="width: 198px;height:26px" value="2023-05-20" fdprocessedid="9gh0vo"></div>
                            <div class="col-2">Competent Date To:</div>
                            <div class="col-2"><input class="filter_box form-control hasDatepicker" type="date"
                                    name="unitCompetentDateT" id="unitCompetentDateT" placeholder=""
                                    style="width: 198px;height:26px" value="2024-05-20" fdprocessedid="9u7dg"></div>
                            <div class="col-1">&nbsp;</div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary"
                                    fdprocessedid="japet3">Update</button>&nbsp;&nbsp;&nbsp;
                                <button type="button" class="btn btn-primary"
                                    onclick="location.href=&quot;/people/activeLearners.php?filter_dateFrom=&quot;;"
                                    fdprocessedid="83ojxc">Show All</button>&nbsp;&nbsp;&nbsp;
                                <a href="#" title="Export unit data in ASQA templated format" data-toggle="tooltip"
                                    data-placement="left" class="btn btn-primary">ASQA <i class="fa fa-file-excel-o"
                                        aria-hidden="true"></i></a>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">&nbsp;</div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Course Commencement Start Date From:</div>
                            <div class="col-2"><input class="filter_box form-control hasDatepicker" type="date"
                                    name="cdF" id="cdF" placeholder="Course Commencement Start Date From"
                                    style="width: 198px;height:26px" value="2023-05-20" fdprocessedid="v06wwk"></div>
                            <div class="col-2">
                                Course Commencement Start Date To:</div>
                            <div class="col-2"><input class="filter_box form-control hasDatepicker" type="date"
                                    name="cdT" id="cdT" placeholder="Course Commencement Start Date To"
                                    style="width: 198px;height:26px" value="2024-05-20" fdprocessedid="czjsjr"></div>
                        </div>


                    </form>

                    <div id="result" style="width:100%;padding-top: 20px;overflow-x: auto;white-space: nowrap;">
                        <div id="result_table_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dt-buttons"> <button class="buttons-excel buttons-html5 btn btn-primary"
                                    tabindex="0" aria-controls="result_table" type="button"
                                    fdprocessedid="7zeqse"><span>Excel</span></button> <button
                                    class="buttons-csv buttons-html5 btn btn-primary" tabindex="0"
                                    aria-controls="result_table" type="button"
                                    fdprocessedid="76mzfi"><span>CSV</span></button> <button
                                    class="buttons-print btn btn-primary" tabindex="0" aria-controls="result_table"
                                    type="button" fdprocessedid="43ippp"><span>Print</span></button> <button
                                    class="buttons-copy buttons-html5 btn btn-primary" tabindex="0"
                                    aria-controls="result_table" type="button"
                                    fdprocessedid="wk53c"><span>Copy</span></button> </div>
                            <div id="result_table_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="" placeholder="" aria-controls="result_table"></label></div>
                            <table id="result_table" class="table table-striped dataTable no-footer" role="grid"
                                aria-describedby="result_table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="ui-state-default sorting_asc" tabindex="0"
                                            aria-controls="result_table" rowspan="1" colspan="1"
                                            aria-sort="ascending"
                                            aria-label="Student Id: activate to sort column descending"
                                            style="width: 64px;">Student Id</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="First Name: activate to sort column ascending"
                                            style="width: 66px;">First Name</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Last Name: activate to sort column ascending"
                                            style="width: 64px;">Last Name</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Unique Student Identifier: activate to sort column ascending"
                                            style="width: 156px;">Unique Student Identifier</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Is Trainee: activate to sort column ascending"
                                            style="width: 58px;">Is Trainee</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Course Code: activate to sort column ascending"
                                            style="width: 77px;">Course Code</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Subject: activate to sort column ascending" style="width: 45px;">
                                            Subject</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Description: activate to sort column ascending"
                                            style="width: 70px;">Description</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="EnrolDate: activate to sort column ascending"
                                            style="width: 60px;">EnrolDate</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Activity Start Date: activate to sort column ascending"
                                            style="width: 112px;">Activity Start Date</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Unit Outcome: activate to sort column ascending"
                                            style="width: 85px;">Unit Outcome</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Competency Date: activate to sort column ascending"
                                            style="width: 108px;">Competency Date</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Qualification Outcome: activate to sort column ascending"
                                            style="width: 138px;">Qualification Outcome</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Email Address: activate to sort column ascending"
                                            style="width: 86px;">Email Address</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Report this enrolment?: activate to sort column ascending"
                                            style="width: 140px;">Report this enrolment?</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Course Commencement Date: activate to sort column ascending"
                                            style="width: 178px;">Course Commencement Date</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Funding Source - National: activate to sort column ascending"
                                            style="width: 160px;">Funding Source - National</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Funding Source - State: activate to sort column ascending"
                                            style="width: 139px;">Funding Source - State</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Specific Funding Identifier: activate to sort column ascending"
                                            style="width: 161px;">Specific Funding Identifier</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Delivery Mode (AVETMISS 8): activate to sort column ascending"
                                            style="width: 177px;">Delivery Mode (AVETMISS 8)</th>
                                        <th class="ui-state-default sorting" tabindex="0" aria-controls="result_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Predominant Delivery Mode: activate to sort column ascending"
                                            style="width: 173px;">Predominant Delivery Mode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd">
                                        <td valign="top" colspan="21" class="dataTables_empty">No data available in
                                            table</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="result_table_info" role="status" aria-live="polite">
                                Showing 0 to 0 of 0 entries</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="result_table_paginate"><a
                                    class="paginate_button previous disabled" aria-controls="result_table"
                                    data-dt-idx="0" tabindex="-1" id="result_table_previous">Previous</a><span></span><a
                                    class="paginate_button next disabled" aria-controls="result_table" data-dt-idx="1"
                                    tabindex="-1" id="result_table_next">Next</a></div>
                        </div>
                    </div>


                    <div id="verifyUSI_process" style="display: none;text-align:center;"><br><br><img
                            src="../home/images/ajax-loader.gif" border="0">Verifying USI...</div>
                    <div id="dialog_Tab_Update" style="display:none">
                        <div style="padding-top:30px;padding-bottom:30px;vertical-align:center">
                            <table style="width:100%;">
                                <tbody>
                                    <tr>
                                        <td rowspan="2">
                                            <h2>Update outcome as</h2>
                                        </td>
                                        <td>
                                            <i>Outcome Identifier - National</i>
                                        </td>
                                        <td id="dateCompetentTooltip">
                                            <i>Date Competent</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select style="width:200px" id="newOutcome" onchange="checkOutcome();">
                                                <option value=""></option>
                                                <option value="20">Competency achieved/pass</option>
                                                <option value="30">Competency not achieved/fail</option>
                                                <option value="70">Continuing enrolment</option>
                                                <option value="60">Credit transfer/national recognition</option>
                                                <option value="41">Discontinued due to RTO closure</option>
                                                <option value="65">Gap Training (superseded qual)</option>
                                                <option value="81">Non-assessable enrolment - Satisfactorily completed
                                                </option>
                                                <option value="82">Non-assessable enrolment - Withdrawn or not
                                                    satisfactorily completed</option>
                                                <option value="85">Not yet started</option>
                                                <option value="53">Recognition of current competency - granted</option>
                                                <option value="54">Recognition of current competency - not granted
                                                </option>
                                                <option value="51">Recognition of prior learning - granted</option>
                                                <option value="52">Recognition of prior learning - not granted</option>
                                                <option value="61">Superseded subject</option>
                                                <option value="79">Waiting employer signoff</option>
                                                <option value="40">Withdrawn/discontinued</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input id="dateCompetent" type="text" class="hasDatepicker">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="padding:10px;visibility:hidden;text-align:center;color:red" id="msg">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    <div style="display:none" id="ASQAdiv">
                        <form method="POST" action="generateASQA1.php">
                            <div class="row">
                                <div class="col-3">Units completed From</div>
                                <div class="col-4"><input autocomplete="off" type="text" id="ASQAdivFrom2"
                                        name="ASQAdivFrom2" placeholder="From" required="" class="hasDatepicker"><img
                                        class="ui-datepicker-trigger" src="../images/calendaricon.gif" alt="..."
                                        title="..."></div>
                                <div class="col-5">To&nbsp;&nbsp;&nbsp;<input autocomplete="off" type="text"
                                        id="ASQAdivTo2" name="ASQAdivTo2" placeholder="To" required=""
                                        class="hasDatepicker"><img class="ui-datepicker-trigger"
                                        src="../images/calendaricon.gif" alt="..." title="..."></div>
                            </div>
                            <div class="row">
                                <div class="col-11">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <input type="submit" class="btn btn-primary" value="Generate">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@stop
