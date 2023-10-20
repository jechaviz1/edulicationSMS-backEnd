<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'contact_number', 'email', 'address', 'profile_photo', 'joining_date', 'birthdate', 'salary', 'employee_code', 'employee_status', 'department_id', 'designation_id',
    ];
    public $timestamps = true;

    
}
