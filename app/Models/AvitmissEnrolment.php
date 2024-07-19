<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvitmissEnrolment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','student_id', 'course_id', 'deliverymodeId', 'scheduledHours', 'studyReasonId', 'commencourseId', 'isVETSchool', 'contractApprenticeshipId', 'clientApprenticeshipId', 'associatedCourseId', 'tuitionFee',
     ];
}
