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
}
