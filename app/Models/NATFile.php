<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NATFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_from','date_to','nat_file','no_out_come','generated_by','exclusion','inclusions','version','reporting_state','start_enrolments','forstate','report_type','status'
    ];
}
