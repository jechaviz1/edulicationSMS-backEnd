<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id', 'student_id', 'event_id', 'receivedBy', 'paymentStatus', 'discountAmount', 'isTrainee', 'isReported', 'RTOStudentId'
    ];
  
        public function event()
        {
            return $this->belongsTo(Event::class, 'event_id','id');
        }
        public function student()
        {
            return $this->belongsTo(Student::class, 'student_id','id');
        }
        public function course()
        {
            return $this->belongsTo(Course::class, 'course_id','id');
        }
}
