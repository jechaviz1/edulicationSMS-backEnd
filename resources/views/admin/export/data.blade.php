@php
    use Carbon\Carbon;

@endphp
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
    <div class="col-xl-12 events">
        <div class="card dz-card" id="accordion-four">
            <div class="card-header">
                <h4 class="card-title"> Data Export</h4>
            </div>
            <div class="card-block p-3">
                <h6 class="form-title"><span>Data Export</span></h6>
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-10">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td height="10px" colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0">
                                            <tbody>
                                                <tr style="height:20px;">
                                                    <td></td>
                                                </tr>
                                                <tr style="height:70px;">
                                                    <td style="font-size:18px"><strong>People</strong> </td>
                                                    <td>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('export.xml', ['table' => 'student']) }}">Export
                                                            as XML</a>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('export.xls', ['table' => 'student']) }}">Export
                                                            as XLS</a>
                                                        {{-- <button class="btn btn-primary" type="button" onclick="exportPeopleXLS('student')" fdprocessedid="b3ly6h">Export as XLS</button> --}}
                                                    </td>
                                                </tr>
                                                <tr style="height:70px;">
                                                    <td width="100" style="font-size:18px"><strong>Schedules</strong>
                                                    </td>
                                                    <td>
                                                        created between <input type="date" name="schedulefrom"
                                                            id="schedulefrom" value="" class="hasDatepicker">
                                                        &nbsp;&nbsp;&nbsp;and&nbsp;&nbsp;&nbsp;
														<input type="date" name="scheduleto" id="scheduleto" value="" class="hasDatepicker">
                                                        <button type="button" class="btn btn-primary" onclick="scheduleexportDataxml('schedule')">Export as XML</button>
                                                        <button type="button" class="btn btn-primary" onclick="scheduleexportDataxls('schedule')" >Export as XLS</button>
                                                    </td>
                                                    <td></td>
                                                </tr>

                                                <tr style="height:70px;">
                                                    <td style="font-size:18px"><strong>Enquiries</strong></td>
                                                    <td>
                                                        created between <input type="date" name="enquiryfrom"
                                                            id="enquiryfrom" value="04 May 2024" class="hasDatepicker">
                                                        &nbsp;&nbsp;&nbsp;and&nbsp;&nbsp;&nbsp;<input type="date"
                                                            name="enquiryto" id="enquiryto" value="03 June 2024"
                                                            class="hasDatepicker">
                                                        <button type="button" class="btn btn-primary" onclick="enquirieexportDataxml('enquirie')">Export as XML</button>
                                                        <button type="button" class="btn btn-primary" onclick="enquirieexportDataxls('enquirie')">Export as XLS</button>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr style="height:70px;">
                                                    <td style="font-size:18px"><strong>Enrolments</strong></td>
                                                    <td>
                                                        created between <input type="date" name="enrolmentsfrom"
                                                            id="enrolmentsfrom" value="04 May 2024" class="hasDatepicker"
                                                            fdprocessedid="dls2p">
                                                        &nbsp;&nbsp;&nbsp;and&nbsp;&nbsp;&nbsp;<input type="date"
                                                            name="enrolmentsto" id="enrolmentsto" value="03 June 2024"
                                                            class="hasDatepicker" fdprocessedid="id1cfr">
                                                        <button type="button" class="btn btn-primary" onclick="enrolmentsexportDataxml('enquirie')">Export as XML</button>
                                                        <button type="button" class="btn btn-primary" onclick="enrolmentsexportDataxls('enquirie')">Export as XLS</button>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                                <tr style="height:70px;">
                                                    <td style="font-size:18px">&nbsp;</td>
                                                    <td align="left" valign="middle">
                                                        <table>
                                                            <tbody>
                                                                <tr>
																	<td style="font-size:18px"><strong>Courses</strong></td>
                                                                    <td>
                                                                         starting on / after</td>
                                                                    <td><input type="date" name="coursesfrom"
                                                                            id="coursesfrom" value="04 May 2024"
                                                                            class="hasDatepicker">
                                                                    </td>
                                                                    <td>
                                                                        and finishing on / before</td>
                                                                    <td><input type="date" name="coursesto"
                                                                            id="coursesto" value="03 June 2024"
                                                                            class="hasDatepicker">
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary ms-3"onclick="courseexportDataxml('courses')">Export as XML</button>
                                                                    </td>       
                                                                    <td>        
                                                                        <button type="button" class="btn btn-primary ms-3"onclick="courseexportDataxls('courses')">Export as XLS</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function exportData(table, datefrom, dateto) {
                if ((datefrom == "" && dateto != "") || (datefrom != "" && dateto == "")) {
                    alert('Please select a valid date range.');
                    return;
                }
                var redirect = "?table=" + table;
                if (datefrom != "" && dateto != "") {
                    var fromArray = dateFormatConvert(datefrom);
                    var toArray = dateFormatConvert(dateto);
                    var fromDate = fromArray[2] + "-" + fromArray[1] + "-" + fromArray[0];
                    var toDate = toArray[2] + "-" + toArray[1] + "-" + toArray[0];
                    redirect += "&from=" + fromDate + "&to=" + toDate;
                }
                location.href = redirect;
            }

            function exportPeopleXLS(table) {
                var redirect = "?table=" + table;
                location.href = redirect;
            }

			function scheduleexportDataxml(table){
                console.log(table);
                var from = document.getElementById('schedulefrom').value;
                var to = document.getElementById('scheduleto').value;

            // Check if from and to are not empty
            if (from.trim() === '' || to.trim() === '') {
                alert('Please select both from and to dates.');
            } else {
                // Validate date format (optional, depends on your requirements)
                var fromDate = new Date(from);
                var toDate = new Date(to);
                if (fromDate >= toDate) {
                    alert('From date should be before the To date.');
                } else {
                    // Constructing the URL with both parameters
                    var redirectUrl = "{{ route('export.xml', ['table' => '']) }}".replace('table=', 'table=' + table + '&from=' + from + '&to=' + to);
                    window.location.href = redirectUrl;
                }
            }
			}
            
            function scheduleexportDataxls(table){
                var from = document.getElementById('schedulefrom').value;
                var to = document.getElementById('scheduleto').value;

            // Check if from and to are not empty
            if (from.trim() === '' || to.trim() === '') {
                alert('Please select both from and to dates.');
            } else {
                // Validate date format (optional, depends on your requirements)
                var fromDate = new Date(from);
                var toDate = new Date(to);
                if (fromDate >= toDate) {
                    alert('From date should be before the To date.');
                } else {
                    // Constructing the URL with both parameters
                    var redirectUrl = "{{ route('export.xls', ['table' => '']) }}".replace('table=', 'table=' + table + '&from=' + from + '&to=' + to);
                    window.location.href = redirectUrl;
                }
            }
			}

            function enquirieexportDataxls(table){
                var from = document.getElementById('enquiryfrom').value;
                var to = document.getElementById('enquiryfrom').value;

            // Check if from and to are not empty
            if (from.trim() === '' || to.trim() === '') {
                alert('Please select both from and to dates.');
            } else {
                // Validate date format (optional, depends on your requirements)
                var fromDate = new Date(from);
                var toDate = new Date(to);
                if (fromDate >= toDate) {
                    alert('From date should be before the To date.');
                } else {
                    // Constructing the URL with both parameters
                    var redirectUrl = "{{ route('export.xls', ['table' => '']) }}".replace('table=', 'table=' + table + '&from=' + from + '&to=' + to);
                    window.location.href = redirectUrl;
                }
            }
			}

            function enquirieexportDataxml(table){
                var from = document.getElementById('enquiryfrom').value;
                var to = document.getElementById('enquiryto').value;

            // Check if from and to are not empty
            if (from.trim() === '' || to.trim() === '') {
                alert('Please select both from and to dates.');
            } else {
                // Validate date format (optional, depends on your requirements)
                var fromDate = new Date(from);
                var toDate = new Date(to);
                if (fromDate >= toDate) {
                    alert('From date should be before the To date.');
                } else {
                    // Constructing the URL with both parameters
                    var redirectUrl = "{{ route('export.xml', ['table' => '']) }}".replace('table=', 'table=' + table + '&from=' + from + '&to=' + to);
                    window.location.href = redirectUrl;
                }
            }
			}


            function enrolmentsexportDataxls(table){
                var from = document.getElementById('enrolmentsfrom').value;
                var to = document.getElementById('enrolmentsto').value;

            // Check if from and to are not empty
            if (from.trim() === '' || to.trim() === '') {
                alert('Please select both from and to dates.');
            } else {
                // Validate date format (optional, depends on your requirements)
                var fromDate = new Date(from);
                var toDate = new Date(to);
                if (fromDate >= toDate) {
                    alert('From date should be before the To date.');
                } else {
                    // Constructing the URL with both parameters
                    var redirectUrl = "{{ route('export.xls', ['table' => '']) }}".replace('table=', 'table=' + table + '&from=' + from + '&to=' + to);
                    window.location.href = redirectUrl;
                }
            }
			}

            function enrolmentsexportDataxml(table){
                var from = document.getElementById('enrolmentsfrom').value;
                var to = document.getElementById('enrolmentsto').value;

            // Check if from and to are not empty
            if (from.trim() === '' || to.trim() === '') {
                alert('Please select both from and to dates.');
            } else {
                // Validate date format (optional, depends on your requirements)
                var fromDate = new Date(from);
                var toDate = new Date(to);
                if (fromDate >= toDate) {
                    alert('From date should be before the To date.');
                } else {
                    // Constructing the URL with both parameters
                    var redirectUrl = "{{ route('export.xml', ['table' => '']) }}".replace('table=', 'table=' + table + '&from=' + from + '&to=' + to);
                    window.location.href = redirectUrl;
                }
            }
			}

            function courseexportDataxml(table){
                var from = document.getElementById('enrolmentsfrom').value;
                var to = document.getElementById('enrolmentsto').value;

            // Check if from and to are not empty
            if (from.trim() === '' || to.trim() === '') {
                alert('Please select both from and to dates.');
            } else {
                // Validate date format (optional, depends on your requirements)
                var fromDate = new Date(from);
                var toDate = new Date(to);
                if (fromDate >= toDate) {
                    alert('From date should be before the To date.');
                } else {
                    // Constructing the URL with both parameters
                    var redirectUrl = "{{ route('export.xls', ['table' => '']) }}".replace('table=', 'table=' + table + '&from=' + from + '&to=' + to);
                    window.location.href = redirectUrl;
                }
            }
			}

            function courseexportDataxls(table){
                var from = document.getElementById('coursesfrom ms-3').value;
                var to = document.getElementById('coursesto').value;

            // Check if from and to are not empty
            if (from.trim() === '' || to.trim() === '') {
                alert('Please select both from and to dates.');
            } else {
                // Validate date format (optional, depends on your requirements)
                var fromDate = new Date(from);
                var toDate = new Date(to);
                if (fromDate >= toDate) {
                    alert('From date should be before the To date.');
                } else {
                    // Constructing the URL with both parameters
                    var redirectUrl = "{{ route('export.xml', ['table' => '']) }}".replace('table=', 'table=' + table + '&from=' + from + '&to=' + to);
                    window.location.href = redirectUrl;
                }
            }
			}
        </script>
    @stop
    @push('customjs')
    @endpush
