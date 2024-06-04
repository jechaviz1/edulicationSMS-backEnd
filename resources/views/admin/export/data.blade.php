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
							<tbody><tr><td height="10px" colspan="3">&nbsp;</td></tr>
							<tr>
								<td>
									<table width="100%" border="0">
										<tbody><tr style="height:20px;"><td></td></tr>
										<tr style="height:70px;">
											<td style="font-size:18px"><strong>People</strong> </td>
											<td>
													<button class="btn btn-primary" type="button" onclick="exportData('student', '', '')" fdprocessedid="xyzaff">Export as XML</button>
													<button class="btn btn-primary" type="button" onclick="exportPeopleXLS('student')" fdprocessedid="b3ly6h">Export as XLS</button>
											</td>                            
										</tr>

										<tr style="height:70px;">
											<td width="100" style="font-size:18px"><strong>Schedules</strong></td>
											<td>
												created between <input type="text" name="schedulefrom" id="schedulefrom" value="04 May 2024" class="hasDatepicker" fdprocessedid="lj7ic3">
												&nbsp;&nbsp;&nbsp;and&nbsp;&nbsp;&nbsp;<input type="text" name="scheduleto" id="scheduleto" value="03 June 2024" class="hasDatepicker" fdprocessedid="y32zna">
												<button type="button" class="btn btn-primary" onclick="getDate('schedulefrom','scheduleto');exportData('schedule', 
																	document.getElementById('schedulefrom').value, 
																	document.getElementById('scheduleto').value)" fdprocessedid="ih6a4">Export as XML</button>
														<button type="button" class="btn btn-primary" onclick="getDate('schedulefrom','scheduleto');exportXLS('schedule', 
																	document.getElementById('schedulefrom').value, 
																	document.getElementById('scheduleto').value)" fdprocessedid="4a1um9">Export as XLS</button>
											</td>
											<td></td>
										</tr>

										<tr style="height:70px;">
											<td style="font-size:18px"><strong>Enquiries</strong></td>
											<td>
											created between <input type="text" name="enquiryfrom" id="enquiryfrom" value="04 May 2024" class="hasDatepicker" fdprocessedid="7zpttp">
											&nbsp;&nbsp;&nbsp;and&nbsp;&nbsp;&nbsp;<input type="text" name="enquiryto" id="enquiryto" value="03 June 2024" class="hasDatepicker" fdprocessedid="bx9zo">
											<button type="button" class="btn btn-primary" onclick="getDate('enquiryfrom','enquiryto');exportData('enquiry', document.getElementById('enquiryfrom').value, 
																					document.getElementById('enquiryto').value)" fdprocessedid="n8ucna">Export as XML</button> 
													<button type="button" class="btn btn-primary" onclick="getDate('enquiryfrom','enquiryto');exportXLS('enquiry', document.getElementById('enquiryfrom').value, 
																					document.getElementById('enquiryto').value)" fdprocessedid="xdtged">Export as XLS</button></td>
											<td></td>
										</tr>
										<tr style="height:70px;">
											<td style="font-size:18px"><strong>Enrolments</strong></td>
											<td>
											created between <input type="text" name="enrolmentsfrom" id="enrolmentsfrom" value="04 May 2024" class="hasDatepicker" fdprocessedid="dls2p">
											&nbsp;&nbsp;&nbsp;and&nbsp;&nbsp;&nbsp;<input type="text" name="enrolmentsto" id="enrolmentsto" value="03 June 2024" class="hasDatepicker" fdprocessedid="id1cfr">
											<button type="button" class="btn btn-primary" onclick="getDate('enrolmentsfrom','enrolmentsto');exportData('enrolments', document.getElementById('enrolmentsfrom').value, 
																					document.getElementById('enrolmentsto').value)" fdprocessedid="3wat6b">Export as XML</button>
													<button type="button" class="btn btn-primary" onclick="getDate('enrolmentsfrom','enrolmentsto');exportXLS('enrolments', document.getElementById('enrolmentsfrom').value, 
																					document.getElementById('enrolmentsto').value)" fdprocessedid="raup87">Export as XLS</button></td>
											<td></td>
										</tr>
										<tr style="height:70px;">
											<td style="font-size:18px">&nbsp;</td>
											<td align="left" valign="middle">
											<table>
											<tbody><tr><td>
											Courses starting on / after</td><td> <input type="text" name="coursesfrom" id="coursesfrom" value="04 May 2024" class="hasDatepicker" fdprocessedid="r9oddo"></td><td>
											and finishing on / before</td><td><input type="text" name="coursesto" id="coursesto" value="03 June 2024" class="hasDatepicker" fdprocessedid="od81ur"></td><td>
											<button type="button" class="btn btn-primary" onclick="getDate('coursesfrom','coursesto');exportData('courses', document.getElementById('coursesfrom').value, 
																					document.getElementById('coursesto').value)" fdprocessedid="rps94j">Export as XML</button></td><td>
													<button type="button" class="btn btn-primary" onclick="getDate('coursesfrom','coursesto');exportXLS('courses', document.getElementById('coursesfrom').value, 
																					document.getElementById('coursesto').value)" fdprocessedid="aspjlb">Export as XLS</button></td></tr></tbody></table></td>
													<td></td>
										</tr>
									</tbody></table>
								</td>	
							</tr>
						</tbody></table> 
					</div>
				</div>
            </div>
        </div>



        <script>
        	
            function exportData(table, datefrom, dateto){
                if((datefrom==""&&dateto!="")||(datefrom!=""&&dateto=="")){
                    alert('Please select a valid date range.') ; 
                    return;
                }
                var redirect = "?table="+table;
                if(datefrom!=""&&dateto!=""){	
                    var fromArray = dateFormatConvert(datefrom);
                    var toArray = dateFormatConvert(dateto);
                    var fromDate = fromArray[2]+"-"+fromArray[1]+"-"+fromArray[0];
                    var toDate = toArray[2]+"-"+toArray[1]+"-"+toArray[0];
                    redirect += "&from="+fromDate+"&to="+toDate;
                }
                location.href=redirect;
                
                
            }
            
            </script>
    @stop
    @push('customjs')
   
    @endpush
