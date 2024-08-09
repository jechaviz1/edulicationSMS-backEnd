<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AcademicClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Support\Facades\Log;
use Exception;
class AcademicClassController extends Controller {

    public function list() {
        try {
            $data = [];
            $data['title'] = 'Academic Class List';
            $data['menu_active_tab'] = 'academic-class-list';
            $data['academic_class'] = \App\Models\AcademicClass::orderBy('id', 'DESC')->where('is_deleted', '0')->get();
            return view('admin.academic_class.list')->with($data);
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in listAcademicClasses method: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error retrieving the academic class list. Please try again later.');
        }
    }

    public function add(Request $request) {
        try {
            $data = [];
            $data['title'] = 'Add Academic Class';
            $data['menu_active_tab'] = 'add-academic-class';
            $data['role'] = Role::where('is_deleted', '0')
                ->where('id', '!=', '1')
                ->orderBy('id', 'ASC')
                ->get();
    
            return view('admin.academic_class.add')->with($data);
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in addAcademicClass method: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error retrieving the role data. Please try again later.');
        }
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
                $academic_class = new \App\Models\AcademicClass();
                $academic_class->name = $data['name'];
//                $academic_class->academic_session_id = isset($data['academic_session_id']) ? $data['academic_session_id'] : null;
                $academic_class->created_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $academic_class->save();
                return redirect()->route('academic-class-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
                return redirect()->route('academic-class-list')->with('failed', 'Record not added.');
            }
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
    $data['title'] = 'Edit Academic Class';
    $data['menu_active_tab'] = 'academic-class-list';

    try {
        if ($id) {
            // Fetch the AcademicClass record
            $academic_class = AcademicClass::find($id);
            
            // Fetch the Role records
            $data['role'] = Role::where('is_deleted', '0')
                ->where('id', '!=', '1')
                ->orderBy('id', 'ASC')
                ->get();
            
            if ($academic_class) {
                // If AcademicClass is found, pass it to the view
                $data['academic_class'] = $academic_class;
                return view('admin.academic_class.edit')->with($data);
            } else {
                // Redirect if AcademicClass is not found
                return redirect()->route('academic-class-list')->with('failed', 'Record not found.');
            }
        } else {
            // Redirect if ID is not provided
            return redirect()->route('academic-class-list')->with('failed', 'Record not found.');
        }
    } catch (Exception $e) {
        // Log the exception
        Log::error('Error in edit method: ' . $e->getMessage());

        // Redirect with an error message
        return redirect()->route('academic-class-list')->with('failed', 'An error occurred while processing your request.');
    }
    }

    public function update(Request $request, $id) {
        if ($id) {
            $request->validate([
                'name' => 'required',
            ]);
            $data = $request->input();
            $academic_class = \App\Models\AcademicClass::find($id);
            if ($academic_class) {
                $academic_class->name = $data['name'];
//                $academic_class->academic_session_id = $data['academic_session_id'];
                $academic_class->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $academic_class->save();

                return redirect()->route('academic-class-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('academic-class-list')->with('failed', 'Record not found.');
            }
        }
    }

    public function delete($id) {
        try {
            if ($id) {
                // Find the AcademicClass record
                $academic_class = AcademicClass::find($id);
    
                if ($academic_class) {
                    // Mark the record as deleted
                    $academic_class->is_deleted = '1';
                    // Uncomment the next line if you want to track who modified the record
                    // $academic_class->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                    $academic_class->save();
    
                    return redirect()->route('academic-class-list')->with('success', 'Record deleted.');
                } else {
                    return redirect()->route('academic-class-list')->with('failed', 'Record not found.');
                }
            } else {
                return redirect()->route('academic-class-list')->with('failed', 'Invalid ID provided.');
            }
        } catch (Exception $e) {
            // Log the error
            Log::error('Error deleting AcademicClass: ' . $e->getMessage());
    
            // Redirect with error message
            return redirect()->route('academic-class-list')->with('failed', 'An error occurred while deleting the record.');
        }
    }

}
