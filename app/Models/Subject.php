<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    protected $table = 'subject';
    protected $fillable = [
        'title', 'code', 'credit_hour', 'subject_type', 'class_type', 'total_marks', 'passing_marks', 'description', 'status',
    ];

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'program_subject', 'subject_id', 'program_id');
    }

    public function subjectEnrolls()
    {
        return $this->belongsToMany(EnrollSubject::class, 'enroll_subject_subject', 'subject_id', 'enroll_subject_id');
    }
    use HasFactory;
}
