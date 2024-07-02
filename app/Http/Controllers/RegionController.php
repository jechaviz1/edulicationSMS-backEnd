<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Validator;
use App\Models\Region;

class RegionController extends Controller
{
    //
    public function List() {
        $data = [];
        $data['title'] = 'Ragion List';
        $data['menu_active_tab'] = 'ragion_list';
        $data['rows'] = Region::where('is_deleted','0')->orderBy('name', 'asc')->get();
        //dd($data['rows']);
        return view('admin.ragion.list')->with($data);
    }
    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Ragion';
        $data['menu_active_tab'] = 'add-ragion';
      
        return view('admin.ragion.add')->with($data);
    }
    public function store(Request $request) {
        $rules = [
             'name' => 'required|string|max:255',
        ];
        
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
             $data = $request->input();
             
             try {
                 $data = new Region();
                 $data->name = $request->name;
                 $data->is_deleted = "0";
                 $data->save();
                 
                return redirect()->route('ragion-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
               dd($e);
                return redirect()->route('ragion-list')->with('failed', 'Record not added.');
            }
        }
    }
    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Ragion';
        $data['menu_active_tab'] = 'edit-ragion';
        if ($id) {
            $ragion = Region::find($id);
           
            if ($ragion) {
                $data['ragion'] = $ragion;
                return view('admin.ragion.edit')->with($data);
            } else {
                return redirect()->route('ragion-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('ragion-list')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        if ($id) {
            $request->validate([
                'name' => 'required',
                
            ]);
            $ragion = Region::find($id);
            if ($ragion) {
                
                $ragion->name = $request->name;
                $ragion->save();
            }
            return redirect()->route('ragion-list')->with('success', 'Record Updated.');
        } else {
            return redirect()->route('ragion-list')->with('failed', 'Record not found.');
        }
    }

    public function delete($id) {
        if ($id) {
            $ragion = Region::find($id);
            if ($ragion) {
                
                $ragion->is_deleted = '1';
                $ragion->save();
            }

            return redirect()->route('ragion-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('ragion-list')->with('failed', 'Record not found.');
        }
    
    }


}
