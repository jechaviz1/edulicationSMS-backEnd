<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function courseCompletion(){
        try {
            return view('admin.report.coursecompletion');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    public function courseUtilisation(){
        try {
            return view('admin.report.courseutillisation');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    public function duplicateEnrolment(){
        try {
            return view('admin.report.duplicateEnrolment');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    public function duplicatePerson(){
        try {
            return view('admin.report.duplicatePerson');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    public function unpaidInvoices(){
        try {
            return view('admin.report.unpaidInvoices');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    public function possibleMatch(){
        try {
            return view('admin.report.possibleMatch');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    public function smsUsage(){
        try {
            return view('admin.report.smsUsage');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    public function storagedetails(){
        try {
            return view('admin.report.storagedetails');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    public function trainerCompetency(){
        try {
            return view('admin.report.trainerCompetency');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }
}
