<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\City;
use App\Models\Course;
class ArchiveController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Event::where('archive','1')->paginate(10);
        $cities = City::get();
        $courses = Course::where('self_paced_sessions', '!=', null)->with('trainers')->get();
        return view('admin.archive.list', compact('rows','cities','courses'));
    }
}
