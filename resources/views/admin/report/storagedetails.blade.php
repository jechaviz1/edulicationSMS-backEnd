@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - STORAGE DETAILS</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="storageDetails_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="storageDetails_length"><label>Show <select
                                        name="storageDetails_length" aria-controls="storageDetails" class=""
                                        fdprocessedid="rbzi1d">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                            <table id="storageDetails" class="table table-striped dataTable no-footer" cellpadding="0"
                                cellspacing="0" width="100%" role="grid" aria-describedby="storageDetails_info"
                                style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 1286px;">
                                            Category</th>
                                        <th style="width: 129px;" class="sorting_disabled" rowspan="1" colspan="1">
                                            Number of files uploaded</th>
                                        <th style="width: 129px;" class="sorting_disabled" rowspan="1" colspan="1">
                                            File Size (MB)</th>
                                    </tr>
                                </thead>
                                <tbody>










                                    <tr role="row" class="odd">
                                        <td>Issued Certificates</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Certificate Templates</td>
                                        <td style="width:10%; text-align: right;">3</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>Info-Pak documents</td>
                                        <td style="width:10%; text-align: right;">3</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Confirmation Email documents</td>
                                        <td style="width:10%; text-align: right;">2</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>Student documents</td>
                                        <td style="width:10%; text-align: right;">2</td>
                                        <td style="width:10%; text-align: right;">2</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Trainer documents</td>
                                        <td style="width:10%; text-align: right;">2</td>
                                        <td style="width:10%; text-align: right;">2</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>Person Note Attachments</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>Enquiry Note Attachments</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td>Enrolment Form</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                        <td style="width:10%; text-align: right;">0</td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td><strong>Total<strong></strong></strong></td>
                                        <td style="width:10%; text-align: right;"><strong>12</strong></td>
                                        <td style="width:10%; text-align: right;"><strong>5</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
