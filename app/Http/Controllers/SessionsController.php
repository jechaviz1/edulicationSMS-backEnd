<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function index(Request $request){
        if($request->view == 'month'){
            if ($request->filled('date')) {
                $firstDayOfMonth = Carbon::createFromFormat('Y-m-d', $request->input('date'));
                $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();
            } else {
                $firstDayOfMonth = Carbon::now()->startOfMonth();
                $lastDayOfMonth = Carbon::now()->endOfMonth();
            }
        $daysInMonth = $lastDayOfMonth->day;
        $calendar = [];
        $currentDate = $firstDayOfMonth->copy();
        $prevMonth = $firstDayOfMonth->copy()->subMonth()->format('Y-m-d');
        $next = $firstDayOfMonth->copy()->addMonth()->format('Y-m-d');
        while ($currentDate->lte($lastDayOfMonth)) {
            $calendar[] = ['date' => $currentDate->copy()];
            $currentDate->addDay();
        }
        $sessions = Session::orderBy('id', 'desc')->get();
        return view('admin.sessions.list',['view' => 'month','calendar' => $calendar,'prevMonth' => $prevMonth,'next' => $next,'sessions' => $sessions]);
        }else{
            if ($request->filled('date')) {
                    $startOfWeek = Carbon::createFromFormat('Y-m-d', $request->input('date'));
                    $endOfWeek = $startOfWeek->copy()->addDays(7);
                } else {
                    $startOfWeek = Carbon::now()->startOfWeek();
                    $endOfWeek = Carbon::now()->endOfWeek();
                }
            $weekDays = [];
            $currentDay = $startOfWeek->copy();
            $prev = $currentDay->copy()->subDays(7)->format('Y-m-d');
            $next = $currentDay->copy()->addDays(7)->format('Y-m-d');
            while ($currentDay->lte($endOfWeek)) {
                $weekDays[] = $currentDay->copy();
                $currentDay->addDay();
            }
            $sessions = Session::orderBy('id', 'desc')->get();
            return view('admin.sessions.list', ['view' => 'week','weekDays' => $weekDays,'prev' => $prev,'next' => $next,'sessions' => $sessions]);
        }
         
    }
}
