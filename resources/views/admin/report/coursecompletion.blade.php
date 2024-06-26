@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - COURSE COMPLETION</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="result" class="adminRightPart">
                            <div class="row">
                                <div class="col-2" style="text-align: left;">Course Starting Date Range</div>
                                <div class="col-1" style="text-align: left;">From</div>
                                <div class="col-2" style="text-align: left;"><input type="date" name="From"
                                        id="From" value="" class="form-control"></div>
                                <div class="col-1" style="text-align: left;">to</div>
                                <div class="col-2" style="text-align: left;"><input type="date" name="To"
                                        id="To" value="" class="form-control"></div>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-2" style="text-align: left;"></div>
                                <div class="col-10" style="text-align: left;">NOTE: Courses running during the selected date
                                    range will be included in the report, ie. A course running 02-12-2011 to 15-02-2012
                                    would be included in a report selection date of 01-01-2012 to 30-06-2012. Similarly so
                                    would a course running 05-05-2012 to 30-08-2012</div>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-2" style="text-align: left;">Region</div>
                                <div class="col-3" style="text-align: left;"><select id="scheduleRegion"
                                        name="scheduleRegion" class="form-control" fdprocessedid="5ntpdc">
                                        <option value="0">All Region</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-2" style="text-align: left;">View By</div>
                                <div class="col-3" style="text-align: left;"><select id="viewBy" name="viewBy"
                                        class="form-control" fdprocessedid="7ddjzj">
                                        <option value="Overall" selected="">Overall</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-1"><button type="button" class="btn btn-primary" onclick="verify_time();"
                                        fdprocessedid="y0oxb">Go</button>
                                </div>
                            </div>
                            <script>
                                jQuery("#courseCompletion").DataTable({
                                    "columnDefs": [{
                                        "orderable": false,
                                        "targets": []
                                    }, ],
                                    "bSort": false,
                                    "searching": false,
                                    "lengthMenu": [10, 20, 50, 100]
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
