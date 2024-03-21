<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkShiftType extends Model {

    protected $table = 'work_shift_types';
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    use HasFactory;
}