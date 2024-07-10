<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEmailContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','course_id','subject','body','select_document'
      ];
      public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
