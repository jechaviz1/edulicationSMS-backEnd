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
use App\Models\CityTown;
use App\Models\Region;
use Mail;

class CityTownController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'City Town List';
        $data['menu_active_tab'] = 'city-town-list';
        $data['city_towns'] = CityTown::orderBy('id', 'DESC')->where('is_deleted', '0')->get();
        $data['ragions'] = Region::where('is_deleted','0')->orderBy('name', 'asc')->get();
        // dd($data);
        return view('admin.citytown.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add City And Towns';
        $data['menu_active_tab'] = 'add-city-town';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
        $data['ragions'] = Region::where('is_deleted','0')->orderBy('name', 'asc')->get();
        

        return view('admin.citytown.add')->with($data);
    }

    public function store(Request $request) {
        
        
        $rules = [
            'city_name' => 'required',
            'state' => 'required',
            'ragion_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            $data = $request->input();
            
            try {
                $citytown = new CityTown();
                $citytown->city_name = $request->city_name;
                $citytown->ragion_id = $request->ragion_id;
                $citytown->state = $request->state;
                $citytown->save();
                
                return redirect()->route('city-town-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('city-town-list')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit City Town';
        $data['menu_active_tab'] = 'edit-city-town';
        
        if ($id) {
            $city_town = CityTown::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($city_town) {
                
                $data['city_town'] = $city_town;
                $data['ragions'] = Region::where('is_deleted','0')->orderBy('name', 'asc')->get();
                
                return view('admin.citytown.edit')->with($data);
            } else {
                return redirect()->route('city-town-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('city-town-list')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        
        if ($id) {
            $request->validate([
               'city_name' => 'required',
                'state' => 'required',
                'ragion_id' => 'required',
            ]);
            $data = $request->input();
            $citytown = CityTown::find($id);
            
            if ($citytown) {
                
                $citytown->city_name = $request->city_name;
                $citytown->ragion_id = $request->ragion_id;
                $citytown->state = $request->state;
                $citytown->save();
                

                return redirect()->route('city-town-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('city-town-list')->with('failed', 'Record not found.');
            }
        }
    }
    

    public function delete($id) {
        if ($id) {
            $citytown = CityTown::find($id);
            if ($citytown) {
                
                $citytown->is_deleted = '1';
                $citytown->save();
            }
            return redirect()->route('city-town-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('city-town-list')->with('failed', 'Record not found.');
        }
    }
    
    public function changestatus($id,$status) {
        
        if ($id) {
            $citytown = CityTown::find($id);
            if ($citytown) {
                $citytown->status = $status;
                $citytown->save();
            }
            return redirect()->route('city-town-list')->with('success', 'Status Updated Successfully.');
        } else {
            return redirect()->route('city-town-list')->with('failed', 'Record not found.');
        }
    }

}
