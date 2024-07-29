<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'course_id', 'assignTo','course_id' ,'delevery_method', 'important', 'cityList', 'likelyMonth', 'referralList', 'note', 'followUpDate'
    ];

    // public function reference()
    // {
    //     return $this->belongsTo(EnquiryReference::class, 'reference_id');
    // }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id','id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id','id');
    }
    // public function source()
    // {
    //     return $this->belongsTo(EnquirySource::class, 'source_id');
    // }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function assign()
    {
        return $this->belongsTo('App\User', 'assigned');
    }

    public function recordedBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
