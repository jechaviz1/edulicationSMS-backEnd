 
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
				<h4 class="card-title">Generate Payroll</h4>
			</div>
		
		</div>
	
		<div class="row">
			<div class="col-lg-12">
				<div class="card-body">
					<div class="form-validation">
						
                    <div class="card-block mb-3">
                        <a href="{{ route('payroll') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>

                        <a href="{{ route('payroll_generate', ['id' => $row->id, 'month' => $selected_month, 'year' => $selected_year]) }}" class="btn btn-info"><i class="fas fa-sync-alt"></i>Refresh</a>
                    </div>

                    @php
                    $paid_leave = \App\Models\Leave::paid_leave($row->id, $selected_month, $selected_year);
                    $unpaid_leave = \App\Models\Leave::unpaid_leave($row->id, $selected_month, $selected_year);

                    $present = $attendances->where('attendance', 1)->where('employ_id', $row->id)->count();
                    $absent = $attendances->where('attendance', 2)->where('employ_id', $row->id)->count();
                    $leave = $attendances->where('attendance', 3)->where('employ_id', $row->id)->count();
                    $holiday = $attendances->where('attendance', 4)->where('employ_id', $row->id)->count();


                    $payable_days = $present + $holiday + $paid_leave;

                    $unpayable_days = $absent + $unpaid_leave;

                    if($row->salary != null || $row->salary != ''){
                        $basic_salary = $row->salary;
                    }else{
                        $basic_salary = 0;
                    }

                    if($row->salary_type == 1){
                        $per_day_salary = $basic_salary / $total_days;
                        
                        $total_earning = $per_day_salary * $payable_days;

                        $deduction_salary = $per_day_salary * $unpayable_days;
                    }

                    if($row->salary_type == 2){
                        $total_earning = $basic_salary * $payable_days;

                        $deduction_salary = $basic_salary * $unpayable_days;
                    }

                    $total_allowance = round($payroll->total_allowance ?? 0);
                    $bonus = round($payroll->bonus ?? 0);
                    $total_deduction = round($payroll->total_deduction ?? 0);

                    $gross_salary = round($total_earning + $total_allowance + $bonus) - round($total_deduction);
                    $tax_amount = 0;

                    if(isset($payroll) && round($total_earning) == round($payroll->total_earning)){  
                        $tax_amount = round($payroll->tax ?? 0);
                    }
                    else{
                        if(isset($taxs)){
                        foreach($taxs as $tax){
                            if($tax->min_amount <= $gross_salary && $tax->max_amount >= $gross_salary){
                                $taxable_amount = $gross_salary - $tax->max_no_taxable_amount;

                                $tax_amount = ($taxable_amount / 100) * $tax->percentange;
                            }
                        }}
                    }

                    $net_salary = round($gross_salary - $tax_amount);
                    @endphp

                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
                                <p><mark class="text-primary">Staff ID:</mark> #{{ $row->id }}</p>
                                <p><mark class="text-primary">Name:</mark> {{ $row->first_name }} {{ $row->last_name }}</p>
                                <p><mark class="text-primary">Department:</mark> {{ $row->department->department_name ?? '' }}</p>
                                <p><mark class="text-primary">Designation:</mark> {{ $row->designation->designation_name ?? '' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><mark class="text-primary">Contract Type:</mark> 
                                    @if( $row->contract_type == 1 )
                                    Full Time
                                    @elseif( $row->contract_type == 2 )
                                    Part Time
                                    @endif
                                </p>

                                <p><mark class="text-primary">Work Shift:</mark> 
                                    {{ $row->workShift->title ?? '' }}
                                </p>

                                <p><mark class="text-primary">Salary Type:</mark> 
                                    @if( $row->salary_type == 1 )
                                    Fixed
                                    @elseif( $row->salary_type == 2 )
                                    Hourly
                                    @endif
                                </p>

                                <p><mark class="text-primary">Basic Salary: </mark>{{ round($row->salary, 2) }} $</p>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <p>Attendance: {{ date("F - Y", strtotime($selected_year.'-'.$selected_month.'-01')) }}</p>
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Leave</th>
                                            <th>Paid Leave</th>
                                            <th>Unpaid Leave</th>
                                            <th>Holiday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $present }}</td>
                                            <td>{{ $absent }}</td>
                                            <td>{{ $leave }}</td>
                                            <td>{{ $paid_leave }}</td>
                                            <td>{{ $unpaid_leave }}</td>
                                            <td>{{ $holiday }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
					</div>
					
					
					
			<form class="needs-validation" novalidate action="{{ route('payroll_generete_store') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <input type="hidden" name="user_id" value="{{ $row->id }}">
                    <input type="hidden" name="basic_salary" value="{{ round($basic_salary, 2) }}">
                    <input type="hidden" name="salary_type" value="{{ $row->salary_type }}">
                    <input type="hidden" name="salary_month" value="{{ date("Y-m-d", strtotime($selected_year.'-'.$selected_month.'-01')) }}">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-4">
                            
                                <div class="card-header">
                                    <h5>Allowance</h5>
                                    <button id="addAllowance" type="button" class="btn btn-info btn-sm btn-icon"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="card-block">
                                    @isset($payroll)
                                    @foreach($payroll->details->where('status', 1) as $detail)
                                    <div id="allowanceFormField" class="row">
                                        
                                        <div class="form-group col-md-5">
                                            <label for="title" class="form-label">Title <span>*</span></label>
                                            <input type="text" class="form-control" name="allowance_titles[]" id="title" value="{{ $detail->title }}" required>

                                            <div class="invalid-feedback">please enter title</div>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="allowance" class="form-label">Amount $ <span>*</span></label>
                                            <input type="text" class="form-control allowance" name="allowances[]" id="allowance" value="{{ round($detail->amount) }}" data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})" required>


                                            <div class="invalid-feedback">please enter amount</div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button id="removeAllowance" type="button" class="btn btn-danger btn-sm btn-icon btn-filter"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endisset

                                    <div id="newAllowance" class="clearfix"></div>
                                </div>
                         
                        </div>
                        <div class="col-md-4">
                            
                                <div class="card-header">
                                    <h5>Deduction</h5>
                                    <button id="addDeduction" type="button" class="btn btn-info btn-sm btn-icon"><i class="fas fa-plus"></i></button>
                                </div>
                                <div class="card-block">
                                    @isset($payroll)
                                    @foreach($payroll->details->where('status', 0) as $detail)
                                    <div id="deductionFormField" class="row">
                                        <div class="form-group col-md-6">
                                            <label for="title" class="form-label">Title <span>*</span></label>

                                            <input type="text" class="form-control" name="deduction_titles[]" id="title" value="{{ $detail->title }}" required>

                                            <div class="invalid-feedback">please enter title</div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="deduction" class="form-label">Amount $ <span>*</span></label>

                                            <input type="text" class="form-control deduction" name="deductions[]" id="deduction" value="{{ round($detail->amount) }}" data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})" required>

                                            <div class="invalid-feedback">please enter amount</div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button id="removeDeduction" type="button" class="btn btn-danger btn-sm btn-icon btn-filter"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endisset

                                    <div id="newDeduction" class="clearfix"></div>
                                </div>
                            
                        </div>
                        <div class="col-md-4">
                            
                                <div class="card-header">
                                    <h5>Calculate</h5>
                                    <button type="button" class="btn btn-info btn-sm btn-icon" data_id="add-{{ $row->id }}" onclick="salaryCalculator('add', {{ $row->id }})"><i class="fa-solid fa-arrows-rotate"></i></button>
                                </div>
                                <div class="card-block">
                                    <div class="form-group">
                                        <label for="total_earning">Earning $ <span>*</span></label>
                                        <input type="text" class="form-control" name="total_earning" id="total_earning" value="{{ round($total_earning, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          please enter earning
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="total_allowance">Allowance $ <span>*</span></label>
                                        <input type="text" class="form-control" name="total_allowance" id="total_allowance" value="{{ round($total_allowance, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          please enter allowance
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="total_deduction">Deduction $ <span>*</span></label>
                                        <input type="text" class="form-control" name="total_deduction" id="total_deduction" value="{{ round($total_deduction, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          please enter deduction
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="gross_salary">Gross Salary $ <span>*</span></label>
                                        <input type="text" class="form-control" name="gross_salary" id="gross_salary" value="{{ round($gross_salary, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          please enter gross salary
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tax">Tax $ <span>*</span></label>
                                        <input type="text" class="form-control" name="tax" id="tax" value="{{ round($tax_amount, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          please enter tax
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="net_salary">Net Salary $ <span>*</span></label>
                                        <input type="text" class="form-control" name="net_salary" id="net_salary" value="{{ round($net_salary, 0) }}" readonly required data_id="add-{{ $row->id }}" onkeyup="salaryCalculator('add', {{ $row->id }})">

                                        <div class="invalid-feedback">
                                          please enter net salary
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Save</button>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </form>
					
					
					
					
					
					
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Column  -->



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
    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addAllowance', function () {
            var html = '';
            html += '<div id="allowanceFormField" class="row">';
            html += '<div class="form-group col-md-5"><label for="title" class="form-label">Title <span>*</span></label><input type="text" class="form-control" name="allowance_titles[]" id="title" value="{{ old('title') }}" required><div class="invalid-feedback">please enter title</div></div>';
            html += '<div class="form-group col-md-5"><label for="allowance" class="form-label">Amount $ <span>*</span></label><input type="text" class="form-control allowance" name="allowances[]" id="allowance" value="{{ old('allowance') }}" data_id="add-{{ $row->id }}" onkeyup="salaryCalculator("add", {{ $row->id }})" required><div class="invalid-feedback">please enter amount</div></div>';
            html += '<div class="form-group col-md-2"><button id="removeAllowance" type="button" class="btn btn-danger btn-sm btn-icon btn-filter"><i class="fas fa-trash-alt"></i></button></div>';
            html += '</div>';

            $('#newAllowance').append(html);
        });

        // remove Field
        $(document).on('click', '#removeAllowance', function () {
            $(this).closest('#allowanceFormField').remove();
        });
    }(jQuery));

    (function ($) {
        "use strict";
        // add Field
        $(document).on('click', '#addDeduction', function () {
            var html = '';
            html += '<div id="deductionFormField" class="row">';
            html += '<div class="form-group col-md-5"><label for="title" class="form-label">Title <span>*</span></label><input type="text" class="form-control" name="deduction_titles[]" id="title" value="{{ old('title') }}" required><div class="invalid-feedback">please enter title</div></div>';
            html += '<div class="form-group col-md-5"><label for="deduction" class="form-label">Amount $ <span>*</span></label><input type="text" class="form-control deduction" name="deductions[]" id="deduction" value="{{ old('deduction') }}" data_id="add-{{ $row->id }}" onkeyup="salaryCalculator("add", {{ $row->id }})" required><div class="invalid-feedback">please enter amount</div></div>';
            html += '<div class="form-group col-md-2"><button id="removeDeduction" type="button" class="btn btn-danger btn-sm btn-icon btn-filter"><i class="fas fa-trash-alt"></i></button></div>';
            html += '</div>';

            $('#newDeduction').append(html);
        });

        // remove Field
        $(document).on('click', '#removeDeduction', function () {
            $(this).closest('#deductionFormField').remove();
        });
    }(jQuery));
    </script>


    <script type="text/javascript">
    "use strict";
    function salaryCalculator(type, id) {

        // Cal Allowance Sum
        var allowance_sum = 0;
        $("#allowanceFormField .allowance").each(function () {
          var get_allowance_value = $(this).val();
          if ($.isNumeric(get_allowance_value)) {
            allowance_sum += parseFloat(get_allowance_value);
          }
        });

        // Cal Deduction Sum
        var deduction_sum = 0;
        $("#deductionFormField .deduction").each(function () {
          var get_deduction_value = $(this).val();
          if ($.isNumeric(get_deduction_value)) {
            deduction_sum += parseFloat(get_deduction_value);
          }
        });


      // Get Data
      var total_earning = $("input[name='total_earning'][data_id='"+type+"-"+id+"']").val();
      var total_allowance = $("input[name='total_allowance'][data_id='"+type+"-"+id+"']").val();
      var total_deduction = $("input[name='total_deduction'][data_id='"+type+"-"+id+"']").val();
      var gross_salary = $("input[name='gross_salary'][data_id='"+type+"-"+id+"']").val();
      var tax_amount = $("input[name='tax'][data_id='"+type+"-"+id+"']").val();
      var net_salary = $("input[name='net_salary'][data_id='"+type+"-"+id+"']").val();

      // Valid Data
      if (isNaN(allowance_sum)) allowance_sum = 0;
      if (isNaN(deduction_sum)) deduction_sum = 0;

      // Total Gross
      var total_gross = (parseFloat(total_earning) + parseFloat(allowance_sum)) - parseFloat(deduction_sum);

        // Calculate Tax
        @php
        if(isset($taxs)){
        foreach($taxs as $key =>$value){
            $taxs[$key] = json_decode(json_encode($value));
        }
        @endphp

        var taxs = <?php echo json_encode($taxs); ?>;

        var i;
        for (i = 0; i < taxs.length; ++i) {
            if(taxs[i]['min_amount'] <= total_gross && taxs[i]['max_amount'] >= total_gross){

                var taxable_amount = total_gross - taxs[i]['max_no_taxable_amount'];

                var tax_amount = (taxable_amount / 100) * taxs[i]['percentange'];
            }
        }
        @php } @endphp
        

      // Net Total
      var net_total = parseFloat(total_gross) - parseFloat(tax_amount);

      // Pass Data
      $("input[name='total_allowance'][data_id='"+type+"-"+id+"']").val(Math.ceil(allowance_sum));
      $("input[name='total_deduction'][data_id='"+type+"-"+id+"']").val(Math.ceil(deduction_sum));
      $("input[name='gross_salary'][data_id='"+type+"-"+id+"']").val(Math.ceil(total_gross));
      $("input[name='tax'][data_id='"+type+"-"+id+"']").val(Math.ceil(tax_amount));
      $("input[name='net_salary'][data_id='"+type+"-"+id+"']").val(Math.ceil(net_total));
    }
    </script>


<style>
select.select {
    appearance: revert;
}
#removeAllowance {
    margin-top: 30px;
}
#removeDeduction {
    margin-top: 30px;
}
.form-group {
    margin-top: 9px;
}
</style>




@stop