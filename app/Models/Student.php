<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    protected $table = 'students';
    protected $fillable = [
        'id',
        'first_name', 
        'last_name',
        'title',
        'middle_name',
        'gender',
        'birth',
        'clientCompany',
        'role',
        'relation',
        'contact_no',
        'address1',
        'address2',
        'uniqueStudentIdentifier',
        'postcode',
        'contactNumber',
        'businessNumber',
        'facsimileNumber',
        'emergency_contact_no',
        'email',
        'studentEmail2',
        'studentEmail3',
        'buildingName_postal',
        'unitDetails_postal',
        'streetNumber_postal',
        'nationality',
        'first_guardian_name',
        'streetName_postal',
        'deliveryBox_postal',
        'suburb_postal',
        'postalCode_postal',
        'indigenousStatus'
    ];

    use HasFactory;

    public function statuses()
    {
        return $this->belongsToMany(StatusType::class, 'status_type_student', 'student_id', 'status_type_id');
    }
    
    public function Birthcountry()
    {
        return $this->belongsTo(Country::class, 'birthCountry', 'id');
    }

    public function lnguage_student()
    {
        return $this->belongsTo(Language::class, 'spokenLanguage', 'id');
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
    public function certificatesa()
    {
        return $this->belongsTo(IssueCertificate::class,'student_id');
    }
    public function unitCompetencies()
    {
        return $this->belongsToMany(UnitCompetency::class)->withPivot('note','enrollment_date','unitCompetencyDate','outcomeId','module_activity_start','completion_date')->withTimestamps();
    }
    // Get Current Enroll
    public static function enroll($id)
    {
        $enroll = StudentEnroll::where('student_id', $id)
                                ->where('status', '1')
                                ->orderBy('id', 'desc')
                                ->first();

        return $enroll;
    } 

  

}