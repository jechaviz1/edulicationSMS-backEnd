<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolmentDocument extends Model
{
    use HasFactory;
    protected $fillable = [
     'id','student_id','document_name','file_name','upload_by','path',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id','id');
    }
}
