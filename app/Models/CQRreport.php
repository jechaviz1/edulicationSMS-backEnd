<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CQRreport extends Model
{
    use HasFactory;
    protected $fillable = [
        'state', 'from' ,'to','generated_by',
    ];
}
