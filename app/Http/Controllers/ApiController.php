<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Teacher;
use App\Models\DefaultSession;
use App\Http\Resources\UserResource;

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
}
