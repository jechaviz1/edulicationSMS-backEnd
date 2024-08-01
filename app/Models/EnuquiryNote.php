<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnuquiryNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'student_id',
        'course_id',
        'enuquiry_id',
        'note_category',
        'followUpDate',
        'assignTo',
        'chance_success',
        'likelyMonth',
        'template',
        'note'
    ]; 
    public function category()
    {
        return $this->belongsTo(StudentNoteCategory::class, 'note_category','id');
    }
}
