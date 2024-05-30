<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TrainersController extends Controller
{
    
    public function index(Request $request){
        if($request->view == 'month'){
            if ($request->filled('date')) {
                $firstDayOfMonth = Carbon::createFromFormat('Y-m-d', $request->input('date'));
                $lastDayOfMonth = $firstDayOfMonth->copy()->endOfMonth();
                // Carbon::now()->startOfMonth();
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
        return view('admin.trainers.list',['view' => 'month','calendar' => $calendar,'prevMonth' => $prevMonth,'next' => $next]);
        }else{
            if ($request->filled('date')) {
                // dd($request);
                    $startOfWeek = Carbon::createFromFormat('Y-m-d', $request->input('date'));
                    $endOfWeek = $startOfWeek->copy()->addDays(7);
                } else {
                    $startOfWeek = Carbon::now()->startOfWeek();
                    $endOfWeek = Carbon::now()->endOfWeek();
                }
            $weekDays = [];
            $currentDay = $startOfWeek->copy();
            // Subtract 7 days to get the date of the last week
            $prev = $currentDay->copy()->subDays(7)->format('Y-m-d');
            // Calculate the date of the Monday of the last week
            // $prev = $lastWeekDate->startOfWeek()->format('Y-m-d');
            $next = $currentDay->copy()->addDays(7)->format('Y-m-d');
            // dd($prev,$next);
            while ($currentDay->lte($endOfWeek)) {
                $weekDays[] = $currentDay->copy();
                $currentDay->addDay();
            }
            // dd($weekDays,$lastWeekDate);
            return view('admin.trainers.list', ['view' => 'week','weekDays' => $weekDays,'prev' => $prev,'next' => $next]);
        }
         
    }
}
