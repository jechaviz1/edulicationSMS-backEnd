<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    use HasFactory;
    protected $table = 'employeecategory';
    protected $fillable = [
        'name', 'description',];
}
