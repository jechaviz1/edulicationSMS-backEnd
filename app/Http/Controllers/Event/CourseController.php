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
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseCategory = CourseCategory::get();
        $courses = Course::where('self_paced_sessions', '!=', null)->with('trainers')->get();
        $users = User::get();
        $cities = City::get();
        $states = State::get();
        $teachers = Teacher::get();
        $data = [];
        $data['title'] = 'Event';
        $data['menu_active_tab'] = 'event';
        $data['academic_class'] = Event::orderBy('id', 'DESC')->where('is_deleted', '1')->get();
        $rows = Event::paginate(10);
        return view('admin.event.courses.list', compact('courseCategory', 'courses', 'users', 'rows', 'states', 'cities', 'teachers'))->with($data);
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

        // Field Validation
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
        // dd($id);
        if ($id) {
            $course = Event::find($id);
            if ($course) {
                $course->delete();
            }
            return redirect()->route('event.courses')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('event.courses')->with('failed', 'Record not found.');
        }
    }

    public function status(Request $request)
    {

        $id = request()->query('id');
        $status = request()->query('status');
        $course = Event::find($id);
        $course->status = $status;
        $course->Save();
        return redirect()->route('event.courses');
        // return view('admin.event.courses.list',compact('courseCategory','courses','users','rows'))->with($data);
    }

    public function archive(Request $request)
    {
        $id = request()->query('id');
        $archive = request()->query('archive');
        // dd($archive);    
        $course = Event::find($id);
        $course->archive = $archive;
        $course->Save();
        return redirect()->route('event.courses');
    }
    public function course_event($id){
        $course_event = Event::find($id);
        $states = State::get();
        $course = Course::find($course_event->course_name);
        $enrollments = Enrolment::where('event_id',$course_event->id)->get();
        $learn_sms = LearnerSMSNote::where('event_id',$course_event->id)->get();
        $note_category = StudentNoteCategory::get();
        return view('admin.event.course.update', compact('course_event','course','states','enrollments','learn_sms','note_category'));
    }

    public function course_note(Request $request){
    //   dd($request);
        $sms_send = new LearnerSMSNote;
     
        $sms_send->course_id = $request->course_id;
        $sms_send->event_id = $request->event_id;
        $sms_send->note = "Group sms sent to all students by". auth()->user()->first_name . ' ' .  auth()->user()->last_name.$request->sms_Content;
        $sms_send->created_by =  auth()->user()->first_name . ' ' .  auth()->user()->last_name;
        $sms_send->type_of_note = "schedule";       
        $sms_send->save();
        return redirect()->back()->with('success', 'Template updated successfully.');
    }

    public function sms_send_course(Request $request)
    {
        // dd($request);
        $sms_send = new LearnerSMSNote;
        $sms_send->course_id = $request->course_id;
        $sms_send->event_id = $request->event_id;
        $sms_send->note = "Group sms sent to all students by". auth()->user()->first_name . ' ' .  auth()->user()->last_name.$request->sms_Content;
        $sms_send->created_by =  auth()->user()->first_name . ' ' .  auth()->user()->last_name;
        $sms_send->type_of_note = "schedule";       
        $sms_send->save();
        return redirect()->back()->with('success', 'Template updated successfully.');
    }
    public function enrolment_units_bulk(Request $request){
        foreach($request->unit as $unit){
            $unit_module = UnitCompetency::where('course_id',$unit['course_id'])->get();
            foreach($unit_module as $unit_modal){
                $unit_compencacy = StudentModule::where('student_id',$unit['student_id'])->where('unit_competency_id',$unit_modal->id)->first();
                if($unit_compencacy != null){
                }else{
                    $unit_modal = new StudentModule;
                    $unit_modal->student_id = $unit['student_id'];
                    $unit_modal->unit_competency_id = $unit_modal->id;
                    $unit_modal->enrollment_date = Carbon::now();
                    $unit_modal->completion_date = "";
                    $unit_modal->module_activity_start = "";
                    $unit_modal->outcomeId = "";
                    $unit_modal->unitCompetencyDate = "";
                    $unit_modal->note = "";
                    $unit_modal->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Template updated successfully.');
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
               // dd($e);
               return redirect()->back()->with('success', 'Template updated successfully.');
            }

    }
}
