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
use Mail;

class StudentController extends Controller {

    public function dashboard() {
        $data = [];
        $data['title'] = 'Dashboard';
        $data['menu_active_tab'] = 'dashboard';
        return view('admin.dashboard')->with($data);
    }

    public function registerStudent() {
        $data = [];
        $data['title'] = 'Register Student List';
        $data['menu_active_tab'] = 'user-list';
        $data['student'] = \App\Models\Student::orderBy('id', 'DESC')->get();

        return view('admin.student.list')->with($data);
    }

    public function studentList() {
        $data = [];
        $data['title'] = 'Register Student List';
        $data['menu_active_tab'] = 'user-list';
        $data['student'] = \App\Models\Student::orderBy('id', 'DESC')->get();

        return view('admin.student.list')->with($data);
    }

    public function addStudent(Request $request) {
        $data = [];
        $data['title'] = 'Add User';
        $data['menu_active_tab'] = 'add-user';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();

        return view('admin.student.add')->with($data);
    }

    public function storeStudent(Request $request) {
        $this->validate($request, [
            'first_name' => 'required|string|min:1|max:255',
//            'city_name' => 'required|string|min:3|max:255',
//            'email' => 'required|string|email|max:255'
        ]);
        $data = $request->input();
        try {
            $student = new \App\Models\Student();
            $student->first_name = $data['first_name'];
            $student->middle_name = $data['middle_name'];
            $student->last_name = $data['last_name'];
            $student->gender = $data['gender'];
            $student->contact_no = $data['contact_no'];
            $student->emergency_contact_no = $data['emergency_contact_no'];
            $student->address = $data['address'];
            $student->nationality = $data['nationality'];
            $student->date_of_birth = $data['date_of_birth'];
            $student->save();
            return redirect()->route('student-list')->with('success', 'Record added successfully.');
        } catch (Exception $e) {
            return redirect()->route('student-list')->with('failed', 'Record not added.');
        }
    }

    public function editStudent(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Student';
        $data['menu_active_tab'] = 'student-list';
        if ($id) {
            $student = \App\Models\Student::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($student) {
                $data['student'] = $student;
                return view('admin.student.edit')->with($data);
            } else {
                return redirect()->route('student-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('student-list')->with('failed', 'Record not found.');
        }
    }

    public function updateStudent(Request $request, $id) {
        if ($id) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
//                'email' => 'required',
            ]);
            $student = \App\Models\Student::find($id);
            if ($student) {
                $student->first_name = $request->input('first_name');
                $student->middle_name = $request->input('middle_name');
                $student->last_name = $request->input('last_name');
                $student->relation = $request->input('relation');
                $student->contact_no = $request->input('contact_no');
                $student->emergency_contact_no = $request->input('emergency_contact_no');
                $student->address = $request->input('address');
                $student->date_of_birth = $request->input('date_of_birth');
                $student->nationality = $request->input('nationality');
                $student->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;

                $file_name = null;
                $file_path = null;

                if ($request->file()) {
                    $file_name = 'profile_image' . time() . '.' . $request->profile_image->extension();
                    $file_path = $request->file('profile_image')->storeAs('profile_image', $file_name, 'public');
                }
                if ($file_name != null) {
                    $student->profile_image = $file_name;
                }
                if ($file_path != null) {
                    $student->profile_image_path = $file_path;
                }
                $student->save();
            }
            return redirect()->route('student-list')->with('success', 'Record Updated.');
        } else {
            return redirect()->route('student-list')->with('failed', 'Record not found.');
        }
    }

    public function deleteUser(Request $request) {
        $id = $request->input('delete_id');
        if ($id) {
            $user = User::find($id);
            if ($user) {
                $user->is_deleted = '1';
                $user->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $user->save();
            }

            return redirect()->route('user-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('user-list')->with('failed', 'Record not found.');
        }
    }

}
