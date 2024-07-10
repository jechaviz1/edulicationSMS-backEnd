<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    
    protected $fillable = [
      'id' , 'code', 'name', 'course_category', 'language_id' ,'default_course_cost', 'description', 'comments', 'follow_up_enquiry', 'delivery_method', 'required_no_of_unit', 'core_unit', 'color', 'reporting_this_course', 'tga_package', 'status',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
    public function courseEmailContent()
    {
        return $this->hasOne(CourseEmailContent::class, 'course_id');
    }
    public function trainers()
    {
        return $this->belongsToMany(Teacher::class, 'course_teacher', 'course_id', 'teacher_id');
    }
    public function assessors()
    {
        return $this->belongsToMany(Teacher::class, 'course_assessor', 'course_id', 'teacher_id');
    }
}
