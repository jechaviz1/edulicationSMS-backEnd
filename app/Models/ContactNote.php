<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactNote extends Model
{
    use HasFactory;
    protected $fillable = ['contact_id', 'note'];

    // Inverse of the relationship with Contact
    public function contact()
    {
        return $this->belongsTo(ContactComunication::class);
    }
}
