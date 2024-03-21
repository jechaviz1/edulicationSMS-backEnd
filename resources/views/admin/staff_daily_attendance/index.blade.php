 
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
				<h4 class="card-title">Daily Attendance</h4>
			</div>
		
		</div>
	
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="form-validation">
						<form class="needs-validation" novalidate method="get" action="{{ route('staff-daily-attendance') }}">
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
										<label class="row-lg-4 col-form-label" for="validationCustom05">Date
											<span class="text-danger">*</span>
										</label>
										<div class="row-lg-12">
											
                                                <input type="date" class="form-control date" name="date" id="date" value="{{ $selected_date }}" required>
												
												<div class="invalid-feedback">
													Please select a date.
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
                    <div class="card-block">
                        @if(isset($attendances))
                        @if(count($attendances) > 0)
                        <div class="alert alert-success" role="alert">
                            Attendance Submitted.
                        </div>
                        @else
                        <div class="alert alert-danger" role="alert">
                            Attendance Wasn't Submitted Yet.
                        </div>
                        @endif
                        @endif
                    </div>
                    @endif
                    
                    @if(isset($rows))
                    @if(count($rows) > 0)
                    <div class="card-header">
                        <div class="form-group d-inline">
                            <div class="radio radio-primary d-inline">
                                <input type="radio" name="all_check" id="attendance-p" class="all_present form-check-input present">
                                <label for="attendance-p" class="cr">All Present</label>
                            </div>
                        </div>
                        <div class="form-group d-inline">
                            <div class="radio radio-danger d-inline">
                                <input type="radio" name="all_check" id="attendance-a" class="all_absent form-check-input absent">
                                <label for="attendance-a" class="cr">All Absent</label>
                            </div>
                        </div>
                        <div class="form-group d-inline">
                            <div class="radio radio-success d-inline">
                                <input type="radio" name="all_check" id="attendance-l" class="all_leave form-check-input leave">
                                <label for="attendance-l" class="cr">All Leave</label>
                            </div>
                        </div>
                        <div class="form-group d-inline">
                            <div class="radio radio-warning d-inline">
                                <input type="radio" name="all_check" id="attendance-h" class="all_holiday form-check-input holiday">
                                <label for="attendance-h" class="cr">All Holiday</label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endif
                    
                <form class="needs-validation" novalidate action="{{ route('staff-daily-attendance-store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                        <input type="hidden" name="date" value="{{ $selected_date }}">
                        <input type="hidden" name="attendances" class="attendances" value="">
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
                                    <th>Attendance</th>
                                    <th>Note</th>
                                    <th>Department</th>
                                    <th>Designation</th>
									<th>Work Shift</th>
                                </tr>
                            </thead>
                           <tbody>
                                  @foreach( $rows as $key => $row )
                                    
                                    <tr>
                                        <td>
                                            <input type="hidden" name="users[]" value="{{ $row->id }}">
                                            <a href="#">
                                                #{{ $row->id }}
                                            </a>
                                        </td>
                                        <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                        <td>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-primary d-inline">
                                                    <input class="c-present form-check-input present" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-p-{{ $key }}" value="1" 

                                                    @if(isset($attendances))
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->employ_id == $row->id && $attendance->attendance == 1)
                                                            checked 
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                    required>
                                                    <label for="attendance-p-{{ $key }}" class="cr">Present</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-danger d-inline">
                                                    <input class="c-absent form-check-input absent" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-a-{{ $key }}" value="2" 

                                                    @if(isset($attendances))
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->employ_id == $row->id && $attendance->attendance == 2)
                                                            checked 
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                    required>
                                                    <label for="attendance-a-{{ $key }}" class="cr">Absent</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-success d-inline">
                                                    <input class="c-leave form-check-input leave" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-l-{{ $key }}" value="3" 

                                                    @if(isset($attendances))
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->employ_id == $row->id && $attendance->attendance == 3)
                                                            checked 
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                    required>
                                                    <label for="attendance-l-{{ $key }}" class="cr">Leave</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-inline">
                                                <div class="radio radio-warning d-inline">
                                                    <input class="c-holiday form-check-input holiday" type="radio" data_id="{{ $row->id }}"name="attendances-{{ $key }}" id="attendance-h-{{ $key }}" value="4" 

                                                    @if(isset($attendances))
                                                    @foreach($attendances as $attendance)
                                                        @if($attendance->employ_id == $row->id && $attendance->attendance == 4)
                                                            checked 
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                    required>
                                                    <label for="attendance-h-{{ $key }}" class="cr">Holiday</label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="notes[]" style="width: 100px" id="note-{{ $key }}" 
                                                @if(isset($attendances))
                                                @foreach($attendances as $attendance)
                                                    @if($attendance->employ_id == $row->id)
                                                        value="{{ $attendance->note }}"
                                                    @endif
                                                @endforeach
                                                @endif
                                                placeholder="Note">
                                        </td>
                                        <td>{{ $row->department->department_name ?? '' }}</td>
                                        <td>{{ $row->designation->designation_name ?? '' }}</td>
                                        <td>{{ $row->workShift->title ?? '' }}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /tab-content -->	
            @if(count($rows) > 0)
    <div class="card-footer">
        <button type="submit" class="btn btn-success update"><i class="fas fa-check"></i> Update</button>
    </div>
    @endif
    </form>
@endif
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



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

<script type="text/javascript">
    "use strict";
    $(document).ready(function() {
        $(".update").on('click',function(e){
            var attendances = [];
            $.each($("input[data_id]:checked"), function(){
                attendances.push($(this).val());
            });

            $(".attendances").val( attendances.join(',') );
        });
    });


    // checkbox all-check-button selector
    $(".all_present").on('click',function(e){
        if($(this).is(":checked")){
            // check all checkbox
            $(".c-present").prop('checked', true);
        }
        else if($(this).is(":not(:checked)")){
            // uncheck all checkbox
            $(".c-present").prop('checked', false);
        }
    });
    $(".all_absent").on('click',function(e){
        if($(this).is(":checked")){
            // check all checkbox
            $(".c-absent").prop('checked', true);
        }
        else if($(this).is(":not(:checked)")){
            // uncheck all checkbox
            $(".c-absent").prop('checked', false);
        }
    });
    $(".all_leave").on('click',function(e){
        if($(this).is(":checked")){
            // check all checkbox
            $(".c-leave").prop('checked', true);
        }
        else if($(this).is(":not(:checked)")){
            // uncheck all checkbox
            $(".c-leave").prop('checked', false);
        }
    });
    $(".all_holiday").on('click',function(e){
        if($(this).is(":checked")){
            // check all checkbox
            $(".c-holiday").prop('checked', true);
        }
        else if($(this).is(":not(:checked)")){
            // uncheck all checkbox
            $(".c-holiday").prop('checked', false);
        }
    });
</script>

<style>
select.select {
    appearance: revert;
}
.form-check-input.absent:checked[type="radio"] {
    background-color: #f44236;
    border-color: #f44236;
}
.form-check-input.leave:checked[type="radio"] {
    background-color: #1de9b6;
    border-color: #1de9b6;
}
.form-check-input.holiday:checked[type="radio"] {
    background-color: #f4c22b;
    border-color: #f4c22b;
}
</style>




@stop