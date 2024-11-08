<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use App\Models\StudentNoteCategory;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
class CompanySettingController extends Controller
{

   public function courseSetting(Request $request){

      $user_id = Auth::user()->id;
      $data = $request->all();
      $course_settings = CompanySetting::where('name', 'Course Setting')->first();
      $user_single = User::find($user_id);
      
      $deliveryMethods = $data['delivery_method'];
      
      foreach ($deliveryMethods['id'] as $key => $method_id) {
         // Check if the pivot record exists
         $delivery_method_record = DB::table('user_delivery_methods')
             ->where('user_id', $user_id)
             ->where('delivery_method_id', $method_id)
             ->first();
         if ($delivery_method_record != null) {
             // Update the existing pivot record
             DB::table('user_delivery_methods')
                 ->where('user_id', $user_id)
                 ->where('delivery_method_id', $method_id)
                 ->update([
                     'rename' => $deliveryMethods['rename'][$key],
                     'init' => $deliveryMethods['init'][$key],
                     'single' => $deliveryMethods['single'][$key],
                     'multiple' => $deliveryMethods['multiple'][$key]
                 ]);
         } else {
             // Attach the record if it doesn't exist
             $user_single->deliveryMethods()->attach($method_id, [
                 'user_id' => $user_id,
                 'rename' => $deliveryMethods['rename'][$key],
                 'init' => $deliveryMethods['init'][$key],
                 'single' => $deliveryMethods['single'][$key],
                 'multiple' => $deliveryMethods['multiple'][$key]
             ]);
         }
     }
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
