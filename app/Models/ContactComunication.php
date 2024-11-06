<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactComunication extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'dob', 'phone_number', 'address', 'bussiness'
    ];

    // One-to-Many relationship with Note
    public function notes()
    {
        return $this->hasMany(ContactNote::class);
    }
}
