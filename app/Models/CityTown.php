<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTown extends Model
{
    use HasFactory;
    protected $table = 'city_town';

    protected $fillable = [
        'city_name', 'state', 'ragion_id', 'status'
    ];


}
