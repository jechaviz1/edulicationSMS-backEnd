<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueCertificate extends Model
{
    use HasFactory;
    protected $table = 'issue_certificates';
    protected $fillable = [
        'id', 'enrolment_id', 'course_id', 'student_id','issue_date','delivery_method','include_report','comments'
    ];
}
