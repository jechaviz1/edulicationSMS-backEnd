<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use App\Models\StudentNoteCategory;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class CompanySettingController extends Controller
{

   public function courseSetting(Request $request){
    
      $user = Auth::user()->id;
      $data = $request->all();
      $corses_settings = CompanySetting::where('name','Course Setting')->first();
      $user_singe = User::find($user);
      $user_singe->deliveryMethods()->attach($request->delivery_method["id"]);
          return redirect()->back()->with('sucess', 'Update Setting Page Update');
   }

   public function studentSetting(Request $request){
      $data = $request->all();
      $corses_settings = CompanySetting::where('name','Student Setting')->first();
      if($corses_settings == null){
         $course_setting = new CompanySetting;
         $course_setting->name = "Student Setting";
         $course_setting->description = json_encode($data,true);
         $course_setting->save();
      }else{
         $corses_settings->name = "Student Setting";
         $corses_settings->description = json_encode($data,true);
         $corses_settings->save();
      }
    
   return redirect()->back()->with('sucess', 'Update Setting Page Update');
   }

   
   public function noteCategory(Request $request){
            $student = new StudentNoteCategory;
            $student->name = $request->name;
            $student->save();
            return redirect()->back()->with('sucess', 'Update Setting Page Update');
   }
   public function remove_category($id){
            // dd($id);
            $student = StudentNoteCategory::find($id);
            $student->delete();
            return redirect()->back()->with('sucess', 'Update Setting Page Update');

   }
   public function editnotecategory(Request $request){
      $student = StudentNoteCategory::find($request->id);
      $student->name = $request->name;
      $student->save();
      return redirect()->back()->with('sucess', 'Update Setting Page Update');
   }
}
