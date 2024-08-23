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
use PDF;
use App\Models\Module;
use App\Models\Course;
use App\Models\State;
use App\Models\CourseCategory;
use App\Models\AvetmissCode;
use App\Models\UnitCompetency;
use App\Models\DefaultSession;
use App\Models\Teacher;
use App\Models\CourseDocument;
use App\Models\CompanyDocument;
use App\Models\InfoPakSpecific;
use App\Models\Template;
use App\Models\BackgroundTemplate;
use App\Models\CourseEmailContent;
class CourseController extends Controller
{
    //
    public function list() {
        $data = [];
        $data['title'] = 'Course List';
        $data['menu_active_tab'] = 'course-list';
        $data['view'] = 'admin.course';
            $data['rows'] = Course::orderBy('id', 'desc')->where('created_by', Auth::user()->id)->get();
            $data['course_category'] = CourseCategory::where('is_deleted', '0')->where('created_by', Auth::user()->id)->get();
            $data['user'] = User::where('is_deleted', '0')->where('id', Auth::user()->id)->get();
            // dd($data);
        return view('admin.course.list')->with($data); 
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Course';
        $data['menu_active_tab'] = 'add-course';
        $data['course_category'] = CourseCategory::where('is_deleted', '0')->where('created_by', Auth::user()->id)->get();
        $data['user'] = User::where('is_deleted', '0')->where('id', Auth::user()->id)->get();
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
                // dd($request);
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
                $course->created_by = Auth::user()->id;
                $course->save();
                
                return redirect()->route('course-list')->with('success', 'Record added successfully.');
            } catch (\Exception $e) {
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
                    $data['course_category'] = CourseCategory::where('is_deleted', '0')->where('created_by', Auth::user()->id)->get();
                    $data['user'] = User::where('is_deleted', '0')->where('id', Auth::user()->id)->get();
                    $data['avetmiss_code'] = AvetmissCode::where('course_id', $id)->first();
                    $data['unit_core_active'] = UnitCompetency::where('course_id', $id)->where('type','core')->where('status', 'A')->get();
                    $data['unit_elective_active'] = UnitCompetency::where('course_id', $id)->where('type', 'elective')->where('status', 'A')->get();
                    $data['unit_core_inactive'] = UnitCompetency::where('course_id', $id)->where('type', 'core')->where('status', 'A')->get();
                    $data['unit_elective_inactive'] = UnitCompetency::where('course_id', $id)->where('type', 'elective')->where('status', 'A')->get();
                    $data['states'] = State::where('is_deleted', '0')->get();
                    $data["modules"] = Module::where('course_id',$course->id)->paginate(8);
                    $data["default_session"] = DefaultSession::where('course_id',$course->id)->paginate(7);
                    $data['teacher'] = Teacher::where('is_deleted', '0')->where('created_by', Auth::user()->id)->get();
                    $data['course_documents'] = CourseDocument::where('course_id',$id)->get();
                    $data['email_document'] = CompanyDocument::where('type','email')->get();
                    $data['info_document'] = CompanyDocument::where('type','email')->get();
                    // dd($data['email_document']);
                    $data['certificates'] = Template::get();
                    $data['infopak_document'] = InfoPakSpecific::get();
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
                $course->self_paced_sessions = null;
                $course->public_sessions = null;
                $course->private_sessions = null;

                if($request->delivery_method_self == "Self Paced"){
                     $course->self_paced_sessions = "1";
                }

                if($request->delivery_method_public == "Public Sessions"){
                    $course->public_sessions = $request->public_session_options;
                }

                if($request->delivery_method_private == "Private Sessions"){
                    $course->private_sessions = $request->private_session_options;
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
                $course->updated_by = Auth::user()->id;
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
            // dd($course);
            if ($course) {
                if($course->status == "A"){
                    $course->status = "D";
                }else{
                    $course->status = "A";
                }
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
        //  means no data row found
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
            } catch (\Exception $e) {
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
                $default_session = new DefaultSession;
                $default_session->course_id = $request->courseId;
                $default_session->dftCity = $request->dftCity;
                $default_session->dftTrainer = $request->dftTrainer;
                $default_session->dftAssessor = $request->dftAssessor;
                $default_session->dftstarthour = $request->dftstarthour;
                $default_session->dftstartmin = $request->dftstartmin;
                $default_session->dftstartampm = $request->dftstartampm;
                $default_session->dftendhour = $request->dftendhour;
                $default_session->dftendmin = $request->dftendmin;
                $default_session->dftendampm = $request->dftendampm;
                $default_session->save();
                return response()->json(['response' => "0"]); 
    }
    public function courseTrainer(Request $request){
            //    dd($request);
               $course = Course::find(1); // Find the course with ID 1
                    // Sync the trainers (attach new ones and detach the ones not in the array)
            $course->trainers()->sync($request->teacher);
            return redirect()->back()->with('success', 'Document data Saved successfully!');
    }

    public function assessor(Request $request){
        //    dd($request);
           $course = Course::find(1); // Find the course with ID 1
                // Sync the trainers (attach new ones and detach the ones not in the array)
        $course->assessors()->sync($request->teacher);
        return redirect()->back()->with('success', 'Document data Saved successfully!');
}
    public function courseDocument(Request $request){
        try {
            $courseDocument = new CourseDocument;
            // Store the uploaded file in the 'public/documents' directory
            if ($request->hasFile('myFile')) {
                $file = $request->file('myFile');
                $filename = time() . '_' . $file->getClientOriginalName();
                $courseDocument->document_name = $file->getClientOriginalName();
                $courseDocument->file_name = $file->getClientOriginalName();
                $file->move(public_path('course_document'), $filename);
                // Generate the file URL
                $fileUrl = asset('course_document/' . $filename);
            }
            $courseDocument->course_id = $request->course_id;
            $courseDocument->document_name = $filename;
            $courseDocument->path = $fileUrl;
            $courseDocument->save();
            return response()->json(['response' => "0"]); 
        } catch (\Exception $e) {
            // Handle any other exceptions
            return response()->json(['message' => 'An error occurred while uploading the document', 'error' => $e->getMessage()], 500);
        }
    }
    public function courseDocumentDelete($id){
            // dd($id);
            if ($id) {
                $course = CourseDocument::find($id);
                $course->delete();
                return redirect()->back()->with('success', 'Document delete successfully!');
            } else {
                return redirect()->route('course-list')->with('failed', 'Record not found.');
            }
    }
    public function documentdelete($id){
         if ($id) {
            $course = InfoPakSpecific::find($id);
            $course->delete();
            return redirect()->back()->with('success', 'Document delete successfully!');
        } else {
            return redirect()->route('course-list')->with('failed', 'Record not found.');
        }
        }
        public function emailcontent(Request $request){
            
            $course_email_content = CourseEmailContent::where('course_id',$request->courseId)->first();
            if($course_email_content){
                $course_email_content->course_id = $request->courseId;
                $course_email_content->subject = $request->subject;
                $course_email_content->body = $request->body;
                $course_email_content->select_document = json_encode($request->select,true);
                $course_email_content->save();
            }else{
                $emailContent = new CourseEmailContent;
                $emailContent->course_id = $request->courseId;
                $emailContent->subject = $request->subject;
                $emailContent->body = $request->body;
                $emailContent->select_document = json_encode($request->select,true);
                $emailContent->save();
            }
            return redirect()->back()->with('success', 'Document data Saved successfully!');
        }

        public function document_template(Request $request){
            $document =  BackgroundTemplate::where('id',$request->template)->first();
            $background_docu = BackgroundTemplate::where('templates_id',$document->templates_id)->where('id', '!=', $document->id)->update(['select' => null]);
            $document->select = 1;
            $document->save();
            return redirect()->back()->with('success', 'Document data Saved successfully!');
        }
        public function certificateDocument($id){
            $certificate =  BackgroundTemplate::find($id);
            return view('admin.course.template.edit',compact('certificate'));
        }
        public function template_update(Request $request){
                    $id = $request->template_id;
                    $certificate =  BackgroundTemplate::find($id);
                    $certificate->name = $request->name;
                    $certificate->dpi = $request->dpi;
                    $certificate->save();
                    return redirect()->back()->with('success', 'Document data Saved successfully!');

        }
        public function associated_update(Request $request){
                // dd($request);
                return redirect()->back()->with('success', 'Document data Saved successfully!');
        }

    public function text_editor(Request $request){
        $template = Template::where('id',$request->template_id)->first();
        $template->text_body = $request->text_editor;
        $template->save();
        // dd($template);
        return redirect()->back()->with('success', 'Document data Saved successfully!');
    }
    public function certifiacate_preview($id){
        $certificate = Template::find($id);
        $certificateBackground = BackgroundTemplate::where('templates_id',$certificate->id)->where('select','1')->first();
         // Generate the PDF
         $pdf = PDF::loadView('admin.certificate.pdf', compact('certificate','certificateBackground'));
         // Return the PDF for download or display
         return $pdf->stream('admin.certificate.pdf');
    }
}
