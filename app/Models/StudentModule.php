<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModule extends Model
{
    protected $table = 'student_unit_competency';
    use HasFactory;
    protected $fillable = [
        'student_id', 'unit_competency_id','enrollment_date','completion_date','module_activity_start','outcomeId','unitCompetencyDate','note'
    ];
    public function student(){
        return $this->belongsTo(Student::class, 'student_id','id');
    }
    public function unit(){
        return $this->belongsTo(UnitCompetency::class, 'unit_competency_id','id');
    }
}
