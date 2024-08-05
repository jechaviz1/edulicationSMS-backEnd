<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'create_time',
        'start_date',
        'end_date',
        'month',
        'city_name',
        'corse_id',
        'qouta',
        'status',
        'is_completed',
    ];
    public function city()
    {
        return $this->belongsTo(City::class, 'city_name','id');
    }
}
