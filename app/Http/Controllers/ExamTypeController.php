<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use Exception;
use Illuminate\Http\Request;
use Validator;
use DB;

class ExamTypeController extends Controller
{
    public function examtypeList() {
        $data = [];
        $data['title'] = 'Exam type List';
        $data['menu_active_tab'] = 'examtype-list';
        $data['examtype'] = ExamType::where('is_deleted', '0')->where('status', '!=', '2')->orderBy('id', 'DESC')->get();

        return view('admin.examinations.list')->with($data);
    }


    public function addExamType(Request $request) {
        $data = [];
        $data['title'] = 'Add exam type';
        $data['menu_active_tab'] = 'add-examtype';
        return view('admin.examinations.add')->with($data);
    }

    public function storeExamType(Request $request) {
        //dd($request->all());
        $rules = [
            'title' => 'required|string|min:1|max:255',
            'marks' => 'required|string|min:1|max:255',   

        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
        dd($validator);
            return redirect('insert')
                            ->withInput()
                            ->withErrors($validator);
        } else {
            // $data = $request->input();
         
            try {
                $data = new ExamType();
                //dd($data);
               
                        $data->title = $request->input('title');
                        $data->marks = $request->input('marks');
                        $data->contribution = $request->input('contribution');
                        $data->status = $request->input('status');
                        //dd($data);
                        $data->save();
                        //dd("success");
                return redirect()->route('examtype-list')->with('success', 'Record added successfully.');
            } catch (Exception $e) {
               //dd($e);
                return redirect()->route('examtype-list')->with('failed', 'Record not added.');
            }
        }
    }
    public function editExamType(Request $request, $id) {
        $data = [];
        $data['title'] = 'Edit Exam Type';
        $data['menu_active_tab'] = 'examtype-list';
        if ($id) {
            $examtype = ExamType::find($id);
            $data['examtype'] = ExamType::where('is_deleted', '0')->orderBy('id', 'ASC')->get();
            if ($examtype) {
                $data['examtype'] = $examtype;
                
                return view('admin.examinations.edit')->with($data);
            } else {
                return redirect()->route('examtype-list')->with('failed', 'Record not found.');
            }
        } else {
            return redirect()->route('examtype-list')->with('failed', 'Record not found.');
        }
    }
    public function updateExamType(Request $request, $id) {
        
        if ($id) {
            
            $request->validate([
                'title' => 'required',
                'marks' => 'required',

            ]);
           
            $data = $request->input();
            //dd($data);
            $examtype = ExamType::find($id);

          //  dd($designation);
             if ($examtype) {
                
              $examtype->title = isset($data['title']) ? $data['title'] : null;
              $examtype->marks = isset($data['marks']) ? $data['marks'] : null;
            //dd($request->status);
                // if($request->status==1)
                //     {
                //         $status=1;
                //     }
                //     else
                //     {
                        
                //         $status=2;
                //     }
               //dd($status);
                $examtype->contribution = isset($data['contribution']) ? $data['contribution'] : 1;
                $status = $request->input('status') == 1 ? 1 : 2;
                $examtype->status = $status;
                //DB::table('exam_type')->where('id',$id)->update(array('title'=> $request->input('title'),'marks'=> $request->input('marks'),'contribution'=> $request->input('contribution'),'status'=> $status));
                $examtype->update();
           //dd($status);
            }
            //dd('success');
            return redirect()->route('examtype-list')->with('success', 'Record Updated.');
        
    }
}
    public function deleteExamType($id) {
        if ($id) {
            $examtype = ExamType::find($id);
            if ($examtype) {
                $examtype->is_deleted = '1';
                
                $examtype->save();
            }
            return redirect()->route('examtype-list')->with('success', 'Record deleted.');
        } else {
            return redirect()->route('examtype-list')->with('failed', 'Record not found.');
        }
    }
}
