@php
    use Carbon\Carbon;
@endphp
@extends('admin.layout.header')
<!-- Specify content -->
@section('content')
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title">Reports - POSSIBLE MATCHES</h4>
            </div>
            <div class="card-block p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="Inside_middle">
                            <table class="table" id="reportsTable">
                                <tbody>
                                    <tr>
                                        <!-- <td width="23%" class="admin_left_td" style="margin-right:15px;align:center;"> -->
                                        <!-- </td> -->
                                        <td width="100%" align="center" valign="top">
                                            <div id="body" align="center">
                                                <div class="row">
                                                    <div class="col-3 text-left">
                                                        <p>Search for duplicates based on:</p>
                                                        <select name="" id="params" class="form-control"
                                                            fdprocessedid="jjpara">
                                                            <option value="surname_email">Surname and Email</option>
                                                            <option value="surname_dob">Surname and DOB</option>
                                                            <option value="surname_mobile">Surname and Mobile</option>
                                                            <option value="usi">Surname and USI</option>
                                                        </select>
                                                        <button type="button" class="btn btn-primary mt-3"
                                                            onclick="getTabData();" fdprocessedid="npmmfb">GO</button>
                                                    </div>
                                                </div>
                                                <!-- <div align="left">
                                                    <br/>Search by the following Same (min two):
                                                    <br/><input type="checkbox" id="chkFirstName" name="chkFirstName" />&nbsp;First Name
                                                    <br/><input type="checkbox" id="chkLastName" name="chkLastName" />&nbsp;Last Name
                                                    <br/><input type="checkbox" id="chkDOB" name="chkDOB" />&nbsp;DOB
                                                    <br/><input type="checkbox" id="chkEmail" name="chkEmail" />&nbsp;Email
                                                    <br/><input type="checkbox" id="chkMobile" name="chkMobile" />&nbsp;Mobile
                                                    <br/><input type="checkbox" id="chkUSI" name="chkUSI" />&nbsp;USI
                                                    <br/><button type="button" class="btn btn-info" onclick="getTabData();">GO</button>
                                                </div> -->
                                                <!-- <div class="progress">
                                                    <div class="progress-bar" id="progress" role="progressbar" style="width: 0%;"  aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> -->
                                                <div class="gLoading"
                                                    style="top: 34px; right: 10px; z-index: 60; display: none;"
                                                    id="ajaxLoadingMsg">
                                                    <img src="images/loading_16x16.gif" align="absmiddle">&nbsp;<span
                                                        id="spnMsg">Data is loading, Please wait...</span>

                                                </div>
                                                <!-- Display results here -->
                                                <div class="row mt-5">
                                                    <div id="result" class="adminRightPart col-12">

                                                        <div id="possibleMatches_wrapper"
                                                            class="dataTables_wrapper no-footer">
                                                            <div class="dataTables_length" id="possibleMatches_length">
                                                                <label>Show <select name="possibleMatches_length"
                                                                        aria-controls="possibleMatches" class=""
                                                                        fdprocessedid="vz14h">
                                                                        <option value="10">10</option>
                                                                        <option value="20">20</option>
                                                                        <option value="50">50</option>
                                                                        <option value="100">100</option>
                                                                    </select> entries</label></div>
                                                            <table id="possibleMatches"
                                                                class="table table-striped dataTable no-footer"
                                                                cellpadding="0" cellspacing="0" width="100%"
                                                                role="grid" aria-describedby="possibleMatches_info"
                                                                style="width: 100%;">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th align="center" class="sorting_asc"
                                                                            tabindex="0" aria-controls="possibleMatches"
                                                                            rowspan="1" colspan="1"
                                                                            aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 340px;">Name</th>
                                                                        <th align="center" class="sorting" tabindex="0"
                                                                            aria-controls="possibleMatches" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Possible Match: activate to sort column ascending"
                                                                            style="width: 328px;">Possible Match</th>
                                                                        <th align="center" class="sorting" tabindex="0"
                                                                            aria-controls="possibleMatches" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Same Email?: activate to sort column ascending"
                                                                            style="width: 227px;">Same Email?</th>
                                                                        <th align="center" class="sorting" tabindex="0"
                                                                            aria-controls="possibleMatches" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Same Mobile Number?: activate to sort column ascending"
                                                                            style="width: 372px;">Same Mobile Number?</th>
                                                                        <th align="center" class="sorting" tabindex="0"
                                                                            aria-controls="possibleMatches" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Action: activate to sort column ascending"
                                                                            style="width: 145px;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr style="height:20px;" id="528675_528676"
                                                                        role="row" class="odd">
                                                                        <td class="sorting_1">dipak sharma(528675)</td>
                                                                        <td>vinay sharma(528676)</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td><span style="cursor:pointer;"
                                                                                class="badge badge-success"><a
                                                                                    onclick="mergeClientRecord(&quot;528675&quot;, &quot;528676&quot;, this);">Merge</a></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr style="height:20px;" id="524976_528674"
                                                                        role="row" class="even">
                                                                        <td class="sorting_1">kuldips domadiya(524976)</td>
                                                                        <td>kuldip domadiya(528674)</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td><span style="cursor:pointer;"
                                                                                class="badge badge-success"><a
                                                                                    onclick="mergeClientRecord(&quot;524976&quot;, &quot;528674&quot;, this);">Merge</a></span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div class="dataTables_info" id="possibleMatches_info"
                                                                role="status" aria-live="polite">Showing 1 to 2 of 2
                                                                entries</div>
                                                            <div class="dataTables_paginate paging_simple_numbers"
                                                                id="possibleMatches_paginate"><a
                                                                    class="paginate_button previous disabled"
                                                                    aria-controls="possibleMatches" data-dt-idx="0"
                                                                    tabindex="-1"
                                                                    id="possibleMatches_previous">Previous</a><span><a
                                                                        class="paginate_button current"
                                                                        aria-controls="possibleMatches" data-dt-idx="1"
                                                                        tabindex="0">1</a></span><a
                                                                    class="paginate_button next disabled"
                                                                    aria-controls="possibleMatches" data-dt-idx="2"
                                                                    tabindex="-1" id="possibleMatches_next">Next</a>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            var IsMergeCompleted = false;
                                                            var oDataTable = jQuery("#possibleMatches").DataTable({
                                                                "columnDefs": [{
                                                                    "orderable": false,
                                                                    "targets": []
                                                                }, ],
                                                                "searching": false,
                                                                "lengthMenu": [10, 20, 50, 100]
                                                            });

                                                            function mergeClientRecord(studId1, studId2, el) {
                                                                var url = 'possibleMatch_MergeCheck.php';
                                                                var sendData = {
                                                                    'studId1': studId1,
                                                                    'studId2': studId2
                                                                };

                                                                jQuery.ajax({
                                                                    url: url,
                                                                    data: sendData,
                                                                    type: 'POST',
                                                                    dataType: 'html',
                                                                    success: function(response) {
                                                                        if (response > 0) {
                                                                            alert("The two learners have enrolled to the same schedule, so they cannot be merged.");
                                                                        } else {
                                                                            //if(confirm("Are you sure you want to merge the two students' records?")) {
                                                                            IsMergeCompleted = false;
                                                                            jQuery.ajax({
                                                                                url: '../admin/possibleMatch_Merge.php',
                                                                                data: sendData,
                                                                                type: 'GET',
                                                                                dataType: 'html',
                                                                                success: function(response) {
                                                                                    jQuery("#tab_mergeRecords").html(response);
                                                                                    jQuery("#tab_mergeRecords").dialog({
                                                                                        title: 'Merge People',
                                                                                        width: 900,
                                                                                        height: 650,
                                                                                        modal: true,
                                                                                        close: function(event, ui) {
                                                                                            if (IsMergeCompleted == true) {
                                                                                                oDataTable.row($(el).parents("tr")).remove()
                                                                                                    .draw(false);
                                                                                            }
                                                                                        }
                                                                                    });
                                                                                }
                                                                            });
                                                                            //}
                                                                        }
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @stop
