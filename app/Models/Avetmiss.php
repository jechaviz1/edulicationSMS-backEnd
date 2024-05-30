<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avetmiss extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'contact', 
        'companyIdentifier',
        'companyType',
        'isManagingAgent',
        'authorityIdentifier',
        'authorityName',
        'address1',
        'address2',
        'suburb',
        'state',
        'pcode',
        'tcontactf',
        'temail',
        'tphone',
        'tfax',
        'chkRptState',
        'fundingSourceDescription',
        'statecompanyIdentifier',
        'fundingSourceState',
    ];
}
