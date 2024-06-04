<?php

namespace App\Http\Controllers;

use App\Models\CQRreport;
use App\Http\Requests\StoreCQRreportRequest;
use App\Http\Requests\UpdateCQRreportRequest;
use ZipArchive;
class CQRreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $CQR = CQRreport::get();
            return view('admin.cqr.report-history',compact('CQR'));
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
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
     * @param  \App\Http\Requests\StoreCQRreportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCQRreportRequest $request)
    {
        $user = auth()->user();
        try {
            $CQR = new CQRreport();
            $CQR->state = $request->reportingState;
            $CQR->from = $request->exportDateFrom;
            $CQR->to = $request->exportDateTo;
            $CQR->generated_by = $request->generated_by;
            $CQR->soa = $request->soa;
             $xml = $this->createZip();
            $CQR->cqr_xml = $xml;
            $CQR->qualification = $request->qualification;
            $CQR->deletedcertificates = $request->deletedcertificates;
            $CQR->generated_by = $user->first_name;
            $CQR->save();
            return redirect()->route('company.CQR');
        } catch (\Exception $e) {
            // Optionally, display an error message or take other actions
            echo "An error occurred while creating the record: " . $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CQRreport  $cQRreport
     * @return \Illuminate\Http\Response
     */
    public function show(CQRreport $cQRreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CQRreport  $cQRreport
     * @return \Illuminate\Http\Response
     */
    public function edit(CQRreport $cQRreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCQRreportRequest  $request
     * @param  \App\Models\CQRreport  $cQRreport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCQRreportRequest $request, CQRreport $cQRreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CQRreport  $cQRreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(CQRreport $cQRreport)
    {
        //
    }

    public function createZip()
    {
        $zip = new ZipArchive;
        $timestamp = now()->format('YmdHis');
        $uniqueCode = 'CQR_' . $timestamp;
        $zipFileName = $uniqueCode . '.zip';

        if ($zip->open(public_path('report/'.$zipFileName), ZipArchive::CREATE) === TRUE) {
            $filesToZip = [
                public_path('CQT.txt'),
                public_path('CQT1.txt'),
            ];

            foreach ($filesToZip as $file) {
                $zip->addFile($file, basename($file));
            }

            $zip->close();
                return 'report/'.$zipFileName;
            return response()->download(public_path('report/'.$zipFileName))->deleteFileAfterSend(true);
        } else {
            return "Failed to create the zip file.";
        }
    }
}
