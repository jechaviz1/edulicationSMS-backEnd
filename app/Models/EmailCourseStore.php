<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCourseStore extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','course_id','subject','note','com_chk'
      ];
      public function course()
      {
          return $this->belongsTo(Course::class, 'course_id');
      }
}
