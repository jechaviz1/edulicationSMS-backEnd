<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class LearnerRecord extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("fs");
        try {
            $learners = Student::all();
            return view('admin.learner.active.list',compact('learners'));
        } catch (\Exception $e) {
            // dd("hello");
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve learner records: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function enquiry()
    {
       
        try {
            $learners = Student::all();
            return view('admin.enquiry.list',compact('learners'));
        } catch (\Exception $e) {
            // dd("hello");
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve learner records: ' . $e->getMessage()
            ], 500);
        }
    }
}
