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
use Carbon\Carbon;
use Mail;

class StaffAttendanceController extends Controller {

    public function index(Request $request) {
        $data = [];
        $data['title'] = 'Staff Daily Attendance';
        $data['menu_active_tab'] = 'staff_daily_attendance';
        

        if(!empty($request->role) || $request->role != null){
            $data['selected_role'] = $role = $request->role;
        }
        else{
            $data['selected_role'] = '0';
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

        if(!empty($request->date) || $request->date != null){
            $data['selected_date'] = $date = $request->date;
        }
        else{
            $data['selected_date'] = date("Y-m-d", strtotime(Carbon::today()));
        }


        $data['roles'] = Role::orderBy('name', 'asc')->get();
        $data['departments'] = Department::where('status', '1')->orderBy('department_name', 'asc')->get();
        $data['designations'] = Designation::where('status', '1')->orderBy('designation_name', 'asc')->get();
        $data['work_shifts'] = WorkShiftType::where('status', '1')->orderBy('title', 'asc')->get();


        // Filter Users
        if(!empty($request->role) || !empty($request->department) || !empty($request->designation) || !empty($request->shift) || !empty($request->date)){

            $users = Employee::where('salary_type', '1');

            if(!empty($request->role)){
                $users->with('roles')->whereHas('roles', function ($query) use ($role){
                    $query->where('role_id', $role);
                });
            }
            if(!empty($request->department)){
                $users->where('department_id', $department);
            }
            if(!empty($request->designation)){
                $users->where('designation_id', $designation);
            }
            if(!empty($request->shift)){
                $users->where('work_shift', $shift);
            }

            $data['rows'] = $users->where('status', '1')->orderBy('id', 'asc')->get();
        }


        // Attendances
        if(!empty($request->role) || !empty($request->department) || !empty($request->designation) || !empty($request->shift) || !empty($request->date)){

            $attendances = StaffAttendance::where('date', $date);

            if(!empty($request->role)){
                $attendances->with('employ.roles')->whereHas('employ.roles', function ($query) use ($role){
                    $query->where('role_id', $role);
                });
            }
            if(!empty($request->department)){
                $attendances->with('employ')->whereHas('employ', function ($query) use ($department){
                    $query->where('department_id', $department);
                });
            }
            if(!empty($request->designation)){
                $attendances->with('employ')->whereHas('employ', function ($query) use ($designation){
                    $query->where('designation_id', $designation);
                });
            }
            if(!empty($request->shift)){
                $attendances->with('employ')->whereHas('employ', function ($query) use ($shift){
                    $query->where('work_shift', $shift);
                });
            }

            $data['attendances'] = $attendances->orderBy('id', 'desc')->get();
        }
        
        return view('admin.staff_daily_attendance.index')->with($data);
    }


    public function store(Request $request) {
        // dd($request);
        $rules = [
            'users' => 'required',
            'date' => 'required',
            'attendances' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                

                $date = date("Y-m-d H:i:s", strtotime($request->date));
                $attendances = explode(",",$request->attendances);
        
                // Insert Data
                foreach($request->users as $key =>$user){
                    // Insert Or Update Data
                    $staffAttendance = StaffAttendance::updateOrCreate(
                    [
                        'employ_id' => $request->users[$key], 
                        'date' => $date
                    ],[
                        'employ_id' => $request->users[$key],
                        'date' => $date,
                        'attendance' => $attendances[$key],
                        'note' => $request->notes[$key],
                        'created_by' => Auth::guard('web')->user()->id,
                    ]);
                }
                
                return redirect()->back()->with('success', 'Record Updated successfully.');
            } catch (Exception $e) {
                return redirect()->back->with('failed', 'Record not Updated.');
            }
        }
    }

    public function report(Request $request) {
        $data = [];
        $data['title'] = 'Staff Daily Attendance Report';
        $data['menu_active_tab'] = 'staff-daily-attendance-report';
        

        if(!empty($request->role) || $request->role != null){
            $data['selected_role'] = $role = $request->role;
        }
        else{
            $data['selected_role'] = '0';
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


        $data['roles'] = Role::orderBy('name', 'asc')->get();
        $data['departments'] = Department::where('status', '1')->orderBy('department_name', 'asc')->get();
        $data['designations'] = Designation::where('status', '1')->orderBy('designation_name', 'asc')->get();
        $data['work_shifts'] = WorkShiftType::where('status', '1')->orderBy('title', 'asc')->get();


        // Filter Users
        if(!empty($request->role) || !empty($request->department) || !empty($request->designation) || !empty($request->shift) || !empty($request->month) || !empty($request->year)){

            $users = Employee::where('salary_type', '1');

            if(!empty($request->role)){
                $users->with('roles')->whereHas('roles', function ($query) use ($role){
                    $query->where('role_id', $role);
                });
            }
            if(!empty($request->department)){
                $users->where('department_id', $department);
            }
            if(!empty($request->designation)){
                $users->where('designation_id', $designation);
            }
            if(!empty($request->shift)){
                $users->where('work_shift', $shift);
            }

            $data['rows'] = $users->where('status', '1')->orderBy('id', 'asc')->get();
        }
        

        // Attendances
        if(!empty($request->role) || !empty($request->department) || !empty($request->designation) || !empty($request->shift) || !empty($request->month) || !empty($request->year)){
            
            if(!empty($request->month) && !empty($request->year)){

                $attendances = StaffAttendance::whereYear('date', $year)->whereMonth('date', $month);
            }

            if(!empty($request->role)){
                $attendances->with('employ.roles')->whereHas('employ.roles', function ($query) use ($role){
                    $query->where('role_id', $role);
                });
            }
            if(!empty($request->department)){
                $attendances->with('employ')->whereHas('employ', function ($query) use ($department){
                    $query->where('department_id', $department);
                });
            }
            if(!empty($request->designation)){
                $attendances->with('employ')->whereHas('employ', function ($query) use ($designation){
                    $query->where('designation_id', $designation);
                });
            }
            if(!empty($request->shift)){
                $attendances->with('employ')->whereHas('employ', function ($query) use ($shift){
                    $query->where('work_shift', $shift);
                });
            }

            $data['attendances'] = $attendances->orderBy('id', 'desc')->get();
        }
        

        return view('admin.staff_daily_attendance.report')->with($data);

        

    }

   

}
