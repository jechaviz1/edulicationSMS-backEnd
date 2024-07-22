<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Enrolment;
use App\Models\State;
use App\Models\StudentNoteCategory;
use App\Models\EnrolmentAddNote;
use App\Models\UnitCompetency;
use App\Models\StudentModule;
use App\Models\AvitmissEnrolment;
use App\Models\IssueCertificate;
use App\Models\Template;
use Log;
use PDF;
use DB;
use Carbon\Carbon;
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
            Log::error('An error occurred: ' . $e->getMessage());
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
            Log::error('An error occurred: ' . $e->getMessage());
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
    public function enrollment_add_people(Request $request)
    {
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
        $enrollment = Enrolment::find($id);
        $states = State::get();
        $note_student = StudentNoteCategory::get();
        $data['unit_core_active'] = UnitCompetency::where('course_id', $enrollment->course_id)->where('type','core')->where('status', 'A')->get();
        $data['unit_elective_active']  = UnitCompetency::where('course_id', $enrollment->course_id)->where('type', 'elective')->where('status', 'A')->get();
        $data['unit_core_inactive'] = UnitCompetency::where('course_id', $enrollment->course_id)->where('type', 'core')->where('status', 'A')->get();
        $data['unit_elective_inactive'] = UnitCompetency::where('course_id', $enrollment->course_id)->where('type', 'elective')->where('status', 'A')->get();
        $data['student_module'] = StudentModule::where('student_id',$enrollment->student->id)->where('unit_competency_id',$enrollment->course->id)->get();
        $data['avitmiss'] = AvitmissEnrolment::where('student_id',$enrollment->student->id)->where('course_id',$enrollment->course->id)->first();
        $data['templates'] = Template::get();
       $enrolmentnote  = EnrolmentAddNote::where('student_id', $enrollment->student->id)->where('course_id', $enrollment->course->id)->get();
       $data['issue_certificate']  = IssueCertificate::where('student_id', $enrollment->student->id)->where('course_id', $enrollment->course->id)->where('template',$enrollment->id)->first();
        return view('admin.enrollment.student.update', compact('enrollment', 'states', 'note_student', 'enrolmentnote'))->with($data);
    }

    public function enolmentNoteAdd(Request $request)
    {
        $enrolment = new EnrolmentAddNote;
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = 'Enrolment_' . time() . '_' . $file->getClientOriginalName();
            $enrolment->attachment = $file->getClientOriginalName();
            $file->move(public_path('notes'), $filename);
            // Generate the file URL
            $fileUrl = 'notes/' . $filename;
        }
        $enrolment->student_id = $request->student_id;
        $enrolment->note_category = $request->note_category;
        $enrolment->template = $request->template;
        $enrolment->note = $request->note;
        $enrolment->course_id = $request->course_id;
        $enrolment->upload = $fileUrl;
        $enrolment->created_by = auth()->user()->first_name . ' ' .  auth()->user()->last_name;
        $enrolment->save();
        return redirect()->back()->with('sucess', 'Sucess Record Created');
    }

    public function enolmentNoteUpdate(Request $request)
    {
        $enrolment_update = EnrolmentAddNote::where('id', $request->note_id)->first();
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = 'Enrolment_' . time() . '_' . $file->getClientOriginalName();
            $enrolment_update->attachment = $file->getClientOriginalName();
            $file->move(public_path('notes'), $filename);
            // Generate the file URL
            $fileUrl = 'notes/' . $filename;
            $enrolment_update->upload = $fileUrl;
        }
        $enrolment_update->note = $request->note;
        $enrolment_update->note_category = $request->note_category;
        $enrolment_update->template = $request->template;
        $enrolment_update->created_by = auth()->user()->first_name . ' ' .  auth()->user()->last_name;
        $enrolment_update->save();
        return redirect()->back()->with('sucess', 'Sucess Record Created');
    }

    public function enrolment_note_delete($id){
        // dd($id);
        $enrolment_update = EnrolmentAddNote::find($id);
        $enrolment_update->delete();
        return redirect()->back()->with('sucess', 'Sucess Record Created');
    }

    public function exportToPdf(){
        
        $enrolmentNotes = EnrolmentAddNote::all();

        $pdf = PDF::loadView('admin.enrolment_notes.pdf', ['enrolmentNotes' => $enrolmentNotes]);

        return $pdf->download('admin.enrolment_notes.pdf');
    }

    public function enrolmentModule(Request $request){
        // dd($request->module);
        foreach ($request->module as $module){
            // Validate the data before processing
            $validatedData = $request->validate([
                'module.*.student_id' => 'required|exists:students,id',
                'module.*.unit_competency_id' => 'required|exists:unit_of_competency,id',
                'module.*.note' => 'nullable|string',
            ]);
          
            $student = Student::find($module['student_id']);
            $module =  StudentModule::updateOrInsert(
                [
                   'student_id' => $module['student_id'],
                    'unit_competency_id' => $module['unit_competency_id']
                ],
                [
                    'note' => $module['note'],
                    'enrollment_date' => Carbon::now()
                    ]
                );
            }
        return redirect()->back()->with('success', 'Success! Records have been updated.');
    }
    public function moduleEnrolment(Request $request,$id){
        // dd($request);
               $module = StudentModule::where('id',$id)->first();
               $module->enrollment_date = $request->enrolDate;
               $module->module_activity_start = $request->module_activity_start;
               $module->outcomeId = $request->outcomeId;
               $module->unitCompetencyDate = $request->unitCompetencyDate;
               $module->note = $request->notes;
               $module->save();
            //    dd($module,$request);
               return redirect()->back()->with('success', 'Success! Records have been updated.');
    }
    public function enrolmentPdf(Request $request){
        // dd($request);
        $enrollment = Enrolment::find($request->enrolment);

        $pdf = PDF::loadView('admin.enrollment.unit.pdf', ['enrollment' => $enrollment]);

        return $pdf->download('admin.enrolment_notes.pdf');
    }
    public function enrolmentAvimiss(Request $request){
        // dd($request->student_id,$request);
        $avitmissEnrolment = AvitmissEnrolment::where('student_id',$request->student_id)->where('course_id',$request->course_id)->first();
        //    dd($avitmissEnrolment);
        if($avitmissEnrolment != null){
            $avitmissEnrolment->student_id = $request->student_id;
            $avitmissEnrolment->course_id = $request->course_id;
            $avitmissEnrolment->deliverymodeId = $request->deliverymodeId;
            $avitmissEnrolment->scheduledHours = $request->scheduledHours;
            $avitmissEnrolment->studyReasonId = $request->studyReasonId;
            $avitmissEnrolment->commencourseId = $request->commencourseId;
            $avitmissEnrolment->isVETSchool = $request->isVETSchool;
            $avitmissEnrolment->schoolTypeId = $request->schoolTypeId;
            $avitmissEnrolment->contractApprenticeshipId = $request->contractApprenticeshipId;
            $avitmissEnrolment->clientApprenticeshipId = $request->clientApprenticeshipId;
            $avitmissEnrolment->associatedCourseId = $request->associatedCourseId;
            $avitmissEnrolment->tuitionFee = $request->tuitionFee;
            $avitmissEnrolment->save();
        }else{
            $avitmiss_enrolment = new AvitmissEnrolment;
            $avitmiss_enrolment->student_id = $request->student_id;
            $avitmiss_enrolment->course_id = $request->course_id;
            $avitmiss_enrolment->deliverymodeId = $request->deliverymodeId;
            $avitmiss_enrolment->scheduledHours = $request->scheduledHours;
            $avitmiss_enrolment->studyReasonId = $request->studyReasonId;
            $avitmiss_enrolment->commencourseId = $request->commencourseId;
            $avitmiss_enrolment->isVETSchool = $request->isVETSchool;
            $avitmiss_enrolment->schoolTypeId = $request->schoolTypeId;
            // dd($request->schoolTypeId);
            $avitmiss_enrolment->contractApprenticeshipId = $request->contractApprenticeshipId;
            $avitmiss_enrolment->clientApprenticeshipId = $request->clientApprenticeshipId;
            $avitmiss_enrolment->associatedCourseId = $request->associatedCourseId;
            $avitmiss_enrolment->tuitionFee = $request->tuitionFee;
            $avitmiss_enrolment->save();
        }
        
        return redirect()->back()->with('success', 'Success! Records have been updated.');
    }
    public function enrolmentCertificate(Request $request){
            $issue_certificate = new IssueCertificate;
            $issue_certificate->student_id = $request->student_id;
            $issue_certificate->course_id = $request->course_id;
            $issue_certificate->enrolment_id = $request->enrolment_id;
            $issue_certificate->issue_date = $request->issue_date;
            $issue_certificate->template = $request->template;
            $issue_certificate->delivery_method = $request->delivery_method;
            if($request->include_report == "1"){
                $issue_certificate->include_report = "1";
            }else{
                $issue_certificate->include_report = "0";
            }
            $issue_certificate->comments = $request->comments;
            $issue_certificate->save();
            return redirect()->back()->with('success', 'Success! Records have been updated.');
    }
}
