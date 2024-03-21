<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'course';
    // protected $fillable = [
    //     'language_id', 'title', 'slug', 'faculty', 'semesters', 'credits', 'courses', 'duration', 'fee', 'description', 'attach', 'status',
    // ];
    
    protected $fillable = [
        'code', 'name', 'course_category', 'default_course_cost', 'description', 'comments', 'follow_up_enquiry', 'delivery_method', 'required_no_of_unit', 'core_unit', 'color', 'reporting_this_course', 'tga_package', 'status',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

}
