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
                <h4 class="card-title">Export NAT Files (AVETMISS 8.0)</h4>
            </div>
            <div class="card-block p-3">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">New Report</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Manage Exclusion & inclusion</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Report History</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <form action="{{ route('nat.generator') }}" method="post" enctype="multipart/form-data">
                    @csrf()
                    @method('POST')
                       <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <h6>Reporting State</h6>
                                    </div>
                                    <div class="col-sm-8">
                                        <select class="form-control w-100" name="reportingState" id="reportingState"
                                            style="width:180px;" fdprocessedid="iqo2hsd">
                                            <option value="0">All – Use to check data, not for submission&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                            @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <input type="checkbox" name="yetToStart" id="yetToStart" value="yetToStart"> Include
                                        "Not Yet Started" Enrolments
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4">
                                            Inclusion/Exclusion
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-control w-100" name="seriesname" style="width:180px;"
                                                onchange="showSeries(this.value)" fdprocessedid="mn7xj">
                                                <option value="0">(none set)</option>
                                                <option value="38">people (exclusion)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mtHello-3">
                                    <div class="col-sm-6">
                                        <input type="radio" name="generateReportType" id="generateReportType"
                                            value="interim">
                                        Interim Report
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" name="generateReportType" id="generateReportType"
                                            value="endofyear" checked="">
                                        End of Year
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <input type="radio" name="reportdateselection" id="reportdateselection1_8_0"
                                            value="year" checked="">
                                        Reporting year
                                    </div>
                                    <div class="col-sm-6 d-flex">
                                        <select name="yearpicker" id="yearpicker_8_0" class="form-control"
                                            style="width:180px;" fdprocessedid="klpcu">
                                            <option>2024</option>
                                            <option>2023</option>
                                            <option>2022</option>
                                            <option>2021</option>
                                            <option>2020</option>
                                            <option>2019</option>
                                            <option>2018</option>
                                            <option>2017</option>
                                            <option>2016</option>
                                            <option>2015</option>
                                            <option>2014</option>
                                            <option>2013</option>
                                            <option>2012</option>
                                            <option>2011</option>
                                            <option>2010</option>
                                            <option>2009</option>
                                            <option>2008</option>
                                            <option>2007</option>
                                            <option>2006</option>
                                            <option>2005</option>
                                            <option>2004</option>
                                            <option>2003</option>
                                            <option>2002</option>
                                            <option>2001</option>
                                            <option>2000</option>
                                            <option>1999</option>
                                            <option>1998</option>
                                            <option>1997</option>
                                            <option>1996</option>
                                            <option>1995</option>
                                            <option>1994</option>
                                            <option>1993</option>
                                            <option>1992</option>
                                            <option>1991</option>
                                            <option>1990</option>
                                            <option>1989</option>
                                            <option>1988</option>
                                            <option>1987</option>
                                            <option>1986</option>
                                            <option>1985</option>
                                            <option>1984</option>
                                            <option>1983</option>
                                            <option>1982</option>
                                            <option>1981</option>
                                            <option>1980</option>
                                            <option>1979</option>
                                            <option>1978</option>
                                            <option>1977</option>
                                            <option>1976</option>
                                            <option>1975</option>
                                            <option>1974</option>
                                            <option>1973</option>
                                            <option>1972</option>
                                            <option>1971</option>
                                            <option>1970</option>
                                            <option>1969</option>
                                            <option>1968</option>
                                            <option>1967</option>
                                            <option>1966</option>
                                            <option>1965</option>
                                            <option>1964</option>
                                            <option>1963</option>
                                            <option>1962</option>
                                            <option>1961</option>
                                            <option>1960</option>
                                            <option>1959</option>
                                            <option>1958</option>
                                            <option>1957</option>
                                            <option>1956</option>
                                            <option>1955</option>
                                            <option>1954</option>
                                            <option>1953</option>
                                            <option>1952</option>
                                            <option>1951</option>
                                            <option>1950</option>
                                            <option>1949</option>
                                            <option>1948</option>
                                            <option>1947</option>
                                            <option>1946</option>
                                            <option>1945</option>
                                            <option>1944</option>
                                            <option>1943</option>
                                            <option>1942</option>
                                            <option>1941</option>
                                            <option>1940</option>
                                            <option>1939</option>
                                            <option>1938</option>
                                            <option>1937</option>
                                            <option>1936</option>
                                            <option>1935</option>
                                            <option>1934</option>
                                            <option>1933</option>
                                            <option>1932</option>
                                            <option>1931</option>
                                            <option>1930</option>
                                            <option>1929</option>
                                            <option>1928</option>
                                            <option>1927</option>
                                            <option>1926</option>
                                            <option>1925</option>
                                            <option>1924</option>
                                            <option>1923</option>
                                            <option>1922</option>
                                            <option>1921</option>
                                            <option>1920</option>
                                            <option>1919</option>
                                            <option>1918</option>
                                            <option>1917</option>
                                            <option>1916</option>
                                            <option>1915</option>
                                            <option>1914</option>
                                            <option>1913</option>
                                            <option>1912</option>
                                            <option>1911</option>
                                            <option>1910</option>
                                            <option>1909</option>
                                            <option>1908</option>
                                            <option>1907</option>
                                            <option>1906</option>
                                            <option>1905</option>
                                            <option>1904</option>
                                            <option>1903</option>
                                            <option>1902</option>
                                            <option>1901</option>
                                        </select>
                                        <span class="ms-3" style="font-weight: 800;font-size: 24px;">OR</span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <input type="radio" name="reportdateselection" id="reportdateselection2_8_0"
                                            value="date">
                                        Reporting date range
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="" name="exportDateFrom"
                                            id="exportDateFrom_8_0" placeholder="From" class="hasDatepicker">
                                        <input type="date" class="" name="exportDateTo" id="exportDateTo_8_0"
                                            placeholder="To" class="hasDatepicker">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table width="90%" border="0" cellpadding="5" cellspacing="6"
                            style="margin-bottom: 10px;">
                            <tbody>
                                <tr>
                                    <td><br><span style="cursor:pointer;" class="text-primary"
                                            onclick="checkAll_8_0()">Check all</span> | <span style="cursor:pointer;"
                                            class="text-primary" onclick="uncheckAll_8_0()">Uncheck all</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="line-height:25px;width:40%">
                                        <input class="reportType_8_0" type="checkbox" name="NAT00010" id="NAT00010"
                                            value="NAT00010"> NAT00010 (Training Organisation)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00020" id="NAT00020"
                                            value="NAT00020"> NAT00020 (Training Organisation Delivery
                                        Location)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00030" id="NAT00030"
                                            value="NAT00030"> NAT00030 (Program)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00060" id="NAT00060"
                                            value="NAT00060"> NAT00060 (Subject)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00080" id="NAT00080"
                                            value="NAT00080"> NAT00080 (Client)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00085" id="NAT00085"
                                            value="NAT00085"> NAT00085 (Client Postal Details)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00090" id="NAT00090"
                                            value="NAT00090"> NAT00090 (Disability)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00100" id="NAT00100"
                                            value="NAT00100"> NAT00100 (Prior Educational
                                        Achievement)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00120" id="NAT00120"
                                            value="NAT00120"> NAT00120 (Training Activity)<br>
                                        <input class="reportType_8_0" type="checkbox" name="NAT00130" id="NAT00130"
                                            value="NAT00130"> NAT00130 (Program Completed)<br>
                                        <br><label>Non-registered and Local training : </label><br>
                                        <input class="reportType_e_8_0" type="checkbox" name="NAT00010A" id="NAT00010A"
                                            value="NAT00010A"> NAT00010A (Training Organisation)<br><!--WWB-220-->
                                        <input class="reportType_e_8_0" type="checkbox" name="NAT00030A" id="NAT00030A"
                                            value="NAT00030A"> NAT00030A (Program)<!--WWB-220-->
                                        <input type="hidden" name="reportType" value="">
                                    </td>
                                    <td style="text-align:left;" rowspan="2">
                                        <input class="excelVersion_8_0" type="checkbox" name="excelVersion"
                                            id="excelVersion" value="excelVersion"> Download Excel version of NAT00120
                                        file for data checking<br><br>
                                        <span style="font-size:small;">
                                            *Please note:<br>
                                            While every effort is made to ensure compliance of data format with reporting
                                            requirements, DNA Progression Pty Ltd makes no representation in this or any
                                            other respect. It is
                                            a condition of Weworkbook that DNA Progression Pty Ltd accepts no responsibility
                                            and disclaims all liability for any expenses, losses, damages, costs or
                                            liabilities you may
                                            incur, or claims that may be made on you, whether direct or indirect, as a
                                            result of reliance on the reporting within Weworkbook. It is each user's
                                            responsibility
                                            to ensure data is entered accurately and completely, that it is entered as
                                            required by that user's reporting jurisdiction and that it meets all validation
                                            and other
                                            applicable requirements.  
                                            <br>
                                            Weworkbook uses AVETMISS system files as updated on 4 August 2020
                                            <br>
                                        </span><br>
                                        <button style="font-family: inherit" type="submit" class="btn btn-primary">Generate</button>
                                        <button style="font-family: inherit" type="submit" class="btn btn-primary">Generate - State</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <h5>Create New Series</h5>
                            <form name="searchStudent1" id="searchStudent1" method="get" action="?">
                                <div><input type="radio" name="ReportType" id="exclusion" checked=""
                                        value="exclusion" onclick="selectOption('exclusion');"> Add Report Exclusions
                                    &nbsp;&nbsp;
                                    <input type="radio" name="ReportType" id="inclusion" value="inclusion"
                                        onclick="selectOption('inclusion');"> Add Report Inclusions
                                </div><br>
                                <input type="hidden" name="rtype" id="rtype" value="">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td style="width:auto;">Find By</td>
                                            <td style="width:auto;">
                                                <select name="searchBy1" id="searchBy1" class="form-control"
                                                    style="width:180px; " onchange="changeSearchBy();"
                                                    fdprocessedid="uig9aj">
                                                    <option value="course" selected="">Course</option>
                                                    <option value="event">Event</option>
                                                    <option value="client">People</option>
                                                    <option value="specificUnit">Specific Unit</option>

                                                </select>
                                            </td>
                                            <td style="width:auto;"></td>
                                        </tr>

                                        <tr>
                                            <td style="width:auto;">Search (Case-sensitive)&nbsp;</td>
                                            <td style="width:auto;">
                                                <div id="tagbox2">
                                                    <input class="form-control" type="text" name="searchValue1"
                                                        id="searchValue1" value=""
                                                        style="width: 180px; height: 35px; display: none;">
                                                    <input type="text" name="searchValueName1" id="searchValueName1"
                                                        value="" class="input_text1"
                                                        style="width: 180px; height: 35px; display: block;"
                                                        autocomplete="off" fdprocessedid="8mz22">
                                                    <div id="tagbox-lkup" style="display: none;">
                                                        <ol style="list-style-type: none;"></ol>
                                                    </div>
                                                    <input type="text" name="searchValueRef1" id="searchValueRef1"
                                                        value="" class="input_text1"
                                                        style="width:180px; height:35px; display:none;">
                                                    <select name="courseList" id="courseList" size="1"
                                                        style="display: none; width:180px;"
                                                        onchange="loadScheduleList();">
                                                        <option value=""></option>
                                                        <option value="2565">BSB40820</option>
                                                    </select>
                                                    <select name="scheduleList" id="scheduleList" size="6"
                                                        style="width:80%; display: none;">
                                                    </select>
                                                    <!---new input text boxes for client group name-->
                                                    <input type="text" name="searchValueGroup" id="searchValueGroup"
                                                        value="" class="input_text1"
                                                        style="width:180px; height:35px; display:none;">
                                                    <!---new input text boxes for city-->
                                                    <input type="text" name="searchCity" id="searchCity"
                                                        value="" class="input_text1"
                                                        style="width:180px; height:35px; display:none;">

                                                </div>
                                            </td>

                                            <td style="width:auto;">
                                                <button type="submit" class="btn btn-primary"
                                                    fdprocessedid="6838l">Go</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <br><br>
                                            </td>
                                        </tr>
                                        <!---fix for bug id: 4498-->
                                        <tr>
                                            <td style="width:auto;">Title</td>
                                            <td style="width:auto;">
                                                <input class="form-control" type="textbox" name="inclusionexclusionTitle"
                                                    id="inclusionexclusionTitle" placeholder="Enter title here"
                                                    size="50" style="width:180px; " fdprocessedid="gargbh">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <h5>Saved Exclusions and Inclusion</h5>
                        <table id="savedExcList" border="0" align="left" cellpadding="0" cellspacing="0"
                            width="100%" class="dataTable no-footer" role="grid"
                            aria-describedby="savedExcList_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="savedExcList" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Series Name: activate to sort column descending" style="width: 98px;">
                                        Series Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="savedExcList" rowspan="1"
                                        colspan="1" aria-label="Type: activate to sort column ascending"
                                        style="width: 58px;">Type</th>
                                    <th class="sorting" tabindex="0" aria-controls="savedExcList" rowspan="1"
                                        colspan="1" aria-label="Course: activate to sort column ascending"
                                        style="width: 98px;">Course</th>
                                    <th class="sorting" tabindex="0" aria-controls="savedExcList" rowspan="1"
                                        colspan="1" aria-label="Event: activate to sort column ascending"
                                        style="width: 98px;">Event</th>
                                    <th class="sorting" tabindex="0" aria-controls="savedExcList" rowspan="1"
                                        colspan="1" aria-label="People: activate to sort column ascending"
                                        style="width: 98px;">People</th>
                                    <th class="sorting" tabindex="0" aria-controls="savedExcList" rowspan="1"
                                        colspan="1" aria-label="Specific Unit: activate to sort column ascending"
                                        style="width: 98px;">Specific Unit</th>
                                    <th class="sorting" tabindex="0" aria-controls="savedExcList" rowspan="1"
                                        colspan="1" aria-label="Client Group Name: activate to sort column ascending"
                                        style="width: 149px;">Client Group Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="savedExcList" rowspan="1"
                                        colspan="1" aria-label="City: activate to sort column ascending"
                                        style="width: 73px;">City</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action"
                                        style="width: 72px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="line-height:20px; color:#666" role="row" class="odd">
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:100px;"
                                        valign="top" align="left" class="sorting_1">people</td>
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:50px;"
                                        valign="top" align="left">exclusion</td>
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:100px;"
                                        valign="top" align="left"></td>
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:100px;"
                                        valign="top" align="left"></td>
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:100px;"
                                        valign="top" align="left"></td>
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:100px;"
                                        valign="top" align="left"></td>
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:140px;"
                                        valign="top" align="left"></td>
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:80px;"
                                        valign="top" align="left"></td>
                                    <td style="border-bottom:#9B8578 1px solid;padding-left:5px;width:50px;"
                                        valign="top" align="left"><i title="Delete"
                                            class="fa fa-trash fa-2x mr-2 text-danger" aria-hidden="true"
                                            onclick="removeSeries(&quot;38&quot;)"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    </div>
                </div>
            </div>
        </div>
        <script>
            function checkAll_8_0() {
                jQuery('.reportType_8_0').attr('checked', 'checked');
            }

            function uncheckAll_8_0() {
                jQuery('.reportType_8_0').removeAttr('checked');
            }
        </script>
    @stop