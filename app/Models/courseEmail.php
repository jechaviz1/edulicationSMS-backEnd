<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courseEmail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','course_id','certificate_id','subject','note'
      ];
      public function course()
      {
          return $this->belongsTo(Course::class, 'course_id');
      }
      public function certificate()
      {
          return $this->belongsTo(Course::class, 'certificate_id');
      }
}
