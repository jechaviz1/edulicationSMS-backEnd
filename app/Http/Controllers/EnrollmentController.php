<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Enrolment;
use Log;
class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->columns != null) {
               
            } else {
                $rows = Student::where('is_deleted', '0')->paginate(10);
                return view('admin.enrollment.search', compact('rows'));
            }
        } catch (\Exception $e) {
            // Handle the exception, e.g., log the error and show an error message to the user
            \Log::error('An error occurred: '.$e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
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
        //
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
        //
    }

    public function bulk(Request $request){
        try {
            if ($request->columns != null) {
               
            } else {
                $rows = Student::where('is_deleted', '0')->paginate(10);
                return view('admin.enrollment.bulk', compact('rows'));
            }
        } catch (\Exception $e) {
            // Handle the exception, e.g., log the error and show an error message to the user
            Log::error('An error occurred: '.$e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    public function enrollment_issue(Request $request){
        $enrollment = new Enrolment;
        $enrollment->course_id = $request->course_id;
        $enrollment->event_id = $request->event_id;
        $enrollment->student_id = $request->studentList;
        $enrollment->receivedBy = $request->receivedBy;
        $enrollment->paymentStatus = $request->paymentStatus;
        $enrollment->discountAmount = $request->discountAmount;
        $enrollment->isTrainee = $request->isTrainee;
        $enrollment->isReported = $request->isReported;
        $enrollment->RTOStudentId = $request->RTOStudentId;
        $enrollment->save();
        return redirect()->back()->with('sucess', 'Sucess Record');


    }
    public function enrollment_add_people(Request $request){
                dd($request);
    }
}
