@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - Reports - COURSE UTILISATION</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="result" class="adminRightPart">

                            <div class="row">
                                   <div class="col-2" style="text-align: left;">Course Starting Date Range</div>
                                   <div class="col-1" style="text-align: left;">From</div>
                                   <div class="col-2" style="text-align: left;"><input type="date" name="From" id="From" value="2024-05-25" class="form-control"></div>
                                   <div class="col-1" style="text-align: left;">to</div>
                                   <div class="col-2" style="text-align: left;"><input type="date" name="To" id="To" value="2024-06-25" class="form-control"></div>
                               </div>
                               <div class="row"><div class="col-12">&nbsp;</div></div>
                               <div class="row">
                                   <div class="col-2" style="text-align: left;">Schedule Status</div>
                                   <div class="col-3" style="text-align: left;"><select id="scheduleStatus" name="scheduleStatus" class="form-control" fdprocessedid="fccka">
                                           <option value="All">All</option>
                                           <option value="Active">Active</option>
                                           <option value="Archive">Archive</option>
                                       </select>
                                   </div></div>
                               <div class="row"><div class="col-12">&nbsp;</div></div>
                               <div class="row">
                                   <div class="col-2" style="text-align: left;">Region</div>
                                   <div class="col-3" style="text-align: left;"><select id="scheduleRegion" name="scheduleRegion" class="form-control" fdprocessedid="d6kwhp">
                                       <option value="0">All Region</option>
                                   <option value="518">test</option><option value="522">ind</option><option value="523">aus</option>			</select>
                                   </div></div>
                               <div class="row"><div class="col-12">&nbsp;</div></div>
                               <div class="row">
                                   <div class="col-1"><button type="button" class="btn btn-primary" onclick="verify_time();" fdprocessedid="rvrve">Go</button>
                                   </div>
                               </div>
                           <div>&nbsp;</div>
                           <div id="courseUtilisation_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="courseUtilisation_length"><label>Show <select name="courseUtilisation_length" aria-controls="courseUtilisation" class="" fdprocessedid="6l5qhi"><option value="10">10</option><option value="20">20</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><table class="table table-striped dataTable no-footer" id="courseUtilisation" cellpadding="0" cellspacing="0" width="100%" role="grid" aria-describedby="courseUtilisation_info" style="width: 100%;">
                               <thead>
                                   <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="courseUtilisation" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Course Code: activate to sort column descending" style="width: 194px;">Course Code</th><th class="sorting" tabindex="0" aria-controls="courseUtilisation" rowspan="1" colspan="1" aria-label="Delivery Method: activate to sort column ascending" style="width: 245px;">Delivery Method</th><th class="sorting" tabindex="0" aria-controls="courseUtilisation" rowspan="1" colspan="1" aria-label="Start Date: activate to sort column ascending" style="width: 164px;">Start Date</th><th class="sorting" tabindex="0" aria-controls="courseUtilisation" rowspan="1" colspan="1" aria-label="City Name: activate to sort column ascending" style="width: 168px;">City Name</th><th class="sorting" tabindex="0" aria-controls="courseUtilisation" rowspan="1" colspan="1" aria-label="Month: activate to sort column ascending" style="width: 123px;">Month</th><th class="sorting" tabindex="0" aria-controls="courseUtilisation" rowspan="1" colspan="1" aria-label="Client Group: activate to sort column ascending" style="width: 195px;">Client Group</th><th class="sorting" tabindex="0" aria-controls="courseUtilisation" rowspan="1" colspan="1" aria-label="Utilisation Rate: activate to sort column ascending" style="width: 228px;">Utilisation Rate</th></tr>
                               </thead>
                               <tbody>
                                   <tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No data available in table</td></tr></tbody>
                           </table><div class="dataTables_info" id="courseUtilisation_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_simple_numbers" id="courseUtilisation_paginate"><a class="paginate_button previous disabled" aria-controls="courseUtilisation" data-dt-idx="0" tabindex="-1" id="courseUtilisation_previous">Previous</a><span></span><a class="paginate_button next disabled" aria-controls="courseUtilisation" data-dt-idx="1" tabindex="-1" id="courseUtilisation_next">Next</a></div></div>
                           <script>
                               jQuery("#courseUtilisation").DataTable({
                                   "columnDefs": [
                                       {"orderable": false, "targets": []},
                                   ],
                                   "searching": false,
                                   "lengthMenu" : [10, 20, 50, 100]
                                 });
                           
                           </script>
                           </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
