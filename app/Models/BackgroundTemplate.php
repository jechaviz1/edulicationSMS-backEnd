<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundTemplate extends Model
{
    use HasFactory;
    protected $table = 'templates_background';
    protected $fillable = [
        'id', 
        'templates_id',
        'name', 
        'image', 
        'dpi', 
        'added_by', 
    ];
}
