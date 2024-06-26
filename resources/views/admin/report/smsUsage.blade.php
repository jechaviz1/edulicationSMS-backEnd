@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - SMS USAGE</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="result" class="adminRightPart">

                            <table border="0" align="left" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td align="left">
                                            <strong>From</strong>&nbsp;<input type="date" value="2023-06-26"
                                                name="fromDate" id="fromDate" placeholder="Enter from date"
                                                class="hasDatepicker" fdprocessedid="65dztm">
                                            <strong>To</strong>&nbsp;<input type="date" value="2024-06-25" name="toDate"
                                                id="toDate" placeholder="Enter to date" class="hasDatepicker"
                                                fdprocessedid="lvlaf">
                                            <button type="button" class="btn btn-primary" style="margin-left:10px;"
                                                onclick="checkSubmittedForm();" fdprocessedid="mmugms">Go</button>
                                        </td>
                                        <td align="right" style="padding-right:5px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" valign="top">
                                            <div id="smsUsageTable_wrapper" class="dataTables_wrapper no-footer">
                                                <div class="dataTables_length" id="smsUsageTable_length"><label>Show <select
                                                            name="smsUsageTable_length" aria-controls="smsUsageTable"
                                                            class="" fdprocessedid="tizacle">
                                                            <option value="10">10</option>
                                                            <option value="20">20</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                                <table id="smsUsageTable" class="table table-striped dataTable no-footer"
                                                    cellpadding="0" cellspacing="0" width="100%" role="grid"
                                                    aria-describedby="smsUsageTable_info" style="width: 100%;">
                                                    <thead>
                                                   
                                                    </thead>
                                                    <tbody>
                                                        
                                                      
                                                    </tbody>
                                                </table>
                                                <div class="dataTables_info" id="smsUsageTable_info" role="status"
                                                    aria-live="polite">Showing 1 to 2 of 2 entries</div>
                                             
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="height:10px;"></td>
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
