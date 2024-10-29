<?php

namespace App\Http\Controllers;

use App\Services\USIService;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
class USIController extends Controller
{
    private $usiService;
    private $expired;
            public function USI_get(){
                return view('usi_get');
            }
    public function __construct(USIService $usiService)
    {
        $this->usiService = $usiService;
        $this->expired = $this->usiService->hasExpired();
    }

    public function testUSI()
    {
        return view('admin.usi_test.usitest');
    }

    public function verifyUSI(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'usi' => 'required|string|size:10',
                'family_name' => 'required|string|max:40',
                'date_of_birth' => 'required|date',
            ]);

            if ($this->expired) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Key store has expired quitting',
                ]);
            }
            $result = $this->usiService->verifyUSI(
                $validatedData['usi'],
                $request->first_name,
                $validatedData['family_name'],
                $validatedData['date_of_birth']
            );
            $result['status'] = true;
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => strip_tags($e->getMessage()),
            ]);
        }
    }

    public function verifyBulkUSI(Request $request)
    {
        try {
            if ($this->expired) {
                return response()->json([
                    'status' => false,
                    'msg' => 'Key store has expired quitting',
                ]);
            }
            $result = $this->usiService->verifyBulkUSI($request->all());
            $result['status'] = true;
            return response()->json($result);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'msg' => strip_tags($e->getMessage()),
            ]);
        }
    }
}
