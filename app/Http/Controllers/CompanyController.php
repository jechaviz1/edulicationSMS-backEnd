<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avetmiss;
use App\Models\Template;
use App\Models\BackgroundTemplate;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ImageController;

class CompanyController extends Controller
{
   public function avetmisssetting(){
    return view('admin.company.avetmisssetting');
   }
   public function saveAvetmiss(Request $request){
      try {
         $avetmiss = new Avetmiss();
         
         // Set the attributes for the new record
         $avetmiss->contact = $request->contact;
         $avetmiss->companyIdentifier = $request->companyIdentifier;
         $avetmiss->companyType = $request->companyType;
         $avetmiss->isManagingAgent = $request->isManagingAgent;
         $avetmiss->authorityIdentifier = $request->authorityIdentifier;
         $avetmiss->authorityName = $request->authorityName;
         $avetmiss->address1 = $request->address1;
         $avetmiss->address2 = $request->address2;
         $avetmiss->suburb = $request->suburb;
         $avetmiss->state = $request->state;
         $avetmiss->pcode = $request->pcode;
         $avetmiss->tcontactf = $request->tcontactf;
         $avetmiss->temail = $request->temail;
         $avetmiss->tphone = $request->tphone;
         $avetmiss->tfax = $request->tfax;
         $avetmiss->chkRptState = json_encode($request->chkRptState);
         $avetmiss->statecompanyIdentifier = json_encode($request->statecompanyIdentifier);
         $avetmiss->fundingSourceDescription = json_encode($request->fundingSourceDescription);
         $avetmiss->fundingSourceState = json_encode($request->fundingSourceState);
         $avetmiss->save();
         return redirect()->route('company.avetmissSetting');
    
     } catch (\Exception $e) {
        
         // Optionally, display an error message or take other actions
         echo "An error occurred while creating the record: " . $e->getMessage();
     }

   }
   public function certificate(){
      try {
        $template = Template::get();
         return view('admin.company.certificate');
     } catch (\Exception $e) {
         Log::error('Error rendering AVETMISS setting view: ' . $e->getMessage());
 
         // Optionally, you can redirect to a different page or show an error message
         return redirect()->back()->with('error', 'An error occurred while loading the AVETMISS settings page. Please try again later.');
     }
   }
   public function template(Request $request){  
        //  dd($request);
            $template = new Template;
            $template->newCertificateName = $request->newCertificateName;
            $template->Save();
            return redirect()->route('certificate.template.edit',$template->id);

   }

   public function templateEdit($id){
    try {
        $template = Template::where('id', $id)->first();
        if (!$template) {
            throw new \Exception('Template not found');
        }
        return view('admin.company.certificateEdit', compact('template'));
    } catch (\Exception $e) {
        // Handle the exception, log it or display an error message
        return redirect()->back()->with('error', $e->getMessage());
    }
   }

   public function template_update(Request $request,$id){ 
    // dd($request);  
                 $template = Template::find($id);
                 $template->newCertificateName = $request->newCertificateName;
                 $template->leading_text = $request->leading_text;
                 $template->orientation = $request->orientation;
                 $template->size = $request->size;
                 $template->trailing_text = $request->trailing_text;
                 $myimage = "null";
                 if (!is_null($request->image)){
                     $image = new ImageController;
                     $myimage = $image->files($request->image);
                     $template->image = $myimage;
                 }
                 $text1 = [];
                 $text1['signing_authority_name'] = $request->signing_authority_name;
                 $text1['signing_authority_title'] = $request->signing_authority_title;
                 $text2 = [];
                 $text2['secound_signing_name'] = $request->secound_signing_name;
                 $text2['secound_signing_title'] = $request->secound_signing_title;
                 $template->signing_authority = json_encode($text1);
                 $template->secound_signing = json_encode($text2);
                 $template->newCertificateName = $request->newCertificateName;
                 $template->save();
                 return redirect()->back()->with('sucess');

        }

        public function background(Request $request){
            // dd($request);
                $background = new BackgroundTemplate;
                $myimage = "null";
                 if (!is_null($request->image)){
                     $image = new ImageController;
                     $myimage = $image->files($request->image);
                     $background->image = $myimage;
                 }
                 $background->templates_id = $request->templates_id;
                 $background->name = $request->template;
                 $background->dpi = $request->dpi;
                 $background->added_by = $request->added_by;
                 $background->save();

        }
    }
