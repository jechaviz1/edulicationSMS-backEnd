<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Course;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\CourseCategory;
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
        $courses = Course::get();
        $users = User::get();
        $cities = City::get();
        $states = State::get();
        // dd($courseCategory);
        $data = [];
        $data['title'] = 'Event';
        $data['menu_active_tab'] = 'event';
        $data['academic_class'] = Event::orderBy('id', 'DESC')->where('is_deleted', '0')->get();
        $rows = Event::paginate(10);
        // dd($rows);
        return view('admin.event.courses.list',compact('courseCategory','courses','users','rows','states','cities'))->with($data);
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
        // dd($request);
        // Field Validation
        $request->validate([
            'course_type' => 'required',
            // 'reportingState' => 'required',
            // 'month' => 'required',
            // 'spyear' => 'required',
            // 'course_quota' => 'required',
            // 'city' => 'required',
            // 'location' => 'required',
            // 'requirement' => 'required',
            // 'units' => 'required',
            // 'modeId' => 'required',
            // 'preModeId' => 'required',
        ]);

       try{
            //   dd($request);
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
                        

                return response()->json([
                    'message' => 'Record added successfully.',
                    'sucess' => "true"
                ]);
            } catch (Exception $e) {
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
        if ($id) {
            $course = Event::find($id);
            if ($course) {
                //  dd($course);
                $course->is_deleted = '1';
                $course->save();
             }
             return redirect()->route('event.courses')->with('success', 'Record deleted.');
         } else {
             return redirect()->route('event.courses')->with('failed', 'Record not found.');
         }
    }

    public function status(Request $request){
       
        $id = request()->query('id');
        $status = request()->query('status');
        $course = Event::find($id);
        $course->status = $status;
        $course->Save();
        return redirect()->route('event.courses');
        // return view('admin.event.courses.list',compact('courseCategory','courses','users','rows'))->with($data);
    }

    public function archive(Request $request){
        $id = request()->query('id');
        $archive = request()->query('archive');
        // dd($archive);    
        $course = Event::find($id);
        $course->archive = $archive;
        $course->Save();
        return redirect()->route('event.courses');
    }

}
