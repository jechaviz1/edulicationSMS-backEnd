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

class AcademicClassController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'School List';
        $data['menu_active_tab'] = 'school-list';
        $data['school'] = \App\Models\School::orderBy('id', 'DESC')->where('is_deleted', '0')->get();
        $data['super_admin'] = \App\Models\User::where('role_id', 1)->where('is_deleted', '0')->orderBy('id', 'DESC')->get();

        return view('admin.school.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add School';
        $data['menu_active_tab'] = 'add-school';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();

        return view('admin.school.add')->with($data);
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required|string|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $school = new \App\Models\School();
                $school->name = $data['name'];
                $school->address = $data['address'];
                $school->email = $data['email'];
                $school->phone_no = $data['phone_no'];
                $school->save();
                return redirect()->route('school-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('school-list')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit School';
        $data['menu_active_tab'] = 'school-list';
        if ($id) {
            $school = \App\Models\School::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($school) {
                $data['school'] = $school;
                return view('admin.school.edit')->with($data);
            } else {
                return redirect()->route('school-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('school-list')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        if ($id) {
            $request->validate([
                'name' => 'required',
            ]);
            $data = $request->input();
            $school = \App\Models\School::find($id);
            if ($school) {
                $school->name = $data['name'];
                $school->address = $data['address'];
                $school->email = $data['email'];
                $school->phone_no = $data['phone_no'];
//                $school->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $school->save();

                return redirect()->route('school-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('school-list')->with('failed', 'Record not found.');
            }
        }
    }

    public function delete($id) {
        if ($id) {
            $school = \App\Models\School::find($id);
            if ($school) {
                $school->is_deleted = '1';
//                $school->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $school->save();
            }
            return redirect()->route('school-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('school-list')->with('failed', 'Record not found.');
        }
    }

}
