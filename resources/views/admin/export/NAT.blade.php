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
                                                        value="" class="input_text1 mt-2"
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
                                                        value="" class="input_text1 mt-3"
                                                        style="width:180px; height:35px; display:none;">

                                                </div>
                                            </td>

                                            <td style="width:auto;">
                                                {{-- <button type="submit" class="btn btn-primary"
                                                    fdprocessedid="6838l">Go</button> --}}
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
    @stop
    @push('scripts')
    <script>
        function startSearchBy(){     
        document.getElementById('searchValue1').style.display="none";
        document.getElementById('searchValueRef1').style.display="none";
        document.getElementById('courseList').style.display="none";        
        document.getElementById('scheduleList').style.display="none";   
        document.getElementById('searchValueName1').style.display="none"; 
          
            document.getElementById('searchValueName1').value='';       
            document.getElementById('searchValueName1').style.display="block";
            jQuery('#tagbox2').tagdragon({'field':'searchValueName1','url':'../widgetFunctions/loadCoursesCode.php','max':'10'});
           
    }
  
    function changeSearchBy(){
        //alert(document.getElementById('searchBy1').value);    
        document.getElementById('searchValue1').value='';
        document.getElementById('searchValueName1').value='';
        document.getElementById('searchValueRef1').value='';
        //new text box for group name
        document.getElementById('searchValueGroup').value='';
        //new text box for city
        document.getElementById('searchCity').value='';
        
        document.getElementById('searchValue1').style.display="none";
        document.getElementById('searchValueName1').style.display="none";
        document.getElementById('searchValueRef1').style.display="none";
        //new text box for group name
        document.getElementById('searchValueGroup').style.display="none";
        //new text box for city
        document.getElementById('searchCity').style.display="none";
        document.getElementById('courseList').style.display="none";   
        document.getElementById('scheduleList').style.display="none";
        
        
        switch(document.getElementById('searchBy1').value)
        {
            case 'course':
                document.getElementById('searchValueName1').style.display="block";            
                
            break;
            case 'client':
                document.getElementById('searchValue1').style.display="block";          
                jQuery('#tagbox2').tagdragon({'field':'searchValue1','url':'../widgetFunctions/loadPeople.php','max':'10'});
            break;
            case 'specificUnit':            
                document.getElementById('searchValueRef1').style.display="block";            
                jQuery('#tagbox2').tagdragon({'field':'searchValueRef1','url':'../widgetFunctions/loadCourseUnitsCode.php','max':'10'});
            break;
            case 'event':
                document.getElementById('courseList').style.display="block";         
                document.getElementById('scheduleList').style.display="block"; 
            break;
            case 'clientGroupName':
                document.getElementById('searchValueGroup').style.display="block";
                jQuery('#tagbox2').tagdragon({'field':'searchValueGroup','url':'../widgetFunctions/loadClientGroupName.php','max':'10'}); 
            break;
            case 'city':
                document.getElementById('searchCity').style.display="block";
                jQuery('#tagbox2').tagdragon({'field':'searchCity','url':'../widgetFunctions/loadCities.php','max':'10'}); 
            break;        
        }     
    }
  
    function loadScheduleList(){
        var courseId = document.getElementById("courseList").value;       
        var url = '../widgetFunctions/loadScheduleList.php';
        var rand = Math.random(9999);
        var pars ='rand='+rand+"&studentId=";    
        if(courseId!="")
            pars += '&courseId='+courseId;
  
            jQuery.ajax({
                type: 'POST',
                url: url,
                data: pars,
                dataType: 'json',
                success: function(response, textStatus, jqXHR) {
                  var newData = response;
  
                  var showInfo = eval(newData);
                  document.getElementById("scheduleList").innerHTML = "";                            
                  for(var i = 0; i<showInfo.length; i++){
                      if(showInfo[i]['courseTypeId']==1)
                          var varItem = new Option(showInfo[i][0]+", "
                                                  +showInfo[i][2]+", "
                                                  +(showInfo[i][5]-showInfo[i][7])
                                                  +" vacancies, "
                                                  +showInfo[i]['courseinitial'], showInfo[i][6]);  
                      else
                          var varItem = new Option(showInfo[i][0]+", "
                                                  +showInfo[i][3]+" to "
                                                  +showInfo[i][4]+", "
                                                  +(showInfo[i][5]-showInfo[i][7])
                                                  +" vacancies, "+showInfo[i]['courseinitial'], showInfo[i][6]);  
                      document.getElementById("scheduleList").options.add(varItem);
                      
                  }
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert("Error while resetting the password " + errorThrown);
                }
            });
            
        // var myAjax = new Ajax.Request( url, {method: 'post', parameters: pars, onComplete: function(originalRequest)
        // {
        //     var newData = originalRequest.responseText;
  
        //     var showInfo = eval(newData);
        //     document.getElementById("scheduleList").innerHTML = "";                            
        //     for(var i = 0; i<showInfo.length; i++){
        //         if(showInfo[i]['courseTypeId']==1)
        //             var varItem = new Option(showInfo[i][0]+", "
        //                                     +showInfo[i][2]+", "
        //                                     +(showInfo[i][5]-showInfo[i][7])
        //                                     +" vacancies, "
        //                                     +showInfo[i]['courseinitial'], showInfo[i][6]);  
        //         else
        //             var varItem = new Option(showInfo[i][0]+", "
        //                                     +showInfo[i][3]+" to "
        //                                     +showInfo[i][4]+", "
        //                                     +(showInfo[i][5]-showInfo[i][7])
        //                                     +" vacancies, "+showInfo[i]['courseinitial'], showInfo[i][6]);  
        //         document.getElementById("scheduleList").options.add(varItem);
                
        //     }
        // }} );
    }
  
    function selectOption(option){
      if(document.getElementById('rtype').value==''){
        var select = document.getElementById("searchBy1");
        if(option=="inclusion"){
          if(select.options.length < 6){
          select.options[select.options.length] = new Option('Client Group Name', 'clientGroupName');
          select.options[select.options.length] = new Option('City', 'city'); 
          } 
        }else{
          if(select.options.length > 4){
            var oOption = select.options[5];
            select.removeChild(oOption);
            var oOption2 = select.options[4];
            select.removeChild(oOption2);
          }
        }
      }
    }
  
    function openInclusionsExclusionsForm(){
        jQuery("#dialog_saveinclusionsexclusions_form").dialog({
            title: 'Name this inclusion/exclusion',
            width: 435,
            height: 380,
            modal: true
        });    
    }
  
    function closeInclusionsExclusionsForm(){
      jQuery("#dialog_saveinclusionsexclusions_form").dialog("destroy"); 
    }
  
    function saveInclusionsExclusions(){
      //alert("");
      var title = document.getElementById("inclusionexclusionTitle").value;
      var radioLength = document.getElementsByName("ReportType").length;
      var type = '';
      for(var i = 0; i < radioLength; i++) {
        if(document.getElementsByName("ReportType")[i].checked) {
          var type = document.getElementsByName("ReportType")[i].value;
        }
      }
      
      var url = '../widgetFunctions/saveInclusionsExclusions.php';
      var rand = Math.random(9999);
      var pars = 'rand='+rand;
      pars += '&companyId=379';
      pars += '&type='+type;
      pars += '&title='+title;
      pars += '&course='+arguments[0];
      pars += '&event='+arguments[1];
      pars += '&people='+arguments[2];
      pars += '&unit='+arguments[3];
      pars += '&clientgroupname='+arguments[4];
      pars += '&city='+arguments[5];

      jQuery.ajax({
              type: 'POST',
              url: url,
              data: pars,
              dataType: 'html',
              success: function(response, textStatus, jqXHR) {
              if(response=="Success"){
                  alert("The "+type+" has been saved successfully.");
                  location.href='manageexclusioninclusion.php';
                }else{
                  alert("Error! The "+type+" could not be saved.");
                  return false;
                }
              },
              error: function(xhr, textStatus, errorThrown) {
                      alert("Error" + errorThrown);
                  }
              });
    }
  
    function removeSeries(){
      var url = "../function/removeSavedInclusionsExclusions.php";
      var Id = arguments[0];
      var companyId = '379';
      var rand = Math.random(9999);
  
      var pars = 'Id='+Id+'&companyId='+companyId+'&rand='+rand;
      //alert(pars);
      if(confirm("Are you sure you want to delete this saved inclusion/exclusion?" )){
  
        jQuery.ajax({
              type: 'POST',
              url: url,
              data: pars,
              dataType: 'html',
              success: function(response, textStatus, jqXHR) {
          location.href='manageexclusioninclusion.php';	
              },
              error: function(xhr, textStatus, errorThrown) {
                      alert("Error" + errorThrown);
                  }
              });
      }
    }
  
    jQuery(function(){
        startSearchBy();       
        jQuery('#reports_tab').tabs({selected:1});
    });
  
    jQuery("#savedExcList").DataTable({
                  "columnDefs": [
                      {"orderable": false, "targets": [8]},
                  ],
                  "searching": false,
                  "lengthMenu": [10, 20, 50]
              });
  
    jQuery("#createSeriesList").DataTable({
                  "columnDefs": [
                      {"orderable": false, "targets": [3]},
                  ],
                  "searching": false,
                  "lengthMenu": [10, 20, 50]
              });
          </script>
          <script>
        $(document).ready(function(){
    function performSearch() {
        // Get the search input value
        var query = $('#searchInput').val();
        // Get the selected value
        var searchBy = $('#searchBy1').val();

        // Make sure the input is not empty
        if(query.length > 0){
            $.ajax({
                url: '/api/courseload', // URL to send the request to
                method: 'GET', // HTTP method to use for the request
                data: { 
                    q: query,
                    searchBy: searchBy // Include the selected value in the request
                },
                success: function(response){
                    // Handle the response here
                    var results = response.items; // Assuming response.items contains the search results
                    var html = '';

                    // Loop through the results and build the HTML
                    results.forEach(function(item){
                        html += '<p>' + item.name + '</p>';
                    });

                    // Insert the results into the #results div
                    $('#results').html(html);
                },
                error: function(xhr, status, error){
                    // Handle errors here
                    console.log(error);
                }
            });
        } else {
            // Clear the results if the input is empty
            $('#results').html('');
        }
    }

    // Handle the click event on the search button
    $('#searchButton').on('click', function(){
        performSearch();
    });
        
    // Optionally, you can also trigger the search on pressing Enter in the input field
    $('#searchInput').on('keypress', function(e){
        if(e.which == 13) { // Enter key pressed
            performSearch();
        }
    });
});
          </script>
    @endpush