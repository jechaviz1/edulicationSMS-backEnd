<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student ;
use App\Http\Controllers\ImageController;
class PeopleController extends Controller
{
    public function index(Request $request){
        if($request->columns != null){
            dd($request);

        }else{
            $rows = Student::where('is_deleted', '0')->paginate(10);
            return view('admin.people.list',compact('rows'));
        }
    }
    public function store(Request $request){
        // dd($request);
        $this->validate($request, [
            'first_name' => 'required|string|min:1|max:255',
            'last_name' => 'required|string|min:1|max:255',
        ]);
        $student = new \App\Models\Student();
        $student->firstName = $request['first_name'];
        $student->lastName = $request['last_name'];
        $student->preferred_contact =  $request['contactType'] . ":" . $request['contactInfo'];
        // $contactType = $request['contactType'];
        //     if($contactType == 'email'){
        //         $student->studentEmail = $request['contactInfo'];
        //     }elseif($contactType == 'home'){
        //         $student->homeNumber = $request['contactInfo'];
        //     }elseif($contactType == 'mobile'){
        //         $student->contactNumber = $request['contactInfo'];
        //     }else{
        //         $student->businessNumber = $request['contactInfo'];
        //     }
        $student->save();
        $id = $student->id;
        return redirect()->route('people.profile',$id)->with('sucess','Sucessfully Add People');
    }
    public function profile(Request $request,$id){
        $studentID  = $id;
        $student = Student::find($id);
        return view('admin.people.profile',compact('studentID','student'));

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
         $student->firstName = $request->first;
         $student->unitDetails = $request->unitDetails;
         $student->unitDetails_postal = $request->unitDetails_postal;
         $student->gender = $request->gender;
         $student->highestLevelCompleted = $request->gender;
         $student->homeNumber = $request->home;
         $student->indigenousStatus = $request->home;
         $student->isContact = $request->isContact;
         $student->isLearner = $request->isLearner;
         $student->lastName = $request->last;
         $student->middleName = $request->middle;
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
}
