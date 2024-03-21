 
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
				<h4 class="card-title">Payroll Report</h4>
			</div>
		
		</div>
	
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="form-validation">
						<form class="needs-validation" novalidate method="get" action="{{ route('payroll_report') }}">
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
											<span class="text-danger"></span>
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
											<span class="text-danger"></span>
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
										<label class="row-lg-4 col-form-label" for="validationCustom05">Contract Type
											<span class="text-danger"></span>
										</label>
										<div class="row-lg-12">
											
                                            <select class="default-select wide form-control" name="contract_type" id="contract_type">
                                                <option value="">{{ __('all') }}</option>
                                                <option value="1" {{ $selected_contract == 1 ? 'selected' : '' }}>Full Time</option>
                                                <option value="2" {{ $selected_contract == 2 ? 'selected' : '' }}>Part Time</option>
                                            </select>
												
												<div class="invalid-feedback">
													Please select a contract type.
												</div>
											
										</div>
									</div>
									<div class="col-lg-2">
										<label class="row-lg-4 col-form-label" for="validationCustom05">Work Shift
											<span class="text-danger"></span>
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
            <a href="{{ route('payroll_report') }}" class="btn btn-info"><i class="fas fa-sync-alt"></i> Refresh</a>

            @if(isset($rows))
            <!--<button type="button" class="btn btn-dark btn-print">-->
            <!--    <i class="fas fa-print"></i> Print-->
            <!--</button>-->
            @endif
        </div>
        
        <div class="card-block">

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
                                    <th>Basic Salary</th>
                                    <th>Earning</th>
                                    <th>Allowance</th>
                                    <th>Deduction</th>
                                    <th>Gross Salary</th>
                                    <th>Tax</th>
                                    <th>Net Salary</th>
                                    <th>Status</th>
                                    <th>Pay Date</th>
                                    <th>Payment Method</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                           <tbody>

                                  @if(isset($rows))
                                    @foreach( $rows as $key => $row)
                                    <tr>
                                        <td>
                                            <a href="#">
                                                #{{ $row->employ->id ?? '' }}
                                            </a>
                                        </td>
                                        <td>{{ $row->employ->first_name ?? '' }} {{ $row->employ->last_name ?? '' }}</td>
                                        <td>
                                            {{ number_format((float)$row->basic_salary, 2) }} $ / 

                                            @if( $row->salary_type == 1 )
                                            Fixed
                                            @elseif( $row->salary_type == 2 )
                                            Hourly
                                            @endif
                                        </td>
                                        <td>{{ number_format((float)$row->total_earning, 2) }} $</td>
                                        <td>{{ number_format((float)$row->total_allowance, 2) }} $</td>
                                        <td>{{ number_format((float)$row->total_deduction, 2) }} $</td>
                                        <td>{{ number_format((float)$row->gross_salary, 2) }} $</td>
                                        <td>{{ number_format((float)$row->tax, 2) }} $</td>
                                        <td>{{ number_format((float)$row->net_salary, 2) }} $</td>
                                        <td>
                                            @if($row->status == 1)
                                            <span class="badge badge-pill badge-success">Paid</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">Unpaid</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($row->status == 1)
                                            {{ date("Y-m-d", strtotime($row->pay_date)) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if( $row->payment_method == 1 )
                                            Card
                                            @elseif( $row->payment_method == 2 )
                                            Cash
                                            @elseif( $row->payment_method == 3 )
                                            Cheque
                                            @elseif( $row->payment_method == 4 )
                                            Bank
                                            @elseif( $row->payment_method == 5 )
                                            E-Wallet
                                            @endif
                                        </td>
                                        <td>{{ $row->note }}</td>
                                    </tr>
                                    @endforeach
                                  @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Grand Total</th>
                                        <th>{{ number_format((float)$rows->sum('total_earning'), 2) }} $</th>
                                        <th>{{ number_format((float)$rows->sum('total_allowance'), 2) }} $</th>
                                        <th>{{ number_format((float)$rows->sum('total_deduction'), 2) }} $</th>
                                        <th>{{ number_format((float)$rows->sum('gross_salary'), 2) }} $</th>
                                        <th>{{ number_format((float)$rows->sum('tax'), 2) }} $</th>
                                        <th>{{ number_format((float)$rows->sum('net_salary'), 2) }} $</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
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