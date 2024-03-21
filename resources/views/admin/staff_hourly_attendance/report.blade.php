 
<!-- Extends template page-->
@extends('admin.layout.header')

<!-- Specify content -->
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-primary alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
    </button>
    <strong>Success!</strong> {{ $message }}
</div>
@endif
<div class="col-lg-12">
	<div class="card dz-card" id="buttons-with-icon">
		<div class="card-header flex-wrap d-flex justify-content-between border-0 ">
			<div>
				<h4 class="card-title">Daily Report</h4>
			</div>
		
		</div>
	
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="form-validation">
						<form class="needs-validation" novalidate method="get" action="{{ route('staff-daily-attendance-report') }}">
						    @csrf
							<div class="row">
								
									<div class="col-lg-2">
										<label class="row-lg-4 col-form-label" for="validationCustom05">Role
											<span class="text-danger">*</span>
										</label>
										<div class="row-lg-12">
											
                                                <select class="default-select wide form-control" name="role" id="role">
                                                    <option value="">{{ __('all') }}
                                                    @foreach( $roles as $role )
                                                    @if($role->slug != 'super-admin')
                                                    <option value="{{ $role->id }}" @if( $selected_role == $role->id) selected @endif>{{ $role->name }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
												
												<div class="invalid-feedback">
													Please select a role.
												</div>
											
										</div>
									</div>
									<div class="col-lg-2">
										<label class="row-lg-4 col-form-label" for="validationCustom05">Department
											<span class="text-danger">*</span>
										</label>
										<div class="row-lg-12">
											
                                            <select class="default-select wide form-control" name="department" id="department">
                                                <option value="">{{ __('all') }}</option>
                                                @foreach( $departments as $department )
                                                <option value="{{ $department->id }}" @if( $selected_department == $department->id) selected @endif>{{ $department->department_name }}</option>
                                                @endforeach
                                            </select>
												
												<div class="invalid-feedback">
													Please select a department.
												</div>
											
										</div>
									</div>
									<div class="col-lg-2">
										<label class="row-lg-4 col-form-label" for="validationCustom05">Designation
											<span class="text-danger">*</span>
										</label>
										<div class="row-lg-12">
											
                                            <select class="default-select wide form-control" name="designation" id="designation">
                                                <option value="">{{ __('all') }}</option>
                                                @foreach( $designations as $designation )
                                                <option value="{{ $designation->id }}" @if( $selected_designation == $designation->id) selected @endif>{{ $designation->designation_name }}</option>
                                                @endforeach
                                            </select>
												
												<div class="invalid-feedback">
													Please select a designation.
												</div>
											
										</div>
									</div>
									<div class="col-lg-2">
										<label class="row-lg-4 col-form-label" for="validationCustom05">Work Shift
											<span class="text-danger">*</span>
										</label>
										<div class="row-lg-12">
											
                                                <select class="default-select wide form-control" name="shift" id="shift">
                                                    <option value="">{{ __('all') }}</option>
                                                    @foreach( $work_shifts as $shift )
                                                    <option value="{{ $shift->id }}" @if( $selected_shift == $shift->id) selected @endif>{{ $shift->title }}</option>
                                                    @endforeach
                                                </select>
												
												<div class="invalid-feedback">
													Please select a work shift.
												</div>
											
										</div>
									</div>
									<div class="col-lg-2">
										<label class="row-lg-4 col-form-label" for="validationCustom05">Month
											<span class="text-danger">*</span>
										</label>
										<div class="row-lg-12">
											
                                                <select class="default-select wide form-control" name="month" id="month" required>
                                                    <option value="1" @if($selected_month == 1) selected @endif>January</option>
                                                    <option value="2" @if($selected_month == 2) selected @endif>February</option>
                                                    <option value="3" @if($selected_month == 3) selected @endif>March</option>
                                                    <option value="4" @if($selected_month == 4) selected @endif>April</option>
                                                    <option value="5" @if($selected_month == 5) selected @endif>May</option>
                                                    <option value="6" @if($selected_month == 6) selected @endif>June</option>
                                                    <option value="7" @if($selected_month == 7) selected @endif>July</option>
                                                    <option value="8" @if($selected_month == 8) selected @endif>August</option>
                                                    <option value="9" @if($selected_month == 9) selected @endif>September</option>
                                                    <option value="10" @if($selected_month == 10) selected @endif>October</option>
                                                    <option value="11" @if($selected_month == 11) selected @endif>November</option>
                                                    <option value="12" @if($selected_month == 12) selected @endif>December</option>
                                                </select>
												
												<div class="invalid-feedback">
													Please select a month.
												</div>
											
										</div>
									</div>
									<div class="col-lg-2">
										<label class="row-lg-4 col-form-label" for="validationCustom05">Year
											<span class="text-danger">*</span>
										</label>
										<div class="row-lg-12">
											
                                                <select class="default-select wide form-control" name="year" id="year" required>
                                                    <option value="{{ date("Y") }}" @if($selected_year == date("Y")) selected @endif>{{ date("Y") }}</option>
                                                    <option value="{{ date("Y") - 1 }}" @if($selected_year == date("Y") - 1) selected @endif>{{ date("Y") - 1 }}</option>
                                                    <option value="{{ date("Y") - 2 }}" @if($selected_year == date("Y") - 2) selected @endif>{{ date("Y") - 2 }}</option>
                                                    <option value="{{ date("Y") - 3 }}" @if($selected_year == date("Y") - 3) selected @endif>{{ date("Y") - 3 }}</option>
                                                    <option value="{{ date("Y") - 4 }}" @if($selected_year == date("Y") - 4) selected @endif>{{ date("Y") - 4 }}</option>
                                                    <option value="{{ date("Y") - 5 }}" @if($selected_year == date("Y") - 5) selected @endif>{{ date("Y") - 5 }}</option>
                                                    <option value="{{ date("Y") - 6 }}" @if($selected_year == date("Y") - 6) selected @endif>{{ date("Y") - 6 }}</option>
                                                    <option value="{{ date("Y") - 7 }}" @if($selected_year == date("Y") - 7) selected @endif>{{ date("Y") - 7 }}</option>
                                                    <option value="{{ date("Y") - 8 }}" @if($selected_year == date("Y") - 8) selected @endif>{{ date("Y") - 8 }}</option>
                                                    <option value="{{ date("Y") - 9 }}" @if($selected_year == date("Y") - 9) selected @endif>{{ date("Y") - 9 }}</option>
                                                </select>
												
												<div class="invalid-feedback">
													Please select a year.
												</div>
											
										</div>
									</div>

									<div class="col-lg-2 pt-4">
										
										<div class="col-lg-8 ms-auto">
											<button type="submit" class="btn btn-primary light"><i class="fas fa-search"></i>  Search</button>
										</div>
									</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Column  -->
<div class="col-xl-12">
    <div class="card dz-card" id="accordion-four">
        @if(isset($rows))
        <div class="card-block m-3">
            <a href="{{ route('staff-daily-attendance-report') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> Refresh</a>

            @if(isset($rows))
            <!--<button type="button" class="btn btn-dark btn-print">-->
            <!--    <i class="fas fa-print"></i> Print-->
            <!--</button>-->
            @endif
        </div>
        
        <div class="card-header">
            <p>Present: <span class="text-primary">P</span> | Absent: <span class="text-danger">A</span> | Leave: <span class="text-success">L</span> | Holiday: <span class="text-warning">H</span></p>
        </div>
        <div class="card-block">
            @php
            $start = $selected_year.'-'.$selected_month.'-01';
            $date = $selected_year.'-'.$selected_month.'-01';
            @endphp
        <!-- /tab-content -->	
        <div class="tab-content" id="myTabContent-3">
            <div class="tab-pane fade show active" id="withoutBorder" role="tabpanel" aria-labelledby="home-tab-3">
                
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="example4" class="display table" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Staff ID</th>
                                    <th>Name</th>
                                    @for($i = 0; $i < \Carbon\Carbon::parse($start)->daysInMonth; ++$i)

                                        <th class='text-center'>
                                            {{ date('d', strtotime($date)) }}
                                        </th>

                                        @php
                                        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
                                        @endphp
                                    @endfor
                                    <th>P</th>
                                    <th>A</th>
                                    <th>L</th>
                                    <th>H</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                           <tbody>
                                  @foreach( $rows as $key => $row )
                                  @php
                                    $atten_date = date("Y-m-d", strtotime($selected_year.'-'.$selected_month.'-01'));
                                  @endphp
                                    <tr>
                                        <td>
                                            <a href="#">
                                                #{{ $row->id }}
                                            </a>
                                        </td>
                                        <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                        @for($i = 0; $i < \Carbon\Carbon::parse($start)->daysInMonth; ++$i)
                                            <td>
                                            @if(isset($attendances))
                                            @foreach($attendances as $attendance)
                                                @if($attendance->employ_id == $row->id && date("Y-m-d", strtotime($attendance->date)) == $atten_date)
                                                @if($attendance->attendance == 1)
                                                <div class="text-primary">P</div>
                                                @elseif($attendance->attendance == 2)
                                                <div class="text-danger">A</div>
                                                @elseif($attendance->attendance == 3)
                                                <div class="text-success">L</div>
                                                @elseif($attendance->attendance == 4)
                                                <div class="text-warning">H</div>
                                                @endif
                                                @endif
                                            @endforeach
                                            @endif

                                            @php
                                            $atten_date = date("Y-m-d", strtotime("+1 day", strtotime($atten_date)));
                                            @endphp
                                            </td>
                                        @endfor
                                        @php
                                            $total_present = 0;
                                            $total_absent = 0;
                                            $total_leave = 0;
                                            $total_holiday = 0;
                                        @endphp
                                        @if(isset($attendances))
                                        @foreach($attendances as $user_attend)
                                        @if($user_attend->employ_id == $row->id)
                                            @if($user_attend->attendance == 1)
                                            @php
                                                $total_present = $total_present + 1;
                                            @endphp
                                            @elseif($user_attend->attendance == 2)
                                            @php
                                                $total_absent = $total_absent + 1;
                                            @endphp
                                            @elseif($user_attend->attendance == 3)
                                            @php
                                                $total_leave = $total_leave + 1;
                                            @endphp
                                            @elseif($user_attend->attendance == 4)
                                            @php
                                                $total_holiday = $total_holiday + 1;
                                            @endphp
                                            @endif
                                        @endif
                                        @endforeach
                                        @endif
                                        <td>{{ $total_present }}</td>
                                        <td>{{ $total_absent }}</td>
                                        <td>{{ $total_leave }}</td>
                                        <td>{{ $total_holiday }}</td>
                                        @php
                                            $total_working_days = $total_present + $total_absent + $total_leave;
                                            if($total_working_days == 0){
                                                $total_working_days = 1;
                                            }
                                        @endphp
                                        <td>{{ round((($total_present / $total_working_days) * 100), 2) }} %</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /tab-content -->	
    </div>
    @endif
    </div>
</div>

<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/print/js/jQuery.print.min.js') }}"></script>

<script>
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
    })()


    $('[name=tab]').each(function (i, d) {
        var p = $(this).prop('checked');
//   console.log(p);
        if (p) {
            $('article').eq(i)
                    .addClass('on');
        }
    });

    $('[name=tab]').on('change', function () {
        var p = $(this).prop('checked');

        // $(type).index(this) == nth-of-type
        var i = $('[name=tab]').index(this);

        $('article').removeClass('on');
        $('article').eq(i).addClass('on');
    });
</script>


<!--print js-->

<!--<script type="text/javascript">-->
<!--    $(function() {-->
<!--      "use strict";-->
<!--      $("html").find('.btn-print').on('click', function() {-->
<!--        $.print(".printable");-->
<!--      });-->
<!--    });-->
<!--    </script>-->

<style>
select.select {
    appearance: revert;
}

</style>




@stop