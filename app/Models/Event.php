<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'course_type', 'reporting_state', 'course_name', 'group', 'trainers', 'assessors', 'month_year', 'course_quota', 'course_cost', 'city', 'location', 'resources', 'selects_units', 'delevery_mode', 'predominant_delivery_mode', 'is_deleted', 'created_at', 'updated_at',
    ];
    
    public function course()
        {
            return $this->belongsTo(Course::class, 'course_name','id');
        }
}
