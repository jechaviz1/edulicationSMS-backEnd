<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {
    
    use HasFactory;
    // protected $table = 'teacher';
    protected $fillable = [
        'id',
        'first_name', 
        'last_name',
        'birth',
        'commenceDate',
        'email1',
        'email2',
        'email3',
        'address1',
        'address2',
        'suburb',
        'state',
        'postcode',
        'country',
        'phone1',
        'phone2',
        'days',
        'additionalId',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_teacher', 'teacher_id', 'course_id');
    }
    public function coursesAssessor()
    {
        return $this->belongsToMany(Course::class, 'course_assessor', 'teacher_id', 'course_id');
    }
}
