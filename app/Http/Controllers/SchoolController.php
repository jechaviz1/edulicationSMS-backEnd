<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
class SchoolController extends Controller {

    public function schoolList() {
        $data = [];
        $data['title'] = 'School List';
        $data['menu_active_tab'] = 'school-list';
        $data['school'] = \App\Models\School::select('school.id', 'school.name', 'school.address', 'school.email', 'school.phone_no', 'school.created_by_id', 'school.created_at', 'users.first_name', 'users.last_name')
                ->leftJoin('users', 'school.created_by_id', '=', 'users.id')
                ->where('school.is_deleted', '0')
                ->orderBy('school.id', 'DESC')
                ->get();
        $data['super_admin'] = \App\Models\User::where('role_id', 1)->where('is_deleted', '0')->orderBy('id', 'DESC')->get();
        return view('admin.school.list')->with($data);
    }

    public function addSchool(Request $request) {

        $data = [];
        $data['title'] = 'Add School';
        $data['menu_active_tab'] = 'add-school';
        $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();

        return view('admin.school.add')->with($data);
    }

    public function storeSchool(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|min:1|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:25',
                'unique:school,email',
                'regex:/^(?!.*\.\.)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'email_1' => [
                'nullable',
                'email',
                'max:25',
                'unique:users,email',
                'regex:/^(?!.*\.\.)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'email_2' => [
                'nullable',
                'email',
                'max:25',
                'unique:users,email',
                'regex:/^(?!.*\.\.)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'email_3' => [
                'nullable',
                'email',
                'max:25',
                'unique:users,email',
                'regex:/^(?!.*\.\.)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
        ],
        [
            'email.regex' => 'Please enter a valid email id.'
        ]);
        $data = $request->input();
        try {
        // dd($request);
            $school = new \App\Models\School();
            $school->name = $data['name'];
            $school->address = $data['address'];
            $school->email = $data['email'];
            $school->phone_no = $data['phone_no'];
            $school->created_by_id = Auth::user()->id ? Auth::user()->id : null;
            //logo
            $file_name = null;
            $file_path = null;
            if ($request->file()) {
                $file_name = 'logo_' . time() . '.' . $request->logo->extension();
                $file_path = $request->file('logo')->storeAs('logo', $file_name, 'public');
            }
            if ($file_name != null) {
                $school->logo = $file_name;
            }
            if ($file_path != null) {
                $school->logo_path = $file_path;
            }
            $school->note = $data['note'] ? $data['note'] : null;
            $school->save();
            // dd($school);
            $token = Password::createToken($school);
            $school_id = null;
            if (isset($school->id)) {
                $school_id = $school->id;
            }
            for ($x = 1; $x <= 3; $x++) {
                $school_contact_person = new \App\Models\SchoolContactPerson();
                $school_contact_person->school_id = $school_id;
                $first_name_val = 'first_name_' . $x;
                if (isset($request->$first_name_val) && $request->$first_name_val) {
                    $school_contact_person->first_name = isset($request->$first_name_val) ? $request->$first_name_val : null;
                }
                $last_name_val = 'last_name_' . $x;
                if (isset($request->$last_name_val) && $request->$last_name_val) {
                    $school_contact_person->last_name = isset($request->$last_name_val) ? $request->$last_name_val : null;
                }
                $position_val = 'position_' . $x;
                if (isset($request->$position_val) && $request->$position_val) {
                    $school_contact_person->position = isset($request->$position_val) ? $request->$position_val : null;
                }
                $email_val = 'email_' . $x;
                if (isset($request->$email_val) && $request->$email_val) {
                    $school_contact_person->email = isset($request->$email_val) ? $request->$email_val : null;
                }
                $phone_no_val = 'phone_no_' . $x;
                if (isset($request->$phone_no_val) && $request->$phone_no_val) {
                    $school_contact_person->phone_no = isset($request->$phone_no_val) ? $request->$phone_no_val : null;
                }
                $school_contact_person->save();
            }
            
            // Send registration link to the provided email
            Mail::send('emails.password_reset', ['token' => $token,'user' => $school], function ($message) use ($school) {
                $message->to($school->email);
                $message->subject('Set Your Password');
            });

            return redirect()->route('school-list')->with('success', 'Record added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('school-list')->with('failed', 'Record not added.');
        }
    }

    public function editSchool(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit School';
        $data['menu_active_tab'] = 'school-list';
        if ($id) {
            $school = \App\Models\School::find($id);
            $data['role'] = Role::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($school) {
                $school_contact_person = \App\Models\SchoolContactPerson::where('is_deleted', '0')->where('school_id', $id)->get();
                $data['school'] = $school;
                $data['school_contact_person'] = $school_contact_person;
                return view('admin.school.edit')->with($data);
            } else {
                return redirect()->route('school-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('school-list')->with('failed', 'Record not found.');
        }
    }

    public function updateSchool(Request $request, $id) {
        if ($id) {
             // Fetch the user record based on the provided ID
        $user = School::findOrFail($id); // Adjust this based on your actual model

        // Validate the request
        $this->validate($request, [
            'name' => 'required|string|min:1|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:25',
                'unique:school,email,' . $id, // Use the provided ID to exclude the current record
                'regex:/^(?!.*\.\.)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'email_1' => [
                'nullable',
                'email',
                'max:25',
                'unique:users,email,' . $id, // Use the provided ID to exclude the current record
                'regex:/^(?!.*\.\.)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'email_2' => [
                'nullable',
                'email',
                'max:25',
                'unique:users,email,' . $id, // Use the provided ID to exclude the current record
                'regex:/^(?!.*\.\.)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'email_3' => [
                'nullable',
                'email',
                'max:25',
                'unique:users,email,' . $id, // Use the provided ID to exclude the current record
                'regex:/^(?!.*\.\.)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
        ], [
            'email.regex' => 'Please enter a valid email address.',
            'email_1.regex' => 'Please enter a valid email address for Email 1.',
            'email_2.regex' => 'Please enter a valid email address for Email 2.',
            'email_3.regex' => 'Please enter a valid email address for Email 3.',
        ]);
            $data = $request->input();
            $school = \App\Models\School::find($id);
            if ($school){
                $school->name = $data['name'];
                $school->address = $data['address'];
                $school->email = $data['email'];
                $school->phone_no = $data['phone_no'];
                //                $school->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $school->note = $data['note'] ? $data['note'] : null;
                $file_name = null;
                    $file_path = null;

                    if ($request->file()) {
                        if ($request->file('logo')) {
                            $file_name = 'image_' . time() . '.' . $request->logo->extension();
                            // Define the path where the file will be stored
                            $destinationPath = public_path('logo'); // This will store the file in the 'public/logo' directory
                            // Move the uploaded file to the specified destination path
                            $request->file('logo')->move($destinationPath, $file_name);
                            // Set the file path relative to the public directory
                            $file_path = 'logo/' . $file_name;
                        }
                    }
                    // Store the file name and file path in the database
                    $school->logo = $file_name;
                    $school->logo_path = $file_path;

                $school->save();
                $school_contact_person_list = \App\Models\SchoolContactPerson::where('school_id', $id)->where('is_deleted', '0')->get();

                if (isset($school_contact_person_list[0])) {
                    $school_contact_person = \App\Models\SchoolContactPerson::where('id', $school_contact_person_list[0]['id'])->where('is_deleted', '0')->first();
                } else {
                    $school_contact_person = new \App\Models\SchoolContactPerson();
                    $school_contact_person->school_id = $id;
                }

                $first_name_val = 'first_name_' . 1;
                if (isset($request->$first_name_val) && $request->$first_name_val) {
                    $school_contact_person->first_name = isset($request->$first_name_val) ? $request->$first_name_val : null;
                }
                $last_name_val = 'last_name_' . 1;
                if (isset($request->$last_name_val) && $request->$last_name_val) {
                    $school_contact_person->last_name = isset($request->$last_name_val) ? $request->$last_name_val : null;
                }
                $position_val = 'position_' . 1;
                if (isset($request->$position_val) && $request->$position_val) {
                    $school_contact_person->position = isset($request->$position_val) ? $request->$position_val : null;
                }
                $email_val = 'email_' . 1;
                if (isset($request->$email_val) && $request->$email_val) {
                    $school_contact_person->email = isset($request->$email_val) ? $request->$email_val : null;
                }
                $phone_no_val = 'phone_no_' . 1;
                if (isset($request->$phone_no_val) && $request->$phone_no_val) {
                    $school_contact_person->phone_no = isset($request->$phone_no_val) ? $request->$phone_no_val : null;
                }
                $school_contact_person->save();
                ///////////////////////
                if (isset($school_contact_person_list[1])) {
                    $school_contact_person = \App\Models\SchoolContactPerson::where('id', $school_contact_person_list[1]['id'])->where('is_deleted', '0')->first();
                } else {
                    $school_contact_person = new \App\Models\SchoolContactPerson();
                    $school_contact_person->school_id = $id;
                }
                $first_name_val = 'first_name_' . 2;
                if (isset($request->$first_name_val) && $request->$first_name_val) {
                    $school_contact_person->first_name = isset($request->$first_name_val) ? $request->$first_name_val : null;
                }
                $last_name_val = 'last_name_' . 2;
                if (isset($request->$last_name_val) && $request->$last_name_val) {
                    $school_contact_person->last_name = isset($request->$last_name_val) ? $request->$last_name_val : null;
                }
                $position_val = 'position_' . 2;
                if (isset($request->$position_val) && $request->$position_val) {
                    $school_contact_person->position = isset($request->$position_val) ? $request->$position_val : null;
                }
                $email_val = 'email_' . 2;
                if (isset($request->$email_val) && $request->$email_val) {
                    $school_contact_person->email = isset($request->$email_val) ? $request->$email_val : null;
                }
                $phone_no_val = 'phone_no_' . 2;
                if (isset($request->$phone_no_val) && $request->$phone_no_val) {
                    $school_contact_person->phone_no = isset($request->$phone_no_val) ? $request->$phone_no_val : null;
                }                        
                $school_contact_person->save();

                /////////
                if (isset($school_contact_person_list[2])) {
                    $school_contact_person = \App\Models\SchoolContactPerson::where('id', $school_contact_person_list[2]['id'])->where('is_deleted', '0')->first();
                } else {
                    $school_contact_person = new \App\Models\SchoolContactPerson();       
                    $school_contact_person->school_id = $id;
                }
                $first_name_val = 'first_name_' . 3;
                if (isset($request->$first_name_val) && $request->$first_name_val) {
                    $school_contact_person->first_name = isset($request->$first_name_val) ? $request->$first_name_val : null;
                }
                $last_name_val = 'last_name_' . 3;
                if (isset($request->$last_name_val) && $request->$last_name_val) {
                    $school_contact_person->last_name = isset($request->$last_name_val) ? $request->$last_name_val : null;
                } 
                $position_val = 'position_' . 3;
                if (isset($request->$position_val) && $request->$position_val) {
                    $school_contact_person->position = isset($request->$position_val) ? $request->$position_val : null;
                }
                $email_val = 'email_' . 3;
                if (isset($request->$email_val) && $request->$email_val) {
                    $school_contact_person->email = isset($request->$email_val) ? $request->$email_val : null;
                }
                $phone_no_val = 'phone_no_' . 3;
                if (isset($request->$phone_no_val) && $request->$phone_no_val) {
                    $school_contact_person->phone_no = isset($request->$phone_no_val) ? $request->$phone_no_val : null;
                }
                $school_contact_person->save();
                return redirect()->route('school-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('school-list')->with('failed', 'Record not found.');
            }
        }
    }

    public function deleteSchool($id) {
        if ($id) {
            $school = School::find($id);
            if ($school) {
                $school->is_deleted = '1';
//                $school->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $school->save();
            }
            return redirect()->route('school-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('school-list')->with('failed', 'Record not found.');
        }
    }

    private function sendRegistrationLink(School $school) {
        // Customize the email content as needed
        $data = [
            'school_name' => $school->name,
            'email' => $school->email,
            'registration_link' => '',
        ];
        // dd($school->email);
        Mail::to($school->email)->send(new \App\Mail\RegistrationLinkMail($data));
    }
}