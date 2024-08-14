<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvitmessFunding extends Model
{
    use HasFactory;
    protected $table = 'avetmiss_funding_state';
    protected $fillable = [
        'id','user_id','state','international','avetmiss_id','funding_state_id','description'
     ];
}