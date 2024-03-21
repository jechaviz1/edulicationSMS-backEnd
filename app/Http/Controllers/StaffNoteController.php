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
use App\Models\FeesDiscount;
use App\Models\FeesCategory;
use App\Models\StatusType;
use App\Models\StaffNote;
use App\Models\Employee;
use Mail;

class StaffNoteController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'Staff Note List';
        $data['menu_active_tab'] = 'staff-note-list';
        
        $data['rows'] = StaffNote::where('noteable_type', 'App\Models\Employee')->orderBy('id', 'desc')->where('is_deleted', '0')->get();

        return view('admin.staff_note.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Staff Note';
        $data['menu_active_tab'] = 'add-staff-note';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
        
        $data['staffs'] = Employee::where('status', '1')->orderBy('id', 'asc')->get();

        return view('admin.staff_note.add')->with($data);
    }

    public function store(Request $request) {
        
        // dd(date("d-m-Y", strtotime($request->start_date)));
        $rules = [
            'staff' => 'required',
            'title' => 'required',
            'note' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            
            try {
                
                $staff = Employee::findOrFail($request->staff);
                
                if ($request->hasfile('attach')) {
                    $file = $request->file('attach');
                    $extenstion = $file->getClientOriginalName();
                    $fileName =  time() . '_' . $extenstion;
                    $file->move('staff_note/', $fileName);
                    $staff_note = $fileName;
                } else {
                    $staff_note = '';
                }
        
                // Insert Data
                $note = new StaffNote();
                $note->title = $request->title;
                $note->description = $request->note;
                $note->attach = $staff_note;
                $note->created_by = Auth::guard('web')->user()->id;
        
                $staff->notes()->save($note);
                
                return redirect()->route('staff-note-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('staff-note-list')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Staff Note';
        $data['menu_active_tab'] = 'edit-staff-note';
        
        if ($id) {
            
            $staff_note = StaffNote::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($staff_note) {
                
                $data['staff_note'] = $staff_note;

                return view('admin.staff_note.edit')->with($data);
            } else {
                return redirect()->route('staff-note-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('staff-note-list')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        
        if ($id) {
            $request->validate([
            'title' => 'required',
            'note' => 'required',
            ]);
            $data = $request->input();
            
            // Update Data
            $note = StaffNote::findOrFail($id);
            
                if ($request->hasfile('attach')) {
                    $file = $request->file('attach');
                    $extenstion = $file->getClientOriginalName();
                    $fileName =  time() . '_' . $extenstion;
                    $file->move('staff_note/', $fileName);
                    $staff_note = $fileName;
                } else {
                    $staff_note = $note->attach;
                }

            
            if ($note) {
                
                $note->title = $request->title;
                $note->description = $request->note;
                $note->attach = $staff_note;
                $note->status = $request->status;
                $note->updated_by = Auth::guard('web')->user()->id;
                $note->save();

                return redirect()->route('staff-note-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('staff-note-list')->with('failed', 'Record not found.');
            }
        }
    }
    

    public function delete($id) {
        if ($id) {
            $staff_note = StaffNote::find($id);
            if ($staff_note) {
                
                $staff_note->is_deleted = '1';
                $staff_note->save();
            }
            return redirect()->route('staff-note-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('staff-note-list')->with('failed', 'Record not found.');
        }
    }

}
