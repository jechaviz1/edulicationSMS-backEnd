<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoPakSpecific extends Model
{
    use HasFactory;
    protected $table = 'info_pak_specific_documents';
    protected $fillable = [
        'id', 'documentname', 'filename', 'path',
    ];
}
