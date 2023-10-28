<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

class SubjectController extends Controller {

    public function list() {
        $data = [];
        $data['title'] = 'Subject List';
        $data['menu_active_tab'] = 'subject-list';
        $data['subject'] = \App\Models\Subject::orderBy('id', 'DESC')->where('is_deleted', '0')->get();

        return view('admin.subject.list')->with($data);
    }

    public function add(Request $request) {
        $data = [];
        $data['title'] = 'Add Subject';
        $data['menu_active_tab'] = 'add-subject';
        $data['subject'] = Subject::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();

        return view('admin.subject.add')->with($data);
    }

    public function store(Request $request) {
       
        $data = $request->input();
        try {
            $subject = new \App\Models\Subject();
            $subject->title = $data['title'];
            $subject->created_by_id = \Auth::user()->id ? \Auth::user()->id : null;
            $subject->save();
            return redirect()->route('subject-list')->with('success', 'Record added successfully.');
        } catch (Exception $e) {
            return redirect()->route('subject-list')->with('failed', 'Record not added.');
        }
    }

    public function edit(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Subject';
        $data['menu_active_tab'] = 'subject-list';
        if ($id) {
            $subject = \App\Models\Subject::find($id);
            $data['subject'] = Subject::where('is_deleted', '0')->where('id', '!=', '1')->orderBy('id', 'ASC')->get();
            if ($subject) {
                $data['subject'] = $subject;
                return view('admin.subject.edit')->with($data);
            } else {
                return redirect()->route('subject-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('subject-list')->with('failed', 'Record not found.');
        }
    }

    public function update(Request $request, $id) {
        if ($id) {
            
            $data = $request->input();
            $subject= \App\Models\Subject::find($id);
            if ($subject) {
                $subject->title = $data['title'];
                $subject->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $subject->save();

                return redirect()->route('subject-list')->with('success', 'Record Updated.');
            } else {
                return redirect()->route('subject-list')->with('failed', 'Record not found.');
            }
        }
    }

    public function delete($id) {
        if ($id) {
            $subject= \App\Models\Subject::find($id);
            if ($subject) {
                $subject->is_deleted = '1';
                $subject->modified_by_id = \Auth::user()->id ? \Auth::user()->id : null;
                $subject->save();
            }
            return redirect()->route('subject-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('subject-list')->with('failed', 'Record not found.');
        }
    }

}
