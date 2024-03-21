<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCompetency extends Model {

    protected $table = 'unit_of_competency';
    protected $fillable = [
        'course_id', 'code', 'name', 'field_of_education', 'nominal_hours', 'vet', 'competency_flag', 'type', 'status',
    ];

    use HasFactory;
    



}