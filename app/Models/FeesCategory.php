<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesCategory extends Model {

    protected $table = 'fees_categories';
    protected $fillable = [
        'title', 'status', 'slug', 'description'
    ];

    use HasFactory;
}