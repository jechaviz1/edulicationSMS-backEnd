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
use App\Models\FeesReceipt;
use Mail;

class PaySlipSettingController extends Controller {

    public function index() {
        $data = [];
        $data['title'] = 'Pay Slip Setting';
        $data['menu_active_tab'] = 'pay-slip-setting';
        $data['pay_slip_setting'] = FeesReceipt::where('slug', 'pay-slip')->first();
        

        return view('admin.pay_slip_setting.index')->with($data);
    }

    public function store(Request $request) {
        
        // dd($request);
        $rules = [
            'logo_right' => 'nullable|image',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            
            $id = $request->id;

        // -1 means no data row found
        if($id == -1){
            // Insert Data

            if ($request->hasfile('logo_right')) {
                $file = $request->file('logo_right');
                $extenstion = $file->getClientOriginalName();
                $fileName =  time() . '_' . $extenstion;
                $file->move('pay_slip_setting/', $fileName);
                $logo_right = $fileName;
            } else {
                $logo_right = '';
            }

            $feereceipt = new FeesReceipt;
            


            $feereceipt->slug = $request->slug;
            $feereceipt->title = $request->title;
            $feereceipt->footer_left = $request->footer_left;
            $feereceipt->footer_right = $request->footer_right;
            $feereceipt->logo_right = $logo_right;
            $feereceipt->width = $request->width;
            $feereceipt->save();
            
            return redirect()->route('add-pay-slip-setting')->with('success', 'Record Added.');
        }
        else{
            
            // dd($request);
            // Update Data
            $feereceipt = FeesReceipt::find($id);
            
            if ($request->hasfile('logo_right')) {
                $file = $request->file('logo_right');
                $extenstion = $file->getClientOriginalName();
                $fileName =  time() . '_' . $extenstion;
                $file->move('pay_slip_setting', $fileName);
                $logo_right = $fileName;
            } else {
                $logo_right = $feereceipt->logo_right;
            }
            

            $feereceipt->slug = $request->slug;
            $feereceipt->title = $request->title;
            $feereceipt->footer_left = $request->footer_left;
            $feereceipt->footer_right = $request->footer_right;
            $feereceipt->logo_right = $logo_right;
            $feereceipt->width = $request->width;
            $feereceipt->save();
            
            return redirect()->route('add-pay-slip-setting')->with('success', 'Record Updated.');
        }
        
        }
    }




    

}
