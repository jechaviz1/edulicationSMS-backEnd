<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModule extends Model
{
    protected $table = 'student_unit_competency';
    use HasFactory;
    protected $fillable = [
        'student_id', 'module_id','note','enrollment_date','completion_date'
    ];
   
}
