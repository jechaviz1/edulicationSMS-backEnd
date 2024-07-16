<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Enrolment;
use App\Models\State;
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
                $student = new Student;
                $student->title = $request->title;
                $student->first_name = $request->firstName;
                $student->middle_name = $request->middleName;
                $student->last_name = $request->lastName;
                $student->gender = $request->gender;
                $student->birth = $request->birth;
                $student->clientCompany = $request->clientCompany;
                $student->role = $request->role;
                $student->address1 = $request->address1;
                $student->address2 = $request->address2;
                $student->uniqueStudentIdentifier = $request->uniqueStudentIdentifier;
                $student->buildingName = $request->buildingName;
                $student->streetNumber = $request->streetNumber;
                $student->streetName = $request->streetName;
                $student->suburb = $request->suburb;
                $student->postcode = $request->postcode;
                $student->nationality = $request->country;
                $student->contactNumber = $request->contactNumber;
                $student->businessNumber = $request->businessNumber;
                $student->facsimileNumber = $request->facsimileNumber;
                $student->email = $request->studentEmail;
                $student->studentEmail2 = $request->studentEmail2;
                $student->studentEmail3 = $request->studentEmail3;
                $student->buildingName_postal = $request->buildingName_postal;
                $student->unitDetails_postal = $request->unitDetails_postal;
                $student->streetNumber_postal = $request->streetNumber_postal;
                $student->streetName_postal = $request->streetName_postal;
                $student->deliveryBox_postal = $request->deliveryBox_postal;
                $student->suburb_postal = $request->suburb_postal;
                $student->postalCode_postal = $request->postalCode_postal;
                $student->country_postal = $request->country_postal;
                $student->save();
                return redirect()->back()->with('sucess', 'Sucess Record');
    }
    public function enrolment_add_people_update($id){
                // dd($id);
                $enrollment = Enrolment::find($id);
                $states = State::get();
                return view('admin.enrollment.student.update', compact('enrollment','states'));
    }
}
