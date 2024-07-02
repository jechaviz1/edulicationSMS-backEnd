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
use Mail;
use App\Models\Module;
use App\Models\Course;
use App\Models\State;
use App\Models\CourseCategory;
use App\Models\AvetmissCode;
use App\Models\UnitCompetency;
use App\Models\DefaultSession;
use App\Models\Teacher;



class CourseController extends Controller
{
    //
    public function list() {
        $data = [];
        $data['title'] = 'Course List';
        $data['menu_active_tab'] = 'course-list';
        $data['view'] = 'admin.course';
            $data['rows'] = Course::orderBy('id', 'desc')->get();
            $data['course_category'] = CourseCategory::where('is_deleted', '0')->get();
            $data['user'] = User::where('is_deleted', '0')->get();
            // dd($data);
        return view('admin.course.list')->with($data); 
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Course';
        $data['menu_active_tab'] = 'add-course';
        
        $data['course_category'] = CourseCategory::where('is_deleted', '0')->get();
        $data['user'] = User::where('is_deleted', '0')->get();
        return view('admin.course.add')->with($data);
    }

    public function store(Request $request) {
        // Field Validation
        $request->validate([
            'course_code' => 'required',
            'name' => 'required',
        ]);
         // Insert Data
            try {
                
                if(isset($request->delivery_method_self) && isset($request->delivery_method_public) && isset($request->delivery_method_private)){
                    $delivery[] = $request->delivery_method_self;
                    $delivery[] = $request->delivery_method_public.'-'.$request->public_session_options;
                    $delivery[] = $request->delivery_method_private.'-'.$request->private_session_options;
                }
                elseif(isset($request->delivery_method_public) && isset($request->delivery_method_private)){
                    $delivery[] = $request->delivery_method_public.'-'.$request->public_session_options;
                    $delivery[] = $request->delivery_method_private.'-'.$request->private_session_options;
                }
                elseif(isset($request->delivery_method_self) && isset($request->delivery_method_private)){
                    $delivery[] = $request->delivery_method_self;
                    $delivery[] = $request->delivery_method_private.'-'.$request->private_session_options;
                }
                elseif(isset($request->delivery_method_self) && isset($request->delivery_method_public)){
                    $delivery[] = $request->delivery_method_self;
                    $delivery[] = $request->delivery_method_public.'-'.$request->public_session_options;
                }
                elseif(isset($request->delivery_method_self)){
                    $delivery[] = $request->delivery_method_self;
                }
                elseif(isset($request->delivery_method_public)){
                    $delivery[] = $request->delivery_method_public.'-'.$request->public_session_options;
                }
                elseif(isset($request->delivery_method_private)){
                    $delivery[] = $request->delivery_method_private.'-'.$request->private_session_options;
                }
                else{
                    $delivery[] = '---';
                }
                
                if(isset($request->report_this_course)){
                    $reporting_this_course = '1';
                }
                else{
                    $reporting_this_course = '0';
                }
                
                if(isset($request->tga_package)){
                    $tga_package = '1';
                }
                else{
                    $tga_package = '0';
                }
              
            //   dd($request);
                $course = new Course;
                $course->code = $request->course_code;
                $course->name = $request->name;
                $course->course_category_id = $request->course_category;
                $course->default_course_cost = $request->cost;
                $course->description = $request->description;
                $course->comments = $request->comment;
                $course->follow_up_enquiry = $request->follow_enquiry;
                $course->delivery_method = implode(',',$delivery);
                $course->required_no_of_unit = $request->no_of_units;
                $course->core_unit = $request->core_unit;
                $course->color = $request->color;
                $course->reporting_this_course = $reporting_this_course;
                $course->tga_package = $tga_package;
                $course->save();
        
                
                return redirect()->route('course-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
               // dd($e);
                return redirect()->route('course-list')->with('failed', 'Record not added.');
            }
        }
        
        public function edit(Request $request, $id) {
            $data = [];
            $data['title'] = 'Edit Course';
            $data['menu_active_tab'] = 'edit-course';
            $data['view'] = 'admin.course';
            if ($id) {
                $course = Course::find($id);
                if ($course) {
                    $data['course'] = $course;
                    $data['course_category'] = CourseCategory::where('is_deleted', '0')->get();
                    $data['user'] = User::where('is_deleted', '0')->get();
                    $data['avetmiss_code'] = AvetmissCode::where('course_id', $id)->first();
                    $data['unit_core_active'] = UnitCompetency::where('course_id', $id)->where('type','core')->where('status', 'A')->get();
                    $data['unit_elective_active'] = UnitCompetency::where('course_id', $id)->where('type', 'elective')->where('status', 'A')->get();
                    $data['unit_core_inactive'] = UnitCompetency::where('course_id', $id)->where('type', 'core')->where('status', 'A')->get();
                    $data['unit_elective_inactive'] = UnitCompetency::where('course_id', $id)->where('type', 'elective')->where('status', 'A')->get();
                    $data['states'] = State::where('is_deleted', '0')->get();
                    $data["modules"] = Module::where('course_id',$course->id)->paginate(8);
                    $data["default_session"] = DefaultSession::where('course_id',$course->id)->paginate(7);
                    $data['teacher'] = Teacher::where('is_deleted', '0')->get();

                    // dd($data);  
                    return view('admin.course.edit')->with($data);
                } else {
                    return redirect()->route('course-list')->with('failed', 'Record not found.');
                }
            } else {
                return redirect()->route('course-list')->with('failed', 'Record not found.');
            }
    }

    public function update(Request $request, $id) {
        
        if ($id) {
            $request->validate([
                'course_code' => 'required',
                'name' => 'required',
            ]);
            
            $data = $request->input();
            $course = Course::find($id);
            
            if ($course) {
                
                if(isset($request->delivery_method_self) && isset($request->delivery_method_public) && isset($request->delivery_method_private)){
                    $delivery[] = $request->delivery_method_self;
                    $delivery[] = $request->delivery_method_public.'-'.$request->public_session_options;
                    $delivery[] = $request->delivery_method_private.'-'.$request->private_session_options;
                }
                elseif(isset($request->delivery_method_public) && isset($request->delivery_method_private)){
                    $delivery[] = $request->delivery_method_public.'-'.$request->public_session_options;
                    $delivery[] = $request->delivery_method_private.'-'.$request->private_session_options;
                }
                elseif(isset($request->delivery_method_self) && isset($request->delivery_method_private)){
                    $delivery[] = $request->delivery_method_self;
                    $delivery[] = $request->delivery_method_private.'-'.$request->private_session_options;
                }
                elseif(isset($request->delivery_method_self) && isset($request->delivery_method_public)){
                    $delivery[] = $request->delivery_method_self;
                    $delivery[] = $request->delivery_method_public.'-'.$request->public_session_options;
                }
                elseif(isset($request->delivery_method_self)){
                    $delivery[] = $request->delivery_method_self;
                }
                elseif(isset($request->delivery_method_public)){
                    $delivery[] = $request->delivery_method_public.'-'.$request->public_session_options;
                }
                elseif(isset($request->delivery_method_private)){
                    $delivery[] = $request->delivery_method_private.'-'.$request->private_session_options;
                }
                else{
                    $delivery[] = '---';
                }
                
                if(isset($request->report_this_course)){
                    $reporting_this_course = '1';
                }
                else{
                    $reporting_this_course = '0';
                }
                
                if(isset($request->tga_package)){
                    $tga_package = '1';
                }
                else{
                    $tga_package = '0';
                }
                
                $course->code = $request->course_code;
                $course->name = $request->name;
                $course->course_category_id = $request->course_category;
                $course->default_course_cost = $request->cost;
                $course->description = $request->description;
                $course->comments = $request->comment;
                $course->follow_up_enquiry = $request->follow_enquiry;
                $course->delivery_method = implode(',',$delivery);
                $course->required_no_of_unit = $request->no_of_units;
                $course->core_unit = $request->core_unit;
                $course->color = $request->color;
                $course->reporting_this_course = $reporting_this_course;
                $course->tga_package = $tga_package;
                $course->save();
                
                return redirect()->route('course-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('course-list')->with('failed', 'Record not found.');
            }
        }
    }
    
    public function delete($id) {
        if ($id) {
            $course = Course::find($id);
            if ($course) {
                
                $course->is_deleted = '1';
                $course->save();
            }
            return redirect()->route('course-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('course-list')->with('failed', 'Record not found.');
        }
    }
    
    public function changestatus($id,$status) {
        
        if ($id) {
            $course = Course::find($id);
            if ($course) {
                $course->status = $status;
                $course->save();
            }
            return redirect()->route('course-list')->with('success', 'Status Updated Successfully.');
        } else {
            return redirect()->route('course-list')->with('failed', 'Record not found.');
        }
    }
    
    
        public function avetmisscodestore(Request $request) {
        
        // dd($request);
            $request->validate([
                'state_course_code' => 'required',
                'nominal_hours' => 'required',
                'recognition_identifier' => 'required',
                'qualification_category' => 'required',
                'vet_flag' => 'required',
            ]);

            
            $id = $request->id;

        // -1 means no data row found
        if($id == -1){
            // Insert Data

            $avetmisscode = new AvetmissCode;
            
            $avetmisscode->course_id = $request->course_id;
            $avetmisscode->course_code = $request->course_code;
            $avetmisscode->state_course_code = $request->state_course_code;
            $avetmisscode->reporting_state = $request->reporting_state;
            $avetmisscode->nominal_hours = $request->nominal_hours;
            $avetmisscode->recognition_identifier = $request->recognition_identifier;
            $avetmisscode->qualification_category = $request->qualification_category;
            $avetmisscode->anzscod_id = $request->anzscod_id;
            $avetmisscode->vet_flag = $request->vet_flag;
            $avetmisscode->field_of_education = $request->field_of_education;;
            $avetmisscode->associated_course_identifier = $request->associated_course_identifier;;

            $avetmisscode->save();
            
            return redirect()->route('course-list')->with('success', 'Record Added.');
        }
        else{
            
            $avetmisscode = AvetmissCode::find($id);
            
            $avetmisscode->course_id = $request->course_id;
            $avetmisscode->course_code = $request->course_code;
            $avetmisscode->state_course_code = $request->state_course_code;
            $avetmisscode->reporting_state = $request->reporting_state;
            $avetmisscode->nominal_hours = $request->nominal_hours;
            $avetmisscode->recognition_identifier = $request->recognition_identifier;
            $avetmisscode->qualification_category = $request->qualification_category;
            $avetmisscode->anzscod_id = $request->anzscod_id;
            $avetmisscode->vet_flag = $request->vet_flag;
            $avetmisscode->field_of_education = $request->field_of_education;;
            $avetmisscode->associated_course_identifier = $request->associated_course_identifier;;

            $avetmisscode->save();
            
            return redirect()->route('course-list')->with('success', 'Record Updated.');
        }
        
    }
    
    public function storeunit(Request $request) {
        // Field Validation
        $request->validate([
            'code' => 'required',
            'nominal_hour' => 'required',
        ]);
         // Insert Data
            try {
            //   dd($request);
                $unit_of_compentency = new UnitCompetency;
                $unit_of_compentency->course_id = $request->course_id;
                $unit_of_compentency->code = $request->code;
                $unit_of_compentency->name = $request->name;
                $unit_of_compentency->field_of_education = $request->field_of_education;
                $unit_of_compentency->nominal_hours = $request->nominal_hour;
                $unit_of_compentency->vet = $request->vet;
                $unit_of_compentency->competency_flag = $request->competency_flag;
                $unit_of_compentency->type = $request->type;

                $unit_of_compentency->save();
                return redirect()->route('course-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
               // dd($e);
                return redirect()->route('course-list')->with('failed', 'Record not added.');
            }
        }
        
        public function updateunit(Request $request, $id) {
        
        if ($id) {
            $request->validate([
                'code' => 'required',
                'nominal_hour' => 'required',
            ]);
            
            $data = $request->input();
            $unit_of_compentency = UnitCompetency::find($id);
            
            if ($unit_of_compentency) {
                
                $unit_of_compentency->course_id = $request->course_id;
                $unit_of_compentency->code = $request->code;
                $unit_of_compentency->name = $request->name;
                $unit_of_compentency->field_of_education = $request->field_of_education;
                $unit_of_compentency->nominal_hours = $request->nominal_hour;
                $unit_of_compentency->vet = $request->vet;
                $unit_of_compentency->competency_flag = $request->competency_flag;

                $unit_of_compentency->save();
                
                return redirect()->route('course-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('course-list')->with('failed', 'Record not found.');
            }
        }
    }
    
    public function deleteunit($id) {
        if ($id) {
            $unit_of_competency = UnitCompetency::find($id);
            if ($unit_of_competency) {
                
                $unit_of_competency->is_deleted = '1';
                $unit_of_competency->save();
            }
            return redirect()->route('course-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('course-list')->with('failed', 'Record not found.');
        }
    }
    
    public function changeunitstatus($id,$status) {
        
        if ($id) {
            $unit_of_competency = UnitCompetency::find($id);
            if ($unit_of_competency) {
                $unit_of_competency->status = $status;
                $unit_of_competency->save();
            }
            return redirect()->route('course-list')->with('success', 'Status Updated Successfully.');
        } else {
            return redirect()->route('course-list')->with('failed', 'Record not found.');
        }
    }

    public function module(Request $request){
        
        if($request->moduleId == null){
            $module = new Module;
            $module->course_id  = $request->courseId;
            $module->title  = $request->moduleName;
            $module->save();
            return response()->json(['response' => "0"]);     
        }else{
            $module  = Module::where('id',$request->moduleId)->first();
            $module->title = $request->moduleName;
            $module->save();
            return response()->json(['response' => "0"]);  
        }
       
    }

    public function moduleSearch($id){
        $modules = Module::where('course_id',$id)->get();
        return response()->json(['response' => $modules]);
    }

    public function moduleDelete(Request $request){
        $module  = Module::where('id',$request->moduleId)->first();
        $module->delete();
        return response()->json(['response' => "0"]); 
    }
    public function saveCourseCity(Request $request){
            // dd($request);
                $default_session = new DefaultSession;
                $default_session->dftCity = $request->dftCity;
                $default_session->dftTrainer = $request->dftTrainer;
                $default_session->dftstarttime = $request->dftstarttime;
                $default_session->dftendtime = $request->dftendtime;
                $default_session->course_id = $request->courseId;
                $default_session->dftAssessor = $request->dftAssessor;
                $default_session->save();
                return response()->json(['response' => "0"]); 
    }
    public function courseTrainer(Request $request){
                dd($request);
    }
}
