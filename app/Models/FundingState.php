<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundingState extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','state','name','company_identifier'
    ];
    public function avetmisses()
    {
        return $this->belongsToMany(Avetmiss::class)->withPivot('value');
    }
}
