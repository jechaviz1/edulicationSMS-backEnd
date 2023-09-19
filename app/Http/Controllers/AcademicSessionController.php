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

class AcademicSessionController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'Academic Session List';
        $data['menu_active_tab'] = 'academic-sessions-list';
        $data['academic-sessions'] = \App\Models\AcademicSession::orderBy('id', 'DESC')->where('is_deleted', '0')->get();

        return view('admin.academic_sessions.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Academic Session';
        $data['menu_active_tab'] = 'add-academic-sessions';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();

        return view('admin.academic_sessions.add')->with($data);
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
                $academic_sessions = new \App\Models\AcademicSession();
                $academic_sessions->name = $data['name'];
                $academic_sessions->address = $data['address'];
                $academic_sessions->email = $data['email'];
                $academic_sessions->phone_no = $data['phone_no'];
                $academic_sessions->save();
                return redirect()->route('academic-sessions-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('academic-sessions-list')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Academic Session';
        $data['menu_active_tab'] = 'academic-sessions-list';
        if ($id) {
            $academic_sessions = \App\Models\AcademicSession::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($academic_sessions) {
                $data['academic_sessions'] = $academic_sessions;
                return view('admin.academic_sessions.edit')->with($data);
            } else {
                return redirect()->route('academic-sessions-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('academic-sessions-list')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        if ($id) {
            $request->validate([
                'name' => 'required',
            ]);
            $data = $request->input();
            $academic_sessions = \App\Models\AcademicSession::find($id);
            if ($academic_sessions) {
                $academic_sessions->name = $data['name'];
                $academic_sessions->address = $data['address'];
                $academic_sessions->email = $data['email'];
                $academic_sessions->phone_no = $data['phone_no'];
//                $academic_sessions->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $academic_sessions->save();

                return redirect()->route('academic-sessions-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('academic-sessions-list')->with('failed', 'Record not found.');
            }
        }
    }

    public function delete($id) {
        if ($id) {
            $academic_sessions = \App\Models\AcademicSession::find($id);
            if ($academic_sessions) {
                $academic_sessions->is_deleted = '1';
//                $academic_sessions->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $academic_sessions->save();
            }
            return redirect()->route('academic-sessions-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('academic-sessions-list')->with('failed', 'Record not found.');
        }
    }

}
