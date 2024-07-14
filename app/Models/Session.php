<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'course_id', 'assessor_id','event_id','location', 'rooms','start_date','dftstarthour','dftstartmin','dftstartampm','end_date','dftendhour','dftendmin','dftendampm',
    ];

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_session', 'session_id', 'program_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function event()
    {
        return $this->belongsTo(Course::class, 'event_id','id');
    }
}


// @php
// // Convert session start and end dates to Carbon instances
// $startDate = \Carbon\Carbon::parse($session->start_date);
// $endDate = \Carbon\Carbon::parse($session->end_date);

// // Calculate the number of days the session spans
// $daysSpan = $startDate->diffInDays($endDate) + 1;

// // Prepare an array to keep track of the days covered by the session
// $coveredDays = [];
// for ($i = 0; $i < $daysSpan; $i++) {
//     $coveredDays[] = $startDate->copy()->addDays($i)->toDateString();
// }
// @endphp