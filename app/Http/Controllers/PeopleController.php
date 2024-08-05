<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enquiry;
use App\Models\City;
use App\Models\EnrolmentAddNote;
use App\Models\StudentNoteCategory;
use App\Models\EnrolmentDocument;
use App\Models\EnuquiryNote;
use App\Models\Language;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Mail;
use App\Mail\DocumentMail;
use App\Models\Country;
use App\Models\User;
use PDF;
class PeopleController extends Controller
{
    public function index(Request $request){
        if($request->columns != null){
           

        }else{
            $rows = Student::where('is_deleted', '0')->paginate(10);
            return view('admin.people.list',compact('rows'));
        }
    }
    public function store(Request $request){

        $this->validate($request, [
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
        ]);
        $student = new \App\Models\Student();
        $student->first_name = $request['first_name'];
        $student->last_name = $request['last_name'];
        $student->preferred_contact =  $request['contactType'] . ":" . $request['contactInfo'];
        $student->save();
        $id = $student->id;
        return redirect()->route('people.profile',$id)->with('sucess','Sucessfully Add People');
    }
    public function profile(Request $request,$id){
        $studentID  = $id;
        $student = Student::find($id);
        $courses = Course::get();
        $enquiry = Enquiry::where('student_id',$id)->get();
        $cities = City::get();
        $countries = Country::get();
        $languages = Language::get();
        $document = EnrolmentDocument::where('student_id',$studentID)->with('student')->get();
        $noteCtegory = StudentNoteCategory::get();
        $noteEnrolment = EnrolmentAddNote::where('student_id',$studentID)->get();
        return view('admin.people.profile',compact('studentID','student','courses','enquiry','cities','noteCtegory','noteEnrolment','document','languages','countries'));

    }
    public function profileUpdate(Request $request,$id){
        // dd($request);
        $student = Student::find($id);
            $image = new ImageController;
            $myimage = "null";
            if (!is_null($request->photo)){
                $image = new ImageController;
                $myimage = $image->files($request->photo);
                $student->image = $myimage;
            }
         $student->entryDate = $request->entryDate;
         $student->buildingName = $request->buildingName;
         $student->buildingName_postal = $request->buildingName_postal;
         $student->businessNumber = $request->business;
         $student->certificateName = $request->certificateName;
         $student->companyName = $request->clientCompany;
         $student->contactNumber = $request->mobile;
         $student->colStatusSurveyResponse = $request->surveyStat;
         $student->country = $request->country;
         $student->country_postal = $request->country_postal;
         $student->dob = $request->birthDate;
         $student->preferred_contact = $request->preferredName;
         $student->studentEmail = $request->Email;
         $student->studentEmail2 = $request->Email2;
         $student->studentEmail3 = $request->Email3;
         $student->employeeNumber = $request->employeeNumber;
         $student->entryDate = $request->entryDate;
         $student->first_name = $request->first;
         $student->unitDetails = $request->unitDetails;
         $student->unitDetails_postal = $request->unitDetails_postal;
         $student->gender = $request->gender;
         $student->highestLevelCompleted = $request->gender;
         $student->homeNumber = $request->home;
         $student->indigenousStatus = $request->home;
         $student->isContact = $request->isContact;
         $student->isLearner = $request->isLearner;
         $student->last_name = $request->last;
         $student->middle_name = $request->middle;
         $student->RTOStudentId = $request->RTOStudentId;
         $student->isInternational = $request->isInternational;
         $student->nationalID = $request->nationalID;
         $student->postCode = $request->postcode;
         $student->postalCode_postal = $request->postalCode_postal;
         $student->deliveryBox_postal = $request->deliveryBox_postal;
         $student->preferredName = $request->preferredName; 
         $student->role = $request->role;
         $student->fax = $request->faxNumber;
         $student->nameType = $request->nameType;
        //  dd(  $student->postCode);
         $student->state = $request->state;
         $student->state_postal = $request->state_postal;
         $student->addressLine2 = $request->address2;
         $student->streetName_postal = $request->streetName_postal;
         $student->addressLine1 = $request->address1;
         $student->streetNumber = $request->streetNumber;
         $student->streetNumber_postal = $request->streetNumber_postal;
         $student->suburb = $request->suburb;
         $student->suburb_postal = $request->suburb_postal;
         $student->surveyStat = $request->surveyStat;
         $student->title = $request->title;
         $student->uniqueStudentIdentifier = $request->uniqueStudentIdentifier;
         $student->vsn = $request->uniqueStudentIdentifier;
         $student->save();
        //  dd($student);
         return redirect()->back()->with('failed', 'Record not found.');

    }

    public function sms_filter(Request $request){

    }

    public function delete($id){
        try {
            $user = Student::findOrFail($id);
            $user->delete();
            return redirect()->route('people.find.index')->with('success', 'Profile deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('people.find.index')->with('error', 'Failed to delete profile.');
        }
        if ($id) {
            $student = Student::find($id);
            if ($student) {
                $student->is_deleted = '1';
                $student->save();
            }
            return redirect()->route('people.find.index')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('people.find.index')->with('failed', 'Record not found.');
        }
    }
    public function new_enquiry(Request $request){
        // dd($request);
        $enuiry = new Enquiry;
        $enuiry->student_id  = $request->studentId;
        $enuiry->course_id  =$request->courseList;
        $enuiry->assignTo  = $request->assignTo;
        $enuiry->delevery_method  = json_encode($request->delevery_method);
        $enuiry->important  = $request->important;
        $enuiry->cityList  = json_encode($request->cityList);
        $enuiry->likelyMonth  = $request->likelyMonth;
        $enuiry->referralList  = $request->referralList;
        $enuiry->note  = $request->note;
        $enuiry->followUpDate  = $request->followUpDate;
        $enuiry->save();
        return redirect()->back()->with('failed', 'Record not found.');
    }

    public function person_note(Request $request){
        
        $enrolment = new EnrolmentAddNote;
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $filename = 'Enrolment_' . time() . '_' . $file->getClientOriginalName();
            $enrolment->attachment = $file->getClientOriginalName();
            $file->move(public_path('notes'), $filename);
            $fileUrl = 'notes/' . $filename;
            $enrolment->upload = $fileUrl;
        }
        $enrolment->student_id = $request->student_id;
        $enrolment->note_category = $request->noteCategory;
        $enrolment->template = $request->template;
        $enrolment->note = $request->note;
        $enrolment->follow_up_to_date = $request->follow_up_to_date;
        $enrolment->created_by = auth()->user()->first_name . ' ' .  auth()->user()->last_name;
        $enrolment->save();
        return redirect()->back()->with('sucess', 'Sucess Record Created');
    }
    public function exportPDF($id){
        $enrolment = EnrolmentAddNote::where('student_id',$id)->get();
    
        $pdf = PDF::loadView('admin.enrolment_notes.pdf', ['enrolmentNotes' => $enrolment]);

        return $pdf->download('admin.enrolment_notes.pdf');
    }
    public function deletePerson($id){
            $enrolment = EnrolmentAddNote::find($id);
            $enrolment->delete();
            return redirect()->back()->with('sucess', 'Sucess Record Created');
    }
    public function AddEnuiryNote(Request $request){
        $enuiryNote = new EnuquiryNote;
        $enuiryNote->student_id = $request->studentId;
        $enuiryNote->course_id = $request->courseId;
        $enuiryNote->enuquiry_id = $request->enquiryId;
        $enuiryNote->note_category = $request->noteCat;
        $enuiryNote->followUpDate = $request->followUpDate2;
        $enuiryNote->assignTo = $request->assignTo;
        $enuiryNote->chance_success = $request->important;
        $enuiryNote->likelyMonth = $request->likelyMonth;
        $enuiryNote->template = $request->likelyMonth;
        $enuiryNote->note = $request->note;
        $enuiryNote->save();
        return redirect()->back()->with('sucess', 'Sucess Record Created');

    }
    public function noteList(Request $request){
        // Retrieve the 'id' from the request
        $enquiryId = $request->query('id');
        // Fetch the notes related to the enquiry ID from the database
        // Assuming you have a Note model related to an Enquiry
        $notes = EnuquiryNote::where('enuquiry_id', $enquiryId)->with('category')->get();
        // Return the notes as a JSON response
        return response()->json($notes);
    }
    public function  document_enrolment(Request $request){
        foreach($request->ducment_name as $key => $documentName){
                if($documentName != null){
                    $document = new EnrolmentDocument;
                    $document->student_id = $request->student_id;
                    $document->document_name = $documentName; 
                    $file = $request->document_file[$key]; 
                    $filename = 'Document_' . time() . '_' . $file->getClientOriginalName();
                    $document->file_name = $file->getClientOriginalName();
                    $file->move(public_path('Enrolment_Document'), $filename);  
                    $fileUrl = 'Enrolment_Document/' . $filename; 
                    $document->path = $fileUrl;
                    $document->upload_by = auth()->user()->first_name . ' ' .  auth()->user()->last_name;
                    $document->save();
                }
        }
        return redirect()->back()->with('sucess', 'Sucess Record Created');
    }

    public function enrolment_delete($id){
            $enrolment = EnrolmentDocument::where('id',$id)->first();+
            $enrolment->delete();
            return redirect()->back()->with('sucess', 'Sucess Record Created');
    }
    public function send_mail(Request $request){
        $details = [
            'subject' => $request->subject,
            'body' => $request->note_email
        ];
        $filePath = public_path($request->document_path); // Path to the attachment file
    
        Mail::to($request->email)->send(new DocumentMail($details, $filePath));
        return redirect()->back()->with('sucess', 'Sucess Record Created');
    }
    public function edit_lnguage(Request $request){
        $student = Student::where('id',$request->student_id)->first();
        $student->birthCountry = $request->birthCountry;
        $student->isMainEnglish = $request->isMainEnglish;
        $student->nospokenlanguage = $request->nospokenlanguage;
        $student->spokenLanguage = $request->spokenLanguage;
        $student->englishProficiency = $request->englishProficiency;
        $student->indigenousStatus = $request->indigenousStatus;
        $student->save();
        // dd($student);
        return redirect()->back()->with('sucess', 'Sucess Record Created');
    }
    public function logo_update(Request $request){
        $student = User::where('id',$request->companyId)->first();
        if ($request->hasFile('logoImg')) {
            $file = $request->file('logoImg');
            $filename = 'Enrolment_' . time() . '_' . $file->getClientOriginalName();
            $student->profile_image = $file->getClientOriginalName();
            $file->move(public_path('notes'), $filename);
            $fileUrl = 'notes/' . $filename;
            $student->profile_image_path = $fileUrl;
        }
        $student->save();  
        return redirect()->back()->with('sucess', 'Sucess Record Created');
        
    }
    public function logo_delete($id){
            $student = User::where('id',$id)->first();
            $student->profile_image = null;
            $student->profile_image_path = null;
            $student->save();
            return redirect()->back()->with('sucess', 'Sucess Record Created');
    }
    public function search_profile(Request $request){
        $students = Student::where('first_name', 'like', "%$request->data%")
                        ->orWhere('last_name', 'like', "%$request->data%")
                        ->get();

    return response()->json($students);
    }
} 
