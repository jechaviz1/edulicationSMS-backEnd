<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Exception;
use Illuminate\Http\Request;
use Validator;

class LeaveTypeController extends Controller
{
    //
    public function leavetypeList() {
        $data = [];
        $data['title'] = 'Leave type List';
        $data['menu_active_tab'] = 'leavetype-list';
        $data['leavetype'] = LeaveType::where('is_deleted', '0')->where('is_active', '!=', '2')->orderBy('id', 'DESC')->get();

        return view('admin.leave_type.list')->with($data);
    }

    public function addLeaveType(Request $request) {
        $data = [];
        $data['title'] = 'Add leave type';
        $data['menu_active_tab'] = 'add-leavetype';
        return view('admin.leave_type.add')->with($data);
    }
    public function storeLeaveType(Request $request) {
        //dd($request->all());
        $rules = [
            'name' => 'required|string|min:1|max:255',
            'alias' => 'required|string|min:1|max:255',   

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
        dd($validator);
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            // $data = $request->input();
         
            try {
                $data = new LeaveType();
                //dd($data);
                $isActive = $request->input('is_active');
                        $data->name = $request->input('name');
                        $data->alias = $request->input('alias');
                        $data->description = $request->input('description');
                        $data->is_active = $isActive;
                        //dd($data);
                        $data->save();
                        //dd("success");
                return redirect()->route('leavetype-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
               // dd($e);
                return redirect()->route('leavetype-list')->with('failed', 'Record not added.');
            }
        }
    }
    public function editLeaveType(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Leave Type';
        $data['menu_active_tab'] = 'leavetype-list';
        if ($id) {
            $leavetype = LeaveType::find($id);
            $data['leavetype'] = LeaveType::where('is_deleted', '0')->orderBy('id', 'ASC')->get();
            if ($leavetype) {
                $data['leavetype'] = $leavetype;
                
                return view('admin.leave_type.edit')->with($data);
            } else {
                return redirect()->route('leavetype-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('leavetype-list')->with('failed', 'Record not found.');
        }
    }
    public function updateLeaveType(Request $request, $id) {
        
        if ($id) {
            
            $request->validate([
                'name' => 'required',
                'alias' => 'required',

            ]);
           
            $data = $request->input();
            //dd($data);
            $leavetype = LeaveType::find($id);

          //  dd($designation);
            if ($leavetype) {
                
                $leavetype->name = isset($data['name']) ? $data['name'] : null;
                $leavetype->alias = isset($data['alias']) ? $data['alias'] : null;
                $leavetype->is_active = $request->has('is_active');
                $leavetype->description = isset($data['description']) ? $data['description'] : 1;

                $leavetype->save();
                
            }
            //dd('success');
            return redirect()->route('leavetype-list')->with('success', 'Record Updated.');
        } else {
           // dd('fail');
            return redirect()->route('leavetype-list')->with('failed', 'Record not found.');
        }
    }
    public function deleteLeaveType($id) {
        if ($id) {
            $leavetype = LeaveType::find($id);
            if ($leavetype) {
                $leavetype->is_deleted = '1';
                
                $leavetype->save();
            }
            return redirect()->route('leavetype-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('leavetype-list')->with('failed', 'Record not found.');
        }
    }
    
}
