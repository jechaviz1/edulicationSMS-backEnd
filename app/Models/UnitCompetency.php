<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCompetency extends Model {
    
    use HasFactory;
    protected $table = 'unit_of_competency';
    protected $fillable = [
        'course_id', 'code', 'name', 'field_of_education', 'nominal_hours', 'vet', 'competency_flag', 'type', 'status',
    ];
    
    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('note')->withTimestamps();
    }
}