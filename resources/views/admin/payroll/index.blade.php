 
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
				<h4 class="card-title">Payroll</h4>
			</div>
		
		</div>
	
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="form-validation">
						<form class="needs-validation" novalidate method="get" action="{{ route('payroll') }}">
						    @csrf
							<div class="row">
								
									<div class="col-lg-2">
										<label class="row-lg-4 col-form-label" for="validationCustom05">Salary Type
											<span class="text-danger">*</span>
										</label>
										<div class="row-lg-12">
											
                                       <select class="default-select wide form-control" name="salary_type" id="salary_type" required>
                                            <option value="">{{ __('select') }}</option>
                                            <option value="1" @if($selected_salary_type == 1) selected @endif>Fixed</option>
                                            <option value="2" @if($selected_salary_type == 2) selected @endif>Hourly</option>
                                        </select>
												
											<div class="invalid-feedback">
												Please select a salary type.
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
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Salary Type</th>
                                    <th>Work Shift</th>
									<th>Status</th>
									<th>Action</th>
                                </tr>
                            </thead>
                          <tbody>
                                  @foreach( $rows as $key => $row )
                                  @if($row->status == 1)
                                    <tr>
                                        <td>
                                            <a href="">
                                                #{{ $row->id }}
                                            </a>
                                        </td>
                                        <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                        <td>{{ $row->department->department_name ?? '' }}</td>
                                        <td>{{ $row->designation->designation_name ?? '' }}</td>
                                        <td>
                                            @if( $row->salary_type == 1 )
                                            Fixed
                                            @elseif( $row->salary_type == 2 )
                                            hourly
                                            @endif
                                        </td>
                                        <td>{{ $row->workShift->title ?? '' }}</td>
                                        @php
                                            $payroll_generate = 0;
                                            $payroll_status = 0;
                                        @endphp
                                        @if(isset($payrolls))
                                        @foreach( $payrolls as $payroll)
                                            @if($payroll->user_id == $row->id)
                                            @php
                                            $payroll_data = $payroll;
                                            $payroll_generate = 1;
                                            if($payroll->status == 1){
                                                $payroll_status = 1;
                                            }
                                            @endphp
                                            @endif
                                        @endforeach
                                        @endif
                                        <td>
                                            @if( $payroll_generate == 1 )
                                            @if($payroll_status == 1)
                                            <span class="badge badge-pill badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-pill badge-primary">Generated</span>
                                            @endif
                                            @else
                                            <span class="badge badge-pill badge-danger">Not Generated</span>
                                            @endif
                                        </td>
                                        <td>
                                        @if( $payroll_generate == 0 )
                                            
                                            <a href="{{ route('payroll_generate', ['id' => $row->id, 'month' => $selected_month, 'year' => $selected_year]) }}" class="btn btn-icon btn-primary btn-sm">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                            
                                        @else

                                            @if(isset($payroll_data))
                                            @if($payroll_status == 0)
                                            
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#payModal-{{ $row->id }}">
                                                <i class="fas fa-money-check"></i> Pay
                                            </button>
                                            <!-- Include Edit modal -->
                                            @include($view.'.pay')
                                            

                                           
                                            <a href="{{ route('payroll_generate', ['id' => $row->id, 'month' => $selected_month, 'year' => $selected_year]) }}" class="btn btn-icon btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                           

                                            @else
                                            
                                            @if(isset($payroll_data))
                                            <a href="#" class="btn btn-icon btn-dark btn-sm" onclick="PopupWin('{{ route('payroll_print', ['id' => $payroll_data->id]) }}', '{{ $title }}', 1000, 600);">
                                                <i class="fas fa-print"></i>
                                            </a>
                                            @endif
                                            

                                           
                                            <button type="button" class="btn btn-icon btn-danger btn-sm" title="{{ __('status_unpaid') }}" data-bs-toggle="modal" data-bs-target="#unpayModal-{{ $row->id }}">
                                                <i class="fas fa-undo"></i>
                                            </button>
                                            <!-- Include Unpay modal -->
                                            @include($view.'.unpay')
                                           
                                            @endif
                                            @endif
                                            
                                        @endif
                                        </td>
                                    </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /tab-content -->	

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
        function PopupWin(pageURL, pageTitle, popupWinWidth, popupWinHeight) {
            var left = (screen.width - popupWinWidth) / 2;
            var top = (screen.height - popupWinHeight) / 4;

            var myWindow = window.open(pageURL, pageTitle, 'resizable=yes, width=' + popupWinWidth + ', height=' + popupWinHeight + ', top=' + top + ', left=' + left);
        };
    </script>


<style>
select.select {
    appearance: revert;
}

</style>




@stop