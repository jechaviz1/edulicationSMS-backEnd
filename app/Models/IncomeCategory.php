<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model {

    protected $table = 'income_categories';
    protected $fillable = [
        'title', 'slug', 'description', 'status',
    ];

    use HasFactory;
}