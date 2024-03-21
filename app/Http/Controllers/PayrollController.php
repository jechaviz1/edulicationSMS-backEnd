<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\WorkShiftType;
use App\Models\Designation;
use App\Models\Department;
use App\Models\StaffAttendance;
use App\Models\Employee;
use App\Models\FeesReceipt;
use App\Models\Payroll;
use App\Models\TaxSetting;
use App\Models\PayrollDetail;
use App\Models\StudentEnroll;
use App\Models\Transaction;
use Carbon\Carbon;
use Mail;
use DB;

class PayrollController extends Controller {

    public function index(Request $request) {
        $data = [];
        $data['title'] = 'Payroll';
        $data['menu_active_tab'] = 'payroll';
        $data['view'] = 'admin.payroll';
        

        if(!empty($request->salary_type) || $request->salary_type != null){
            $data['selected_salary_type'] = $salary_type = $request->salary_type;
        }
        else{
            $data['selected_salary_type'] = '0';
        }

        if(!empty($request->department) || $request->department != null){
            $data['selected_department'] = $department = $request->department;
        }
        else{
            $data['selected_department'] = '0';
        }

        if(!empty($request->designation) || $request->designation != null){
            $data['selected_designation'] = $designation = $request->designation;
        }
        else{
            $data['selected_designation'] = '0';
        }

        if(!empty($request->month) || $request->month != null){
            $data['selected_month'] = $month = $request->month;
        }
        else{
            $data['selected_month'] = date("m", strtotime(Carbon::today()));
        }

        if(!empty($request->year) || $request->year != null){
            $data['selected_year'] = $year = $request->year;
        }
        else{
            $data['selected_year'] = date("Y", strtotime(Carbon::today()));
        }


        $data['departments'] = Department::where('status', '1')->orderBy('department_name', 'asc')->get();
        $data['designations'] = Designation::where('status', '1')->orderBy('designation_name', 'asc')->get();
        $data['print'] = FeesReceipt::where('slug', 'pay-slip')->first();


        // Filter Users
        if($request->salary_type){

            $users = Employee::where('status', '1');

            if(!empty($request->salary_type)){
                $users->where('salary_type', $salary_type);
            }
            if(!empty($request->department)){
                $users->where('department_id', $department);
            }
            if(!empty($request->designation)){
                $users->where('designation_id', $designation);
            }
            $data['rows'] = $users->orderBy('id', 'asc')->get();
        }


        // Filter Payrolls
        if(!empty($request->month) && !empty($request->year)){

            $payrolls = Payroll::whereYear('salary_month', $year)
                ->whereMonth('salary_month', $month);

            if(!empty($request->salary_type)){
                $payrolls->where('salary_type', $salary_type);
            }
            if(!empty($request->department)){
                $payrolls->with('user')->whereHas('user', function ($query) use ($department){
                    $query->where('department_id', $department);
                });
            }
            if(!empty($request->designation)){
                $payrolls->with('user')->whereHas('user', function ($query) use ($designation){
                    $query->where('designation_id', $designation);
                });
            }

            $data['payrolls'] = $payrolls->orderBy('id', 'asc')->get();
        }
        
        return view('admin.payroll.index')->with($data);
    }
    
    public function generate($id, $month, $year) {
        $data = [];
        $data['title'] = 'Payroll Generate';
        $data['menu_active_tab'] = 'payroll_generate';
        

        $data['selected_month'] = $month;
        $data['selected_year'] = $year;

        $user = $data['row'] = Employee::where('id', $id)->where('status', '1')->firstOrFail();

        // Filter Payroll
        $data['payroll'] = $payroll = Payroll::where('user_id', $id)
                        ->whereYear('salary_month', $year)
                        ->whereMonth('salary_month', $month)
                        ->first();

        // Update Validation
        if(isset($payroll) && $payroll->status == 1){
            return redirect()->back();
        }

        // Attendances 
        if($user->salary_type == 1){
        $data['attendances'] = StaffAttendance::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();
        }
        if($user->salary_type == 2){
        $data['attendances'] = StaffHourlyAttendance::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get(); 
        }

        $data['total_days'] = Carbon::createFromDate($year, $month, 1)->daysInMonth;

        $data['taxs'] = TaxSetting::where('status', '1')->get();

        return view('admin.payroll.generate')->with($data);
    }


    public function store(Request $request) {
        
        $rules = [
            'user_id' => 'required',
            'basic_salary' => 'required',
            'total_earning' => 'required',
            'total_allowance' => 'required',
            'total_deduction' => 'required',
            'gross_salary' => 'required',
            'tax' => 'required',
            'net_salary' => 'required',
            'salary_month' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                

            DB::beginTransaction();

            // Insert Or Update Data
                $payroll = Payroll::updateOrCreate(
                    [
                        'user_id' => $request->user_id,
                        'salary_month' => $request->salary_month
                    ],
                    [
                        'user_id' => $request->user_id,
                        'basic_salary' => $request->basic_salary,
                        'salary_type' => $request->salary_type,
                        'total_earning' => $request->total_earning,
                        'total_allowance' => $request->total_allowance,
                        'bonus' => '0',
                        'total_deduction' => $request->total_deduction,
                        'gross_salary' => $request->gross_salary,
                        'tax' => $request->tax,
                        'net_salary' => $request->net_salary,
                        'salary_month' => $request->salary_month,
                        'status' => '0',
                        'created_by' => Auth::guard('web')->user()->id
                    ]
                );
    
    
                // Remove Old Details
                PayrollDetail::where('payroll_id', $payroll->id)->delete();
    
                // Payroll Allowances
                if(is_array($request->allowances)){
                foreach($request->allowances as $key =>$allowance){
                    if($allowance != '' && $allowance != null){
                    // Insert Data
                    $allowance = new PayrollDetail;
                    $allowance->payroll_id = $payroll->id;
                    $allowance->title = $request->allowance_titles[$key];
                    $allowance->amount = $request->allowances[$key];
                    $allowance->status = '1';
                    $allowance->save();
                    }
                }}
    
                // Payroll Deductions
                if(is_array($request->deductions)){
                foreach($request->deductions as $key =>$deduction){
                    if($deduction != '' && $deduction != null){
                    // Insert Data
                    $deduction = new PayrollDetail;
                    $deduction->payroll_id = $payroll->id;
                    $deduction->title = $request->deduction_titles[$key];
                    $deduction->amount = $request->deductions[$key];
                    $deduction->status = '0';
                    $deduction->save();
                    }
                }}
    
                DB::commit();
                
                return redirect()->route('payroll')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('payroll')->with('error', 'Record not added.');
            }
        }
    }
    
    public function pay(Request $request, $id) {
        $rules = [
            'pay_date' => 'required',
            'payment_method' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                
                // Update Data
                $payroll = Payroll::findOrFail($id);
                $payroll->pay_date = $request->pay_date;
                $payroll->payment_method = $request->payment_method;
                $payroll->note = $request->note;
                $payroll->status = '1';
                $payroll->updated_by = Auth::guard('web')->user()->id;
                $payroll->save();
        
        
                // Transaction
                $transaction = new Transaction;
                $transaction->transactionable_id = '1';
                $transaction->transaction_id = Str::random(16);
                $transaction->transactionable_type = 'App\Models\Employee';
                $transaction->amount = $payroll->net_salary;
                $transaction->type = '2';
                $transaction->created_by = Auth::guard('web')->user()->id;
                $transaction->save();
                // dd($transaction);
        
                
            
                
                return redirect()->back()->with('success', 'pay successfully.');
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Record not update .');
            }
        }

        return view('admin.payroll.generate')->with($data);
    }
    
    public function unpay(Request $request, $id)
    {
        // Update Data
        $payroll = Payroll::findOrFail($id);
        $payroll->pay_date = null;
        $payroll->payment_method = null;
        $payroll->status = '0';
        $payroll->updated_by = Auth::guard('web')->user()->id;
        $payroll->save();


        // Transaction
        $transaction = new Transaction;
        $transaction->transactionable_id = '1';
        $transaction->transaction_id = Str::random(16);
        $transaction->transactionable_type = 'App\Models\Employee';
        $transaction->amount = $payroll->net_salary;
        $transaction->type = '1';
        $transaction->created_by = Auth::guard('web')->user()->id;
        $transaction->save();

        
        return redirect()->back()->with('success', 'Unpay successfully.');
        
    }
    public function print($id)
    {
        $data['title'] = trans_choice('module_fees_report', 1);

        $data['path'] = 'print-setting';
        
        // View
        $data['print'] = FeesReceipt::where('slug', 'pay-slip')->firstOrFail();
        $data['row'] = Payroll::findOrFail($id);


        return view('admin.payroll.print')->with($data);
        
    }
    
    public function report(Request $request) {
        $data = [];
        $data['title'] = 'Payroll Report';
        $data['menu_active_tab'] = 'payroll-report';
        

         if(!empty($request->salary_type) || $request->salary_type != null){
            $data['selected_salary_type'] = $salary_type = $request->salary_type;
        }
        else{
            $data['selected_salary_type'] = '0';
        }

        if(!empty($request->department) || $request->department != null){
            $data['selected_department'] = $department = $request->department;
        }
        else{
            $data['selected_department'] = '0';
        }

        if(!empty($request->designation) || $request->designation != null){
            $data['selected_designation'] = $designation = $request->designation;
        }
        else{
            $data['selected_designation'] = '0';
        }

        if(!empty($request->shift) || $request->shift != null){
            $data['selected_shift'] = $shift = $request->shift;
        }
        else{
            $data['selected_shift'] = '0';
        }

        if(!empty($request->contract_type) || $request->contract_type != null){
            $data['selected_contract'] = $contract_type = $request->contract_type;
        }
        else{
            $data['selected_contract'] = '0';
        }

        if(!empty($request->month) || $request->month != null){
            $data['selected_month'] = $month = $request->month;
        }
        else{
            $data['selected_month'] = date("m", strtotime(Carbon::today()));
        }

        if(!empty($request->year) || $request->year != null){
            $data['selected_year'] = $year = $request->year;
        }
        else{
            $data['selected_year'] = date("Y", strtotime(Carbon::today()));
        }


        $data['departments'] = Department::where('status', '1')->orderBy('department_name', 'asc')->get();
        $data['designations'] = Designation::where('status', '1')->orderBy('designation_name', 'asc')->get();
        $data['work_shifts'] = WorkShiftType::where('status', '1')->orderBy('title', 'asc')->get();
        $data['print'] = FeesReceipt::where('slug', 'pay-slip')->first();


        // Filter Payrolls
        if(!empty($request->month) && !empty($request->year)){

            $payrolls = Payroll::whereYear('salary_month', $year)->whereMonth('salary_month', $month);

            if(!empty($request->salary_type)){
                $payrolls->where('salary_type', $salary_type);
            }
            if(!empty($request->department)){
                $payrolls->with('employ')->whereHas('employ', function ($query) use ($department){
                    $query->where('department_id', $department);
                });
            }
            if(!empty($request->designation)){
                $payrolls->with('employ')->whereHas('employ', function ($query) use ($designation){
                    $query->where('designation_id', $designation);
                });
            }
            if(!empty($request->shift)){
                $payrolls->with('employ')->whereHas('employ', function ($query) use ($shift){
                    $query->where('work_shift', $shift);
                });
            }
            if(!empty($request->contract_type)){
                $payrolls->with('employ')->whereHas('employ', function ($query) use ($contract_type){
                    $query->where('contract_type', $contract_type);
                });
            }

            $data['rows'] = $payrolls->orderBy('id', 'asc')->get();
        }                


        return view('admin.payroll.report')->with($data);

        

    }

   

}
