<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCompetency extends Model {

    use HasFactory;
    protected $table = 'unit_of_competency';
    protected $fillable = [
        'course_id', 'code', 'name', 'recognition_identifier', 'qualification_category', '', 'field_of_education', 'nominal_hours', 'vet', 'competency_flag', 'type', 'status', 'is_deleted', 'created_by',
    ];
    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('note')->withTimestamps();
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id','id');
    }
}