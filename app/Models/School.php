<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class School extends Authenticatable implements CanResetPassword
{
    use HasFactory, CanResetPasswordTrait;

    protected $table = 'school';
    
    protected $fillable = [
        'name', 'address',
    ];
}