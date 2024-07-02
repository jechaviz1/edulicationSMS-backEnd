<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityTown;
use App\Models\Teacher;
use App\Http\Resources\UserResource;

class ApiController extends Controller
{
    public function cityget(){
        $cities = CityTown::get();
        return response()->json($cities);
    }
    public function teacherget(){
        $teacheres = Teacher::get();
        // dd($teacheres);
        return response()->json($teacheres);
    }
}
