<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //
    public function addAttendance(Request $request) {
        $data = [];
        $data['title'] = 'Add Attendance';
        $data['menu_active_tab'] = 'add-attendance';
       
        return view('admin.attendancetype.add')->with($data);
    }


}
