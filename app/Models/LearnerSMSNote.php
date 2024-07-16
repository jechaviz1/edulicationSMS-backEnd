<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerSMSNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','course_id', 'event_id', 'note'
    ];
}
