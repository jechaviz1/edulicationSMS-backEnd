<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAttendance extends Model {

    protected $table = 'staff_attendances';
    protected $fillable = [
        'employ_id', 'start_time', 'end_time', 'date', 'attendance', 'note', 'created_by', 'updated_by',
    ];

    use HasFactory;
    
    public function Employ()
    {
        return $this->belongsTo('App\Models\Employee', 'employ_id');
    }
}