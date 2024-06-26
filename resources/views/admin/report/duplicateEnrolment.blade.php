@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - Reports - DUPLICATED ENROLMENTS</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="result" class="adminRightPart">


                            <div id="duplicateEnrolment_wrapper" class="dataTables_wrapper no-footer">
                                <div class="dataTables_length" id="duplicateEnrolment_length"><label>Show <select
                                            name="duplicateEnrolment_length" aria-controls="duplicateEnrolment"
                                            class="" fdprocessedid="s474d8">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                                <table id="duplicateEnrolment" class="table table-striped dataTable no-footer"
                                    cellpadding="0" cellspacing="0" width="100%" role="grid"
                                    aria-describedby="duplicateEnrolment_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th align="center" class="sorting_asc" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Student Name: activate to sort column descending"
                                                style="width: 173px;">Student Name</th>
                                            <th align="center" class="sorting" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-label="Course Code: activate to sort column ascending"
                                                style="width: 155px;">Course Code</th>
                                            <th align="center" class="sorting" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-label="City/Town: activate to sort column ascending"
                                                style="width: 131px;">City/Town</th>
                                            <th align="center" style="width:80px;" class="sorting" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-label="Location: activate to sort column ascending">Location</th>
                                            <th align="center" class="sorting" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-label="Start Date: activate to sort column ascending"
                                                style="width: 130px;">Start Date</th>
                                            <th align="center" style="width:80px;" class="sorting" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-label="Trainer: activate to sort column ascending">Trainer</th>
                                            <th align="center" class="sorting" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-label="Invoice No: activate to sort column ascending"
                                                style="width: 136px;">Invoice No</th>
                                            <th align="center" class="sorting" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-label="Invoice Amt: activate to sort column ascending"
                                                style="width: 150px;">Invoice Amt</th>
                                            <th align="center" class="sorting" tabindex="0"
                                                aria-controls="duplicateEnrolment" rowspan="1" colspan="1"
                                                aria-label="Payment Status: activate to sort column ascending"
                                                style="width: 185px;">Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd">
                                            <td valign="top" colspan="9" class="dataTables_empty">No data available
                                                in table</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="dataTables_info" id="duplicateEnrolment_info" role="status"
                                    aria-live="polite">Showing 0 to 0 of 0 entries</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
