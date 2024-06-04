<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function dataExporter(){
        try {
          
            return view('admin.export.data');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }
}
