<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Exception;
use Illuminate\Http\Request;
use Validator;

class LeaveRequestController extends Controller
{
    //
    public function leaverequestList() {
        $data = [];
        $data['title'] = 'Leave request List';
        $data['menu_active_tab'] = 'leaverequest-list';
        $data['leaverequest'] = LeaveRequest::orderBy('id', 'DESC')->get();

        return view('admin.leave_request.list')->with($data);
    }

    public function addLeaveRequest(Request $request) {
        $data = [];
        $data['title'] = 'Add leave request';
        $data['menu_active_tab'] = 'add-leaverequest';
        return view('admin.leave_request.add')->with($data);
    }
    public function storeLeaveRequest(Request $request) {
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
                $data = new LeaveRequest();
                //dd($data);
                $isActive = $request->has('is_active') ? 1 : 0;
                        $data->name = $request->input('name');
                        $data->alias = $request->input('alias');
                        $data->description = $request->input('description');
                        $data->is_active = $isActive;
                        //dd($data);
                        $data->save();
                        //dd("success");
                return redirect()->route('leaverequest-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
               // dd($e);
                return redirect()->route('leaverequest-list')->with('failed', 'Record not added.');
            }
        }
    }
}
