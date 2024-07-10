<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'dftCity', 
        'dftTrainer' ,
        'dftstarttime',
        'dftendtime',
        'course_id',
        'courseCityId',
        'dftAssessor',
    ];
    public function city()
    {
        return $this->belongsTo(city::class, 'dftCity','id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'dftTrainer','id');
    }
    public function assessor()
    {
        return $this->belongsTo(Teacher::class, 'dftAssessor','id');
    }
}
