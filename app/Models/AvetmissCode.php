<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvetmissCode extends Model {
    use HasFactory;
    protected $table = 'avetmiss_code';
    protected $fillable = [
       'id','course_id', 'course_code', 'state_course_code', 'reporting_state', 'nominal_hours', 'recognition_identifier', 'qualification_category', 'anzscod_id', 'vet_flag', 'field_of_education', 'associated_course_identifier',
    ];
}