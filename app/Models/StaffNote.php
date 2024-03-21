<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffNote extends Model {

    protected $table = 'notes';
    protected $fillable = [
        'noteable_id', 'noteable_type', 'title', 'description', 'attach', 'status', 'created_by', 'updated_by',
    ];

    use HasFactory;
    
    // Polymorphic relations
    public function noteable()
    {
        return $this->morphTo();
    }
}