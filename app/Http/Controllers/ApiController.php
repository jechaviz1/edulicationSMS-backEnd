<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Teacher;
use App\Models\DefaultSession;
use App\Models\Course;
use App\Models\Student;
use App\Models\Enrolment;
use App\Models\EnrolmentAddNote;
use App\Http\Resources\UserResource;
use App\Models\IssueCertificate;
use App\Models\FundingState;
use PDF;
use Svg\Tag\Rect;

class ApiController extends Controller
{
    public function cityget(){
        $cities = City::get();
        return response()->json($cities);
    }
    public function teacherget(){
        $teacheres = Teacher::get();
        // dd($teacheres);
        return response()->json($teacheres);
    }
    public function default_get(Request $request){
        $id = $request->query('id');
        $defaultsessions = DefaultSession::where('id',$id)->first();
        return response()->json($defaultsessions);
    }
    public function default_update(Request $request){
            $defaultsessions = DefaultSession::where('id',$request->id)->first();
            $defaultsessions->dftCity = $request->city_id;
            $defaultsessions->dftTrainer = $request->trainer;
            $defaultsessions->dftAssessor = $request->assessor;
            $defaultsessions->dftstarthour = $request->dftstarthour;
            $defaultsessions->dftstartmin = $request->dftstartmin;
            $defaultsessions->dftstartampm = $request->dftstartampm;
            $defaultsessions->dftendhour = $request->dftendhour;
            $defaultsessions->dftendmin = $request->dftendmin;
            $defaultsessions->dftendampm = $request->dftendampm;
            $defaultsessions->save();
            return response()->json(['response' => "0"]); 
    }
    public function sessions_course(Request $request){
        $id = $request->query('scheduleId');
        if($id == "Self Paced"){
            $courses = Course::where('self_paced_sessions','!=',null)->with('trainers')->get();
            return response()->json(['courses' => $courses]); 
        }
        if($id == "Public Sessions"){
            $courses = Course::where('public_sessions','!=',null)->with('trainers')->get();
            return response()->json(['courses' => $courses]); 
        }
        if($id == "Private Sessions"){
            $courses = Course::where('private_sessions','!=',null)->with('trainers')->get();
            return response()->json(['courses' => $courses]); 
        }
    }

    public function sessions_trainer(Request $request){
            // dd($request);
            $id = $request->query('course_id');
            $courses = Course::find($id);
            return response()->json(['courses' => $courses->trainers]); 
    }

    public function sessions_assessor(Request $request){
        // dd($request);
        $id = $request->query('course_id');
        $courses = Course::find($id);
        return response()->json(['courses' => $courses->assessors]); 
    }
    public function course_single(Request $request){
        $id = $request->query('course_id');
        $courses = Course::find($id);
        return response()->json(['courses' => $courses]); 
    }
    public function sessions_course_trainer_list(){
        $trainers = Teacher::get();
        return response()->json(['trainer' => $trainers]); 

    }
    public function findpeople(Request $request){
        $search_filled = $request->query('search_filled');
        $searchvalue = $request->query('searchvalue');
        
        $students =  Student::where( $search_filled , $searchvalue)->get();
        
        return response()->json(['students' => $students]); 

    }
    public function findnote(Request $request){
                    $id = $request->query('id');
                    $note = EnrolmentAddNote::where('id',$id)->first();
                    return response()->json(['note' => $note]); 
    }
    public function exportToPdf(Request $request){
            // dd($request);
            $enrolmentNotes = EnrolmentAddNote::where('student_id',$request->student_id)->where('course_id',$request->course_id)->get();

            $pdf = PDF::loadView('admin.enrolment_notes.note', ['enrolmentNotes' => $enrolmentNotes]);
    
            return $pdf->download('note.pdf');
    }
    public function certificatepdf($id){
        $data = IssueCertificate::where('id',$id)->first();
        $enrollment = Enrolment::find($data->enrolment_id);
        // dd($data);
        $pdf = PDF::loadView('admin.certificate.certificate', ['data' => $data,'enrollment' => $enrollment]);
    
        return $pdf->download('note.pdf');
        // return response()->json(['data' => $data]); 
    }
    public function funding_find(Request $request){
        $national = $request->query('national');
        $state = $request->query('state');
        $fundingSource = FundingState::where('state',$state)->where('national_id',$national)->get();
        return response()->json(['fundingSource' => $fundingSource]);
    }
}
