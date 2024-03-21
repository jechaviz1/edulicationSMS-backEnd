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
use App\Models\TaxSetting;
use Mail;

class TaxSettingController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'Tax Setting List';
        $data['menu_active_tab'] = 'tax-setting-list';
        
        $data['rows'] = TaxSetting::orderBy('min_amount', 'asc')->where('is_deleted', '0')->get();

        return view('admin.tax_setting.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Tax Setting';
        $data['menu_active_tab'] = 'add-tax-setting';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
        
        return view('admin.tax_setting.add')->with($data);
    }

    public function store(Request $request) {
        
        // dd($request);
        $rules = [
            'min_amount' => 'required',
            'max_amount' => 'required',
            'percentange' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            
            try {
                
                // Duplicate Checking
                $pretaxs = TaxSetting::orderBy('min_amount', 'asc')->get();
                if(isset($pretaxs) && count($pretaxs) > 0){
                foreach($pretaxs as $pretax){
                    if($pretax->min_amount < $request->min_amount && $pretax->max_amount > $request->min_amount){
        
                        return redirect()->back();
                    }
                    if($pretax->min_amount < $request->max_amount && $pretax->max_amount > $request->max_amount){
        
                        return redirect()->back();
                        
                    }
                }}
        
        
                // Insert Data
                $taxSetting = new TaxSetting;
                $taxSetting->min_amount = $request->min_amount;
                $taxSetting->max_amount = $request->max_amount;
                $taxSetting->percentange = $request->percentange;
                $taxSetting->max_no_taxable_amount = $request->max_no_taxable_amount ?? '0';
                $taxSetting->save();
                
                return redirect()->route('tax-setting-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('tax-setting-list')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Tax Setting';
        $data['menu_active_tab'] = 'edit-tax-setting';
        
        if ($id) {
            
            $tax_setting = TaxSetting::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($tax_setting) {
                
                $data['tax_setting'] = $tax_setting;

                return view('admin.tax_setting.edit')->with($data);
            } else {
                return redirect()->route('tax-setting-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('tax-setting-list')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        
        if ($id) {
            $request->validate([
            'min_amount' => 'required',
            'max_amount' => 'required',
            'percentange' => 'required',
            ]);
            $data = $request->input();
            
            // Update Data
            $taxSetting = TaxSetting::findOrFail($id);
            
                // Duplicate Checking
                $pretaxs = TaxSetting::orderBy('min_amount', 'asc')->get();
                if(isset($pretaxs) && count($pretaxs) > 0){
                foreach($pretaxs as $pretax){
                    if($pretax->min_amount < $request->min_amount && $pretax->max_amount > $request->min_amount && $pretax->id != $id){
        
                        return redirect()->back();
                    }
                    if($pretax->min_amount < $request->max_amount && $pretax->max_amount > $request->max_amount && $pretax->id != $id){
        
                        return redirect()->back();
                        
                    }
                }}
        
                // Update Data
                $taxSetting->min_amount = $request->min_amount;
                $taxSetting->max_amount = $request->max_amount;
                $taxSetting->percentange = $request->percentange;
                $taxSetting->max_no_taxable_amount = $request->max_no_taxable_amount ?? '0';
                $taxSetting->status = $request->status;
                $taxSetting->save();

                return redirect()->route('tax-setting-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('tax-setting-list')->with('failed', 'Record not found.');
            }
        
    }
    

    public function delete($id) {
        if ($id) {
            $tax_setting = TaxSetting::find($id);
            if ($tax_setting) {
                
                $tax_setting->is_deleted = '1';
                $tax_setting->save();
            }
            return redirect()->route('tax-setting-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('tax-setting-list')->with('failed', 'Record not found.');
        }
    }

}
