<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $table = 'templates';
    protected $fillable = [
        'id',
        'newCertificateName',
        'administrative',
        'companyId',
        'email',
        'enableSCORM',
        'enableVSN',
        'firstname',
        'g_CompanyRegStatus',
        'isCloudAssessEnabled',
        'studentEportfolioEnabled',
        'requireAVETMISS',
        'timezone',
        'userId',
        'lastname',
        'image'
    ];
}
