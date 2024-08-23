<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Exception;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Validation\Rule;
class CourseCategoryController extends Controller
{
   
    public function coursecategoryList() {
        $data = [];
        $data['title'] = 'Course Category List';
        $data['menu_active_tab'] = 'coursecategory';
        $data['rows'] = CourseCategory::where('is_deleted','0')->where('created_by', Auth::user()->id)->orderBy('name', 'asc')->get();
        //dd($data['rows']);
        return view('admin.course_category.list')->with($data);
    }

    public function addCourseCategory(Request $request) {
        $data = [];
        $data['title'] = 'Add Course Category';
        $data['menu_active_tab'] = 'add-coursecategory';
        return view('admin.course_category.add')->with($data);
    }

    public function storeCourseCategory(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:course_categories,name',
        ]);
        
        try {
            $data = new CourseCategory();
            $data->name = $request->input('name');
            $data->description = $request->input('description');
            $data->status = $request->status == "1" ? "A" : "D";
            $data->created_by = \Auth::user()->id ? \Auth::user()->id : null;
            $data->is_deleted = "0";
            $data->save();
        
            return redirect()->route('coursecategory-list')->with('success', 'Record added successfully.');
        } catch (Exception $e) {
            return redirect()->route('add-coursecategory')->with('error', $e->getMessage() . ' Record not added.');
        }
    }

    public function editCourseCategory(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Course Category';
        $data['menu_active_tab'] = 'course-category-list';
        if ($id) {
            $coursecategory = CourseCategory::find($id);
           
            if ($coursecategory) {
                $data['coursecategory'] = $coursecategory;
                return view('admin.course_category.edit')->with($data);
            } else {
                return redirect()->route('coursecategory-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('coursecategory-list')->with('failed', 'Record not found.');
        }
    }

    public function updateCourseCategory(Request $request,$id) {
        if ($id) {
            // Validation rules
            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('course_categories')->ignore($id), // Ensure unique name except for the current record
                ],
                'description' => 'nullable|string|max:255', // Add validation for description if needed
                'status' => 'required|in:1,0', // Ensures status is either 1 or 0
            ]);
            try {
                $coursecategory = CourseCategory::find($id);
    
                if ($coursecategory) {
                    // Update course category details
                    $coursecategory->name = $request->input('name');
                    $coursecategory->description = $request->input('description');
                    $coursecategory->status = $request->status == "1" ? "A" : "D";
                    $coursecategory->save();
    
                    return redirect()->route('coursecategory-list')->with('success', 'Record updated successfully.');
                } else {
                    return redirect()->route('coursecategory-list')->with('failed', 'Record not found.');
                }
            } catch (\Exception $e) {
                // Handle exception and log error
                \Log::error('Error updating course category: ' . $e->getMessage());
                return redirect()->route('coursecategory-list')->with('failed', 'An error occurred while updating the record.');
            }
        } else {
            return redirect()->route('coursecategory-list')->with('failed', 'Invalid ID provided.');
        }
    }

    public function deleteCourseCategory($id) {
        if ($id) {
            $coursecategory = CourseCategory::find($id);
            if ($coursecategory) {
                $coursecategory->is_deleted = '1';
                //  $user->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $coursecategory->save();
            }

            return redirect()->route('coursecategory-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('coursecategory-list')->with('failed', 'Record not found.');
        }
    
    }


}
