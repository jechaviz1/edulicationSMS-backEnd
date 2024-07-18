<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolmentAddNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id','note_category','template','note','upload','attachment'
    ];
    public function category()
    {
        return $this->belongsTo(StudentNoteCategory::class, 'note_category','id');
    }
}
