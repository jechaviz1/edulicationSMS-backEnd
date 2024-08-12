<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Course;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\Teacher;
use App\Models\CourseCategory;
use App\Models\Enrolment;
use App\Models\Session;
use App\Models\StudentNoteCategory;
use App\Models\LearnerSMSNote;
use App\Models\UnitCompetency;
use App\Models\StudentModule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Auth;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $courseCode = $request->query('courseCode');
            $delivery_method = $request->query('delivery_method');
            // dd($delivery_method);
            $course_value = null;
            $courseCategory = CourseCategory::where('is_deleted','0')->where('created_by', Auth::user()->id)->orderBy('name', 'asc')->get();
            $courses = Course::where('self_paced_sessions', '!=', null)->with('trainers')->get();
            $users = User::get(); 
            $cities = City::get();
            $states = State::get();
            $teachers = Teacher::get();
            $data = [];
            $data['title'] = 'Event';
            $data['menu_active_tab'] = 'event';
            $data['academic_class'] = Event::orderBy('id', 'DESC')->where('is_deleted', '1')->get();
            if($courseCode != null){
                $rows = Event::where('course_type', $courseCode)->where('archive','!=','1')->paginate(10);
                $course_value = $courseCode;
            }else{
                $rows = Event::where('archive','!=','1')->paginate(10);
            }
            return view('admin.event.courses.list', compact('course_value','courseCategory', 'courses', 'users', 'rows', 'states', 'cities', 'teachers'))->with($data);
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in index method: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error loading the event list. Please try again later.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_type' => 'required',
        ]);
           try{
        $events = new Event;
        $events->course_type = $request->course_type;
        $events->reporting_state = $request->reporting_state;
        $events->course_name = $request->course_name;
        $events->group = $request->group;
        $events->trainers = $request->trainers;
        $events->assessors = $request->assessors;
        $events->month = $request->month;
        $events->year = $request->spyear;
        $events->course_quota = $request->course_quota;
        $events->course_cost = $request->course_cost;
        $events->city = $request->city;
        $events->location = $request->location;
        $events->resources = $request->requirement;
        $events->selects_units = $request->selects_units;
        $events->delevery_mode = $request->modeId;
        $events->predominant_delivery_mode = $request->preModeId;
        $events->save();
        if ($request->sessions != null) {
            foreach ($request->sessions as $sessions) {
                $session = new Session;
                $session->title = $request->moduleName;
                $session->course_id = $request->course_name;
                $session->teacher_id = $sessions["'trainer'"];
                $session->assessor_id = $sessions["'assessor'"];
                $session->event_id = $events->id;
                $session->location = $sessions["'location'"];
                $session->rooms = $sessions["'room'"];
                $session->start_date = $sessions["'startDate'"];
                $session->dftstarthour = $sessions["'starthour'"];
                $session->dftstartmin = $sessions["'startminute'"];
                $session->dftstartampm = $sessions["'startampm'"];

                $session->end_date = $sessions["'endDate'"];
                $session->dftendhour = $sessions["'endhour'"];
                $session->dftendmin = $sessions["'endminute'"];
                $session->dftendampm = $sessions["'endampm'"];
                $session->save();
            }
        }
        return response()->json([
            'message' => 'Record added successfully.',
            'sucess' => "true"
        ]);
        } catch (\Exception $e) {
           // dd($e);
            // return redirect()->route('course-list')->with('failed', 'Record not added.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if ($id) {
                $course = Event::find($id);
                if ($course) {
                    $course->delete();
                    return redirect()->route('event.courses')->with('success', 'Record deleted.');
                } else {
                    return redirect()->route('event.courses')->with('failed', 'Record not found.');
                }
            } else {
                return redirect()->route('event.courses')->with('failed', 'Invalid ID provided.');
            }
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in deleteEventCourse method: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->route('event.courses')->with('error', 'There was an error deleting the record. Please try again later.');
        }
    }

    public function status(Request $request)
    {
        try {
            $id = $request->query('id');
            $status = $request->query('status');
            
            $course = Event::find($id);
    
            if ($course) {
                $course->status = $status;
                $course->save();
                return redirect()->route('event.courses')->with('success', 'Course status updated successfully.');
            } else {
                return redirect()->route('event.courses')->with('failed', 'Course not found.');
            }
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in status method: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->route('event.courses')->with('error', 'There was an error updating the course status. Please try again later.');
        }
    }

    public function archive(Request $request)
    {
        try {
            $id = $request->query('id');
            $archive = $request->query('archive');
            $course = Event::find($id);
            
            if ($course) {
                $course->archive = $archive;
                $course->save();
                return redirect()->route('event.courses')->with('success', 'Course archive status updated successfully.');
            } else {
                return redirect()->route('event.courses')->with('failed', 'Course not found.');
            }
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in archiveEvent method: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->route('event.courses')->with('error', 'There was an error updating the course archive status. Please try again later.');
        }
    }
    public function course_event($id){
        try {
            $course_event = Event::find($id);
    
            if (!$course_event) {
                return redirect()->route('event.courses')->with('failed', 'Course event not found.');
            }
    
            $states = State::get();
            $course = Course::find($course_event->course_name);
    
            if (!$course) {
                return redirect()->route('event.courses')->with('failed', 'Course not found.');
            }
    
            $enrollments = Enrolment::where('event_id', $course_event->id)->get();
            $learn_sms = LearnerSMSNote::where('event_id', $course_event->id)->get();
            $note_category = StudentNoteCategory::get();
    
            return view('admin.event.course.update', compact('course_event', 'course', 'states', 'enrollments', 'learn_sms', 'note_category'));
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in updateEventCourse method: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->route('event.courses')->with('error', 'There was an error loading the course event details. Please try again later.');
        }
    }

    public function course_note(Request $request){
    //   dd($request);
    try {
        $sms_send = new LearnerSMSNote;
        $sms_send->course_id = $request->course_id;
        $sms_send->event_id = $request->event_id;
        $sms_send->note = "Group sms sent to all students by " . auth()->user()->first_name . ' ' .  auth()->user()->last_name . " " . $request->sms_Content;
        $sms_send->created_by = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $sms_send->type_of_note = "schedule";       
        $sms_send->save();

        return redirect()->back()->with('success', 'Template updated successfully.');
    } catch (\Exception $e) {
        // Log the exception
        Log::error('Error in sendSms method: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->back()->with('error', 'There was an error sending the SMS. Please try again later.');
    }
    }

    public function sms_send_course(Request $request)
    {
        // dd($request);
        try {
            $sms_send = new LearnerSMSNote;
            $sms_send->course_id = $request->course_id;
            $sms_send->event_id = $request->event_id;
            $sms_send->note = "Group sms sent to all students by " . auth()->user()->first_name . ' ' .  auth()->user()->last_name . " " . $request->sms_Content;
            $sms_send->created_by = auth()->user()->first_name . ' ' . auth()->user()->last_name;
            $sms_send->type_of_note = "schedule";       
            $sms_send->save();
    
            return redirect()->back()->with('success', 'Template updated successfully.');
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in sendSms method: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error sending the SMS. Please try again later.');
        }
    }
    public function enrolment_units_bulk(Request $request)
    {
        try {
            foreach($request->unit as $unit) {
                $unit_modules = UnitCompetency::where('course_id', $unit['course_id'])->get();
                
                foreach($unit_modules as $unit_module) {
                    $unit_competency = StudentModule::where('student_id', $unit['student_id'])
                                                    ->where('unit_competency_id', $unit_module->id)
                                                    ->first();
                    
                    if ($unit_competency == null) {
                        $student_module = new StudentModule;
                        $student_module->student_id = $unit['student_id'];
                        $student_module->unit_competency_id = $unit_module->id;
                        $student_module->enrollment_date = Carbon::now();
                        $student_module->completion_date = null;
                        $student_module->module_activity_start = null;
                        $student_module->outcomeId = null;
                        $student_module->unitCompetencyDate = null;
                        $student_module->note = null;
                        $student_module->save();
                    }
                }
            }
    
            return redirect()->back()->with('success', 'Template updated successfully.');
        } catch (\Exception $e) {
            // Log the exception
            Log::error('Error in enrolment_units_bulk: ' . $e->getMessage());
    
            // Redirect back with an error message
            return redirect()->back()->with('error', 'There was an error updating the template. Please try again later.');
        }
    }
    public function edit_schedule(Request $request){
        try{
            $events = Event::where('event_id',$request->event_id)->first();
            $events->course_type = $request->course_type;
            $events->reporting_state = $request->reporting_state;
            $events->course_name = $request->course_name;
            $events->group = $request->group;
            $events->trainers = $request->trainers;
            $events->assessors = $request->assessors;
            $events->month = $request->month;
            $events->year = $request->spyear;
            $events->course_quota = $request->course_quota;
            $events->course_cost = $request->course_cost;
            $events->city = $request->city;
            $events->location = $request->location;
            $events->resources = $request->requirement;
            $events->selects_units = $request->selects_units;
            $events->delevery_mode = $request->modeId;
            $events->predominant_delivery_mode = $request->preModeId;
            $events->save();
            return redirect()->back()->with('success', 'Template updated successfully.');
            } catch (\Exception $e) {
               return redirect()->back()->with('success', 'Template updated successfully.');
            }

    }

    public function filter(Request $request)
{
    $category = $request->input('category');
    
    $query = Course::query();

    if ($category) {
        $query->where('category_id', $category);
    }

    return $query;
}
}