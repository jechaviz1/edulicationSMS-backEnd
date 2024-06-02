<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyDocument extends Model
{
    protected $table = 'compnies_documents';
    use HasFactory;

    protected $fillable = [
        'document_name', 'file_name', 'upload_by'
    ];
}
