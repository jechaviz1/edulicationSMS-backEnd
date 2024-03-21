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
use Mail;

class WorkShiftTypeController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'Work Shift Type List';
        $data['menu_active_tab'] = 'work-shift-type-list';
        $data['work_shift_type'] = WorkShiftType::orderBy('title', 'asc')->where('is_deleted', '0')->get();

        return view('admin.work_shift_type.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Work Shift Type';
        $data['menu_active_tab'] = 'add-work-shift-type';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();

        return view('admin.work_shift_type.add')->with($data);
    }

    public function store(Request $request) {
        $rules = [
            'title' => 'required|string|min:3|max:255',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            try {
                $feestype = new WorkShiftType();
                $feestype->title = $data['title'];
                $feestype->slug = Str::slug($request->title, '-');
                $feestype->save();
                return redirect()->route('work-shift-type-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('work-shift-type-list')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Work Shift Type';
        $data['menu_active_tab'] = 'edit-work-shift-type';
        if ($id) {
            $work_shift_type = WorkShiftType::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($work_shift_type) {
                $data['work_shift_type'] = $work_shift_type;
                return view('admin.work_shift_type.edit')->with($data);
            } else {
                return redirect()->route('work-shift-type-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('work-shift-type-list')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        
        if ($id) {
            $request->validate([
                'title' => 'required',
            ]);
            $data = $request->input();
            $status_type = WorkShiftType::find($id);
            
            if ($status_type) {
                
                $status_type->title = $data['title'];
                $status_type->slug = Str::slug($request->title, '-');
                $status_type->status = $request->status;
                $status_type->save();

                return redirect()->route('work-shift-type-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('work-shift-type-list')->with('failed', 'Record not found.');
            }
        }
    }

    public function delete($id) {
        if ($id) {
            $status_type = WorkShiftType::find($id);
            if ($status_type) {
                
                $status_type->is_deleted = '1';
                $status_type->save();
            }
            return redirect()->route('work-shift-type-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('work-shift-type-list')->with('failed', 'Record not found.');
        }
    }

}
